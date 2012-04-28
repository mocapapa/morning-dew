<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<?php $app=Yii::app(); ?>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo $app->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $app->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $app->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo $app->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $app->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="container" id="page">

<?php
// css
$baseUrl=$app->request->baseUrl;
$imageUrl=$baseUrl.'/systemImages/';
?>
	<div id="header" style="line-height:0px;">
<?php echo CHtml::link(CHtml::image($imageUrl.'morning-dew-title-dark.png','', array('id'=>'titleImage')),preg_replace('/(admin|index)\.php/', '', $this->createUrl('/')), array('id'=>'titleImage')); ?>
<?php echo CHtml::link(CHtml::image($imageUrl.'icon1.png','image1',array('id'=>'headImage1')),array('/article/show', 'id'=>2), array('id'=>'headImage1')); ?>
<?php echo CHtml::link(CHtml::image($imageUrl.'icon2.png','image2',array('id'=>'headImage2')),array('/article/show', 'id'=>3), array('id'=>'headImage2')); ?>
<?php echo CHtml::link(CHtml::image($imageUrl.'icon3.png','image3',array('id'=>'headImage3')),array('/article/show', 'id'=>4), array('id'=>'headImage3')); ?>
<?php echo CHtml::link(CHtml::image($imageUrl.'icon4.png','image4',array('id'=>'headImage4')),array('/article/show', 'id'=>5), array('id'=>'headImage4')); ?>

	</div><!-- header -->

  <hr>
	<div id="mainmenu">
  <div style="font-size:1.2em; color:#666;">

|
  <?php echo CHtml::link('Home', preg_replace('/(admin|index)\.php/', '', $this->createUrl('/'))); ?>
 |
  <?php echo CHtml::link('About', $this->createUrl('site/about')); ?>
 |
  <?php echo CHtml::link('Blog', 'http://ameblo.jp/morning-dew-cococara/', array(
										'target'=>'_blank'));?>
 |
  <?php echo CHtml::link('Contact', $this->createUrl('site/contact')); ?>
 |
    </div>

	</div><!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Morning Dew.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
		/ <?php echo CHtml::link('admin', $app->request->baseUrl.'/admin.php'); ?>
		<?php if ($app->mode=='admin') printf(", rendered in %.2f[msec]&nbsp;", $app->timer->getTimer());
?>
	</div><!-- footer -->

</div><!-- page -->

<script type="text/javascript">
  var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-28885777-1']);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

</body>
</html>
