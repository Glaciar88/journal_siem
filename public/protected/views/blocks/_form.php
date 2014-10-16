<?php
/* @var $this BlocksController */
/* @var $model Blocks */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blocks-form',
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
			<?php echo $form->labelEx($model,'name'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="row _fclear">
		<div class="user_form_left">
			<?php echo $form->labelEx($model,'terminals_id'); ?>
		</div>
		<div class="user_form_right">
			<?php echo $form->dropDownList($model, 'terminals_id', CHtml::listData(Terminals::model()->findAll(), 'id', 'name'), array('empty' => '(Выберите из списка)')); ?>
			<?php echo $form->error($model,'terminals_id'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->