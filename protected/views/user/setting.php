
<h1>Welcome <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'name',
        'email',
        'id',

    ),
)); ?>

<div><h3><?php echo CHtml::link('Update User', array('user/update','id'=>Yii::app()->user->getId())); ?></h3></div>
<div><h3><?php echo CHtml::link('View My Houses', array('user/view','id'=>Yii::app()->user->getId())); ?></h3></div>
