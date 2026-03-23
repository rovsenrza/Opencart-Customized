<?php
namespace Opencart\Admin\Controller\Tool;
/**
 * Class Backup
 *
 * @package Opencart\Admin\Controller\Tool
 */
class Backup extends \Opencart\System\Engine\Controller {
	/**
	 * Index
	 *
	 * @return void
	 */
	public function index(): void {
		$this->load->language('tool/backup');

		$this->document->setTitle($this->language->get('heading_title'));

		// Use the ini_get('upload_max_filesize') for the max file size
		$data['error_upload_size'] = sprintf($this->language->get('error_upload_size'), ini_get('upload_max_filesize'));

		$data['config_file_max_size'] = ((int)preg_filter('/[^0-9]/', '', ini_get('upload_max_filesize')) * 1024 * 1024);

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('tool/backup', 'user_token=' . $this->session->data['user_token'])
		];

		$data['upload'] = $this->url->link('tool/backup.upload', 'user_token=' . $this->session->data['user_token']);

		$this->load->model('tool/backup');

		$ignore = [
			DB_PREFIX . 'user',
			DB_PREFIX . 'user_group'
		];

		$data['tables'] = [];

		$results = $this->model_tool_backup->getTables();

		foreach ($results as $result) {
			if (!in_array($result, $ignore)) {
				$data['tables'][] = $result;
			}
		}

		$data['history'] = $this->getHistory();

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('tool/backup', $data));
	}

	/**
	 * Sitemap
	 *
	 * @return void
	 */
	public function sitemap(): void {
		$this->load->language('tool/sitemap');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('tool/backup.sitemap', 'user_token=' . $this->session->data['user_token'])
		];

		$data['generate'] = $this->url->link('tool/backup.sitemapGenerate', 'user_token=' . $this->session->data['user_token']);
		$data['sitemap_url'] = rtrim(HTTP_CATALOG, '/') . '/sitemap.xml';
		$data['user_token'] = $this->session->data['user_token'];

		$sitemap_file = DIR_OPENCART . 'sitemap.xml';

		$data['date_modified'] = '';
		$data['file_size'] = '';

		if (is_file($sitemap_file)) {
			$data['date_modified'] = date($this->language->get('datetime_format'), filemtime($sitemap_file));
			$data['file_size'] = $this->formatFilesize((int)filesize($sitemap_file));
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('tool/sitemap', $data));
	}

	/**
	 * Sitemap Generate
	 *
	 * @return void
	 */
	public function sitemapGenerate(): void {
		$this->load->language('tool/sitemap');

		$json = [];

		if (!$this->user->hasPermission('modify', 'tool/backup')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			try {
				$result = $this->buildSitemap();

				$json['success'] = sprintf($this->language->get('text_success'), (int)$result['total']);
				$json['text'] = sprintf($this->language->get('text_result'), (int)$result['total'], $this->formatFilesize((int)$result['size']));
				$json['file_size'] = $this->formatFilesize((int)$result['size']);
				$json['date_modified'] = date($this->language->get('datetime_format'), (int)$result['modified']);
				$json['sitemap'] = rtrim(HTTP_CATALOG, '/') . '/sitemap.xml';
			} catch (\Throwable $e) {
				$this->log->write('[Sitemap Generator] ' . $e->getMessage());

				$json['error'] = $this->language->get('error_generate');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * History
	 *
	 * @return void
	 */
	public function history(): void {
		$this->load->language('tool/backup');

		$this->response->setOutput($this->getHistory());
	}

	/**
	 * Get History
	 *
	 * @return string
	 */
	public function getHistory(): string {
		$this->load->language('tool/backup');

		$data['histories'] = [];

		$files = glob(DIR_STORAGE . 'backup/*.sql');

		foreach ($files as $file) {
			$size = filesize($file);

			$i = 0;

			$suffix = [
				'B',
				'KB',
				'MB',
				'GB',
				'TB',
				'PB',
				'EB',
				'ZB',
				'YB'
			];

			while (($size / 1024) > 1) {
				$size /= 1024;

				$i++;
			}

			$data['histories'][] = [
				'filename'   => basename($file),
				'size'       => round(substr($size, 0, strpos($size, '.') + 4), 2) . $suffix[$i],
				'date_added' => date($this->language->get('datetime_format'), filemtime($file)),
				'download'   => $this->url->link('tool/backup.download', 'user_token=' . $this->session->data['user_token'] . '&filename=' . urlencode(basename($file))),
			];
		}

		return $this->load->view('tool/backup_history', $data);
	}

	/**
	 * Backup
	 *
	 * @return void
	 */
	public function backup(): void {
		$this->load->language('tool/backup');

		$json = [];

		if (isset($this->request->get['filename'])) {
			$filename = basename(html_entity_decode($this->request->get['filename'], ENT_QUOTES, 'UTF-8'));
		} else {
			$filename = date('Y-m-d H.i.s') . '.sql';
		}

		if (isset($this->request->get['table'])) {
			$table = $this->request->get['table'];
		} else {
			$table = '';
		}

		if (isset($this->request->post['backup'])) {
			$backup = $this->request->post['backup'];
		} else {
			$backup = [];
		}

		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}

		if (!$this->user->hasPermission('modify', 'tool/backup')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('tool/backup');

		$allowed = $this->model_tool_backup->getTables();

		if (!in_array($table, $allowed)) {
			$json['error'] = sprintf($this->language->get('error_table'), $table);
		}

		if (!$json) {
			$output = '';

			if ($page == 1) {
				$output .= 'TRUNCATE TABLE `' . $this->db->escape($table) . '`;' . "\n\n";
			}

			$results = $this->model_tool_backup->getRecords($table, ($page - 1) * 200, 200);

			foreach ($results as $result) {
				$fields = '';

				foreach (array_keys($result) as $value) {
					$fields .= '`' . $value . '`, ';
				}

				$values = '';

				foreach (array_values($result) as $value) {
					if ($value !== null) {
						$value = str_replace(["\x00", "\x0a", "\x0d", "\x1a"], ['\0', '\n', '\r', '\Z'], $value);
						$value = str_replace(["\n", "\r", "\t"], ['\n', '\r', '\t'], $value);
						$value = str_replace('\\', '\\\\', $value);
						$value = str_replace('\'', '\\\'', $value);
						$value = str_replace('\\\n', '\n', $value);
						$value = str_replace('\\\r', '\r', $value);
						$value = str_replace('\\\t', '\t', $value);

						$values .= '\'' . $value . '\', ';
					} else {
						$values .= 'NULL, ';
					}
				}

				$output .= 'INSERT INTO `' . $table . '` (' . preg_replace('/, $/', '', $fields) . ') VALUES (' . preg_replace('/, $/', '', $values) . ');' . "\n";
			}

			$position = array_search($table, $backup);

			$record_total = $this->model_tool_backup->getTotalRecords($table);

			if (($page * 200) >= $record_total) {
				$output .= "\n";

				if (isset($backup[$position + 1])) {
					$table = $backup[$position + 1];
				} else {
					$table = '';
				}
			}

			if ($position !== false) {
				$json['progress'] = round(($position / count($backup)) * 100);
			} else {
				$json['progress'] = 0;
			}

			$handle = fopen(DIR_STORAGE . 'backup/' . $filename, 'a');

			fwrite($handle, $output);

			fclose($handle);

			if (!$table) {
				$json['success'] = $this->language->get('text_success');
			} elseif (($page * 200) >= $record_total) {
				$json['text'] = sprintf($this->language->get('text_backup'), $table, ($page - 1) * 200, $record_total);

				$json['next'] = $this->url->link('tool/backup.backup', 'user_token=' . $this->session->data['user_token'] . '&filename=' . urlencode($filename) . '&table=' . $table . '&page=1', true);
			} else {
				$json['text'] = sprintf($this->language->get('text_backup'), $table, ($page - 1) * 200, $page * 200);

				$json['next'] = $this->url->link('tool/backup.backup', 'user_token=' . $this->session->data['user_token'] . '&filename=' . urlencode($filename) . '&table=' . $table . '&page=' . ($page + 1), true);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Restore
	 *
	 * @return void
	 */
	public function restore(): void {
		$this->load->language('tool/backup');

		$json = [];

		if (isset($this->request->get['filename'])) {
			$filename = basename(html_entity_decode($this->request->get['filename'], ENT_QUOTES, 'UTF-8'));
		} else {
			$filename = '';
		}

		if (isset($this->request->get['position'])) {
			$position = $this->request->get['position'];
		} else {
			$position = 0;
		}

		if (!$this->user->hasPermission('modify', 'tool/backup')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$file = DIR_STORAGE . 'backup/' . $filename;

		if (!is_file($file)) {
			$json['error'] = $this->language->get('error_file');
		}

		if (!$json) {
			// We set $i so we can batch execute the queries rather than do them all at once.
			$i = 0;

			$handle = fopen($file, 'r');

			fseek($handle, $position, SEEK_SET);

			while (!feof($handle) && ($i < 100)) {
				$position = ftell($handle);

				$line = fgets($handle, 1000000);

				if ($i > 0 && (substr($line, 0, strlen('TRUNCATE TABLE `' . DB_PREFIX . 'user`')) == 'TRUNCATE TABLE `' . DB_PREFIX . 'user`' || substr($line, 0, strlen('TRUNCATE TABLE `' . DB_PREFIX . 'user_group`')) == 'TRUNCATE TABLE `' . DB_PREFIX . 'user_group`')) {
					fseek($handle, $position, SEEK_SET);

					break;
				}

				if ((substr($line, 0, 14) == 'TRUNCATE TABLE' || substr($line, 0, 11) == 'INSERT INTO') && substr($line, -2) == ";\n") {
					$this->db->query(substr($line, 0, strlen($line) - 2));
				}

				$i++;
			}

			$position = ftell($handle);

			$size = filesize($file);

			if ($position) {
				$json['progress'] = round(($position / $size) * 100);
			} else {
				$json['progress'] = 0;
			}

			if ($position && !feof($handle)) {
				$json['text'] = sprintf($this->language->get('text_restore'), $position, $size);

				$json['next'] = $this->url->link('tool/backup.restore', 'user_token=' . $this->session->data['user_token'] . '&filename=' . urlencode($filename) . '&position=' . $position, true);
			} else {
				$json['success'] = $this->language->get('text_success');

				$this->cache->delete('*');
			}

			fclose($handle);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Upload
	 *
	 * @return void
	 */
	public function upload(): void {
		$this->load->language('tool/backup');

		$json = [];

		// Check user has permission
		if (!$this->user->hasPermission('modify', 'tool/backup')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (empty($this->request->files['upload']['name']) || !is_file($this->request->files['upload']['tmp_name'])) {
			$json['error'] = $this->language->get('error_upload');
		}

		if (!$json) {
			// Sanitize the filename
			$filename = basename(html_entity_decode($this->request->files['upload']['name'], ENT_QUOTES, 'UTF-8'));

			if (!oc_validate_length($filename, 3, 128)) {
				$json['error'] = $this->language->get('error_filename');
			}

			// Allowed file extension types
			if (strtolower(substr(strrchr($filename, '.'), 1)) != 'sql') {
				$json['error'] = $this->language->get('error_file_type');
			}
		}

		if (!$json) {
			move_uploaded_file($this->request->files['upload']['tmp_name'], DIR_STORAGE . 'backup/' . $filename);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Download
	 *
	 * @return void
	 */
	public function download(): void {
		$this->load->language('tool/backup');

		$json = [];

		if (isset($this->request->get['filename'])) {
			$filename = basename(html_entity_decode($this->request->get['filename'], ENT_QUOTES, 'UTF-8'));
		} else {
			$filename = '';
		}

		// Check user has permission
		if (!$this->user->hasPermission('modify', 'tool/backup')) {
			$this->response->redirect($this->url->link('error/permission', 'user_token=' . $this->session->data['user_token'], true));
		}

		$file = DIR_STORAGE . 'backup/' . $filename;

		if (!is_file($file)) {
			$this->response->redirect($this->url->link('error/not_found', 'user_token=' . $this->session->data['user_token'], true));
		}

		if (!headers_sent()) {
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));

			if (ob_get_level()) {
				ob_end_clean();
			}

			readfile($file);

			exit();
		} else {
			exit($this->language->get('error_headers_sent'));
		}
	}

	/**
	 * Delete
	 *
	 * @return void
	 */
	public function delete(): void {
		$this->load->language('tool/backup');

		$json = [];

		if (isset($this->request->get['filename'])) {
			$filename = basename(html_entity_decode($this->request->get['filename'], ENT_QUOTES, 'UTF-8'));
		} else {
			$filename = '';
		}

		// Check user has permission
		if (!$this->user->hasPermission('modify', 'tool/backup')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$file = DIR_STORAGE . 'backup/' . $filename;

		if (!is_file($file)) {
			$json['error'] = $this->language->get('error_file');
		}

		if (!$json) {
			unlink($file);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Build Sitemap
	 *
	 * @throws \RuntimeException
	 *
	 * @return array<string, int>
	 */
	private function buildSitemap(): array {
		$this->load->model('setting/store');

		$entries = [];
		$languages = $this->getActiveLanguages();

		foreach ($this->getStoreIds() as $store_id) {
			$category_paths = $this->getCategoryPaths($store_id);
			$product_category_map = $this->getProductCategoryMap($store_id, $category_paths);

			$product_query = $this->db->query("SELECT p.product_id, p.date_modified FROM `" . DB_PREFIX . "product` p LEFT JOIN `" . DB_PREFIX . "product_to_store` p2s ON (p.product_id = p2s.product_id) WHERE p.status = '1' AND p.date_available <= CURDATE() AND p2s.store_id = '" . (int)$store_id . "' ORDER BY p.product_id");
			$information_query = $this->db->query("SELECT i.information_id FROM `" . DB_PREFIX . "information` i LEFT JOIN `" . DB_PREFIX . "information_to_store` i2s ON (i.information_id = i2s.information_id) WHERE i.status = '1' AND i2s.store_id = '" . (int)$store_id . "' ORDER BY i.information_id");
			$manufacturer_query = $this->db->query("SELECT m.manufacturer_id FROM `" . DB_PREFIX . "manufacturer` m LEFT JOIN `" . DB_PREFIX . "manufacturer_to_store` m2s ON (m.manufacturer_id = m2s.manufacturer_id) WHERE m2s.store_id = '" . (int)$store_id . "' ORDER BY m.manufacturer_id");

			foreach ($languages as $language) {
				$registry = $this->model_setting_store->createStoreInstance($store_id, $language['code']);
				$url = $registry->get('url');

				if (!$url instanceof \Opencart\System\Library\Url) {
					continue;
				}

				$args_prefix = 'language=' . $language['code'];

				$this->setSitemapEntry($entries, $url->link('common/home', $args_prefix, true), null, 'daily', '1.0');
				$this->setSitemapEntry($entries, $url->link('information/contact', $args_prefix, true), null, 'monthly', '0.4');
				$this->setSitemapEntry($entries, $url->link('information/sitemap', $args_prefix, true), null, 'weekly', '0.4');
				$this->setSitemapEntry($entries, $url->link('product/special', $args_prefix, true), null, 'daily', '0.6');
				$this->setSitemapEntry($entries, $url->link('product/manufacturer', $args_prefix, true), null, 'weekly', '0.5');

				foreach ($category_paths as $category_path) {
					$this->setSitemapEntry($entries, $url->link('product/category', $args_prefix . '&path=' . $category_path, true), null, 'weekly', '0.8');
				}

				foreach ($product_query->rows as $product) {
					$product_id = (int)$product['product_id'];
					$args = $args_prefix . '&product_id=' . $product_id;

					if (isset($product_category_map[$product_id])) {
						$args .= '&path=' . $product_category_map[$product_id];
					}

					$this->setSitemapEntry($entries, $url->link('product/product', $args, true), (string)$product['date_modified'], 'weekly', '0.7');
				}

				foreach ($information_query->rows as $information) {
					$this->setSitemapEntry($entries, $url->link('information/information', $args_prefix . '&information_id=' . (int)$information['information_id'], true), null, 'monthly', '0.4');
				}

				foreach ($manufacturer_query->rows as $manufacturer) {
					$this->setSitemapEntry($entries, $url->link('product/manufacturer.info', $args_prefix . '&manufacturer_id=' . (int)$manufacturer['manufacturer_id'], true), null, 'weekly', '0.5');
				}
			}
		}

		ksort($entries);

		$output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		$output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		foreach ($entries as $entry) {
			$output .= "  <url>\n";
			$output .= '    <loc>' . htmlspecialchars($entry['loc'], ENT_XML1, 'UTF-8') . "</loc>\n";

			if (!empty($entry['lastmod'])) {
				$output .= '    <lastmod>' . date('c', (int)$entry['lastmod']) . "</lastmod>\n";
			}

			$output .= '    <changefreq>' . $entry['changefreq'] . "</changefreq>\n";
			$output .= '    <priority>' . $entry['priority'] . "</priority>\n";
			$output .= "  </url>\n";
		}

		$output .= '</urlset>' . "\n";

		$result = file_put_contents(DIR_OPENCART . 'sitemap.xml', $output, LOCK_EX);

		if ($result === false) {
			throw new \RuntimeException('Unable to write sitemap.xml');
		}

		$modified = (int)filemtime(DIR_OPENCART . 'sitemap.xml');

		if (!$modified) {
			$modified = time();
		}

		$size = (int)filesize(DIR_OPENCART . 'sitemap.xml');

		if (!$size) {
			$size = oc_strlen($output);
		}

		return [
			'total' => count($entries),
			'size' => $size,
			'modified' => $modified
		];
	}

	/**
	 * Get Store IDs
	 *
	 * @return array<int, int>
	 */
	private function getStoreIds(): array {
		$store_ids = [0];

		$query = $this->db->query("SELECT store_id FROM `" . DB_PREFIX . "store` ORDER BY store_id");

		foreach ($query->rows as $row) {
			$store_ids[] = (int)$row['store_id'];
		}

		return array_values(array_unique($store_ids));
	}

	/**
	 * Get Active Languages
	 *
	 * @return array<int, array<string, mixed>>
	 */
	private function getActiveLanguages(): array {
		$query = $this->db->query("SELECT language_id, code FROM `" . DB_PREFIX . "language` WHERE status = '1' ORDER BY sort_order, name");

		if ($query->rows) {
			return $query->rows;
		}

		return [
			[
				'language_id' => (int)$this->config->get('config_language_id'),
				'code' => (string)$this->config->get('config_language')
			]
		];
	}

	/**
	 * Get Category Paths
	 *
	 * @param int $store_id
	 *
	 * @return array<int, string>
	 */
	private function getCategoryPaths(int $store_id): array {
		$category_query = $this->db->query("SELECT c.category_id, c.parent_id FROM `" . DB_PREFIX . "category` c LEFT JOIN `" . DB_PREFIX . "category_to_store` c2s ON (c.category_id = c2s.category_id) WHERE c.status = '1' AND c2s.store_id = '" . (int)$store_id . "' ORDER BY c.parent_id, c.category_id");

		$parents = [];

		foreach ($category_query->rows as $category) {
			$parents[(int)$category['category_id']] = (int)$category['parent_id'];
		}

		$paths = [];

		foreach ($parents as $category_id => $parent_id) {
			$path = [(string)$category_id];
			$visited = [$category_id => true];

			while ($parent_id && isset($parents[$parent_id]) && !isset($visited[$parent_id])) {
				$path[] = (string)$parent_id;
				$visited[$parent_id] = true;
				$parent_id = (int)$parents[$parent_id];
			}

			$paths[$category_id] = implode('_', array_reverse($path));
		}

		return $paths;
	}

	/**
	 * Get Product Category Map
	 *
	 * @param int               $store_id
	 * @param array<int, string> $category_paths
	 *
	 * @return array<int, string>
	 */
	private function getProductCategoryMap(int $store_id, array $category_paths): array {
		$query = $this->db->query("SELECT ptc.product_id, MIN(ptc.category_id) AS category_id FROM `" . DB_PREFIX . "product_to_category` ptc LEFT JOIN `" . DB_PREFIX . "category` c ON (ptc.category_id = c.category_id) LEFT JOIN `" . DB_PREFIX . "category_to_store` c2s ON (ptc.category_id = c2s.category_id) WHERE c.status = '1' AND c2s.store_id = '" . (int)$store_id . "' GROUP BY ptc.product_id");

		$product_category_map = [];

		foreach ($query->rows as $row) {
			$product_id = (int)$row['product_id'];
			$category_id = (int)$row['category_id'];

			if (isset($category_paths[$category_id])) {
				$product_category_map[$product_id] = $category_paths[$category_id];
			}
		}

		return $product_category_map;
	}

	/**
	 * Set Sitemap Entry
	 *
	 * @param array<string, array<string, mixed>> $entries
	 * @param string                               $url
	 * @param string|null                          $lastmod
	 * @param string                               $changefreq
	 * @param string                               $priority
	 *
	 * @return void
	 */
	private function setSitemapEntry(array &$entries, string $url, ?string $lastmod, string $changefreq, string $priority): void {
		$loc = html_entity_decode($url, ENT_QUOTES, 'UTF-8');

		if (!$loc) {
			return;
		}

		if (!isset($entries[$loc])) {
			$entries[$loc] = [
				'loc' => $loc,
				'changefreq' => $changefreq,
				'priority' => $priority
			];
		}

		if ($lastmod && $lastmod != '0000-00-00 00:00:00') {
			$timestamp = strtotime($lastmod);

			if ($timestamp && (!isset($entries[$loc]['lastmod']) || $timestamp > (int)$entries[$loc]['lastmod'])) {
				$entries[$loc]['lastmod'] = $timestamp;
			}
		}
	}

	/**
	 * Format Filesize
	 *
	 * @param int $size
	 *
	 * @return string
	 */
	private function formatFilesize(int $size): string {
		$i = 0;
		$suffix = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
		$value = (float)$size;

		while (($value / 1024) > 1 && isset($suffix[$i + 1])) {
			$value /= 1024;
			$i++;
		}

		return round($value, 2) . $suffix[$i];
	}
}
