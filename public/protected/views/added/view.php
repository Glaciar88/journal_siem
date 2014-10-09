<?php
/* @var $this AddedController */
/* @var $model Added */

$this->breadcrumbs=array(
	'Записи'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Добавить запись', 'url'=>array('create')),
	
);
?>

<h1>Просмотр записи №<?php echo $model->id; ?></h1>

<?php/* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id_add',
		'date_add',
		'note',
		'date_memo',
		'number_memo',
		'date_print',
		'user_id_print',
		'job_print',
		'date_instal',
		'user_id_instal',
		'job_instal',
		'date_aoi',
		'user_id_aoi',
		'job_aoi',
		'block_id',
	),
)); */?>
		<div class="view">
			<div class="item">
				<div class="item_info">
					<span><?php echo CHtml::encode($model->getAttributeLabel('user_id_add')); ?>: <?php echo CHtml::link(CHtml::encode($model->user->name), array('user/view', 'id'=>$model->user->id)); ?></span><span class="date_add"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy в HH:MM', $model->date_add);?></span><a href="/index.php?r=added&view=index&block_id=<?php echo CHtml::encode($model->block->id); ?>" class="fright"><span class="block_id"><?php echo CHtml::encode($model->block->name); ?></span></a><span class="edit"><?php echo CHtml::link(CHtml::encode($model->getAttributeLabel('Редактировать'), $model->id), array('update', 'id'=>$model->id)); ?></span><span class="edit"><?php echo CHtml::link(CHtml::encode($model->getAttributeLabel('Копировать'), $model->id), array('create', 'id'=>$model->id)); ?></span>
				</div>
				<div class="_fclear">
					<div class="number">№ <?php echo CHtml::encode($model->number_memo); ?></div>
					<div class="date_note">Дата: <?php echo Yii::app()->dateFormatter->format('d.MM.yyyy', $model->date_memo);?></div>
				</div>
				<div class="note">
					<?php echo CHtml::encode($model->note); ?>
				</div>
				<div class="_fclear footer_note">
					<div class="lal">
						<div class="title">Принтер</div>
						<?php switch ($model->job_print) {
							case 0: 
								echo '<div>Cтатус: <span class="none">Не требуется</span></div>';
							break;
							case 1:
								echo '<div>Cтатус: <span class="false">Не сделано</span></div>';
							break;
							case 2: 
								echo '<div>Cтатус: <span class="true">Сделано</span></div>
								<div>Выпонил: '; ?>
								<?php echo CHtml::link(CHtml::encode($model->user_print->name), array('user/view', 'id'=>$model->user_print->id)); ?>
								<?php echo '</div>
								<div class="date_job">Дата: ';?>
								<?php echo Yii::app()->dateFormatter->format("d.MM.yyyy", $model->date_print);?>
								<?php echo '</div>';
							break;
							 default:
								echo "Ошибка. Неправильное значение.";
						} ?>
						
					</div>
					<div class="lal">
						<div class="title">Установщик</div>
						<?php switch ($model->job_instal) {
							case 0: 
								echo '<div>Cтатус: <span class="none">Не требуется</span></div>';
							break;
							case 1:
								echo '<div>Cтатус: <span class="false">Не сделано</span></div>';
							break;
							case 2: 
								echo '<div>Cтатус: <span class="true">Сделано</span></div>
								<div>Выпонил: '; ?>
								<?php echo CHtml::link(CHtml::encode($model->user_instal->name), array('user/view', 'id'=>$model->user_instal->id)); ?>
								<?php echo '</div>
								<div class="date_job">Дата: ';?>
								<?php echo Yii::app()->dateFormatter->format("d.MM.yyyy", $model->date_instal);?>
								<?php echo '</div>';
							break;
							 default:
								echo "Ошибка. Неправильное значение.";
						} ?>
					</div>
					<div class="lal">
						<div class="title">АОИ</div>
						<?php switch ($model->job_aoi) {
							case 0: 
								echo '<div>Cтатус: <span class="none">Не требуется</span></div>';
							break;
							case 1:
								echo '<div>Cтатус: <span class="false">Не сделано</span></div>';
							break;
							case 2: 
								echo '<div>Cтатус: <span class="true">Сделано</span></div>
								<div>Выпонил: '; ?>
								<?php echo CHtml::link(CHtml::encode($model->user_aoi->name), array('user/view', 'id'=>$model->user_aoi->id)); ?>
								<?php echo '</div>
								<div class="date_job">Дата: ';?>
								<?php echo Yii::app()->dateFormatter->format("d.MM.yyyy", $model->date_aoi);?>
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
