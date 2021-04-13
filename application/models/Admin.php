<?php


namespace application\models;

use application\core\Model;

class Admin extends Model
{

    /*public function getNews() {
        $result = $this->db->row('SELECT title,description FROM news');
        return $result;
    }*/

    public $error;

    public function loginValidate($post)
    {
        if ($this->config['login'] != $post['login'] or $this->config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }


}
