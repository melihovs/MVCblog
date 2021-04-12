<?php

namespace application\controllers;

use application\core\Controller;
class MainController extends Controller {
    public function indexAction() {
        $result = $this->model->getNews();
        $vars = [
          'news' => $result,
        ];
        $this->view->render('header');
        $this->view->render('default','Страница входа', $vars );

    }
   // public function form1Action() {
   //     require 'public/form1.php';
   // }
   // public function form2Action() {
   //     require 'public/form2.php';
   // }
}

