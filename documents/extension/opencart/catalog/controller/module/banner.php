<?php
namespace Opencart\Catalog\Controller\Extension\Opencart\Module;
/**
 * Class Banner
 *
 * @package Opencart\Catalog\Controller\Extension\Opencart\Module
 */
class Banner extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @param array<string, mixed> $setting array of filters
	 *
	 * @return string
	 */
	public function index(array $setting): string {
		static $module = 0;

		// Banner
		$this->load->model('design/banner');

		// Image
		$this->load->model('tool/image');

		$data['banners'] = [];

		$results = $this->model_design_banner->getBanner($setting['banner_id']);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'))) {
				$link = html_entity_decode($result['link'], ENT_QUOTES, 'UTF-8');

				if ($link && (str_starts_with($link, 'index.php?') || str_starts_with($link, $this->config->get('config_url') . 'index.php?'))) {
					$url_info = parse_url(str_replace('&amp;', '&', $link));
					$query = [];

					if (isset($url_info['query'])) {
						parse_str($url_info['query'], $query);
					}

					if (isset($query['route'])) {
						$route = (string)$query['route'];

						unset($query['route']);

						if (!isset($query['language'])) {
							$query['language'] = $this->config->get('config_language');
						}

						$link = $this->url->link($route, $query, true);
					}
				}

				$data['banners'][] = [
					'title' => $result['title'],
					'link'  => $link,
					'image' => $this->model_tool_image->resize(html_entity_decode($result['image'], ENT_QUOTES, 'UTF-8'), $setting['width'], $setting['height'])
				];
			}
		}

		if ($data['banners']) {
			$data['module'] = $module++;

			$data['effect'] = $setting['effect'];
			$data['controls'] = $setting['controls'];
			$data['indicators'] = $setting['indicators'];
			$data['items'] = $setting['items'];
			$data['interval'] = $setting['interval'];
			$data['width'] = $setting['width'];
			$data['height'] = $setting['height'];

			return $this->load->view('extension/opencart/module/banner', $data);
		} else {
			return '';
		}
	}
}
