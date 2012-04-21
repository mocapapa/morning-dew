<?php
$this->menu=array(
	array('label'=>'記事の一覧', 'url'=>array('index')),
	array('label'=>'記事の新規作成', 'url'=>array('create')),
	array('label'=>'記事の表示', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'記事の管理', 'url'=>array('admin')),
);
?>

<br />
<br />
<h1>記事の修正 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>