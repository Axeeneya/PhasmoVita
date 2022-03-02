<?php

//начальные данные
$host='localhost';
$user='root';
$password='password';
$db_name='phasmovita';

//соединение с сервером базы данных
$link=mysqli_connect($host, $user, $password, $db_name);

if($link->connect_errno) exit('Ошибка соединения с БД');

$link->set_charset('utf8');
	

?>