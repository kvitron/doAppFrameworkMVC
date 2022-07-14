<?php

class Controller_Users extends Controller
{
	
	function __construct()
	{
		$this->model = new Model_Users();
		$this->view = new View();
	}
	

	/**
	 * Страница со списком всех пользователей из БД
	 */
	function action_index()
	{
		$array_all_users = $this->model->getAllUsers();		
		$this->view->render('listOfUsers_view.php', 'template_view.php', ['array_all_users' => $array_all_users]);
	}


	/**
	 * Страница добавления нового пользователя в БД
	 */
	function action_add()
	{
		// Сообщение, выводимое на странице
		$info_message = NULL;

		// Если страница была вызвана после отправки формы, то запускаем обработчик данных формы
		if (isset($_POST['add-new-user']) && !empty($_POST['add-new-user'])) {
			$info_message = $this->model->addNewUser();
		}

		$this->view->render('addNewUser_view.php', 'template_view.php', ['info_message' => $info_message]);
	}
}
