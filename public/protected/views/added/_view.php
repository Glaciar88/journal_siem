<?php
/* @var $this AddedController */
/* @var $data Added */
?>

<div class="view">

	<div class="item">
		<div class="item_info">
			<span><?php echo CHtml::encode($data->getAttributeLabel('user_id_add')); ?>: <?php echo CHtml::link(CHtml::encode($data->user->name), array('user/view', 'id'=>$data->user->id)); ?></span><span class="date_add"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy в HH:MM', $data->date_add);?></span><a href="/index.php?r=added&view=index&block_id=<?php echo CHtml::encode($data->block->id); ?>" class="fright"><span class="block_id"><?php echo CHtml::encode($data->block->name); ?></span></a>
			<?php if (Yii::app()->user->role == 'operator' || Yii::app()->user->role == 'administrator') { ?><span class="edit"><?php echo CHtml::link(CHtml::encode($data->getAttributeLabel('Редактировать'), $data->id), array('update', 'id'=>$data->id)); ?></span>
			<?php } ?>
			<span class="edit"><?php echo CHtml::link(CHtml::encode($data->getAttributeLabel('Подробнее'), $data->id), array('view', 'id'=>$data->id)); ?></span>
		</div>
		<div class="_fclear">
			<div class="number">№ <?php echo CHtml::encode($data->number_memo); ?></div>
			<div class="date_note">Дата: <?php echo Yii::app()->dateFormatter->format('d.MM.yyyy', $data->date_memo);?></div>
		</div>
		<div class="note">
			<?php echo CHtml::encode($data->note); ?>
		</div>
		<div class="_fclear footer_note">
			<div class="lal">
				<div class="title">Принтер</div>
				<?php switch ($data->job_print) {
					case 0: 
						echo '<div>Cтатус: <span class="none">Не требуется</span></div>';
					break;
					case 1:
						echo '<div>Cтатус: <span class="false">Не сделано</span></div>';
					break;
					case 2: 
						echo '<div>Cтатус: <span class="true">Сделано</span></div>
						<div>Выпонил: '; ?>
						<?php echo CHtml::link(CHtml::encode($data->user_print->name), array('user/view', 'id'=>$data->user_print->id)); ?>
						<?php echo '</div>
						<div class="date_job">Дата: ';?>
						<?php echo Yii::app()->dateFormatter->format("d.MM.yyyy", $data->date_print);?>
						<?php echo '</div>';
					break;
					 default:
						echo "Ошибка. Неправильное значение.";
				} ?>
				
			</div>
			<div class="lal">
				<div class="title">Установщик</div>
				<?php switch ($data->job_instal) {
					case 0: 
						echo '<div>Cтатус: <span class="none">Не требуется</span></div>';
					break;
					case 1:
						echo '<div>Cтатус: <span class="false">Не сделано</span></div>';
					break;
					case 2: 
						echo '<div>Cтатус: <span class="true">Сделано</span></div>
						<div>Выпонил: '; ?>
						<?php echo CHtml::link(CHtml::encode($data->user_instal->name), array('user/view', 'id'=>$data->user_instal->id)); ?>
						<?php echo '</div>
						<div class="date_job">Дата: ';?>
						<?php echo Yii::app()->dateFormatter->format("d.MM.yyyy", $data->date_instal);?>
						<?php echo '</div>';
					break;
					 default:
						echo "Ошибка. Неправильное значение.";
				} ?>
			</div>
			<div class="lal">
				<div class="title">АОИ</div>
				<?php switch ($data->job_aoi) {
					case 0: 
						echo '<div>Cтатус: <span class="none">Не требуется</span></div>';
					break;
					case 1:
						echo '<div>Cтатус: <span class="false">Не сделано</span></div>';
					break;
					case 2: 
						echo '<div>Cтатус: <span class="true">Сделано</span></div>
						<div>Выпонил: '; ?>
						<?php echo CHtml::link(CHtml::encode($data->user_aoi->name), array('user/view', 'id'=>$data->user_aoi->id)); ?>
						<?php echo '</div>
						<div class="date_job">Дата: ';?>
						<?php echo Yii::app()->dateFormatter->format("d.MM.yyyy", $data->date_aoi);?>
						<?php echo '</div>';
					break;
					 default:
						echo "Ошибка. Неправильное значение.";
				} ?>
			</div>
		</div>
	</div>

	
	<br />
</div>