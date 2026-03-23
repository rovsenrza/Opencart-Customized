<?php
namespace Opencart\Catalog\Controller\Extension\Opencart\Module;
/**
 * Class Section
 *
 * @package Opencart\Catalog\Controller\Extension\Opencart\Module
 */
class Section extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @param array<string, mixed> $setting
	 *
	 * @return string
	 */
	public function index(array $setting): string {
		if (empty($setting['status'])) {
			return '';
		}

		if (!$this->isHomeRoute()) {
			return '';
		}

		$section_type = (string)($setting['section_type'] ?? '');
		$template_slug = $this->normalizeTemplateSlug((string)($setting['template_slug'] ?? ''));

		$fields = isset($setting['fields']) && is_array($setting['fields']) ? $setting['fields'] : [];
		$items = isset($setting['items']) && is_array($setting['items']) ? $setting['items'] : [];
		$custom_fields = isset($setting['custom_fields']) && is_array($setting['custom_fields']) ? $setting['custom_fields'] : [];
		$custom_repeaters = isset($setting['custom_repeaters']) && is_array($setting['custom_repeaters']) ? $setting['custom_repeaters'] : [];

		$legacy_description = $this->getLegacyDescription($setting);

		if ($section_type === '') {
			$section_type = $legacy_description ? 'legacy_html' : 'custom';
		}

		if ($section_type == 'legacy_html' && $legacy_description) {
			$fields['headline'] = (string)($fields['headline'] ?? $legacy_description['title']);
			$fields['html'] = (string)($fields['html'] ?? $legacy_description['description']);
		}

		if (!$template_slug) {
			$template_slug = $this->normalizeTemplateSlug((string)($setting['name'] ?? 'home_section'));
		}

		$fields = $this->normalizeFieldsForType($section_type, $fields);
		$items = $this->normalizeItemsForType($section_type, $items);
		$custom_fields = $this->normalizeCustomFields($custom_fields);
		$custom_repeaters = $this->normalizeCustomRepeaters($custom_repeaters);

		$data = [
			'section' => [
				'name'         => (string)($setting['name'] ?? ''),
				'section_type' => $section_type,
				'template_slug'=> $template_slug,
				'home_only'    => 1,
				'status'       => (int)($setting['status'] ?? 0),
				'data_source'  => (string)($setting['data_source'] ?? $this->getDataSource($section_type))
			],
			'fields'            => $fields,
			'items'             => $items,
			'custom_fields'     => $custom_fields,
			'custom_repeaters'  => $custom_repeaters,
			'products'          => [],
			'articles'          => [],
			'links'             => []
		];

		if ($section_type == 'products') {
			$this->populateProducts($fields, $data['products'], $data['links']);
		}

		if ($section_type == 'blog') {
			$this->populateArticles($fields, $data['articles'], $data['links']);
		}

		$template_file = DIR_APPLICATION . 'view/template/sections/' . $template_slug . '.twig';

		if (is_file($template_file)) {
			return $this->load->view('sections/' . $template_slug, $data);
		}

		if ($section_type == 'legacy_html') {
			return $this->load->view('extension/opencart/module/section', [
				'heading_title' => (string)($fields['headline'] ?? ''),
				'html'          => html_entity_decode((string)($fields['html'] ?? ''), ENT_QUOTES, 'UTF-8')
			]);
		}

		return '';
	}

	/**
	 * @return bool
	 */
	private function isHomeRoute(): bool {
		$route = 'common/home';

		if (isset($this->request->get['route']) && is_string($this->request->get['route']) && $this->request->get['route'] !== '') {
			$route = trim($this->request->get['route']);
		}

		return $route == 'common/home';
	}

	/**
	 * @param array<string, mixed> $setting
	 *
	 * @return array<string, string>
	 */
	private function getLegacyDescription(array $setting): array {
		if (empty($setting['module_description']) || !is_array($setting['module_description'])) {
			return [];
		}

		$language_id = (int)$this->config->get('config_language_id');
		$description = [];

		if (isset($setting['module_description'][$language_id]) && is_array($setting['module_description'][$language_id])) {
			$description = $setting['module_description'][$language_id];
		} else {
			$first = reset($setting['module_description']);

			if (is_array($first)) {
				$description = $first;
			}
		}

		return [
			'title'       => html_entity_decode((string)($description['title'] ?? ''), ENT_QUOTES, 'UTF-8'),
			'description' => html_entity_decode((string)($description['description'] ?? ''), ENT_QUOTES, 'UTF-8')
		];
	}

	/**
	 * @param string               $section_type
	 * @param array<string, mixed> $fields
	 *
	 * @return array<string, mixed>
	 */
	private function normalizeFieldsForType(string $section_type, array $fields): array {
		$defaults = [
			'homepage_slider' => [
				'headline' => ''
			],
			'advantages' => [
				'headline' => ''
			],
			'products' => [
				'headline'      => '',
				'category_id'   => 0,
				'limit'         => 8,
				'view_all_text' => 'View all products'
			],
			'cta' => [
				'headline'    => '',
				'description' => ''
			],
			'about' => [
				'headline'    => '',
				'description' => '',
				'image'       => ''
			],
			'blog' => [
				'headline'      => '',
				'topic_id'      => 0,
				'limit'         => 6,
				'view_all_text' => 'View all blog'
			],
			'partners' => [
				'headline' => ''
			],
			'legacy_html' => [
				'headline' => '',
				'html'     => ''
			]
		];

		$base = $defaults[$section_type] ?? [];

		foreach ($fields as $key => $value) {
			$base[(string)$key] = $value;
		}

		foreach ($base as $key => $value) {
			if (strpos((string)$key, 'image') !== false) {
				$base[(string)$key] = $this->normalizeImagePath((string)$value);
			}
		}

		if (isset($base['limit'])) {
			$base['limit'] = max(1, min(100, (int)$base['limit']));
		}

		if (isset($base['category_id'])) {
			$base['category_id'] = (int)$base['category_id'];
		}

		if (isset($base['topic_id'])) {
			$base['topic_id'] = (int)$base['topic_id'];
		}

		return $base;
	}

	/**
	 * @param string            $section_type
	 * @param array<int, mixed> $items
	 *
	 * @return array<int, array<string, mixed>>
	 */
	private function normalizeItemsForType(string $section_type, array $items): array {
		$definitions = [
			'homepage_slider' => ['image', 'text', 'subtext', 'link'],
			'advantages'      => ['image', 'text', 'subtext'],
			'cta'             => ['icon', 'label', 'href'],
			'partners'        => ['image', 'href']
		];

		$fields = $definitions[$section_type] ?? [];

		if (!$fields) {
			return [];
		}

		$output = [];

		foreach ($items as $item) {
			if (!is_array($item)) {
				continue;
			}

			$row = [];

			foreach ($fields as $field) {
				$row[$field] = (string)($item[$field] ?? '');

				if ($field == 'image' || $field == 'icon') {
					$row[$field] = $this->normalizeImagePath($row[$field]);
				}
			}

			$output[] = $row;
		}

		return $output;
	}

	/**
	 * @param array<int, mixed> $custom_fields
	 *
	 * @return array<int, array<string, string>>
	 */
	private function normalizeCustomFields(array $custom_fields): array {
		$output = [];
		$allowed_types = ['text', 'textarea', 'number', 'url', 'image'];

		foreach ($custom_fields as $custom_field) {
			if (!is_array($custom_field)) {
				continue;
			}

			$type = (string)($custom_field['type'] ?? 'text');

			if (!in_array($type, $allowed_types, true)) {
				$type = 'text';
			}

			$value = (string)($custom_field['value'] ?? '');

			if ($type == 'image') {
				$value = $this->normalizeImagePath($value);
			}

			$output[] = [
				'key'   => $this->normalizeFieldKey((string)($custom_field['key'] ?? '')),
				'label' => (string)($custom_field['label'] ?? ''),
				'type'  => $type,
				'value' => $value
			];
		}

		return $output;
	}

	/**
	 * @param array<int, mixed> $custom_repeaters
	 *
	 * @return array<int, array<string, mixed>>
	 */
	private function normalizeCustomRepeaters(array $custom_repeaters): array {
		$output = [];
		$allowed_types = ['text', 'textarea', 'number', 'url', 'image'];

		foreach ($custom_repeaters as $repeater) {
			if (!is_array($repeater)) {
				continue;
			}

			$fields = [];
			$items = [];

			foreach ((array)($repeater['fields'] ?? []) as $field) {
				if (!is_array($field)) {
					continue;
				}

				$key = $this->normalizeFieldKey((string)($field['key'] ?? ''));

				if ($key === '') {
					continue;
				}

				$type = (string)($field['type'] ?? 'text');

				if (!in_array($type, $allowed_types, true)) {
					$type = 'text';
				}

				$fields[] = [
					'key'   => $key,
					'label' => (string)($field['label'] ?? ''),
					'type'  => $type
				];
			}

			foreach ((array)($repeater['items'] ?? []) as $item) {
				if (!is_array($item)) {
					continue;
				}

				$row = [];

				foreach ($fields as $field) {
					$row[$field['key']] = (string)($item[$field['key']] ?? '');

					if ($field['type'] == 'image') {
						$row[$field['key']] = $this->normalizeImagePath($row[$field['key']]);
					}
				}

				if ($row) {
					$items[] = $row;
				}
			}

			$output[] = [
				'key'    => $this->normalizeFieldKey((string)($repeater['key'] ?? '')),
				'label'  => (string)($repeater['label'] ?? ''),
				'fields' => $fields,
				'items'  => $items
			];
		}

		return $output;
	}

	/**
	 * @param array<string, mixed>   $fields
	 * @param array<int, mixed>      $products
	 * @param array<string, string>  $links
	 *
	 * @return void
	 */
	private function populateProducts(array $fields, array &$products, array &$links): void {
		$category_id = (int)($fields['category_id'] ?? 0);
		$limit = max(1, min(100, (int)($fields['limit'] ?? 8)));

		$this->load->model('catalog/product');
		$this->load->model('catalog/category');

		$filter_data = [
			'sort'               => 'p.sort_order',
			'order'              => 'ASC',
			'start'              => 0,
			'limit'              => $limit
		];

		if ($category_id > 0) {
			$filter_data['filter_category_id'] = $category_id;
		}

		$results = $this->model_catalog_product->getProducts($filter_data);

		$description_length = (int)$this->config->get('config_product_description_length');

		foreach ($results as $result) {
			$description = trim(strip_tags(html_entity_decode((string)($result['description'] ?? ''), ENT_QUOTES, 'UTF-8')));

			if ($description_length > 0 && oc_strlen($description) > $description_length) {
				$description = oc_substr($description, 0, $description_length) . '..';
			}

			$products[] = [
				'product_id'  => (int)$result['product_id'],
				'name'        => (string)$result['name'],
				'description' => $description,
				'image'       => $this->getOriginalImageUrl((string)($result['image'] ?? '')),
				'price'       => (float)($result['price'] ?? 0),
				'special'     => (float)($result['special'] ?? 0),
				'rating'      => (int)($result['rating'] ?? 0),
				'model'       => (string)($result['model'] ?? ''),
				'minimum'     => max(1, (int)($result['minimum'] ?? 1)),
				'href'        => $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . (int)$result['product_id'])
			];
		}

		$category_info = [];
		$links['view_all_text'] = (string)($fields['view_all_text'] ?? '');

		if ($category_id > 0) {
			$category_info = $this->model_catalog_category->getCategory($category_id);
			$links['view_all'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $category_id);
		} else {
			$links['view_all'] = $this->url->link('product/search', 'language=' . $this->config->get('config_language'));
			$links['category_name'] = 'All';
		}

		if ($category_info) {
			$links['category_name'] = (string)($category_info['name'] ?? '');
		}
	}

	/**
	 * @param array<string, mixed>  $fields
	 * @param array<int, mixed>     $articles
	 * @param array<string, string> $links
	 *
	 * @return void
	 */
	private function populateArticles(array $fields, array &$articles, array &$links): void {
		$topic_id = (int)($fields['topic_id'] ?? 0);
		$limit = max(1, min(100, (int)($fields['limit'] ?? 6)));

		$this->load->model('cms/article');

		$filter_data = [
			'filter_topic_id' => $topic_id,
			'sort'            => 'date_added',
			'order'           => 'DESC',
			'start'           => 0,
			'limit'           => $limit
		];

		$results = $this->model_cms_article->getArticles($filter_data);
		$description_length = (int)$this->config->get('config_article_description_length');

		foreach ($results as $result) {
			$description = trim(strip_tags(html_entity_decode((string)($result['description'] ?? ''), ENT_QUOTES, 'UTF-8')));

			if ($description_length > 0 && oc_strlen($description) > $description_length) {
				$description = oc_substr($description, 0, $description_length) . '..';
			}

			$articles[] = [
				'article_id'   => (int)$result['article_id'],
				'topic_id'     => (int)($result['topic_id'] ?? 0),
				'name'         => (string)$result['name'],
				'author'       => (string)($result['author'] ?? ''),
				'description'  => $description,
				'image'        => $this->getOriginalImageUrl((string)($result['image'] ?? '')),
				'date_added'   => (string)($result['date_added'] ?? ''),
				'href'         => $this->url->link('cms/blog.info', 'language=' . $this->config->get('config_language') . '&article_id=' . (int)$result['article_id'])
			];
		}

		$links['view_all_text'] = (string)($fields['view_all_text'] ?? '');
		$links['view_all'] = $this->url->link('cms/blog', 'language=' . $this->config->get('config_language') . ($topic_id > 0 ? '&topic_id=' . $topic_id : ''));

		if ($topic_id > 0) {
			$this->load->model('cms/topic');

			$topic_info = $this->model_cms_topic->getTopic($topic_id);

			if ($topic_info) {
				$links['topic_name'] = (string)$topic_info['name'];
			}
		}
	}

	/**
	 * @param string $image
	 *
	 * @return string
	 */
	private function getOriginalImageUrl(string $image): string {
		$image = html_entity_decode($image, ENT_QUOTES, 'UTF-8');

		if (!$image || !is_file(DIR_IMAGE . $image)) {
			return '';
		}

		$server = (!empty($this->request->server['HTTPS']) && $this->request->server['HTTPS'] !== 'off') ? HTTPS_SERVER : HTTP_SERVER;

		return $server . 'image/' . str_replace(' ', '%20', $image);
	}

	/**
	 * @param string $value
	 *
	 * @return string
	 */
	private function normalizeTemplateSlug(string $value): string {
		$value = oc_strtolower($value);
		$value = preg_replace('/[^a-z0-9]+/', '_', $value);

		return trim((string)$value, '_');
	}

	/**
	 * @param string $value
	 *
	 * @return string
	 */
	private function normalizeFieldKey(string $value): string {
		$value = oc_strtolower($value);
		$value = preg_replace('/[^a-z0-9]+/', '_', $value);

		return trim((string)$value, '_');
	}

	/**
	 * @param string $value
	 *
	 * @return string
	 */
	private function normalizeImagePath(string $value): string {
		$value = trim(str_replace('\\', '/', $value));

		if ($value === '') {
			return '';
		}

		if (str_starts_with($value, '../image/')) {
			$value = substr($value, 9);
		} elseif (str_starts_with($value, 'image/')) {
			$value = substr($value, 6);
		}

		$value = ltrim($value, '/');

		if (preg_match('/\.src$/i', $value)) {
			return '';
		}

		return $value;
	}

	/**
	 * @param string $section_type
	 *
	 * @return string
	 */
	private function getDataSource(string $section_type): string {
		if ($section_type == 'products') {
			return 'category_products';
		}

		if ($section_type == 'blog') {
			return 'blog_articles';
		}

		return 'manual';
	}
}
