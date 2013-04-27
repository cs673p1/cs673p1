<div class="span4">
    <div class="sidebar-nav affix">
        <ul class="nav nav-list">
            <li class="nav-header">House</li>
            <li><?php echo CHtml::link('Post house', array('house/create')); ?></li>
            <?php if(!Yii::app()->user->isGuest): ?>
                <li class="nav-header">Profile</li>
                <li><?php echo CHtml::link('Profile update', array('user/update', 'id'=>Yii::app()->user->getId())); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div id="me2" class="span4 offset4">
    <?php $houses=$model->house; ?>
    <h3>Your House Details</h3>
    <div><h5><?php $tempcount = 0;
            foreach($houses as $house) :
                $tempcount++;
            endforeach;
            if($tempcount == 0)
                echo"You Have No Houses Yet! ";
            ?></h5></div>
    <?php $count=0;?>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Address</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($houses as $house): ?>
            <tr>
                <td><?php echo CHtml::link($house->title, array('house/view', 'id'=>$house->id)) ;?></td>
                <td><?php echo "{$house->address_1}  {$house->address_2}" ;?></td>
                <td><?php echo CHtml::link('Update', array('house/update', 'id'=>$house->id)) ; ?></td>
                <td><?php echo CHtml::link('Delete', array('house/delete', 'id'=>$house->id),
                        array(
                            'submit'=>array('house/delete', 'id'=>$house->id),
                            'class' => 'delete','confirm'=>'This will remove the House. Are you sure?'
                        )) ; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
