<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if (0 < $_FILES['file']['error'] ) {
  echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else 
{
  $uploads_dir = $_SERVER["DOCUMENT_ROOT"].'/upload/logos';
  $tmp_name = $_FILES["file"]["tmp_name"];
  $iden = explode("/", $_FILES["file"]["type"]);
  $name = uniqid(); $name .= '.'.$iden[1];
  //$name = basename($_FILES["file"]["name"]);
  if(move_uploaded_file($tmp_name, "$uploads_dir/$name"))
  {
    echo '/upload/logos/'.$name;
  }
}
?>