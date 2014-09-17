<?php
/* @var $this AddedController */
/* @var $model Added */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id_add'); ?>
		<?php echo $form->textField($model,'user_id_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_add'); ?>
		<?php echo $form->textField($model,'date_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_memo'); ?>
		<?php echo $form->textField($model,'date_memo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_memo'); ?>
		<?php echo $form->textField($model,'number_memo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_print'); ?>
		<?php echo $form->textField($model,'date_print'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id_print'); ?>
		<?php echo $form->textField($model,'user_id_print'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job_print'); ?>
		<?php echo $form->textField($model,'job_print'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_instal'); ?>
		<?php echo $form->textField($model,'date_instal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id_instal'); ?>
		<?php echo $form->textField($model,'user_id_instal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job_instal'); ?>
		<?php echo $form->textField($model,'job_instal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_aoi'); ?>
		<?php echo $form->textField($model,'date_aoi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id_aoi'); ?>
		<?php echo $form->textField($model,'user_id_aoi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'job_aoi'); ?>
		<?php echo $form->textField($model,'job_aoi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block_id'); ?>
		<?php echo $form->textField($model,'block_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Найти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->