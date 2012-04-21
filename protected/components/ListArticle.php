<?php
Yii::import('zii.widgets.CPortlet');

class ListArticle extends CPortlet
{
	public $title=null;

	protected function renderContent()
	{
		$models=Article::model()->findAll(new CDbCriteria(array(
			'order'=>'sort',
			'condition'=>'sort > 0',
		)));
		$this->render('listArticle', array('models'=>$models));
	}
}
