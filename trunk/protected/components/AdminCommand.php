<?php
  // Yii::import('zii.widgets.CPortlet');

class AdminCommand extends CPortlet
{
	public $title=null;

	protected function renderContent()
	{
		$this->render('adminCommand');
	}
}
