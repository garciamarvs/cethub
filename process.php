<?php
require 'config.php';

$ID = $_POST['ID'];

echo json_encode(array('status' => 'success', 'ID' => $ID));

?>