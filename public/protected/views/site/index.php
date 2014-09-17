<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Добро пожалоловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div class="warning _fclear">
	<div class="fleft"><img src="images/warning.png" /></div>
	<div class="fleft"><span>Чтобы начать пользоваться журналом, необходимо <?php if (Yii::app()->user->id) {echo "авторизироваться"; }
	else {?><?php echo CHtml::link('авторизироваться', array('/site/login')); }?>.</span></div>
</div>
<div class="help _fclear">
	<div class="fleft"><img src="images/vlc.png" /></div>
	<div class="fleft"><span>Для большего понимания посетите <?php echo CHtml::link('руководство пользователя', array('/site/page', 'view'=>'about')); ?>.</span></div>
</div>

