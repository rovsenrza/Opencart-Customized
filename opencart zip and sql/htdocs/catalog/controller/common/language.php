<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Language
 *
 * Can be called from $this->load->controller('common/language');
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Language extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @return string
	 */
	public function index(): string {
		$this->load->language('common/language');

		$data['action'] = $this->url->link('common/language.save');

		$data['code'] = $this->request->get['language'] ?? $this->config->get('config_language');

		$data['languages'] = [];

		$this->load->model('localisation/language');

		$results = $this->model_localisation_language->getLanguages();

		foreach ($results as $result) {
			if ($result['status']) {
				$data['languages'][$result['code']] = $result;
			}
		}

		$code = $data['code'];

		if (!isset($data['languages'][$code])) {
			$code = key($data['languages']) ?: $this->config->get('config_language');
			$data['code'] = $code;
		}

		$data['name'] = $data['languages'][$code]['name'] ?? 'Language';
		$data['image'] = $data['languages'][$code]['image'] ?? '';

		// Build the url
		$url_data = $this->request->get;

		if (isset($url_data['route'])) {
			$route = $url_data['route'];
		} else {
			$route = $this->config->get('action_default');
		}

		unset($url_data['route']);
		unset($url_data['_route_']);
		unset($url_data['language']);

		$data['redirect'] = $this->url->link($route, $url_data, true);

		return $this->load->view('common/language', $data);
	}

	/**
	 * Save
	 *
	 * @return void
	 */
	public function save(): void {
		$this->load->language('common/language');

		$json = [];

		$required = [
			'code'     => '',
			'redirect' => ''
		];

		$post_info = $this->request->post + $required;

		$this->load->model('localisation/language');

		$language_info = $this->model_localisation_language->getLanguageByCode($post_info['code']);

		if (!$language_info) {
			$json['error'] = $this->language->get('error_language');
		}

		if (!$json) {
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);

			$redirect = '';

			if ($post_info['redirect']) {
				$redirect = urldecode(html_entity_decode($post_info['redirect'], ENT_QUOTES, 'UTF-8'));
			}

			if ($redirect && str_starts_with($redirect, $this->config->get('config_url'))) {
				if ($this->config->get('config_seo_url')) {
					$json['redirect'] = $this->switchRedirectLanguage($redirect, $post_info['code']);
				} else {
					$url_info = parse_url($redirect);
					$query = [];

					if (isset($url_info['query'])) {
						parse_str($url_info['query'], $query);
					}

					if (isset($query['route'])) {
						$route = $query['route'];
					} else {
						$route = $this->config->get('action_default');
					}

					unset($query['route']);

					$query['language'] = $post_info['code'];

					$json['redirect'] = $this->url->link($route, $query, true);
				}
			} else {
				$json['redirect'] = $this->url->link($this->config->get('action_default'), 'language=' . $post_info['code'], true);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @param string $redirect
	 * @param string $code
	 *
	 * @return string
	 */
	private function switchRedirectLanguage(string $redirect, string $code): string {
		$url_info = parse_url($redirect);

		if (!$url_info || !isset($url_info['scheme'], $url_info['host'])) {
			return $this->url->link($this->config->get('action_default'), 'language=' . $code, true);
		}

		$query = [];

		if (isset($url_info['query'])) {
			parse_str($url_info['query'], $query);
		}

		unset($query['language']);

		$path = $url_info['path'] ?? '/';
		$base_path = parse_url($this->config->get('config_url'), PHP_URL_PATH) ?: '/';
		$base_path = '/' . trim((string)$base_path, '/');

		if ($base_path === '/') {
			$base_path = '';
		}

		$relative_path = ltrim($path, '/');
		$base_relative = trim($base_path, '/');

		if ($base_relative) {
			if ($relative_path === $base_relative) {
				$relative_path = '';
			} elseif (str_starts_with($relative_path, $base_relative . '/')) {
				$relative_path = substr($relative_path, strlen($base_relative) + 1);
			}
		}

		$segments = array_values(array_filter(explode('/', $relative_path), static fn(string $segment): bool => $segment !== ''));
		$aliases = $this->getLanguageAliases();

		if ($segments) {
			$first = oc_strtolower((string)$segments[0]);

			if (isset($aliases[$first])) {
				array_shift($segments);
			}
		}

		array_unshift($segments, $this->getLanguageSegment($code));

		$new_path = ($base_path ? $base_path : '') . '/' . implode('/', $segments);
		$new_path = preg_replace('#//+#', '/', $new_path) ?: '/';

		$url = $url_info['scheme'] . '://' . $url_info['host'];

		if (isset($url_info['port'])) {
			$url .= ':' . $url_info['port'];
		}

		$url .= $new_path;

		if ($query) {
			$url .= '?' . str_replace(['%2F'], ['/'], http_build_query($query));
		}

		return $url;
	}

	/**
	 * @return array<string, string>
	 */
	private function getLanguageAliases(): array {
		$aliases = [];

		$this->load->model('localisation/language');

		$results = $this->model_localisation_language->getLanguages();

		foreach ($results as $result) {
			$language_code = oc_strtolower((string)$result['code']);
			$aliases[$language_code] = $language_code;

			$short = explode('-', $language_code)[0];

			if ($short && !isset($aliases[$short])) {
				$aliases[$short] = $language_code;
			}
		}

		return $aliases;
	}

	/**
	 * @param string $code
	 *
	 * @return string
	 */
	private function getLanguageSegment(string $code): string {
		$code = oc_strtolower($code);

		return explode('-', $code)[0] ?? $code;
	}

}
