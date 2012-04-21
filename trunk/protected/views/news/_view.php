<div class="view">
<?php
   $date = date('Y年n月j日', strtotime($data->date));
?>
	●<?php echo $date.'&nbsp;'. CHtml::link(CHtml::encode($data->summary), array('news/view','id'=>$data->id)); ?>
        <?php
	if ($data->category != 'その他') {
	  echo '→';
	  echo CHtml::encode($data->status);
	}
        ?>

</div>