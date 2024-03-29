<?php
/*
 * Image Gallery
 * $Id: ImageController.php 124 2012-01-05 13:28:35Z sakurai@g.pugpug.org $
 */

class ImageController extends Controller {

  public $layout='//layouts/column2';
  public $defaultAction='upload';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('upload','delete'),
				'users'=>array(ADMIN_USER),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}





  public function actionUpload()
  {
    $cs=Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');

    $model=new Image;

    if(isset($_FILES['Image'])) {
      $model->image=CUploadedFile::getInstance($model,'image');

      if ($model->validate()) {
	$name = $model->image->name;
	if (file_exists(Yii::app()->params['imageHomeAbs'].$name)) {
	  // already there
	  $v = 2;
	  preg_match('/(\w+)\.(\w+)/', $name, $match);
	  do {
	    $name = $match[1].'('.$v++.').'.$match[2];
	  } while (file_exists(Yii::app()->params['imageHomeAbs'].$name));
	}
	if ($model->validate()) {
	  $model->image->saveAs(Yii::app()->params['imageHomeAbs'].$name);
	}
      }
    }
    // directory search                                                          
    $current = Yii::app()->params['imageHomeAbs'];

    $filelist = array();
    $d = dir($current);
    while($tmp = $d->read()) {
      if ($tmp != '.' && $tmp != '..' && $tmp != '.svn') {
        array_push($filelist, $tmp);
      }
    }
    asort($filelist, SORT_STRING);

    $this->render('gallery', array(
                                   'model'=>$model,
                                   'filelist'=>$filelist,
                                   'current'=>$current,
                                   'cs'=>$cs,
                                   ));

  }

  public function actionDelete() {
    if (Yii::app()->request->isPostRequest) {
      // we only allow deletion via POST request
      $name = Yii::app()->params['imageHomeAbs'].$_GET['name'];
      unlink($name);
      $this->redirect(array('upload'));
    } else {
      throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');
    }
  }

}