<?php
namespace Opencart\Admin\Controller\Extension\Opencart\Module;
/**
 * Class Section
 *
 * @package Opencart\Admin\Controller\Extension\Opencart\Module
 */
class Section extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @return void
	 */
	public function index(): void {
		$this->load->language('extension/opencart/module/section');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module')
		];

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = [
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/opencart/module/section', 'user_token=' . $this->session->data['user_token'])
			];
		} else {
			$data['breadcrumbs'][] = [
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/opencart/module/section', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . (int)$this->request->get['module_id'])
			];
		}

		if (!isset($this->request->get['module_id'])) {
			$data['save'] = $this->url->link('extension/opencart/module/section.save', 'user_token=' . $this->session->data['user_token']);
		} else {
			$data['save'] = $this->url->link('extension/opencart/module/section.save', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . (int)$this->request->get['module_id']);
		}

		$data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module');

		$module_info = [];

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$this->load->model('setting/module');

			$module_info = $this->model_setting_module->getModule((int)$this->request->get['module_id']);
		}

		$default_type = 'homepage_slider';
		$section_types = array_keys($this->getSectionTypes());

		$data['name'] = (string)($module_info['name'] ?? '');
		$data['section_type'] = (string)($module_info['section_type'] ?? $default_type);
		$data['status'] = (int)($module_info['status'] ?? 1);
		$data['home_only'] = 1;

		$template_slug = (string)($module_info['template_slug'] ?? '');

		if (!$template_slug) {
			$template_slug = $this->normalizeTemplateSlug($data['name'] ?: 'home_section');
		}

		$data['template_slug'] = $template_slug;

		$legacy = [];

		if (empty($module_info['section_type']) && !empty($module_info['module_description']) && is_array($module_info['module_description'])) {
			$language_id = (int)$this->config->get('config_language_id');

			if (isset($module_info['module_description'][$language_id])) {
				$legacy = $module_info['module_description'][$language_id];
			} else {
				$legacy = (array)reset($module_info['module_description']);
			}
		}

		$fields = [];

		if (isset($module_info['fields']) && is_array($module_info['fields'])) {
			$fields = $module_info['fields'];
		} elseif ($legacy) {
			$data['section_type'] = 'legacy_html';
			$fields = [
				'headline' => (string)($legacy['title'] ?? ''),
				'html'     => (string)($legacy['description'] ?? '')
			];
		}

		if (!in_array($data['section_type'], $section_types, true)) {
			$data['section_type'] = $default_type;
		}

		$fields = $this->normalizeFieldsForType($data['section_type'], $fields);
		$items = $this->normalizeItemsForType($data['section_type'], $module_info['items'] ?? []);

		$custom_fields = [];

		if (isset($module_info['custom_fields']) && is_array($module_info['custom_fields'])) {
			$custom_fields = $module_info['custom_fields'];
		}

		$custom_repeaters = [];

		if (isset($module_info['custom_repeaters']) && is_array($module_info['custom_repeaters'])) {
			$custom_repeaters = $module_info['custom_repeaters'];
		}

		$custom_fields = $this->normalizeCustomFields($custom_fields);
		$custom_repeaters = $this->normalizeCustomRepeaters($custom_repeaters);

		$data['fields_json'] = json_encode($fields, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		$data['items_json'] = json_encode($items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		$data['custom_fields_json'] = json_encode($custom_fields, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		$data['custom_repeaters_json'] = json_encode($custom_repeaters, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

		if ($data['fields_json'] === false) {
			$data['fields_json'] = '{}';
		}

		if ($data['items_json'] === false) {
			$data['items_json'] = '[]';
		}

		if ($data['custom_fields_json'] === false) {
			$data['custom_fields_json'] = '[]';
		}

		if ($data['custom_repeaters_json'] === false) {
			$data['custom_repeaters_json'] = '[]';
		}

		$data['section_types'] = [];

		foreach ($this->getSectionTypes() as $value => $text) {
			$data['section_types'][] = [
				'value' => $value,
				'text'  => $text
			];
		}

		$this->load->model('catalog/category');

		$data['categories'] = [];

		$categories = $this->model_catalog_category->getCategories([
			'sort'  => 'name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => 2000
		]);

		foreach ($categories as $category) {
			$data['categories'][] = [
				'category_id' => (int)$category['category_id'],
				'name'        => (string)$category['name']
			];
		}

		$this->load->model('cms/topic');
		$this->load->model('tool/image');

		$data['topics'] = [];
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', $this->config->get('config_image_default_width'), $this->config->get('config_image_default_height'));

		$topics = $this->model_cms_topic->getTopics([
			'sort'  => 'td.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => 2000
		]);

		foreach ($topics as $topic) {
			$data['topics'][] = [
				'topic_id' => (int)$topic['topic_id'],
				'name'     => (string)$topic['name']
			];
		}

		if (isset($this->request->get['module_id'])) {
			$data['module_id'] = (int)$this->request->get['module_id'];
		} else {
			$data['module_id'] = 0;
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/opencart/module/section', $data));
	}

	/**
	 * Save
	 *
	 * @return void
	 */
	public function save(): void {
		$this->load->language('extension/opencart/module/section');

		$json = [];

		if (!$this->user->hasPermission('modify', 'extension/opencart/module/section')) {
			$json['error']['warning'] = $this->language->get('error_permission');
		}

		$required = [
			'module_id'             => 0,
			'name'                  => '',
			'section_type'          => 'homepage_slider',
			'template_slug'         => '',
			'fields_json'           => '{}',
			'items_json'            => '[]',
			'custom_fields_json'    => '[]',
			'custom_repeaters_json' => '[]',
			'status'                => 0
		];

		$post_info = $this->request->post + $required;

		$post_info['module_id'] = (int)$post_info['module_id'];
		$post_info['name'] = trim((string)$post_info['name']);
		$post_info['section_type'] = (string)$post_info['section_type'];
		$post_info['template_slug'] = $this->normalizeTemplateSlug((string)$post_info['template_slug']);
		$post_info['status'] = (int)$post_info['status'];

		$section_types = array_keys($this->getSectionTypes());

		if (!oc_validate_length($post_info['name'], 3, 64)) {
			$json['error']['name'] = $this->language->get('error_name');
		}

		if (!in_array($post_info['section_type'], $section_types, true)) {
			$json['error']['section_type'] = $this->language->get('error_section_type');
		}

		if (!oc_validate_length($post_info['template_slug'], 2, 96)) {
			$json['error']['template_slug'] = $this->language->get('error_template_slug');
		}

		if (!$post_info['template_slug'] || !preg_match('/^[a-z0-9_]+$/', $post_info['template_slug'])) {
			$json['error']['template_slug'] = $this->language->get('error_template_slug');
		}

		$fields = $this->decodeJsonArray((string)$post_info['fields_json'], 'fields_json', $json, []);
		$items = $this->decodeJsonArray((string)$post_info['items_json'], 'items_json', $json, []);
		$custom_fields = $this->decodeJsonArray((string)$post_info['custom_fields_json'], 'custom_fields_json', $json, []);
		$custom_repeaters = $this->decodeJsonArray((string)$post_info['custom_repeaters_json'], 'custom_repeaters_json', $json, []);

		$fields = $this->normalizeFieldsForType($post_info['section_type'], $fields);
		$items = $this->normalizeItemsForType($post_info['section_type'], $items);
		$custom_fields = $this->normalizeCustomFields($custom_fields);
		$custom_repeaters = $this->normalizeCustomRepeaters($custom_repeaters);

		$this->validateTypeData($post_info['section_type'], $fields, $items, $json);

		if (!$json) {
			$this->load->model('setting/module');
			$this->load->model('setting/event');

			// Placement is layout-based only. Ensure legacy event injection is disabled.
			$this->model_setting_event->deleteEventByCode('opencart_section');

			$module_description = [];

			if ($post_info['module_id']) {
				$existing = $this->model_setting_module->getModule($post_info['module_id']);

				if (!empty($existing['module_description']) && is_array($existing['module_description'])) {
					$module_description = $existing['module_description'];
				}
			}

			$save_data = [
				'name'               => $post_info['name'],
				'section_type'       => $post_info['section_type'],
				'template_slug'      => $post_info['template_slug'],
				'home_only'          => 1,
				'routes'             => ['common/home'],
				'fields'             => $fields,
				'items'              => $items,
				'custom_fields'      => $custom_fields,
				'custom_repeaters'   => $custom_repeaters,
				'data_source'        => $this->getDataSource($post_info['section_type']),
				'limit'              => (int)($fields['limit'] ?? 0),
				'category_id'        => (int)($fields['category_id'] ?? 0),
				'topic_id'           => (int)($fields['topic_id'] ?? 0),
				'view_all_text'      => (string)($fields['view_all_text'] ?? ''),
				'status'             => $post_info['status'],
				'module_description' => $module_description
			];

			$this->ensureTemplateFile($post_info['template_slug'], $post_info['section_type']);

			if (!$post_info['module_id']) {
				$json['module_id'] = $this->model_setting_module->addModule('opencart.section', $save_data);
			} else {
				$this->model_setting_module->editModule($post_info['module_id'], $save_data);
			}

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Install
	 *
	 * @return void
	 */
	public function install(): void {
		if ($this->user->hasPermission('modify', 'extension/opencart/module/section')) {
			$this->load->model('setting/event');

			// v2 placement is layout assignment only.
			$this->model_setting_event->deleteEventByCode('opencart_section');
		}
	}

	/**
	 * Uninstall
	 *
	 * @return void
	 */
	public function uninstall(): void {
		if ($this->user->hasPermission('modify', 'extension/opencart/module/section')) {
			$this->load->model('setting/event');

			$this->model_setting_event->deleteEventByCode('opencart_section');
		}
	}

	/**
	 * @return array<string, string>
	 */
	private function getSectionTypes(): array {
		return [
			'homepage_slider' => $this->language->get('text_type_homepage_slider'),
			'advantages'      => $this->language->get('text_type_advantages'),
			'products'        => $this->language->get('text_type_products'),
			'cta'             => $this->language->get('text_type_cta'),
			'about'           => $this->language->get('text_type_about'),
			'blog'            => $this->language->get('text_type_blog'),
			'partners'        => $this->language->get('text_type_partners'),
			'legacy_html'     => $this->language->get('text_type_legacy_html')
		];
	}

	/**
	 * @param string $section_type
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
	 * @param string               $section_type
	 * @param array<string, mixed> $fields
	 * @param array<int, mixed>    $items
	 * @param array<string, mixed> $json
	 *
	 * @return void
	 */
	private function validateTypeData(string $section_type, array $fields, array $items, array &$json): void {
		if ($section_type == 'blog' && isset($fields['topic_id']) && (int)$fields['topic_id'] < 0) {
			$json['error']['fields'] = $this->language->get('error_topic_required');
		}

		if (($section_type == 'homepage_slider' || $section_type == 'advantages' || $section_type == 'cta' || $section_type == 'partners') && !$items) {
			$json['error']['items'] = $this->language->get('error_items_required');
		}
	}

	/**
	 * @param string               $value
	 * @param string               $key
	 * @param array<string, mixed> $json
	 * @param array<mixed>         $default
	 *
	 * @return array<mixed>
	 */
	private function decodeJsonArray(string $value, string $key, array &$json, array $default = []): array {
		$value = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
		$value = trim($value);

		if ($value === '') {
			return $default;
		}

		$decoded = json_decode($value, true);

		if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
			$json['error'][$key] = sprintf($this->language->get('error_json'), $key);

			return $default;
		}

		return $decoded;
	}

	/**
	 * @param string $value
	 *
	 * @return string
	 */
	private function normalizeTemplateSlug(string $value): string {
		$value = oc_strtolower($value);
		$value = preg_replace('/[^a-z0-9]+/', '_', $value);
		$value = trim((string)$value, '_');

		if (!$value) {
			$value = 'home_section';
		}

		return $value;
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

		// Legacy or malformed values can arrive as '../image/catalog/...'.
		if (str_starts_with($value, '../image/')) {
			$value = substr($value, 9);
		} elseif (str_starts_with($value, 'image/')) {
			$value = substr($value, 6);
		}

		$value = ltrim($value, '/');

		// Ignore invalid pseudo-extension values such as "image-1.src".
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

	/**
	 * @param string $template_slug
	 * @param string $section_type
	 *
	 * @return void
	 */
	private function ensureTemplateFile(string $template_slug, string $section_type): void {
		$directory = DIR_CATALOG . 'view/template/sections/';

		if (!is_dir($directory)) {
			if (!mkdir($directory, 0777, true) && !is_dir($directory)) {
				return;
			}
		}

		$file = $directory . $template_slug . '.twig';

		if (!is_file($file)) {
			file_put_contents($file, $this->getTemplateScaffold($template_slug, $section_type));
		}
	}

	/**
	 * @param string $template_slug
	 * @param string $section_type
	 *
	 * @return string
	 */
	private function getTemplateScaffold(string $template_slug, string $section_type): string {
		return "{# Auto-generated by Homepage Section Builder v2. #}\n"
			. "{# section_type: " . $section_type . " #}\n"
			. "<section class=\"home-section home-section-" . $template_slug . "\">\n"
			. "  {% if fields.headline %}<h2>{{ fields.headline }}</h2>{% endif %}\n"
			. "\n"
			. "  {# Data contract #}\n"
			. "  {# section, fields, items, custom_fields, custom_repeaters, products, articles, links #}\n"
			. "\n"
			. "  {# Example loops #}\n"
			. "  {# {% for item in items %}...{% endfor %} #}\n"
			. "  {# {% for product in products %}...{% endfor %} #}\n"
			. "  {# {% for article in articles %}...{% endfor %} #}\n"
			. "</section>\n";
	}
}
