<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        $lava = lava_instance();
        $lava->call->library('session');

        if (!$lava->session->userdata('user_id')) {
            require_once SYSTEM_DIR . 'helpers/url_helper.php';
            redirect(site_url('login'));
        }

        return $next();
    }
}