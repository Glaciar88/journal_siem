<?php
/* @var $this BlocksController */
/* @var $model Blocks */

$this->breadcrumbs=array(
	'Блоки'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список блоков', 'url'=>array('index')),
	array('label'=>'Управление блоками', 'url'=>array('admin')),
);
?>

<h1>Создать пункт меню Блоки</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>