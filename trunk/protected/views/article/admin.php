<?php
$this->menu=array(
	array('label'=>'記事一覧', 'url'=>array('index')),
	array('label'=>'記事の新規作成', 'url'=>array('create')),
);

?>

<br/>
<br/>
<h2>記事の管理</h2>

<?php echo CHtml::link('→ニュースの管理へ', array('/news/admin')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
        'enableSorting'=>false,
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'sort',
		'clickable',
		'title',
		'content',
		'updateTime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
