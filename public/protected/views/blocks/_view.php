<?php
/* @var $this BlocksController */
/* @var $data Blocks */
?>

<div class="view list-blocks _flcear">

	<div class='fleft'>
		<span><b><?php echo '#' . CHtml::encode($data->id); ?></b></span>
		<span>Блок:
		<?php echo CHtml::encode($data->name); ?>
		</span>
		<span class="term">Терминал: <?php echo Blocks::terminalName($data->terminals_id); ?></span>
	</div>
	<div class='fright'>
			<?php echo CHtml::link('Обновить', array('/blocks/update', 'id'=>$data->id));?>
			<?php echo CHtml::link(CHtml::encode('Удалить'), array('blocks/delete', 'id'=>$data->id),array('submit'=>array('blocks/delete', 'id'=>$data->id),'class' => 'delete','confirm'=>'Вы подтверждаете удаление?'));?>
	</div>
</div>