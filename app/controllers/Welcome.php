<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Welcome extends Controller {
	public function index() {
		// Debug: Show the current route
		file_put_contents(APP_DIR . '../debug.log', 'Welcome::index() called at ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
		$this->call->view('welcome_page');
	}
}
?>