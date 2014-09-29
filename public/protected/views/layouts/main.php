<?php /* @var $this Controller */ ?>
<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//RU" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="ru" />
	<?php //Time Zone
date_default_timezone_set("Europe/Moscow");?>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/script.js"></script>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div id="mainmenu">
		<div class="level _fclear">
			<div class="menu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Главная', 'url'=>array('/site/index')),
						array('label'=>'Записи', 'url'=>array('/added', 'view'=>'index')),
						array('label'=>'О сервисе', 'url'=>array('/site/page', 'view'=>'about')),
					),
				));
				?>
			</div>
			<div class="profile">
				<ul id="prof_menu">
					<?php if (Yii::app()->user->id) {
						echo "<li>Вы вошли как "; echo Yii::app()->user->name.''; echo "<ul><li>"; echo CHtml::link('Сменить пароль', array('user/update', 'id'=>Yii::app()->user->id)); echo "</li>"; ?>
						<?php if (Yii::app()->user->role == 'administrator') {echo "<li>"; echo CHtml::link('Пользователи', array('user/index')); echo "</li>";} ?>  
						<?php echo "<li>"; echo CHtml::link('Выйти', array('/site/logout'));  echo "</li></ul>"; 
						}
						else {
							echo "<li>";  echo CHtml::link('Войти', array('/site/login')); echo "</li>"; 
							
							}?>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- mainmenu -->
	<div class="_fclear level">
		<div class="left">
			
		</div>
		<div class="right">
			<div class="_fclear">
				<div class="fleft">	
					<?php if(isset($this->breadcrumbs)):?>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'homeLink'=>CHtml::link('Главная','/index'),
						'separator'=>' &rarr; ',
						'links'=>$this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
					<?php endif?>
				</div>
				<div class="fright">
					<?php
						$this->beginWidget('zii.widgets.CPortlet', array(
						));
						$this->widget('zii.widgets.CMenu', array(
							'items'=>$this->menu,
							'htmlOptions'=>array(),
						));
						$this->endWidget();
					?>
				</div>
			</div>
			<?php echo $content; ?>
		</div>
		
	</div>
	<!-- <div id="header">
		<div id="logo"><?php/* echo CHtml::encode(Yii::app()->name); */ ?></div>
	</div>header -->

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Андрей Яндукин.<br/>
		Все права защищены.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>