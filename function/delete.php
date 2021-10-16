<?php
include '../classes/database.php';

$del_id = $_POST['del_id'];

$database = new Database();

$del = $database->delete($del_id);

?>