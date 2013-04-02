<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'email',
		'password',
		'id',
		
		
	),
)); ?>
<?php $houses=$model->house; ?>
<div> <h1>Your House Details</h1></div>
<?php $count=0; ?>
<?php foreach($houses as $house) : ?>
<div> <h4> House <?php echo ($count+1); ?> </h4></div>
  <div><?php echo $house->address_1; ?>
        <?php echo $house->address_2;?> </div>
		<div><?php echo $house->city; ?> <?php echo $house->state; ?>
		<?php echo $house->zip_code; ?></div>
		<?php $count ++; ?>
  <?php  endforeach; ?>



