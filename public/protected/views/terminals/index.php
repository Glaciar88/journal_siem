<?php
/* @var $this TerminalsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Терминалы',
);

$this->menu=array(
	array('label'=>'Добавить терминал', 'url'=>array('create')),
	array('label'=>'Управление терминалами', 'url'=>array('admin')),
);
?>

<h1>Терминалы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'name',
    ),
)); ?>
