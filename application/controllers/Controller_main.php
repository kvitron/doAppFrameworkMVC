<?php

/**
 * Главная
 */

class Controller_Main extends Controller
{

	function action_index()
	{	
		// Вместо главной страницы сайта редиректим на страницу со списком пользователей
		header('Location: /users');
	}
}