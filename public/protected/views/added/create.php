<?php
/* @var $this AddedController */
/* @var $model Added */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список записей', 'url'=>array('index')),
);
?>

<h1>Добавить запись</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>