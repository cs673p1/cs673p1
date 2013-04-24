 
<div class="span3">
    <div class="sidebar-nav affix">
        <ul class="nav nav-list">
            <li class="nav-header">House</li>
            <li><?php echo CHtml::link('Post house', array('house/create')); ?></li>
            <li><?php echo CHtml::link('View house', array('house/view', 'id'=>$model->id)) ; ?></li>
            <?php if(!Yii::app()->user->isGuest): ?>
                <li class="nav-header">Profile</li>
                <li><?php echo CHtml::link('House Management') ; ?></li>
                <li><?php echo CHtml::link('Profile update', array('user/update', 'id'=>Yii::app()->user->getId())); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
 

<div class="span9">
    <h4>Update <?php echo $model->title; ?></h4>
    <!-- upload image -->
<br>
    <!-- A standard form for sending the image data to your server -->
    <div id='backend_upload'>
<h4>Upload a photo. <br><br>Only Proper Image Files accepted.</br>For Example: .jpg, .gif, .png</h4>
 
        <form name = "magic" action="<?php echo $this->createUrl('image/create'); ?>" id="idf" method="post" enctype="multipart/form-data">
        	
			Upload file: 
			   <input type="file"name="files[]"onchange="checkName(this, 'fname', 'submit')"/></br>
			   
               <input type="text" style="display: none;" name="mike" id="fname"  /><br />
	 
             <input id="house_id"   type="hidden" name="house_id" value= "<?php echo $model->id?>">
			 
<span class="button-outer">
<span class="button-inner"> 

<input type="submit" name="but" id="submit" value="Upload" disabled="disabled"style="background-color: #e3eeff; border: 1px solid #000; cursor:pointer;"

onmouseover="document.magic.but.style.backgroundColor='#ffffff',width='290',height='100';
document.magic.but.value='Upload'"
onmousedown="document.magic.but.style.backgroundColor='e3eeff';
document.magic.but.value='Upload'"
onmouseup="document.magic.but.style.backgroundColor='#e3eeff';
document.magic.but.value='Upload'"
onmouseout="document.magic.but.style.backgroundColor='#e3eeff',height='24';
document.magic.but.value='Upload'" >


<br>
	   </form>
	   </span>
	 
   
    <?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
	 <h4>Image for House #<?php echo $model->id; ?></h4>

    <?php $images = $model->images; ?>

    <?php foreach ($images as $image): ?>
        <img src="<?php echo $image->image_address; ?>" class="img-rounded"height="200" width="300">
   
<li><?php echo CHtml::link('Update image', array('image/update', 'id'=>$image->id)); ?></li>
 <?php endforeach; ?>

</div>
