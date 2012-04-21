<?php
$this->menu=array(
	array('label'=>'記事の一覧', 'url'=>array('index')),
	array('label'=>'記事の管理', 'url'=>array('admin')),
);
?>

<br/>
<br/>
<h1>記事の新規作成</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>