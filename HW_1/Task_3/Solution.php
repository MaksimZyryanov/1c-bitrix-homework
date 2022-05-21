<?php

//Создается абстрактный класс Tree с абстрактными методами save() и new() и реализованным методом getName()
abstract class Tree
{
	abstract function save();

	abstract function new();

	function getName()
	{
		return 'строка дерева';
	}
}

//Реализуется класс-наследник Larch от абстрактного класса Tree с реализованными унаследованными абстрактными методами save() и new()
//а также с переопределенным методом getName()
class Larch extends Tree
{
	function save()
	{
		echo 'вы сохранили лиственницу!';
	}

	function new()
	{
		echo 'вы вызвали метод \'new\'!';
	}

	function getName()
	{
		return parent::getName() . ' Здорово!';
	}
}
//создается экземпляр $firstLarch класса Larch
$firstLarch = new Larch;
//вызывается метод save() класса Larch
$firstLarch->save();
//вызывается метод new() класса Larch
$firstLarch->new();
//присваивается переменной $str возвращаемое значение методе getName() класса Larch
$str = $firstLarch->getName();
//строка $str выводится в консоль/браузер
echo $str;
