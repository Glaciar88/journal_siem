<?php
/* @var $this TerminalsController */
/* @var $model Terminals */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'terminals-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'name'); ?>
		</div>
		<div class="user_form_right">	
			<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->