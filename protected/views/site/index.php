<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
if( !isset($_POST['zipCode']) and !isset($_GET['id']) ) {
    ?>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script>
    //
    </script>
    <div class="row">
        <div class="span12">
            <h1>Search</h1>
            <form name="form1" method="post" action="" >
                <input name="zipCode" type="text" id="searchBar" placeholder="Enter query Here"><br>
                <input type="radio" name="choice" value="zip" checked> Zip code <br>
                <input type="radio" name="choice" value="city"> City <br>
                <input type="radio" name="choice" value="addr"> Address <br>
                <input type="radio" name="choice" value="free">Free Mode<br>
                <br>
                <button type="submit" class="btn btn-primary btn-large">Search</button><br>
            </form>
        </div>

    </div>
<?php
}else if( isset($_GET["id"]) ){
    $mysqli= new mysqli("us-cdbr-east-03.cleardb.com", "bd1706af4acf21","8809959f","heroku_8c20d29b464abbf");
    if ( $mysqli->errno ) {
        echo "Unable to connect to the database.";
        die();
    }else{
        $query="select * from heroku_8c20d29b464abbf.house where id='".$_GET['id']."'";
        $result = $mysqli->query($query);
        $row = $result->fetch_object();
        echo "<a href='http://localhost/cs673p1-master/index.php?id=".$row->id."'><h4>House ".$row->id."</h4></a>";
        echo $row->address_1." , ".$row->address_2;
        echo "<br>" .$row->city. " , ".$row->state ;
        echo "<br>This is going to be the view a particular house page that shows one house and all its properties";
        echo "<br> yet to add here is the CSS3, details of the house and the review/comments bar";
        $mysqli->close();
    }

}else{
    $mysqli= new mysqli("us-cdbr-east-03.cleardb.com", "bd1706af4acf21","8809959f","heroku_8c20d29b464abbf");
    if ( $mysqli->errno ) {
        echo "Unable to connect to the database.";
        die();
    } else {
        //echo "Connection Test Succeeded";
        if ($_POST['choice']!="free"){
            if ($_POST['choice']=="zip"){
                $query = "SELECT * FROM heroku_8c20d29b464abbf.house where zip_code = '".$_POST['zipCode']."'";
            }else if ($_POST['choice']=="city"){
                $query = "SELECT * FROM heroku_8c20d29b464abbf.house where city = '".$_POST['zipCode']."'";
            }else{
                $query = "SELECT * FROM heroku_8c20d29b464abbf.house where address_1 like  '%".$_POST['zipCode']."%' or address_2 like '%".$_POST['zipCode']."%' ;";
            }
            $result = $mysqli->query($query);
            if ($result->num_rows == 0){
                echo "No results found for your search criteria, try again";

            }
            while ( $row = $result->fetch_object()) {
                echo "<div id='search_container'>";
				echo "<img src='".getImageURL($row->id,$mysqli)."'width='100px' height='100px'> <br>";
                echo CHtml::link("House{$row->id}", array('house/view', 'id'=>$row->id));
                echo "<br>";
                echo $row->address_1." , ".$row->address_2;
                echo "<br>" .$row->city. " , ".$row->state ;
                echo "</div>";
            }
        }else{
            $query = "SELECT * FROM heroku_8c20d29b464abbf.house";
            $str=$_POST['zipCode'];
            $str=explode(" ",$str);

            $result = $mysqli->query($query);
            while ( $row = $result->fetch_object()) {
                $result_str=" ".$row->address_1." ".$row->address_2." ".$row->city." ".$row->state." ";
                for ($i=0;$i<count($str);$i++){
                    if( stripos($result_str,$str[$i]) ){
                        echo "<div id='search_container'>";
						echo "<img src='".getImageURL($row->id,$mysqli)."'width='100px' height='100px'> <br>";
                        echo CHtml::link("House{$row->id}", array('house/view', 'id'=>$row->id));
                        echo "<br>";
                        echo $row->address_1." , ".$row->address_2;
                        echo "<br>" .$row->city. " , ".$row->state ;
                        echo "</div>";
                        break;
                    }
                }

            }
        }

        $mysqli->close();
    }
}
/*
	This function gets the first image of the property to be displayed for search ...
*/
function getImageURL($id,$mysqli){
	$query="select * from heroku_8c20d29b464abbf.images where house_id = '".$id."'";
	$result = $mysqli->query($query);
	if ($result->num_rows == 0){
		return "http://younine.net/wp-content/themes/the-church/images/no-image.jpg";
	}else{
		return $result->fetch_object()->image_address;
	}
}

?>
