<?php
/* @var $this BlocksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Блоки',
);

$this->menu=array(
	array('label'=>'Добавить блок', 'url'=>array('create')),
	array('label'=>'Управление блоками', 'url'=>array('admin')),
);
?>

<h1>Блоки</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
        'name',
    ),
)); ?>
