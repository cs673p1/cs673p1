<?php
require 'main.php';

function create_photo($file_path) {
  # Upload the received image file to Cloudinary 
  $result = \Cloudinary\Uploader::upload($file_path, array(
    "tags" => "backend_photo_album",
  ));
  $houseid = $_POST['houseid'];
  echo  $houseid; 
  
  unlink($file_path);
  error_log("Upload result: " . \PhotoAlbum\ret_var_dump($result));
  $image = \PhotoAlbum\create_photo_model($result, $houseid);
  return $result;
}

$files = $_FILES["files"];
$files = is_array($files) ? $files : array($files);
$files_data = array();
foreach ($files["tmp_name"] as $index => $value) {
  array_push($files_data, create_photo($value));
}

?>
<?php
header("Location: {$_SERVER['HTTP_REFERER']}");
  
?>
