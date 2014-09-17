<?php
/* @var $this AddedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Записи',
);

$this->menu=array(
	array('label'=>'Добавить запись', 'url'=>array('create')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'date_add',
    ),
)); ?>
