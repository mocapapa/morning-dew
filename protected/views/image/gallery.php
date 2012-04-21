<br />
<br />
<h2>画像の管理</h2>

<div class="form">
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::errorSummary($model); ?>
<?php echo CHtml::activeFileField($model, 'image'); ?>
<br>
<?php echo CHtml::submitButton('Upload', array('name'=>'submitPost')); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<br>
<?php

//$criteria=new CDbCriteria;
//$pages=new CPagination(count($filelist));
//$pages->pageSize=Yii::app()->params['imagesPerPage'];
//$pages->applyLimit($criteria);

$i = 0;
?>

<table class="dataGrid" style="border-top:solid 1px;border-left:solid 1px;">
  <tr>
    <th style="background:#eee;text-align:center;border-right:solid 1px;border-bottom:solid 1px;"><?php echo '画像縮小表示'; ?></th>
    <th style="background:#eee;text-align:center;border-right:solid 1px;border-bottom:solid 1px;"><?php echo 'ファイル名'; ?></th>
    <th style="background:#eee;text-align:center;border-right:solid 1px;border-bottom:solid 1px;"><?php echo '作成日時'; ?></th>
    <th style="background:#eee;text-align:center;border-right:solid 1px;border-bottom:solid 1px;"><?php echo '削除'; ?></th>
  </tr>
<?php foreach($filelist as $file): ?>
<?php
// BB process
if (file_exists($current.$file))
  $size=getimagesize($current.$file);
else
  $size=array(100, 100);

$whtext = '';
$bb = Yii::app()->params['imageThumbnailBoundingBox'];
if ($size[0] > $bb && $size[1] <= $bb)
  $whtext = 'width';
else if ($size[0] <= $bb && $size[1] > $bb)
  $whtext = 'height';
else if ($size[0] > $bb && $size[1] > $bb)
  if (1.0 <= $size[1]/$size[0])
    $whtext = 'height';
  else
    $whtext = 'width';

$url = Yii::app()->baseUrl.'/'.Yii::app()->params['imageHome'].$file;

// Copy&Paste preparation
$id = CHtml::ID_PREFIX.CHtml::$count;
$handler = '$.clipboardReady(function(){ $.clipboard( "*[]('.$file.')" ); return false; }, { swfpath: PARAMS.BASEURL+"/js/jquery.clipboard-2.0.1/jquery.clipboard.swf" });';
$cs->registerScript('Yii.CHtml.#'.$id,"jQuery('#$id').click(function(){ $handler });");
CHtml::$count++;
?>
  <tr class="<?php echo $i++%2?'even':'odd';?>">
    <td style="border-right:solid 1px;border-bottom:solid 1px;"><?php echo CHtml::link(CHtml::image($url, 'image', array($whtext=>$bb)), $url, array('class'=>'highslide')); ?></td>
    <td style="border-right:solid 1px;border-bottom:solid 1px;"><?php echo CHtml::tag('a', array('id'=>$id), CHtml::encode($file)); ?>
    <td style="border-right:solid 1px;border-bottom:solid 1px;"><?php echo date('F j, Y', filectime($current.$file)); ?></td>
    <td style="border-right:solid 1px;border-bottom:solid 1px;"><?php echo CHtml::linkButton('Delete',array(
						    'submit'=>array('image/delete','name'=>$file),
						    'confirm'=>"Are you sure to delete this image?",
						    )); ?></td>
  </tr>
<?php endforeach; ?>
</table>

<br/>
<?php //$this->widget('CLinkPager',array('pages'=>$pages)); ?>
