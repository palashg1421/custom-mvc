<?php
/**
 * @package MVC
 * Welcome controller of the app which is preloaded with default method
 */

defined('ABSPATH') OR exit('No direct script access allowed');

use Core\controller\Controller;
use App\Helper;

class Auth extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if( isset($_POST['doLogin']) )
        {
            unset($_POST['doLogin']);
            Helper::printer($_POST);
            $model = new User();
        }
        $this->render('auth/login');
    }
}
