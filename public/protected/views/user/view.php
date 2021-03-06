<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->name,
);
if (Yii::app()->user->role == 'administrator') {
	$this->menu=array(
		array('label'=>'Список пользователей', 'url'=>array('index')),
		array('label'=>'Сменить пароль', 'url'=>array('update', 'id'=>$model->id)),
	);
} else {
	$this->menu=array(
		array('label'=>'Список пользователей', 'url'=>array('index')),
	);
}
?>
<div class="listJob">
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
	<?php if ($model->role == 'administrator' || $model->role == 'operator') { ?>
		<h2>Последние выполненые работы</h2>
		<div class="title">Принтер</div>
		<?php Added::listJob($model->id, 1) ?>
		<div class="title">Установщик</div>
		<?php Added::listJob($model->id, 2) ?>
		<div class="title">АОИ</div>
		<?php Added::listJob($model->id, 3) ?>
	<?php } 
		else {
			echo "<div class='warningUser'>Пользователь имеет доступ к ресурсу только  для просмотра.</div>";
		} ?>
</div>
 