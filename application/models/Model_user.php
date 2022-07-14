<?php

use authentication\Authentication;

class Model_User extends Model
{	
	/**
	 * Авторизация пользователя при заполнении авторизационной формы на сайте
	 * 
	 * @return string
     * Сообщение об ошибке, либо ничего
     * 
	 * @exception PDOException
	 */
	public function userAuthorization()
	{	
        // Тут какая-либо валидация
        $login = $_POST['login'];
        $password =$_POST['password'];

        try {
			$query = $this->db_connection->prepare('SELECT `pass_hash` from `users` WHERE `login` = :login;');
            $query->bindValue(':login', $login);
			$query->execute();
			$authorization_result = $query->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {

			// Тут должна быть какая-нибудь обработка исключения. Для простоты оставлю так.

			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}

        if (! empty($authorization_result)) {
            $pass_hash = $authorization_result['pass_hash'];

            if (password_verify($password, $pass_hash)) {
                // Устанавливаем куки для последующей автоматической аутентификации
                Authentication::setAuthenticationCookies($login, $pass_hash);
            } else {
                return "Пользователя с таким логином не существует, либо пароль неправильный";
            }

            // Редирект на страницу со списком пользователей
            header("Location: ../users");
        } else {
            return "Пользователя с таким логином не существует, либо пароль неправильный";
        }
	}
}
