<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {
    public function loginAction() {
        if (!empty($_POST)) {
            $this->view->location('/');
        }
        $this->view->render('header');
        $this->view->render('default','Страница входа' );
    }
    public function registerAction() {
        $this->view->render('header');
        $this->view->render('default','Страница регистрации' );
    }
}