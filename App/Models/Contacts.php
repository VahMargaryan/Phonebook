<?php

namespace App\Models;

use Core\View;
use PDO;

class Contacts extends \Core\Model
{

    public function add($post)
    {
        $this->query('INSERT INTO contacts (uid,firstname , lastname , mail, uniqid ) VALUES(:uid,:firstname , :lastname  , :mail, :uniqid)');
        $uid = uniqid();
        $this->bind(':firstname', $post['fname']);
        $this->bind(':lastname', $post['lname']);
        $this->bind(':mail', $post['mail']);
        $this->bind(':uid', $_SESSION['user_data']['id']);
        $this->bind(':uniqid', $uid);
        $this->execute();
        $this->query('INSERT INTO numbers (num, cid) VALUES(:num, :cid)');
        $this->bind(':num', $post['num']);
        $this->bind(':cid', $uid);
        $this->execute();
        return true;
    }

    public function getContacts()
    {
        $id = (int)$_SESSION['user_data']['id'];
        $this->query('SELECT contacts.id, firstname, lastname, mail,uid,uniqid,
		group_concat(distinct num order by num) c,cid
		FROM contacts LEFT JOIN numbers
		ON contacts.uniqid = numbers.cid
    WHERE  uid = :id
		group by id, firstname, lastname, mail,uid,uniqid');
        $this->bind(':id', $id);
        $result = $this->resultSet();
        if ($result) {
            return $result;
        } else {
            exit(header("location: /contacts/add"));
        }
    }

    public function getSingleUser($id)
    {
        $this->query('SELECT contacts.id, firstname, lastname, mail,uid,uniqid,
		group_concat(distinct num order by num) c,cid
		FROM contacts LEFT JOIN numbers
		ON contacts.uniqid = numbers.cid
    WHERE  contacts.id = :id
		group by id, firstname, lastname, mail,uid,uniqid');
        $this->bind(':id', $id);
        $result = $this->single();
        if ($result) {
            return $result;
        } else {
            exit(header("location: /contacts/add"));
        }
    }

    public function delete($post)
    {
        $this->query('Delete from contacts where Id = :id');
        $this->bind(':id', $post['delete']);
        $this->execute();
        return true;
    }

    public function update($num, $post)
    {
        $this->query('SELECT * FROM contacts WHERE id=:uid');
        $this->bind(':uid', $num);
        $old = $this->single();
        $this->query('UPDATE contacts SET   firstname = :firstName, lastname = :lastName, mail = :email WHERE id =:id');
        if ($post['fname'] === "" || empty($post['fname'])) {
            $this->bind(':firstName', $old['firstname']);
        } else {
            $this->bind(':firstName', $post['fname']);
        }
        if ($post['lname'] === "" || empty($post['lname'])) {
            $this->bind(':lastName', $old['lastname']);
        } else {
            $this->bind(':lastName', $post['lname']);
        }
        if ($post['mail'] === "" || empty($post['mail'])) {
            $this->bind(':email', $old['mail']);
        } else {
            $this->bind(':email', $post['mail']);
        }
        $this->bind(':id', $num);
        $this->execute();
        $this->query('delete  from numbers where cid = :id');
        $this->bind(':id', $old['uniqid']);
        $this->execute();
        foreach ($post['number'] as $nm) {
            if ($nm !== "" || !empty($nm)) {
                $this->query('INSERT INTO numbers (num, cid) VALUES(:num, :cid)');
                $this->bind(':cid', $old['uniqid']);
                $this->bind(':num', $nm);
                $this->execute();
            }
        }
        return true;
    }
}