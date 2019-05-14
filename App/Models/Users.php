<?php

namespace App\Models;

use PDO;

class Users extends \Core\Model
{
    public function insert($post)
    {
        $password = md5($post['password']);
        if (empty($post['email']) || empty($post['number']) || empty($post['password'])) {
            exit(header('Location: /'));
        } else {
            $this->query('INSERT INTO users (firstName , lastName , email, password, numbers) VALUES(:firstName , :lastName , :email, :password , :numbers)');
            $this->bind(':numbers', $post['number']);
            $this->bind(':email', $post['email']);
            $this->bind(':firstName', $post['first']);
            $this->bind(':lastName', $post['last']);
            $this->bind(':password', $password);
            $this->execute();
            if ($this->lastInsertId()) {
                exit(header('Location: /'));
            }
        }
        return;
    }

    public function login($post)
    {
        $password = md5($post['password']);
        $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
        $this->bind(':email', $post['email']);
        $this->bind(':password', $password);
        $row = $this->single();
        if ($row) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_data'] = array(
                "id" => $row['Id'],
                "email" => $row['email']
            );
            header('Location: /user/' . $_SESSION['user_data']['id'] . '/profile');
        } else {
            exit(header("Location:  /"));
        }
        return;
    }

    public function getuserinfo($id)
    {
        $this->query('SELECT * FROM users WHERE Id = :id');
        $this->bind(':id', $id);
        $data = $this->single();
        return $data;
    }

    public function edit($post)
    {
        $this->query('SELECT * FROM users WHERE Id=:uid');
        $this->bind(':uid', $_SESSION['user_data']['id']);
        $old = $this->single();

        $this->query('UPDATE users SET  numbers = :num, firstName = :firstName, lastName = :lastName, email = :email WHERE Id =:id');
        if ($post['fname'] === "" || empty($post['fname'])) {
            $this->bind(':firstName', $old['firstName']);
        } else {
            $this->bind(':firstName', $post['fname']);
        }
        if ($post['lname'] === "" || empty($post['lname'])) {
            $this->bind(':lastName', $old['lastName']);
        } else {
            $this->bind(':lastName', $post['lname']);
        }
        if ($post['mail'] === "" || empty($post['mail'])) {
            $this->bind(':email', $old['email']);
        } else {
            $this->bind(':email', $post['mail']);
        }
        if ($post['num'] === "" || empty($post['num'])) {
            $this->bind(':num', $old['numbers']);
        } else {
            $this->bind(':num', $post['num']);
        }
        $this->bind(':id', $_SESSION['user_data']['id']);
        $this->execute();
        return true;
    }

    public function createdb()
    {
        $this->query('CREATE TABLE IF NOT EXISTS contacts (
          id     INT AUTO_INCREMENT PRIMARY KEY,
          uid     VARCHAR (255),
          firstname     VARCHAR (255),
          lastname     VARCHAR (255),
          mail     VARCHAR (255),
          uniqid VARCHAR (255)
        );
        CREATE TABLE IF NOT EXISTS numbers (
          id     INT AUTO_INCREMENT PRIMARY KEY,
          num     VARCHAR (255),
          cid     VARCHAR (255)
        );
        CREATE TABLE IF NOT EXISTS users (
          Id     INT AUTO_INCREMENT PRIMARY KEY,
          password     VARCHAR (255),
          email     VARCHAR (255),
          firstName     VARCHAR (255),
          lastName     VARCHAR (255),
          numbers			VARCHAR (255)
        )');
        $this->execute();
    }
}