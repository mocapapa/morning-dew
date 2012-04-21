<?php 
  $app=Yii::app();
  // css
  $baseUrl=$app->request->baseUrl;
  $imageUrl=$baseUrl.'/systemImages/';
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="span-18">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-6 last">
	<div id="sidebar">
	<?php
		echo CHtml::link(CHtml::image($imageUrl.'colon-120x80.png','image4', array('id'=>'headImage4')),
			array('/article/show', 'id'=>5), array('id'=>'headImage4'));
		echo '<center>';
		echo CHtml::image($imageUrl.'holisticcare.png');
		echo '</center>';

		$this->widget('ListArticle');
		$app = Yii::app();
		// operations
		if ($app->mode == 'admin' && $app->user->name == ADMIN_USER) {
		  // 管理者がログイン中

			$this->widget('AdminCommand', array(
				'title'=>'管理者メニュー',
				'htmlOptions'=>array('style'=>'background:#eee'),
			));

			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'操作',
				'htmlOptions'=>array('style'=>'background:#eee'),
			));

			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));

			$this->endWidget();


		} else if ($app->mode == 'admin') {
		  // 一般人でもadminから入ったら管理画面へのリンクを表示
			if (Yii::app()->mode=='admin') {
				$this->widget('AdminCommand', array(
					'title'=>'管理者メニュー<br />&nbsp;&nbsp;&nbsp;(ログインが必要です)',
					'htmlOptions'=>array('style'=>'background:#eee'),
				));
			}
		}
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>