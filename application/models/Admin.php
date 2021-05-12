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

    public function loginValidate($post) {
        if ($this->config['login'] != $post['login'] or $this->config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }

    public function postValidate($post, $type) {
        $nameLen = strlen($post['name']);
        $descriptionLen = strlen($post['description']);
        $textLen = strlen($post['text']);
        if ($nameLen < 2 or $nameLen > 100) {
            $this->error = 'Название должно содержать от 2 до 100 символов';
            return false;
        } elseif ($descriptionLen < 10 or $descriptionLen > 100) {
            $this->error = 'Описание должно содержать от 10 до 100 символов';
            return false;
        } elseif ($textLen < 10 or $textLen > 5000) {
            $this->error = 'Текст должен содержать от 10 до 5000 символов';
            return false;
        }
       /* if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
            $this->error = 'Изображение не выбрано';
            return false;
        }*/
        return true;
    }

    public function postAdd($post) {
        $params = [
            'id' => '',
            'name' => $post['name'],
            'description' => $post['description'],
            'text' => $post['text'],
        ];
        $this->db->query('INSERT INTO posts VALUES (:id, :name, :description, :text)',$params);
    }


}
