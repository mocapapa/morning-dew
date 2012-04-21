<?php
$this->menu=array(
	array('label'=>'ニュースの新規作成', 'url'=>array('create')),
	array('label'=>'ニュースの管理', 'url'=>array('admin')),
);
?>

<?php
$app=Yii::app();
$baseUrl=$app->request->baseUrl;
?>

<br />
<div>
<br />
<br />
<br />
<?php echo CHtml::image($baseUrl.'/systemImages/greeting.png'); ?>

<!-- <font style="font-size:15px;" color="#491f03"> -->

<br />
</font>
</div>
<br />
<center>
<?php echo CHtml::image($baseUrl.'/systemImages/479-1.png','', array('border'=>'0'));?>
</center>

<h4><b><font color="#491f03">
News
</font></b></h4>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'template'=>'{items}{pager}',
	'itemView'=>'_view',
)); ?>
