<ul>
<?php
foreach ($models as $model)
{
	if ($model->mod == 2) {
	  // 子アイテム
		echo '<li>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '&nbsp;&nbsp;&nbsp;';
	} else if ($model->mod == 0) {
	  // 祖父母アイテム
		echo '<hr>';
		echo '<br />';
		echo '<li style="margin-bottom:1.5px;padding-bottom:0.5px;">';
		echo '&nbsp;&nbsp;&nbsp;';
		echo '<b><font style="font-size:16px;color:#c16847;">';
	} else if ($model->mod == 1) {
	  // 親アイテム
		echo '<li style="margin-bottom:1.5px;padding-bottom:0.5px;">';
		echo '&nbsp;&nbsp;&nbsp;';
		echo CHtml::image('systemImages/icon-leaf.png', 'leaf', array('style'=>'vertical-align:middle;'));
		echo '<b><font style="font-size:13px;">';
	}

	if ($model->clickable == 1) {
		echo CHtml::link($model->title, array('article/show', 'id'=>$model->id));
	} else {
		echo $model->title;
	}
	echo "</li>";

	if ($model->sort % 100 == 0)
	{
	    echo '</font></b>';
	}
	echo "\n";
}
?>
</ul>
