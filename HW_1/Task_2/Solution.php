<!DOCTYPE html>
<html>

<head>
	<title>Task_2</title>
	<meta charset="utf-8" />
</head>

<body>
	<!-- Создается html форма с методом POST, которая принимает две строки firstname и surname, которая отправляет данные в файл solution.php
			 (в данном случае этот файл вызываемый)
-->
	<form action="solution.php" method="POST">
		<p>Введите имя:<br>
			<input type="string" name="firstname" />
		</p>
		<p>Введите фамилию:<br>
			<input type="string" name="surname" />
		</p>
		<!-- После нажатия кнопки "Отправить" данные из формы передаются в вызываемый файл solution.php и он открывается в окне браузера с полученными данными -->
		<input type="submit" value="Отправить">
	</form>
	<p>
		<!--  Ниже приведена вставка php кода, которую интерпретирует сервер  -->
		<?php
		//Вывод сообщения в браузере будет только при условии получения обеих переменных одновременно $_POST['firstname'] и $_POST['surname']
		if (!(empty($_POST['firstname']) || empty($_POST['surname'])))
			//Если условие выполнено, то строка успешно выведется в браузере в виде html кода
			echo 'Привет, ' . $_POST['firstname'] . ' ' . $_POST['surname'];
		?>
	</p>
</body>

</html>
