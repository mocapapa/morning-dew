<?php $article=Article::model()->find(new CDbCriteria(array(
		'condition'=>'title=:title',
		'params'=>array(
			':title'=>$model->category,
				)
		 ))
	);
?>
<br />
<br />
<h4><b><font color="#491f03">
    <?php echo $article->title; ?>
</font></b></h4>

<?php echo $article->contentDisplay; ?>

<hr>

<div class="news">
  <div class="summary">
    ●
    <?php echo $model->summary; ?>
    <?php if ($model->category != 'その他') {
     echo '→';
     echo $model->status;
    }
    ?>
  </div>
  <div class="body">
    <?php echo $model->contentDisplay; ?>
  </div>
</div>
