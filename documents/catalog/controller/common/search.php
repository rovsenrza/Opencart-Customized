<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Search
 *
 * Can be called from $this->load->controller('common/search');
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Search extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @return string
	 */
	public function index(): string {
		$this->load->language('common/search');

		$data['text_search'] = $this->language->get('text_search');

		$data['action'] = $this->url->link('common/search.redirect', 'language=' . $this->config->get('config_language'));

		if (isset($this->request->get['search'])) {
			$data['search'] = trim((string)$this->request->get['search']);
		} else {
			$data['search'] = '';
		}

		return $this->load->view('common/search', $data);
	}

	/**
	 * Redirect
	 */
	public function redirect(): void {
		if (isset($this->request->post['search'])) {
			$search = trim(preg_replace('/\s+/', ' ', (string)html_entity_decode($this->request->post['search'], ENT_QUOTES, 'UTF-8')));
		} else {
			$search = '';
		}

		$url = 'language=' . $this->config->get('config_language');

		if ($search !== '') {
			$url .= '&search=' . urlencode($search);
		}

		$this->response->redirect($this->url->link('product/search', $url, true));
	}
}
