<?php

namespace application\controllers;

use application\core\Controller;
class AdminController extends Controller {

    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
      //  $_SESSION['admin'] = 1;
    }

    public function loginAction() {
        if (!empty($_POST)) {
            if (!$this->model->loginValidate($_POST)) {
                $this->view->message('Error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('add');
        }
        $this->view->render('Вход');
    }

    public function addAction() {
        $this->view->render('Добавить пост');
    }

    public function editAction() {
        $this->view->render('Редактировать пост');
    }

    public function deleteAction() {
        exit ('Удаление поста');
    }

    public function logoutAction() {
        exit ('Выход');
    }

}

