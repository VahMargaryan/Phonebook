<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Users;


class contacts extends \Core\Controller
{
    public function indexAction()
    {
        View::render('Home/index.php', true, false);
    }

    public function add()
    {
        if (isset($_POST['addcont'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $reg = new \App\Models\Contacts;
            $check = $reg->add($post);
            if ($check == true) {
                exit(header('location: /user/' . $_SESSION['user_data']['id'] . '/profile'));
            }
        }
        View::render('Home/contacts.php', true, false);
    }

    public function edit()
    {
        $get = new \App\Models\Contacts;
        $num = getNum();
        $data = $get->getSingleUser($num);
        if (isset($_POST['edituser'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $reg = new \App\Models\Contacts;
            $data = $reg->update($num, $post);
            if ($data) {
                exit(header('location: /user/contacts'));
            }
        }
        View::render('contacts/contactedit.php', true, $data);
    }
}

