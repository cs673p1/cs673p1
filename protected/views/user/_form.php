<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>128)); ?>

<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>128, 'value'=>'')); ?>

<?php echo $form->passwordFieldRow($model, 'password_repeat', array('class'=>'span5','maxlength'=>128, 'value'=>'')); ?>
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>$model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>

