<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Добавить пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>