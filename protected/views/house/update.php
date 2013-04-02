<div class="span3">
    <div class="sidebar-nav affix">
        <ul class="nav nav-list">
            <li class="nav-header">House</li>
            <li><?php echo CHtml::link('Post house', array('house/create')); ?></li>
            <li><?php echo CHtml::link('View house', array('house/view', 'id'=>$model->id)) ; ?></li>
            <?php if(!Yii::app()->user->isGuest): ?>
                <li class="nav-header">Profile</li>
                <li><?php echo CHtml::link('House Management') ; ?></li>
                <li><?php echo CHtml::link('Profile update', array('user/update', 'id'=>Yii::app()->user->getId())); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="span9">
    <h4>Update <?php echo $model->title; ?></h4>
    <!-- upload image -->

    <!-- A standard form for sending the image data to your server -->
    <div id='backend_upload'>
        <h4>Upload a photo</h4>
        <form action="<?php echo $this->createUrl('image/create'); ?>" method="post" enctype="multipart/form-data">

            <input type="file"   name="files[]" multiple accept="image/gif, image/jpeg, image/png">
            <input id="house_id"   type="hidden" name="house_id" value= "<?php echo $model->id?>">
            <input type="submit" value="Upload">
        </form>
    </div>


    <h4>Image for House #<?php echo $model->id; ?></h4>

    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

    <!-- A standard form for sending the image data to your server -->
</div>
