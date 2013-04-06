

<h1>Welcome <?php echo $model->name; ?></h1>

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
		<?php echo CHtml::link('Delete house', array('house/delete', 'id'=>$model->id),
                    array(
                        'submit'=>array('house/delete', 'id'=>$model->id),
                        'class' => 'delete','confirm'=>'This will remove the image. Are you sure?'
                    )) ; ?>
		<div><?php echo CHtml::link('Update House', array('house/update')); ?></div>
		
		
    <?php $count ++; ?>
<?php  endforeach; ?>



