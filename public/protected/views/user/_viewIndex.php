<?php
/* @var $this UserController */
/* @var $data User */
	
	
?>
<?php if ($data->role == 'operator' || $data->role == 'administrator'){ ?>
<div class="view">
	<div class="_fclear">
		<div class="title fleft"><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></div>
		<div class="fright"><?php User::userRole($data->role);?></div>
	</div>
	<div class="jobs">Выполнил: 
		<span>Принтер - <?php Added::countJob($data->id, 1); ?></span>
		<span>Установщик - <?php Added::countJob($data->id, 2); ?></span>
		<span>АОИ - <?php Added::countJob($data->id, 3); ?></span>
	</div>	
</div>
<?php } 
else { ?>
<div class="view">
	<div class="_fclear">
		<div class="title fleft"><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></div>
		<div class="fright"><?php User::userRole($data->role);?></div>
	</div>
</div>
<?php } ?>