<?php

class Controller_User extends Controller
{
    function __construct()
	{
		$this->model = new Model_User();
		$this->view = new View();
	}


    /**
     * Страница авторизации пользователя
     */
    function action_login()
    {
        // Сообщение, выводимое на странице только в случае каких-либо неполадок
        $message = NULL;

        // Авторизация пользователя при заполнененной форме
        // Если авторизация будет успешна, то произойдет редирект на другую страницу
        if(isset($_POST['login']) && isset($_POST['password']))
		{
            $message = $this->model->userAuthorization();
        }

        // Рендер страницы если пользователь не заполнял авторизационную форму, либо если авторизация не была успешна
        $this->view->render('login_view.php', 'template_view.php', ['message' => $message]);
    }


    /**
     * Страница выхода
     */
    function action_logout()
    {
        unset($_COOKIE['login']);
        unset($_COOKIE['pass_hash']);
        setcookie("login", null, -1, '/', '', false, true);
        setcookie("pass_hash", null, -1, '/', '', false, true);

        // Редирект на страницу авторизации
        header("Location: ../user/login");
    }
}
