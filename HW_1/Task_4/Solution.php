<!DOCTYPE html>
<html>

<head>
	<title>Task_2</title>
	<meta charset="utf-8" />
</head>

<body>
	<form action="solution.php" method="POST">
		<p>Введите имя:<br>
			<input type="string" name="firstname" />
		</p>
		<p>Введите фамилию:<br>
			<input type="string" name="surname" />
		</p>
		<input type="submit" value="Отправить">
	</form>
	<p>
		<?php
		if (!(empty($_POST['firstname']) || empty($_POST['surname']))) {
			echo 'Привет, ' . $_POST['firstname'] . ' ' . $_POST['surname'] . '<br>';
			/*
        Так как функция mysql_connect была убрана из версии php 7.0, а используемая для решения задачи версия 8.15,
        то в текущем решении используется встроенная библиотека pdo_mysql,
        предварительно раскомментировав ;extension=pdo_mysql убрав точку с запятой
      */
			//Используется конструкция 'try catch' для обработки ошибок при подключении к серверу базы данных
			try {
				/* 
					 подключение к серверу устанавливается созданием экземпляра класса PDO,
           в конструктор которого вносятся адрес сервера и название базы данных, логин и пароль пользователя MySQL
        */
				$conn = new PDO("mysql:host=localhost;dbname=task_4", "admin", "admin");
				echo "Подключение к серверу базы данных успешно! <br>";
				$firstName = $_POST['firstname'];
				$surname = $_POST['surname'];
				/* 
					 создается строка SQL (INSERT) запроса, в котором полученные из формы данные $firstName и $surname  методом POST,
           соответствуют полям таблице users базы данных task_4 MySQL сервера
        */
				$query = "INSERT INTO users (FirstName, Surname) VALUES ('$firstName','$surname');";
				/*  
						строка запроса исполняется методом exec() объекта $conn класса PDO подключения
            и возвращает количество измененных строк, которое присваивает переменная $numberOfRaws
        */
				$numberOfRaws = $conn->exec($query);
				echo "$numberOfRaws строк добавлено успешно!";
			} catch (PDOException $e) {
				echo "Подключение не удалось: " . $e->getMessage();
			}
		}
		?>
	</p>
</body>

</html>