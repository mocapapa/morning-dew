<?php
$this->menu=array(
	array('label'=>'記事の一覧', 'url'=>array('index')),
	array('label'=>'記事の作成', 'url'=>array('create')),
	array('label'=>'記事の修正', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'記事の削除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'削除してよろしいですか?')),
	array('label'=>'記事の管理', 'url'=>array('admin')),
);
?>

<br/>
<br/>
<h1>記事の一覧 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sort',
		'title',
		'clickable',
		'content',
		'contentDisplay',
		'updateTime',
	),
)); ?>
