<?php
// Класс Db - отвечает за подключение к БД в фреймворке
namespace application\lib;

use PDO; // Используется для работы с базой данных

class Db {

    protected $db;

    public function __construct() {
        $config = require 'application/config/db.php'; // Загружаем конфигурацию БД
        // Подключение к БД
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset=utf8', $config['user'], $config['password']);
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();

    }
}

