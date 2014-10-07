<?php
/* @var $this BlocksController */
/* @var $model Blocks */

$this->breadcrumbs=array(
	'Блоки'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список блоков', 'url'=>array('index')),
	array('label'=>'Добавить блок', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#blocks-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление блоками</h1>

<p>
Можно вводить оператор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого вашего значения поиска, чтобы указать способ осуществления сравнения.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'blocks-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'terminals_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
