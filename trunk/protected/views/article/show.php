<br />
<br />
<h4><b><font color="#491f03">
<?php echo $model->title; ?>
</font></b></h4>

<?php echo $model->contentDisplay; ?>

<?php
$newses = News::model()->findAll(new CDbCriteria(array(
	'condition'=>'category=:cat',
	'params'=>array(
		':cat'=>$model->title,
	),
)));
?>

<?php foreach ($newses as $news): ?>
  <hr>
  <div class="news">
    <div class="summary">
      ●
      <?php echo $news->summary; ?>
      <?php if ($news->category != 'その他') {
        echo '→';
        echo $news->status;
       }
      ?>
    </div>
    <div class="body">
      <?php echo $news->contentDisplay; ?><br />
    </div>
  </div>
<?php endforeach; ?>
