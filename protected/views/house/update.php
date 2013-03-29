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
<br>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="lib/jquery.ui.widget.js"></script>
    <script src="lib/jquery.iframe-transport.js"></script>
    <script src="lib/jquery.fileupload.js"></script>
    <script src="lib/jquery.cloudinary.js"></script>
    <script>
      $.cloudinary.config("cloud_name", "<?php echo Cloudinary::config_get("cloud_name"); ?>");
    </script>
  </head>
  
  
    <!-- A standard form for sending the image data to your server -->
    <div id='backend_upload'>
       <h4>Upload a photo</h4>
       <form action="lib/upload_backend.php" method="post" enctype="multipart/form-data">

        <input id="fileupload" type="file"   name="files[]" multiple accept="image/gif, image/jpeg, image/png">
		<input id="house_id"   type="hidden" name="houseid" value= "<?php echo $model->id?>">
        <input type="submit" value="Upload">
      </form>
    </div>
 
 
 <h4>Image for House #<?php echo $model->id; ?></h4>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

 <!-- A standard form for sending the image data to your server -->
    
    <script>
      function prettydump(obj) {
        ret = ""
        $.each(obj, function(key, value) {
          ret += "<tr><td>" + key + "</td><td>" + value + "</td></tr>";
        });
        return ret;
      }
      
      $('.cloudinary-fileupload')
      .fileupload({ 
        dropZone: '#direct_upload',
        start: function () {
          $('.status_value').text('Starting direct upload...');
        },
        progress: function () {
          $('.status_value').text('Uploading...');
        },
      })
      .on('cloudinarydone', function (e, data) {
          $('.status_value').text('Idle');
          $.post('upload_complete.php', data.result);
          var info = $('<div class="uploaded_info"/>');
          $(info).append($('<div class="data"/>').append(prettydump(data.result)));
          $(info).append($('<div class="image"/>').append(
          	$.cloudinary.image(data.result.public_id, {
            	format: data.result.format, width: 150, height: 150, crop: "fill"
          	})
          ));
          $('.uploaded_info_holder').append(info);
          
      });
    </script>
  
