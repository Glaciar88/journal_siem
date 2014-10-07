<?php
/* @var $this TerminalsController */
/* @var $model Terminals */

$this->breadcrumbs=array(
	'Терминалы'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список терминалов', 'url'=>array('index')),
	array('label'=>'Управление терминалами', 'url'=>array('admin')),
);
?>

<h1>Создать пункт меню Терминалы</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>