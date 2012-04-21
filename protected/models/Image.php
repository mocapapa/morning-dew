<?php
  /*
   * Image model
   * $Id: Image.php 48 2011-11-24 08:33:17Z sakurai@g.pugpug.org $
   */
class Image extends CFormModel
{
  public $image;
 
  public function rules()
  {
    return array(
		 array('image', 'file', 'types'=>'jpg, gif, png',
		       'maxSize'=>Yii::app()->params['maxImageSize'],
		       ),
		 );
  }
}
