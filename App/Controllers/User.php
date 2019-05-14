<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Users;
use \App\Models\Contacts;

class User extends \Core\Controller
{
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    protected function after()
    {

    }

    public function profile()
    {
        if (isset($_POST['logout'])) {
            unset($_SESSION['is_logged_in']);
            unset($_SESSION['user_data']);
            session_destroy();
            header("location:/");
        } else {
            $get = new Users;
            $data = $get->getuserinfo(getNum());
            View::render('Home/Profile.php', true, $data);
        }
    }

    public function contacts()
    {
        $get = new Contacts;
        $data = $get->getContacts();
        if (isset($_POST['delete'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $del = new Contacts;
            $data = $del->delete($post);
            if ($data) {
                exit(header('location: /user/contacts'));
            }
        }
        View::render('contacts/index.php', true, $data);
    }

    public function edit()
    {
        $get = new Contacts;
        $data = $get->getContacts();
        if (isset($_POST['edituser'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $get = new Users;
            $data = $get->edit($post);
            if ($data) {
                exit(header('location: /user/' . $_SESSION['user_data']['id'] . '/profile'));
            }
        }
        View::render('Home/edit.php', true, $data);
    }
}
