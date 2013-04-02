<?php
require 'main.php';
?>

<?php
$this->breadcrumbs=array(
	'Houses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List House','url'=>array('index')),
	array('label'=>'Create House','url'=>array('create')),
	array('label'=>'View House','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage House','url'=>array('admin')),

);
?>
<script type="text/javascript" src="../js/jquery.js"></script>
<h1>Update House <?php echo $model->id; ?></h1>
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

