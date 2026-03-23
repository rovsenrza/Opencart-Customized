<?php
namespace Opencart\Catalog\Model\Tool;
/**
 * Class Image
 *
 * Can be called using $this->load->model('tool/image');
 *
 * @package Opencart\Catalog\Model\Tool
 */
class Image extends \Opencart\System\Engine\Model {
	/**
	 * Resize
	 *
	 * @param string $filename
	 * @param int    $width
	 * @param int    $height
	 * @param string $default
	 *
	 * @throws \Exception
	 *
	 * @return string
	 */
	public function resize(string $filename, int $width, int $height, string $default = ''): string {
		$filename = html_entity_decode($filename, ENT_QUOTES, 'UTF-8');

		if (!is_file(DIR_IMAGE . $filename) || substr(str_replace('\\', '/', realpath(DIR_IMAGE . $filename)), 0, strlen(DIR_IMAGE)) != DIR_IMAGE) {
			return '';
		}

		// Frontend policy: keep uploaded images in original form and do not generate resized cache variants.
		$filename = str_replace(' ', '%20', $filename);

		return $this->config->get('config_url') . 'image/' . $filename;
	}
}
