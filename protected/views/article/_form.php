<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clickable'); ?>
		<?php echo $form->checkBox($model,'clickable'); ?>
		<?php echo $form->error($model,'clickable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>1, 'cols'=>55)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::submitButton('プレビュー',array('name'=>'previewArticle')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php if(isset($_POST['previewArticle']) && !$model->hasErrors()): ?>
<h4>プレビュー</h4>

 <hr>
  <div class="article">
    <div class="summary">
      ●
      <?php echo $model->title; ?>
    </div>
    <div class="body">
      <?php echo $model->contentDisplay; ?><br />
    </div>
  </div><!-- article preview -->
<?php endif; ?>
