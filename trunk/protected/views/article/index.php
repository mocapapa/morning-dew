<?php
$this->menu=array(
	array('label'=>'記事の新規作成', 'url'=>array('create')),
	array('label'=>'記事の管理', 'url'=>array('admin')),
);
?>

<br/>
<br/>
<h1>記事の一覧</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
