<?php

/**
 * Страница не найдена
 */

class Controller_404 extends Controller
{
	
	function action_index()
	{
		$this->view->render('404_view.php', 'template_view.php');
	}

}
