<?php

class Model_Users extends Model
{	
	/**
	 * Получение нумерованного массива ассоциативных массивов, содержащих имя, фамилию и возраст всех пользователей из БД
	 * 
	 * @return array
	 * @exception PDOException
	 */
	public function getAllUsers()
	{	
		try {
			$array_all_users = $this->db_connection->prepare('SELECT `first_name`, `second_name`, `age` from `users`');
			$array_all_users->execute();
			$array_all_users = $array_all_users->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {

			// Тут должна быть какая-нибудь обработка исключения. Для простоты оставлю так.

			print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
		return $array_all_users;
	}


	/**
	 * Занесение значений из формы добавления нового пользователя в БД
	 * 
	 * @return string
	 * Сообщение, которое будет выведено на странице
	 */
	public function addNewUser()
	{
		// Тут должна быть валидация данных из формы. Для простоты оставлю так.
	
		$first_name = $_POST['first-name'];
		$second_name = $_POST['second-name'];
		$age = $_POST['age'];
		$login = $_POST['login'];
		$password = $_POST['password'];

		// Хешируем пароль, чтобы не хранить исходник в БД
		$pass_hash = password_hash($password, PASSWORD_DEFAULT);

		try {
			$query = $this->db_connection->prepare('INSERT INTO `users` (`first_name`, `second_name`, `age`, `login`, `pass_hash`) 
				VALUES (:first_name, :second_name, :age, :login, :pass_hash)');
			$query->bindValue(':first_name', $first_name);
			$query->bindValue(':second_name', $second_name);
			$query->bindValue('age', $age, PDO::PARAM_INT);
			$query->bindValue(':login', $login);
			$query->bindValue(':pass_hash', $pass_hash);
			$query->execute();

			if ($query->errorCode() !== '00000') {
				throw new PDOException($query->errorInfo()[2]);
			}

			return "Пользователь $first_name $second_name добавлен";
		} catch (PDOException $e) {
			return "Ошибка во время добавления пользователя. Причина: " . $e->getMessage();
		}
	}
}
