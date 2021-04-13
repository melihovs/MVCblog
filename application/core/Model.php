<?php


namespace application\core;

use application\lib\Db;


abstract class Model {

    public $db;
    protected $config;
    /**
     * Model constructor.
     */
    public function __construct() {
        $this->db = new Db;
        $this->config = require 'application/config/parametrs.php';
    }
}