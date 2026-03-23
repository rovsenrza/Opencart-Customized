<?php
namespace Opencart\Catalog\Controller\Extension\Opencart\Event;
/**
 * Class Section
 *
 * @package Opencart\Catalog\Controller\Extension\Opencart\Event
 */
class Section extends \Opencart\System\Engine\Controller {
	/**
	 * Legacy event hook. Kept as no-op for backwards compatibility.
	 *
	 * @param string            $route
	 * @param array<int, mixed> $args
	 * @param mixed             $output
	 *
	 * @return void
	 */
	public function contentTop(string &$route, array &$args, &$output): void {
		return;
	}

	/**
	 * Legacy event hook. Kept as no-op for backwards compatibility.
	 *
	 * @param string            $route
	 * @param array<int, mixed> $args
	 * @param mixed             $output
	 *
	 * @return void
	 */
	public function contentBottom(string &$route, array &$args, &$output): void {
		return;
	}

	/**
	 * Legacy event hook. Kept as no-op for backwards compatibility.
	 *
	 * @param string            $route
	 * @param array<int, mixed> $args
	 * @param mixed             $output
	 *
	 * @return void
	 */
	public function columnLeft(string &$route, array &$args, &$output): void {
		return;
	}

	/**
	 * Legacy event hook. Kept as no-op for backwards compatibility.
	 *
	 * @param string            $route
	 * @param array<int, mixed> $args
	 * @param mixed             $output
	 *
	 * @return void
	 */
	public function columnRight(string &$route, array &$args, &$output): void {
		return;
	}
}
