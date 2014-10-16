<?php
/* @var $this BlocksController */
/* @var $model Blocks */

$this->breadcrumbs=array(
	'Блоки'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список блоков', 'url'=>array('index')),
	array('label'=>'Добавить блок', 'url'=>array('create')),
	array('label'=>'Обновить блок', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить блок', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить этот пункт?')),
	array('label'=>'Управление списком', 'url'=>array('admin')),
);
?>

<h1>Просмотр блока #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'terminals_id',
	),
)); ?>
