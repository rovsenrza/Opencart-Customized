<?php
namespace Opencart\Catalog\Controller\Startup;
/**
 * Class SeoUrl
 *
 * @package Opencart\Catalog\Controller\Startup
 */
class SeoUrl extends \Opencart\System\Engine\Controller {
	/**
	 * @var array<string, string>
	 */
	private array $data = [];
	/**
	 * @var array<string, array<string, mixed>>
	 */
	private array $languages = [];
	/**
	 * @var array<string, string>
	 */
	private array $language_aliases = [];

	/**
	 * Index
	 *
	 * @return null
	 */
	public function index() {
		// Add rewrite to URL class
		if ($this->config->get('config_seo_url')) {
			$this->url->addRewrite($this);

			$this->load->model('design/seo_url');
			$this->loadLanguages();

			// Decode URL
			if (isset($this->request->get['_route_'])) {
				$parts = explode('/', $this->request->get['_route_']);

				// remove any empty arrays from trailing
				if (oc_strlen(end($parts)) == 0) {
					array_pop($parts);
				}

				$parts = $this->decodeLanguageFromParts($parts);

				foreach ($parts as $key => $value) {
					$seo_url_info = $this->model_design_seo_url->getSeoUrlByKeyword(rawurldecode((string)$value));

					if ($seo_url_info) {
						$this->request->get[$seo_url_info['key']] = html_entity_decode($seo_url_info['value'], ENT_QUOTES, 'UTF-8');

						unset($parts[$key]);
					}
				}

				$parts = array_values($parts);

				if (!isset($this->request->get['route'])) {
					$route = $this->inferRoute();

					if ($route) {
						$this->request->get['route'] = $route;
					}
				}

				if (!isset($this->request->get['route']) && $parts) {
					$route = $this->findRouteFromParts($parts);

					if ($route) {
						$this->request->get['route'] = $route;
						$parts = [];
					}
				}

				if (!isset($this->request->get['route'])) {
					$this->request->get['route'] = $this->config->get('action_default');
				}

				if ($parts) {
					$this->request->get['route'] = $this->config->get('action_error');
				}
			}
		}

		return null;
	}

	/**
	 * Rewrite
	 *
	 * @param string $link
	 *
	 * @return string
	 */
	public function rewrite(string $link): string {
		$url_info = parse_url(str_replace('&amp;', '&', $link));

		// Build the url
		$url = '';

		if (isset($url_info['scheme'])) {
			$url .= $url_info['scheme'];
		}

		$url .= '://';

		if (isset($url_info['host'])) {
			$url .= $url_info['host'];
		}

		if (isset($url_info['port'])) {
			$url .= ':' . $url_info['port'];
		}

		$query = [];

		if (isset($url_info['query'])) {
			parse_str($url_info['query'], $query);
		}

		$this->loadLanguages();

		$language_code = (string)$this->config->get('config_language');

		if (isset($query['language']) && is_string($query['language'])) {
			$matched_code = $this->getMatchedLanguageCode($query['language']);

			if ($matched_code) {
				$language_code = $matched_code;
			}
		} elseif (isset($this->request->get['language']) && is_string($this->request->get['language'])) {
			$matched_code = $this->getMatchedLanguageCode($this->request->get['language']);

			if ($matched_code) {
				$language_code = $matched_code;
			}
		}

		$language_segment = $this->getLanguageSegment($language_code);
		$language_id = isset($this->languages[$language_code]['language_id']) ? (int)$this->languages[$language_code]['language_id'] : (int)$this->config->get('config_language_id');

		// Start changing the URL query into a path
		$paths = [];

		unset($query['language']);

		foreach ($query as $key => $value) {
			if (is_array($value) || $key == 'route') {
				continue;
			}

			$index = $key . '=' . (string)$value;

			if (!isset($this->data[$language_id][$index])) {
				$this->data[$language_id][$index] = $this->model_design_seo_url->getSeoUrlByKeyValue((string)$key, (string)$value);
			}

			if ($this->data[$language_id][$index]) {
				$paths[] = $this->data[$language_id][$index];

				unset($query[$key]);
			}
		}

		$sort_order = [];

		foreach ($paths as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}

		array_multisort($sort_order, SORT_ASC, $paths);

		// Build the path
		$url .= rtrim(str_replace('/index.php', '', $url_info['path'] ?? ''), '/');

		if ($language_segment) {
			$url .= '/' . $language_segment;
		}

		foreach ($paths as $result) {
			$url .= '/' . $result['keyword'];
		}

		if (isset($query['route'])) {
			$route = (string)$query['route'];

			if ($paths || $route == $this->config->get('action_default')) {
				unset($query['route']);
			} elseif ($route == 'product/search') {
				$url .= '/search';
				unset($query['route']);
			} elseif ($route) {
				$url .= '/' . trim($route, '/');
				unset($query['route']);
			}
		}

		// Rebuild the URL query
		if ($query) {
			$url .= '?' . str_replace(['%2F'], ['/'], http_build_query($query));
		}

		return $url;
	}

	/**
	 * @return void
	 */
	private function loadLanguages(): void {
		if ($this->languages) {
			return;
		}

		$this->load->model('localisation/language');

		$results = $this->model_localisation_language->getLanguages();

		foreach ($results as $result) {
			$code = oc_strtolower((string)$result['code']);

			$this->languages[$code] = $result + ['code' => $code];
			$this->language_aliases[$code] = $code;

			$short = explode('-', $code)[0];

			if ($short && !isset($this->language_aliases[$short])) {
				$this->language_aliases[$short] = $code;
			}
		}
	}

	/**
	 * @param array<int, string> $parts
	 *
	 * @return array<int, string>
	 */
	private function decodeLanguageFromParts(array $parts): array {
		if (!$parts) {
			return $parts;
		}

		$language_code = $this->getMatchedLanguageCode((string)$parts[0]);

		if ($language_code) {
			$this->request->get['language'] = $language_code;
			array_shift($parts);
		}

		return $parts;
	}

	/**
	 * @param string $code
	 *
	 * @return string
	 */
	private function getMatchedLanguageCode(string $code): string {
		$code = oc_strtolower(trim($code));

		if (!$code) {
			return '';
		}

		return $this->language_aliases[$code] ?? '';
	}

	/**
	 * @param string $code
	 *
	 * @return string
	 */
	private function getLanguageSegment(string $code): string {
		$language_code = $this->getMatchedLanguageCode($code);

		if (!$language_code) {
			$language_code = oc_strtolower($code);
		}

		return explode('-', $language_code)[0] ?? $language_code;
	}

	/**
	 * @return string
	 */
	private function inferRoute(): string {
		if (isset($this->request->get['product_id'])) {
			return 'product/product';
		}

		if (isset($this->request->get['path'])) {
			return 'product/category';
		}

		if (isset($this->request->get['manufacturer_id'])) {
			return 'product/manufacturer.info';
		}

		if (isset($this->request->get['information_id'])) {
			return 'information/information';
		}

		if (isset($this->request->get['article_id'])) {
			return 'cms/blog.info';
		}

		if (isset($this->request->get['topic_id'])) {
			return 'cms/blog';
		}

		return '';
	}

	/**
	 * @param array<int, string> $parts
	 *
	 * @return string
	 */
	private function findRouteFromParts(array $parts): string {
		$route = implode('/', $parts);

		if ($route == 'search') {
			return 'product/search';
		}

		if ($this->routeExists($route)) {
			return $route;
		}

		return '';
	}

	/**
	 * @param string $route
	 *
	 * @return bool
	 */
	private function routeExists(string $route): bool {
		$route = trim($route, '/');

		if (!$route || str_contains($route, '..')) {
			return false;
		}

		$controller = $route;

		$pos = strrpos($controller, '.');

		if ($pos !== false) {
			$controller = substr($controller, 0, $pos);
		}

		if (!$controller) {
			return false;
		}

		if (is_file(DIR_APPLICATION . 'controller/' . $controller . '.php')) {
			return true;
		}

		if (str_starts_with($controller, 'extension/')) {
			$parts = explode('/', $controller);

			if (isset($parts[1])) {
				$extension = $parts[1];
				$path = implode('/', array_slice($parts, 2));

				if ($extension && $path && is_file(DIR_EXTENSION . $extension . '/catalog/controller/' . $path . '.php')) {
					return true;
				}
			}
		}

		return false;
	}
}
