<?php
$ds          = DIRECTORY_SEPARATOR;
$storeFolder = 'uploads';
if (!empty($_POST['myfile'])) {
  $data = $_POST['myfile'];

  list($type, $data) = explode(';', $data);
  $type = explode('/', $type);
  // echo "$type";
  // list(, $data)      = explode(',', $data);
  $data              = base64_decode($data);
  file_put_contents('uploads/image.'.$type[1], $data);
}
?>
