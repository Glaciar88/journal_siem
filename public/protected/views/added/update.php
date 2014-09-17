<?php
/* @var $this AddedController */
/* @var $model Added */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Добавить запись', 'url'=>array('create')),
);
?>

<h1>Редактировать запись №<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>