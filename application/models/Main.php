<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    /*public function getNews() {
        $result = $this->db->row('SELECT title,description FROM news');
        return $result;
    }*/

    public $error;

    public function contactValidate($post) {
        $nameLen = strlen($post['name']);
        $nameMsg = strlen($post['message']);
        if ($nameLen < 2 or $nameLen > 20) {
            $this->error = 'Имя должно содержать от 2 до 20 символов';
            return false;
        } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error = 'E-mail введен некорректно';
            return false;
        } elseif (($nameMsg < 10) or ($nameMsg > 500)) {
            $this->error = 'Сообщение должно сожержать от 10 до 500 символов';
            return false;
        }

        return true;
    }


}