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
  
  $imageArray[] = array('url'=>$url, $whtext=>$bb);
}

echo CJSON::encode(array('item'=>$imageArray));
