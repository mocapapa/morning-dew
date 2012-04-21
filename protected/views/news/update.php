<?php
$this->menu=array(
	array('label'=>'ニュースの一覧', 'url'=>array('index')),
	array('label'=>'ニュースの新規作成', 'url'=>array('create')),
	array('label'=>'ニュースの表示', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'ニュースの管理', 'url'=>array('admin')),
);
?>

<br/>
<br/>
<h1>ニュースの修正 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>