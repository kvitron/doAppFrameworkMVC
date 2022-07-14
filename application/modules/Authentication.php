<?php

/**
 * Аутентификация пользователей на сайте
 */

namespace authentication;

use database\Database;
use PDO;
use PDOException;

class Authentication
{
    public static function setAuthenticationCookies(string $login, string $pass_hash)
    {
        // Пользователь будет автоматически авторизовываться в течение 12 часов
        setcookie("login", $login, time() + 43200, '/', '', false, true);
        setcookie("pass_hash", $pass_hash, time() + 43200, '/', '', false, true);
    }


    /**
     * В случае успешной аутентификации время жизни в куках пользователя обновляется.
     * В случае неуспешной аутентификации пользователя перенаправит на страницу авторизации
     * 
     * @return boolean
     */
    public static function authenticationCheck()
    {
        if ( !isset($_COOKIE['login']) || !isset($_COOKIE['pass_hash'])) {
           // Редирект на страницу авторизации, если это другая страница
            if ($_SERVER['REQUEST_URI'] != '/user/login') {
                header("Location: ../user/login");
            } else {
                return false;
            }
        }

        $cookie_login = $_COOKIE['login'];
        $cookie_pass_hash = $_COOKIE['pass_hash'];

        $db_connection = new Database();
        $db_connection = $db_connection->connection;

        try {
            $query = $db_connection->prepare('SELECT 1 from `users` WHERE `login` = :cookie_login AND `pass_hash` = :cookie_pass_hash;');
            $query->bindValue(':cookie_login', $cookie_login);
            $query->bindValue(':cookie_pass_hash', $cookie_pass_hash);
            $query->execute();
            $authentication_result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            // Тут должна быть какая-нибудь обработка исключения. Для простоты оставлю так.

            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        if ($authentication_result) {
            // Обновляем время жизни кук
            Authentication::setAuthenticationCookies($cookie_login, $cookie_pass_hash);
        } else {
            // Редирект на страницу авторизации, если это другая страница
            if ($_SERVER['REQUEST_URI'] != '/user/login') {
                header("Location: ../user/login");
            } else {
                return false;
            }
        }
        return true;
    }
}
