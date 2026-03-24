<?php
namespace Opencart\Catalog\Controller\Startup;
/**
 * Class Feature
 *
 * @package Opencart\Catalog\Controller\Startup
 */
class Feature extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @return \Opencart\System\Engine\Action|null
	 */
	public function index(): ?\Opencart\System\Engine\Action {
		$account = $this->isEnabled('account');
		$wishlist = $this->isEnabled('wishlist');
		$checkout = $this->isEnabled('checkout');
		$cart = $this->isEnabled('cart');
		$coupon = $this->isEnabled('coupon');
		$affiliate = $this->isEnabled('affiliate');
		$review = $this->isEnabled('review');
		$compare = $this->isEnabled('compare');

		$this->config->set('config_feature_account', (int)$account);
		$this->config->set('config_feature_wishlist', (int)$wishlist);
		$this->config->set('config_feature_checkout', (int)$checkout);
		$this->config->set('config_feature_cart', (int)$cart);
		$this->config->set('config_feature_coupon', (int)$coupon);
		$this->config->set('config_feature_affiliate', (int)$affiliate);
		$this->config->set('config_feature_review', (int)$review);
		$this->config->set('config_feature_compare', (int)$compare);

		if (!$affiliate) {
			$this->config->set('config_affiliate_status', 0);
		}

		if (!$review) {
			$this->config->set('config_review_status', 0);
		}

		if (!$coupon) {
			$this->config->set('total_coupon_status', 0);

			unset($this->session->data['coupon']);
		}

		if (!$wishlist) {
			unset($this->session->data['wishlist']);
		}

		if (!$compare) {
			unset($this->session->data['compare']);
		}

		if (!$cart) {
			$this->cart->clear();

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['reward']);
			unset($this->session->data['coupon']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);
		}

		if (isset($this->request->get['route'])) {
			$route = (string)$this->request->get['route'];
		} else {
			$route = (string)$this->config->get('action_default');
		}

		if (!$this->isBlockedRoute($route, $account, $wishlist, $checkout, $cart, $coupon, $affiliate, $review, $compare)) {
			return null;
		}

		$this->request->get['_feature_blocked_route'] = $route;

		return new \Opencart\System\Engine\Action('startup/feature.deny');
	}

	/**
	 * Deny
	 *
	 * @return void
	 */
	public function deny(): void {
		if (isset($this->request->get['_feature_blocked_route'])) {
			$route = (string)$this->request->get['_feature_blocked_route'];
		} else {
			$route = '';
		}

		if ($this->isHtmlFragmentRoute($route)) {
			if ($this->isAjax()) {
				$this->response->setOutput('');
			} else {
				$this->response->redirect($this->url->link('common/home', 'language=' . $this->config->get('config_language')));
			}

			return;
		}

		if ($this->isJsonRoute($route) || $this->isAjax()) {
			$json = [
				'error'    => 'This feature is disabled.',
				'redirect' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'), true)
			];

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));

			return;
		}

		$this->response->redirect($this->url->link('common/home', 'language=' . $this->config->get('config_language')));
	}

	/**
	 * Is Enabled
	 *
	 * @param string $feature
	 *
	 * @return bool
	 */
	private function isEnabled(string $feature): bool {
		$key = 'config_feature_' . $feature;

		if (!$this->config->has($key)) {
			return true;
		}

		return (int)$this->config->get($key) === 1;
	}

	/**
	 * Is Blocked Route
	 *
	 * @param string $route
	 * @param bool   $account
	 * @param bool   $wishlist
	 * @param bool   $checkout
	 * @param bool   $cart
	 * @param bool   $coupon
	 * @param bool   $affiliate
	 * @param bool   $review
	 * @param bool   $compare
	 *
	 * @return bool
	 */
	private function isBlockedRoute(string $route, bool $account, bool $wishlist, bool $checkout, bool $cart, bool $coupon, bool $affiliate, bool $review, bool $compare): bool {
		if (!$wishlist && $this->isRoute($route, 'account/wishlist')) {
			return true;
		}

		if (!$affiliate && $this->isRoute($route, 'account/affiliate')) {
			return true;
		}

		if (!$account && str_starts_with($route, 'account/') && !$this->isRoute($route, 'account/wishlist') && !$this->isRoute($route, 'account/affiliate')) {
			return true;
		}

		if (!$cart && ($this->isRoute($route, 'common/cart') || str_starts_with($route, 'checkout/'))) {
			return true;
		}

		if (!$checkout && str_starts_with($route, 'checkout/') && !$this->isRoute($route, 'checkout/cart')) {
			return true;
		}

		if (!$coupon && ($this->isRoute($route, 'extension/opencart/checkout/coupon') || $this->isRoute($route, 'extension/opencart/api/coupon'))) {
			return true;
		}

		if (!$review && $this->isRoute($route, 'product/review')) {
			return true;
		}

		if (!$compare && $this->isRoute($route, 'product/compare')) {
			return true;
		}

		return false;
	}

	/**
	 * Is Route
	 *
	 * @param string $route
	 * @param string $base
	 *
	 * @return bool
	 */
	private function isRoute(string $route, string $base): bool {
		return $route === $base || str_starts_with($route, $base . '.') || str_starts_with($route, $base . '/');
	}

	/**
	 * Is Ajax
	 *
	 * @return bool
	 */
	private function isAjax(): bool {
		return isset($this->request->server['HTTP_X_REQUESTED_WITH']) && strtolower((string)$this->request->server['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

	/**
	 * Is JSON Route
	 *
	 * @param string $route
	 *
	 * @return bool
	 */
	private function isJsonRoute(string $route): bool {
		$json_routes = [
			'checkout/cart.add',
			'checkout/cart.edit',
			'checkout/cart.remove',
			'common/cart.remove',
			'account/wishlist.add',
			'account/wishlist.remove',
			'product/compare.add',
			'product/review.write',
			'extension/opencart/checkout/coupon.save',
			'extension/opencart/checkout/coupon.remove',
			'extension/opencart/api/coupon'
		];

		return in_array($route, $json_routes, true);
	}

	/**
	 * Is HTML Fragment Route
	 *
	 * @param string $route
	 *
	 * @return bool
	 */
	private function isHtmlFragmentRoute(string $route): bool {
		$html_routes = [
			'common/cart.info',
			'checkout/cart.list',
			'account/wishlist.list',
			'account/wishlist.guest',
			'product/review.list'
		];

		return in_array($route, $html_routes, true);
	}
}
