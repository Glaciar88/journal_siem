<?php
/* @var $this TerminalsController */
/* @var $data Terminals */
?>

<div class="view list-terminals _flcear">
	<div class='fleft'>
		<span><b><?php echo '#' . CHtml::encode($data->id); ?></b></span>
		<span>Блок:
		<?php echo CHtml::encode($data->name); ?>
		</span>
	</div>
	<div class='fright'>
			<?php echo CHtml::link('Обновить', array('/terminals/update', 'id'=>$data->id));?>
			<?php echo CHtml::link(CHtml::encode('Удалить'), array('terminals/delete', 'id'=>$data->id),array('submit'=>array('terminals/delete', 'id'=>$data->id),'class' => 'delete','confirm'=>'Вы подтверждаете удаление?'));?>
	</div>
</div>