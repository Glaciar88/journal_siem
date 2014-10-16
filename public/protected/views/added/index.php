<?php
/* @var $this AddedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Записи',
);

if(Yii::app()->user->role == 'administrator'){
	$this->menu=array(
		array('label'=>'Добавить запись', 'url'=>array('create')),
		array('label'=>'Управление записями', 'url'=>array('admin')),
	);
}

if(Yii::app()->user->role == 'operator'){
	$this->menu=array(
		array('label'=>'Добавить запись', 'url'=>array('create')),
	);
}

?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'date_add',
    ),
)); ?>
