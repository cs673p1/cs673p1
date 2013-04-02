<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'house-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'address_1',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'address_2',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>19)); ?>

	<?php echo $form->textFieldRow($model,'state',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'zip_code',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'number_of_floor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'garage',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'garden',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'backdoor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'number_of_bathroom',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'number_of_room',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
