<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Accumen
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120712

Modified by Kvitron
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>Шаблон сайта с использованием MVC</title>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
	<div id="wrapper">
		<!--<div id="header">
				<div id="logo">
					<a href="/">Шаблон для MVC</a>
				</div>
				<div id="menu">
					<ul>
						<li class="first active"><a href="/">Главная</a></li>
						<li><a href="/users">Список пользователей</a></li>
						<li><a href="/users/add">Создать пользователя</a></li>
						<li class="last"><a href="/user/logout">Выход</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>-->
		<div id="page">
			<div id="sidebar">
				<div class="side-box">
					<h3>Меню</h3>
					<ul>
						<li class="first active"><a href="/users">Список пользователей</a></li>
						<li><a href="/users/add">Создать пользователя</a></li>
						<li class="last"><a href="/user/logout">Выход</a></li>
					</ul>
				</div>
			</div>
			<div id="content">
				<div class="box">
					<?php include 'application/views/' . $content_view; ?>
				</div>
				<br class="clearfix" />
			</div>
			<br class="clearfix" />
		</div>
		<div id="page-bottom">
			<div id="page-bottom-sidebar">
				<h3>Контакты</h3>
				<ul class="list">
					<li class="first">email: kvitronx@yandex.ru</li>
					<li>phone: +7(982)306-06-11</li>
					<li class="last">telegram: @kvitron</li>
				</ul>
			</div>
			<div id="page-bottom-content">
				<h3>Реквизиты для входа</h3>
				<p>Логин: zero</p>
				<p>Пароль: user</p>
			</div>
			<br class="clearfix" />
		</div>
	</div>
	<div id="footer">
	</div>
</body>

</html>