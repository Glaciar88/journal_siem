<?php
/* @var $this BlocksController */
/* @var $model Blocks */

$this->breadcrumbs=array(
	'Блоки'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список блоков', 'url'=>array('index')),
	array('label'=>'Добавить блок', 'url'=>array('create')),
	array('label'=>'Управление блоками', 'url'=>array('admin')),
);
?>

<h1>Обновление блока №<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>