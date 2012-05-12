<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>は必須項目です</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'name'=>'News[date]',
				'language'=>'ja',
				'value'=>$model->date,
				'options'=>array('dateFormat'=>'yy-mm-dd'),
				'htmlOptions'=>array(),
			)
		); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textArea($model,'summary',array('rows'=>2, 'cols'=>55)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php // echo $form->textArea($model,'content',array('rows'=>15, 'cols'=>55)); ?>
		<?php $this->widget('ext.niceditor.nicEditorWidget',array(
			"model"=>$model,
			"attribute"=>'content',
		)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo CHtml::dropDownList('News[category]',$model->category, News::model()->categoryOptions); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'object'); ?>
		<?php echo CHtml::dropDownList('News[object]',$model->object,News::model()->objectOptions); ?>
		<?php echo $form->error($model,'object'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo CHtml::dropDownList('News[status]',$model->status,News::model()->statusOptions); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '作成' : '修正'); ?>
		<?php echo CHtml::submitButton('プレビュー',array('name'=>'previewNews')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php if(isset($_POST['previewNews']) && !$model->hasErrors()): ?>
<h4>プレビュー</h4>

 <hr>
  <div class="news">
    <div class="summary">
      ●
      <?php echo $model->summary; ?>
      <?php if ($model->category != 'その他') {
       echo '→';
       echo $model->status;
      }
       ?>
    </div>
    <div class="body">
      <?php echo $model->contentDisplay; ?><br />
    </div>
  </div><!-- news preview -->
<?php endif; ?>
