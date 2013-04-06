
<<<<<<< HEAD

<h1>Welcome <?php echo $model->name; ?></h1>
=======
<h1>View User #<?php echo $model->name; ?></h1>
>>>>>>> 7e91d5c7cf0ccf73e174c1bd3355fedf05aa7f99

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'name',
        'email',
        'id',

    ),
)); ?>
<?php $houses=$model->house; ?>
<div> <h1>Your House Details</h1></div>
<div class="span3">
    <div>
        <ul>
            
<div><h5><?php $tempcount = 0;
foreach($houses as $house) :  
$tempcount++; 
endforeach;
if($tempcount == 0)
echo"You Have No Houses Yet! ";
  ?></h5></div>
  <div><h3><?php echo CHtml::link('Create House', array('house/create')); ?></h3></div>

	
	<?php $count=0;?>
			
<?php foreach($houses as $house) : ?>
    <div> <h4> House <?php echo ($count+1); ?> </h4></div>
    <div><?php echo $house->address_1; ?>
        <?php echo $house->address_2;?> </div>
    <div><?php echo $house->city; ?> <?php echo $house->state; ?>
        <?php echo $house->zip_code; ?></div>
		<?php echo CHtml::link('Delete house', array('house/delete', 'id'=>$house->id),
                    array(
                        'submit'=>array('house/delete', 'id'=>$house->id),
                        'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
                    )) ; ?>
		<div><?php echo CHtml::link('Update House', array('house/update', 'id'=>$house->id); ?></div>
		
		
    <?php $count ++; ?>
<?php  endforeach; ?>



