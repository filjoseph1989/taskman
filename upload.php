<?php
$ds          = DIRECTORY_SEPARATOR;
$storeFolder = 'uploads';
if (!empty($_POST['myfile'])) {
  $data = $_POST['myfile'];

  list($type, $data) = explode(';', $data);
  $type              = explode('.', $_POST['name']);
  if ($type[1] == "csv") {
    list(, $data)      = explode(',', $data);
    $data              = base64_decode($data);
    file_put_contents('uploads/'.$_POST['name'], $data);
  }
}
?>
