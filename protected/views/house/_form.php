<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'house-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'address_1',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'address_2',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>19)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'zip_code',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
