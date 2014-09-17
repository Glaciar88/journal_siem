<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Обновить информацию', 'url'=>array('update', 'id'=>$model->id)),
	
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
