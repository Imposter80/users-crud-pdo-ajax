<?php
include '../classes/database.php';

$edit_id = $_POST['edit_id'];

//var_dump($edit_id);

$database = new Database();

$edit = $database->edit($edit_id);


if (!empty($edit)) { ?>

    <form id="form" action="post">
        <div>
            <input type="hidden" id="edit_id" value="<?php echo $edit['id'] ?>">
        </div>
        <div class="form-group">
            <label for="">First name</label>
            <input type="text" id="edit_firstname" class="form-control" value="<?php echo $edit['first_name']; ?>">
        </div>
        <div class="form-group">
            <label for="">Last name</label>
            <input type="text" id="edit_lastname" class="form-control" value="<?php echo $edit['last_name']; ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" id="edit_email" class="form-control" value="<?php echo $edit['email']; ?>">
        </div>
    </form>

    <?php

}


