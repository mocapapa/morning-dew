<?php
$this->menu=array(
	array('label'=>'ニュースの一覧', 'url'=>array('index')),
	array('label'=>'ニュースの管理', 'url'=>array('admin')),
);
?>

<br/>
<br/>
<h1>ニュースの新規作成</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>