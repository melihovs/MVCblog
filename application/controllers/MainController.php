<?php

namespace application\controllers;

use application\core\Controller;
class MainController extends Controller {
    public function indexAction() {
        $this->view->render('Главная Страница');
    }

    public function aboutAction() {
        $this->view->render('Обо мне');

    }

    public function contactAction() {
        if (!empty($_POST)) {
            if (!$this->model->contactValidate($_POST)){
                $this->view->message('Error', $this->model->error);
            }
            mail($this->config['adminMail'], 'Сообщение из блога', ''.$_POST['name'] . '|' . $_POST['message']);
            $this->view->message('OK','Сообщение отправлено администратору');
        }
        $this->view->render('Контакты');
    }

    public function postAction() {
        $this->view->render('Пост');

    }

}

