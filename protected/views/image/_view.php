<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('house_id')); ?>:</b>
	<?php echo CHtml::encode($data->house_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_address')); ?>:</b>
	<?php echo CHtml::encode($data->image_address); ?>
	<br />


</div>