<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	$model->name=>array('view','id'=>$model->id),
	'Сменить пароль',
);

$this->menu=array(
	//array('label'=>'Список пользователей', 'url'=>array('index')),
);
?>

<h1>Изменение пароля пользователя <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_formPass', array('model'=>$model)); ?>