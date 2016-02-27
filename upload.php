<?php
$ds          = DIRECTORY_SEPARATOR;
$storeFolder = 'uploads';
if (!empty($_POST['myfile'])) {
  $data = $_POST['myfile'];

  list($type, $data) = explode(';', $data);
  $type = explode('/', $type);
  if ($type[1] == "jpeg") {
    $ext = "JPG";
  }
  list(, $data)      = explode(',', $data);
  $data              = base64_decode($data);
  file_put_contents('uploads/image.'.$ext, $data);
}
?>
