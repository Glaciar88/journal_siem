<?php
/* @var $this TerminalsController */
/* @var $model Terminals */

$this->breadcrumbs=array(
	'Терминалы'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновление',
);

$this->menu=array(
	array('label'=>'Список терминалов', 'url'=>array('index')),
	array('label'=>'Добавить терминал', 'url'=>array('create')),
	array('label'=>'Управление терминалами', 'url'=>array('admin')),
);
?>

<h1>Обновление терминала №<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>