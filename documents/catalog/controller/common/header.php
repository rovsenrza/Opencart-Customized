<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Header
 *
 * Can be called from $this->load->controller('common/header');
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Header extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @return string
	 */
	public function index(): string {
		// Analytics
		$data['analytics'] = [];

		if (!$this->config->get('config_cookie_id') || (isset($this->request->cookie['policy']) && $this->request->cookie['policy'])) {
			// Extension
			$this->load->model('setting/extension');

			$analytics = $this->model_setting_extension->getExtensionsByType('analytics');

			foreach ($analytics as $analytic) {
				if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
					$data['analytics'][] = $this->load->controller('extension/' . $analytic['extension'] . '/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
				}
			}
		}

		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$data['title'] = $this->document->getTitle();
		$data['base'] = $this->config->get('config_url');
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();

		// Hard coding css, so they can be replaced via the event's system.
		$data['bootstrap'] = 'catalog/view/stylesheet/bootstrap.css';
		$data['icons'] = 'catalog/view/stylesheet/fonts/fontawesome/css/all.min.css';
		$data['stylesheet'] = 'catalog/view/stylesheet/stylesheet.css';

		// Hard coding scripts, so they can be replaced via the event's system.
		$data['jquery'] = 'catalog/view/javascript/jquery/jquery-3.7.1.min.js';

		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts('header');

		$data['name'] = $this->config->get('config_name');

		// Fav icon
		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$data['icon'] = $this->config->get('config_url') . 'image/' . $this->config->get('config_icon');
		} else {
			$data['icon'] = '';
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $this->config->get('config_url') . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$this->load->language('common/header');

		$account_enabled = $this->isFeatureEnabled('account');
		$wishlist_enabled = $this->isFeatureEnabled('wishlist');
		$compare_enabled = $this->isFeatureEnabled('compare');
		$cart_enabled = $this->isFeatureEnabled('cart');
		$checkout_enabled = $cart_enabled && $this->isFeatureEnabled('checkout');

		// Wishlist
		$data['text_wishlist_template'] = $this->language->get('text_wishlist');

		if ($wishlist_enabled) {
			if ($this->customer->isLogged()) {
				$this->load->model('account/wishlist');

				$wishlist_total = $this->model_account_wishlist->getTotalWishlist($this->customer->getId());
			} else {
				// Guest wishlist count is managed on the frontend via localStorage.
				// Session data can become stale and show an incorrect static number.
				$wishlist_total = 0;
			}
		} else {
			$wishlist_total = 0;
		}

		$data['text_wishlist'] = sprintf($data['text_wishlist_template'], $wishlist_total);
		$data['text_compare'] = sprintf($this->language->get('text_compare'), isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0);
		$data['customer_logged'] = $this->customer->isLogged();
		$data['account_enabled'] = $account_enabled;
		$data['wishlist_enabled'] = $wishlist_enabled;
		$data['compare_enabled'] = $compare_enabled;
		$data['cart_enabled'] = $cart_enabled;
		$data['checkout_enabled'] = $checkout_enabled;
		$data['search_col_class'] = $cart_enabled ? 'col-md-5' : 'col-md-9 col-lg-8';

		$data['home'] = $this->url->link('common/home', 'language=' . $this->config->get('config_language'));
		$data['wishlist'] = $wishlist_enabled ? $this->url->link('account/wishlist', 'language=' . $this->config->get('config_language') . (isset($this->session->data['customer_token']) ? '&customer_token=' . $this->session->data['customer_token'] : '')) : '';
		$data['compare'] = $compare_enabled ? $this->url->link('product/compare', 'language=' . $this->config->get('config_language')) : '';
		$data['logged'] = $this->customer->isLogged();
		$data['register'] = '';
		$data['login'] = '';
		$data['account'] = '';
		$data['order'] = '';
		$data['transaction'] = '';
		$data['download'] = '';
		$data['logout'] = '';

		if ($account_enabled) {
			if (!$this->customer->isLogged()) {
				$data['register'] = $this->url->link('account/register', 'language=' . $this->config->get('config_language'));
				$data['login'] = $this->url->link('account/login', 'language=' . $this->config->get('config_language'));
			} else {
				$data['account'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
				$data['order'] = $this->url->link('account/order', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
				$data['transaction'] = $this->url->link('account/transaction', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
				$data['download'] = $this->url->link('account/download', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
				$data['logout'] = $this->url->link('account/logout', 'language=' . $this->config->get('config_language'));
			}
		}

		$data['shopping_cart'] = $cart_enabled ? $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language')) : '';
		$data['checkout'] = $checkout_enabled ? $this->url->link('checkout/checkout', 'language=' . $this->config->get('config_language')) : '';
		$data['contact'] = $this->url->link('information/contact', 'language=' . $this->config->get('config_language'));
		$data['telephone'] = $this->config->get('config_telephone');

		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['search'] = $this->load->controller('common/search');
		$data['cart'] = $cart_enabled ? $this->load->controller('common/cart') : '';
		$data['menu'] = $this->load->controller('common/menu');

		return $this->load->view('common/header', $data);
	}

	/**
	 * Is Feature Enabled
	 *
	 * @param string $feature
	 *
	 * @return bool
	 */
	private function isFeatureEnabled(string $feature): bool {
		$key = 'config_feature_' . $feature;

		if (!$this->config->has($key)) {
			return true;
		}

		return (int)$this->config->get($key) === 1;
	}
}
