<div class="span3">
    <div class="sidebar-nav affix">
        <ul class="nav nav-list">
            <li class="nav-header">Contact Me</li>
            <li><a href="mailto:<?php echo $model->user->email; ?>">Email Me</a> </li>
            <?php if($model->user->id==Yii::app()->user->getId()) : ?>
                <li class="nav-header">House</li>
                <li><?php echo CHtml::link('Post house', array('house/create')); ?></li>
                <li><?php echo CHtml::link('Update house', array('house/update', 'id'=>$model->id)) ; ?></li>
                <li><?php echo CHtml::link('Delete house', array('house/delete', 'id'=>$model->id),
                        array(
                            'submit'=>array('house/delete', 'id'=>$model->id),
                            'class' => 'delete','confirm'=>'This will remove the House. Are you sure?'
                        )) ; ?>
                </li>
            <?php endif; ?>
            <?php if(!Yii::app()->user->isGuest): ?>
                <li class="nav-header">Profile</li>
                <li><?php echo CHtml::link('Profile update', array('user/update', 'id'=>Yii::app()->user->getId())); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div id="deneme" class="span6 offset4">
    <?php $this->widget('bootstrap.widgets.TbDetailView',array(
        'data'=>$model,
        'attributes'=>array(
            'title',
            'address_1',
            'address_2',
            'city',
            'state',
            'zip_code',
            'description',
            'number_of_floor',
            'garage',
            'garden',
            'backdoor',
            'number_of_bathroom',
            'number_of_room',
        ),
    )); ?>



    <?php $images = $model->images; ?>

    <?php foreach ($images as $image): ?>
        <img src="<?php echo $image->image_address; ?>" class="img-rounded"height="200" width="300">
    <?php endforeach; ?>


</div>








 
 
 
 
 
 
