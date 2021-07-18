<?php
/**
 * @package MVC
 * Core controller of the MVC app
 */

namespace Core\controller;

use App\Helper;

defined('ABSPATH') OR exit('No direct script access allowed');

class Controller
{
    public function __construct()
    {
    }

    public function render($view, $data = [])
    {
        Helper::baseUrl();
        if($data) extract($data);
        require_once ABSPATH . "/app/view/layout/header.php";
        require_once ABSPATH . "/app/view/$view.php";
        require_once ABSPATH . "/app/view/layout/footer.php";
    }

    public function renderPartial($view, $data = [])
    {
        if($data) extract($data);
        require_once ABSPATH . "/app/view/$view.php";
    }

    public function loadModel($path)
    {
        require_once ABSPATH . "/app/model/$path.php";
        return new $path();
    }
}
