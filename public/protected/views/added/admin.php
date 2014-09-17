<?php
/* @var $this AddedController */
/* @var $model Added */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список записей', 'url'=>array('index')),
	array('label'=>'Добавить запись', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#added-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление записями</h1>

<p>
Можно ввести оператор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого вашего значения поиска, чтобы указать способ осуществления сравнения.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'added-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'user_id_add',
		'date_add',
		'note',
		'date_memo',
		'number_memo',
		'block_id',
		/*
		'date_print',
		'user_id_print',
		'job_print',
		'date_instal',
		'user_id_instal',
		'job_instal',
		'date_aoi',
		'user_id_aoi',
		'job_aoi',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
