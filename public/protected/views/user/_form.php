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

	<p class="note">Поля помеченные <span class="required">*</span> являются обязательными.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'username'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'name'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'password'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->