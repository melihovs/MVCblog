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
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('add');
        }
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
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST,'add')) {
                $this->view->message('Error', $this->model->error);
            }
            $this->view->message('Succes', 'OK');
        }
        $this->view->render('Добавить пост');
    }

    public function editAction() {
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST, 'edit')) {
                $this->view->message('Error', $this->model->error);
            }
            $this->view->message('Succes', 'OK');
        }
        $this->view->render('Редактировать пост');
    }

    public function postsAction() {
        $this->view->render('Список постов');
    }

    public function deleteAction() {
        exit ('Удаление поста');
    }

    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect('login');
    }

}

