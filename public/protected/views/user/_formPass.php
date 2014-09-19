<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'password_old'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->textField($model,'password_old'); ?>
			<?php echo $form->error($model,'password_old'); ?>
		</div>
	</div>

	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'password_new'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->textField($model,'password_new'); ?>
			
		</div>
	</div>
	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'password_rep'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->textField($model,'password_rep'); ?>
			<?php echo $form->error($model,'password_rep'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->