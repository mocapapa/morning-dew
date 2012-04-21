<?php
$this->menu=array(
	array('label'=>'ニュースの表示', 'url'=>array('index')),
	array('label'=>'ニュースの新規作成', 'url'=>array('create')),
);
?>

<br/>
<br/>
<h2>ニュースの管理</h2>

<?php echo CHtml::link('→記事の管理へ', array('/article/admin')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'enableSorting'=>false,
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'date',
		'summary',
		'content',
		'category',
		'object',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

