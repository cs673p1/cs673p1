

<h1>View User #<?php echo $model->name; ?></h1>

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
<?php $count=0; ?>
<?php foreach($houses as $house) : ?>
    <div> <h4> House <?php echo ($count+1); ?> </h4></div>
    <div><?php echo $house->address_1; ?>
        <?php echo $house->address_2;?> </div>
    <div><?php echo $house->city; ?> <?php echo $house->state; ?>
        <?php echo $house->zip_code; ?></div>
    <?php $count ++; ?>
<?php  endforeach; ?>



