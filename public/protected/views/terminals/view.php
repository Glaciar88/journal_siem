<?php
/* @var $this TerminalsController */
/* @var $model Terminals */

$this->breadcrumbs=array(
	'Терминалы'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список терминалов', 'url'=>array('index')),
	array('label'=>'Добавить терминал', 'url'=>array('create')),
	array('label'=>'Обновить терминал', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить терминал', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить этот пункт?')),
	array('label'=>'Управление списком', 'url'=>array('admin')),
);
?>

<h1>Просмотр терминала #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
