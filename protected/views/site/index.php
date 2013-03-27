<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="row">
    <div class="span12">
        <h1></h1>
        <form name="form1" method="post" action="" >
            <label>address 1<input name="address_1" type="text" id="searchBar" placeholder="address"></label>
            <label>address 2<input name="address_2" type="text" id="" placeholder="address"></label>
            <label>city<input name="city" type="text" placeholder="city"></label>
            <label>state<input name="state" type="text" placeholder="state"></label>
            <label>zip code<input name="zip_code" type="text" placeholder="zip code"></label>
            <button type="submit" class="btn btn-primary btn-large">Search</button><br>
        </form>
    </div>
    <?php echo CHtml::link('Create a new house', array('house/create'), array('class'=>'btn')); ?>
</div>



