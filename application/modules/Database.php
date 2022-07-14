<?php

/**
 * Слой абстракции между приложением и базой данных
 */

namespace database;

use PDO;

class Database
{
    public $connection = null;

    public function __construct()
    {
        // Дедаем проверку, чтобы не создавать несколько одинаковых подключений к БД
        if ($this->connection === null) {
            $this->connection = new PDO('mysql:host=localhost;dbname=sample7459', 'root', 'root');
        }
    }
}
