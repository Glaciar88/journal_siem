<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	
);
?>

<h1>Просмотр пользователя №<?php echo $model->id; ?></h1>

<?php/* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'surname',
		'name',
		'password',
	),
)); */?>

<?php echo CHtml::encode($model->getAttributeLabel('username')); ?>: <?php echo CHtml::encode($model->username); ?><br />
<?php echo CHtml::encode($model->getAttributeLabel('name')); ?>: <?php echo CHtml::encode($model->name); ?>
	<br />
<h2>Последние выполненые работы</h2>
<div class="title">Принтер</div>
<?php Added::listJob($model->id, 1) ?>

<div class="title">Установщик</div>

<div class="title">АОИ</div>
 