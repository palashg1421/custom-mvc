<?php
/**
 * @package MVC
 * Welcome controller of the app which is preloaded with default method
 */

defined('ABSPATH') OR exit('No direct script access allowed');

use Core\controller\Controller;
use App\Helper;

class Welcome extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'user_fname'    => 'Jhen',
            'user_lname'    => 'user',
            'user_phone'    => '9998887770',
            'user_email'    => 'jhen@mailinator.com',
            'user_pass'     => 'test123'
        );
        if( isset($_REQUEST['doAjax']) )
        {
            // do code here
            exit();
        }
        if( isset($_POST['submit']) )
        {
            $model = $this->loadModel('User');
            if( $model->addUser($_POST) )
            {
                Helper::redirect('welcome/test');
            }
        }
        $this->render('welcome/index', ['data' => $data]);
    }

    public function test()
    {
        echo 'test function';
    }
}
