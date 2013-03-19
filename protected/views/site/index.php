<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="row">
    <div class="span12">
        <h1></h1>

        <form name="form1" method="post" action="" class="form">
            <label for="searchBar"></label>
            <input name="address" type="text" id="searchBar" placeholder="address"><br>
            <input name="city" type="text" id="" placeholder="city"><br>
            <input name="state" type="text" placeholder="state"><br>
            <input name="zip_code" type="text" placeholder="zip_code"><br>
            <button type="submit" class="btn btn-primary btn-large">Search</button><br>

        </form>
    </div>
</div>



