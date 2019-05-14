<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Users;

class Home extends \Core\Controller
{
    protected function before()
    {
        $create = new Users;
        $create->createdb();
    }

    public function indexAction()
    {
        if (@$_SESSION['is_logged_in']) {
            exit(header('location: /user/' . $_SESSION['user_data']['id'] . '/profile'));
        }
        if (isset($_POST['signup'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $reg = new Users;
            $reg->insert($post);
        }
        if (isset($_POST['login'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $reg = new Users;
            $reg->login($post);
        }
        View::render('Home/index.php', true, false);

    }

    public function login()
    {
        View::render('Home/login.php', true, false);
    }
}
