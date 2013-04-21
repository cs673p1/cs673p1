<?php echo CHtml::link('Back To House', array('house/view', 'id'=>$model->house->id)); ?><br>
<img src="<?php echo $model->image_address; ?>" height="300" width="400">

  <?php $images=$model->id; ?>
<li><?php echo CHtml::link('Update image', array('image/update', 'id'=>$model->id)); ?></li>
