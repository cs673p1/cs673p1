<div class="span3">
    <div class="sidebar-nav affix">
        <ul class="nav nav-list">
            <li class="nav-header">House</li>
            <li><?php echo CHtml::link('Post house', array('house/create')); ?></li>
            <?php if(!Yii::app()->user->isGuest): ?>
                <li class="nav-header">Profile</li>
                <li><?php echo CHtml::link('House Management') ; ?></li>
                <li><?php echo CHtml::link('Profile update', array('user/update', 'id'=>Yii::app()->user->getId())); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="span9">
    <h3>Create House</h3>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>