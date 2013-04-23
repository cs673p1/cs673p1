<?php require_once(dirname(__FILE__).'/../../extensions/States.php') ;?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'house-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'address_1',array('class'=>'span5','maxlength'=>256)); ?>

<?php echo $form->textFieldRow($model,'address_2',array('class'=>'span5','maxlength'=>256)); ?>

<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>19)); ?>

<?php echo $form->dropDownListRow($model, 'state', States::getStates(array("US"), true),
    array('prompt' => 'Select State')); ?>

<?php echo $form->textFieldRow($model,'zip_code',array('class'=>'span5')); ?>

<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<?php echo $form->dropDownListRow($model,'number_of_floor', $model->getNumberOptions(0,6), array('prompt' => '----')); ?>

<?php echo $form->dropDownListRow($model,'garage', $model->getNumberOptions(0,2), array('prompt' => '----')); ?>

<?php echo $form->dropDownListRow($model,'garden', $model->getNumberOptions(0,3), array('prompt' => '----')); ?>

<?php echo $form->dropDownListRow($model,'backdoor', $model->getNumberOptions(0,2), array('prompt' => '----')); ?>

<?php echo $form->dropDownListRow($model,'number_of_bathroom', $model->getNumberOptions(0,5), array('prompt' => '----')); ?>

<?php echo $form->dropDownListRow($model,'number_of_room',$model->getNumberOptions(0,10), array('prompt' => '----')); ?>


    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Create' : 'Save',
        )); ?>
    </div>

<?php $this->endWidget(); ?>