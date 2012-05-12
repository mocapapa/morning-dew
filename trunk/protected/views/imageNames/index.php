<?php
$i = 0;
$current = Yii::app()->params['imageHomeAbs'];

$filelist = array();
$d = dir($current);
while($tmp = $d->read()) {
  if ($tmp != '.' && $tmp != '..' && $tmp != '.svn') {
    array_push($filelist, $tmp);
  }
}
asort($filelist, SORT_STRING);
foreach($filelist as $file) {

  if (file_exists($current.$file))
    $size=getimagesize($current.$file);
  else
    $size=array(60, 60);
  
  $whtext = '';
  $bb = Yii::app()->params['imageThumbnailBoundingBox'];
  $aspect = $size[1]/$size[0];
  if ($size[0] > $bb && $size[1] <= $bb) {
    $width = $bb;
    $height = $bb * $aspect;
  } else if ($size[0] <= $bb && $size[1] > $bb) {
    $width = $bb / $aspect;
    $height = $bb;
  } else if ($size[0] > $bb && $size[1] > $bb) {
    if (1.0 <= $aspect) {
      $width = $bb / $aspect;
      $height = $bb;
    } else {
      $width = $bb;
      $height = $bb * $aspect;
    }
  }
  $url = Yii::app()->baseUrl.'/'.Yii::app()->params['imageHome'].$file;
  
  $imageArray[] = array('url'=>$url, 'width'=>(int)($width+.5), 'height'=>(int)($height+.5));
}

echo CJSON::encode(array('item'=>$imageArray));
