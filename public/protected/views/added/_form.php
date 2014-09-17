<?php
/* @var $this AddedController */
/* @var $model Added */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'added-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля помеченные <span class="required">*</span> являются обязательными.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="_fclear">
		<div class="row number_memo">
			<?php echo $form->labelEx($model,'number_memo',array('label'=>'№ служебной записки')); ?>
			<?php echo $form->textField($model,'number_memo'); ?>
			<?php echo $form->error($model,'number_memo'); ?>
		</div>
		
		<div class="row date_memo">
			<?php echo $form->labelEx($model,'date_memo',array('label'=>'Дата служебной записки')); ?>
			<?php echo CHtml::activeDateField($model, 'date_memo');?>
			<?php echo $form->error($model,'date_memo'); ?>
		</div>
	</div>
	<div class="row block_id">
		<?php echo $form->labelEx($model,'block_id',array('label'=>'Печатная плата')); ?>
		<?php echo $form->dropDownList($model, 'block_id', CHtml::listData(Blocks::model()->findAll(), 'id', 'name'), array('empty' => '(Выберите из списка)')); ?>
		<?php echo $form->error($model,'block_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->textArea($model,'note'); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>
	
	<div class="mtitle">Принтер MY500</div>
	<div class="mash_item _fclear">
		<div class="row col">
			<?php echo $form->labelEx($model,'job_print',array('label'=>'Статус:')); ?></br>
			<?php echo CHtml::activeRadioButtonList($model, 'job_print', array (0=>'Не требуется', 1=>'Не сделано', 2=>'Сделано'), array ('onclick' => 'togglePrint(this)')); ?>
			<?php echo $form->error($model,'job_print'); ?>
		</div>
		<div class="row col">
			<?php echo $form->labelEx($model,'date_print',array('label'=>'Дата выполнения')); ?>
			<?php echo CHtml::activeDateField($model, 'date_print');?>
			<?php echo $form->error($model,'date_print'); ?>
		</div>

		<div class="row col">
			<?php echo $form->labelEx($model,'user_id_print',array('label'=>'Выполнил')); ?>
			<?php echo $form->dropDownList($model, 'user_id_print', CHtml::listData(User::model()->findAll(), 'id', 'name'), array('empty' => '(Выберите из списка)')); ?>
			<?php echo $form->error($model,'user_id_print'); ?>
		</div>
	</div>
	
	<div class="mtitle">Установщик MY100</div>	
	<div class="mash_item _fclear">
		<div class="row col">
			<?php echo $form->labelEx($model,'job_instal',array('label'=>'Статус:')); ?></br>
			<?php echo CHtml::activeRadioButtonList($model, 'job_instal', array (0=>'Не требуется', 1=>'Не сделано', 2=>'Сделано'), array ('onclick' => 'togglePrint(this)')); ?>
			<?php echo $form->error($model,'job_instal'); ?>
		</div>
		<div class="row col">
			<?php echo $form->labelEx($model,'date_instal',array('label'=>'Дата выполнения')); ?>
			<?php echo CHtml::activeDateField($model, 'date_instal');?>
			<?php echo $form->error($model,'date_instal'); ?>
		</div>
		<div class="row col">
			<?php echo $form->labelEx($model,'user_id_instal',array('label'=>'Выполнил')); ?>
			<?php echo $form->dropDownList($model, 'user_id_instal', CHtml::listData(User::model()->findAll(), 'id', 'name'), array('empty' => '(Выберите из списка)')); ?>
			<?php echo $form->error($model,'user_id_instal'); ?>
		</div>
	</div>	
	
	<div class="mtitle">АОИ YesTech</div>
	<div class="mash_item _fclear">
		<div class="row col">
			<?php echo $form->labelEx($model,'job_aoi',array('label'=>'Статус:')); ?></br>
			<?php echo CHtml::activeRadioButtonList($model, 'job_aoi', array (0=>'Не требуется', 1=>'Не сделано', 2=>'Сделано'), array ('onclick' => 'togglePrint(this)')); ?>
			<?php echo $form->error($model,'job_aoi'); ?>
		</div>
		<div class="row col">
			<?php echo $form->labelEx($model,'date_aoi',array('label'=>'Дата выполнения')); ?>
			<?php echo CHtml::activeDateField($model, 'date_aoi');?>
			<?php echo $form->error($model,'date_aoi'); ?>
		</div>

		<div class="row col">
			<?php echo $form->labelEx($model,'user_id_aoi',array('label'=>'Выполнил')); ?>
			<?php echo $form->dropDownList($model, 'user_id_aoi', CHtml::listData(User::model()->findAll(), 'id', 'name'), array('empty' => '(Выберите из списка)')); ?>
			<?php echo $form->error($model,'user_id_aoi'); ?>
		</div>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
