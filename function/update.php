<?php

include '../classes/database.php';



if (isset($_POST['update'])) {

    if (isset($_POST['edit_firstname']) && isset($_POST['edit_lastname']) && isset($_POST['edit_email']) && isset($_POST['edit_id'])) {

        if (!empty($_POST['edit_firstname']) && !empty($_POST['edit_lastname']) && !empty($_POST['edit_email'])&& !empty($_POST['edit_id'])) {

            $data['edit_id'] = $_POST['edit_id'];
            $data['edit_firstname'] = $_POST['edit_firstname'];
            $data['edit_lastname'] = $_POST['edit_lastname'];
            $data['edit_email'] = $_POST['edit_email'];

            $database = new Database();

            $update = $database->update($data);


        } else {
            echo "
            <script>alert('empty fields')</script>
            ";
        }
    }
}

