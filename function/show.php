<?php

include '../classes/database.php';




$sql = "SELECT * from users ";

//----------- Sorting -----------

$orderBy = "id";
$order = "asc";

if(!empty($_POST["orderby"])) {
    $orderBy = $_POST["orderby"];
}
if(!empty($_POST["order"])) {
    $order = $_POST["order"];
}

$sort_id = "desc";
$sort_firstname = "asc";
$sort_lastname = "asc";
$sort_email = "asc";
$sort_create = "asc";
$sort_update = "asc";



if($orderBy == "id" and $order == "desc") {
    $sort_id = "asc";
}

if($orderBy == "first_name" and $order == "asc") {
    $sort_firstname = "desc";
}
if($orderBy == "last_name" and $order == "asc") {
    $sort_lastname = "desc";
}
if($orderBy == "create_date" and $order == "asc") {
    $sort_create = "desc";
}
if($orderBy == "update_date" and $order == "asc") {
    $sort_update = "desc";
}
if($orderBy == "email" and $order == "asc") {
    $sort_email = "desc";
}



//----------- Search -----------

$where_str = "";


$search_id = htmlspecialchars((!empty($_POST["search_id"]) ? $_POST["search_id"] : "" ));
$search_fn = htmlspecialchars((!empty($_POST["search_fn"]) ? $_POST["search_fn"] : "" ));
$search_ln = htmlspecialchars((!empty($_POST["search_ln"]) ? $_POST["search_ln"] : "" ));
$search_email = htmlspecialchars((!empty($_POST["search_email"]) ? $_POST["search_email"] : "" ));
$search_from_cd = htmlspecialchars((!empty($_POST["search_from_cd"]) ? $_POST["search_from_cd"] : "" ));
$search_before_cd = htmlspecialchars((!empty($_POST["search_before_cd"]) ? $_POST["search_before_cd"] : "" ));
$search_from_ud = htmlspecialchars((!empty($_POST["search_from_ud"]) ? $_POST["search_from_ud"] : "" ));
$search_before_ud = htmlspecialchars((!empty($_POST["search_before_ud"]) ? $_POST["search_before_ud"] : "" ));

if ($search_id != "" || $search_fn != "" || $search_ln != "" || $search_email != "" || $search_from_cd != "" || $search_before_cd != "" || $search_from_ud != "" || $search_before_ud != ""){
    $where_str = " WHERE ";
}

if(!empty($search_id)) {
    $where_str.= "  id LIKE '%$search_id%' AND ";
}
if(!empty($search_fn)) {
    $where_str.= "  first_name LIKE '%$search_fn%' AND ";
}
if(!empty($search_ln)) {
    $where_str.= "  last_name LIKE '%$search_ln%' AND ";
}
if(!empty($search_email)) {
    $where_str.= "  email LIKE '%$search_email%' AND ";
}
if(!empty($search_from_cd)) {
    $where_str.= "  create_date >= '$search_from_cd' AND ";
}
if(!empty($search_before_cd)) {
    $where_str.= "  create_date <= '$search_before_cd' AND ";
}
if(!empty($search_from_ud)) {
    $where_str.= "  update_date >= '$search_from_ud' AND ";
}
if(!empty($search_before_ud)) {
    $where_str.= "  update_date <= '$search_before_ud' AND ";
}


if (!empty($where_str)){
    $sql .=  rtrim($where_str, " AND ") . " ORDER BY " . $orderBy . " " . $order;
}else{
    $sql .=   " ORDER BY " . $orderBy . " " . $order ;
}


$database = new Database();
$rows = $database->show($sql);


?>


<table class="table">

    <thead>
      <tr>
          <th>
             <input type="hidden" id="orderby_id" name="id" value="id">
             <input type="hidden" id="order_id" name="id" value="<?php echo$sort_id; ?>">
             <button type="button" class="btn btn-outline-primary form-control" id="sort_id" title="Сlick to sort by ID" >ID</button>
          </th>
          <th>
              <input type="hidden" id="orderby_fn" name="first_name" value="first_name">
              <input type="hidden" id="order_fn" name="first_name" value="<?php echo $sort_firstname; ?>">
              <button type="button" class="btn btn-outline-primary form-control" id="sort_fn" title="Сlick to sort by first name" >First name</button>
          </th>
          <th>
              <input type="hidden" id="orderby_ln" name="last_name" value="last_name">
              <input type="hidden" id="order_ln" name="last_name" value="<?php echo $sort_lastname; ?>">
              <button type="button" class="btn btn-outline-primary form-control" id="sort_ln" title="Сlick to sort by last name" >Last name</button>
          </th>
          <th>
              <input type="hidden" id="orderby_email" name="email" value="email">
              <input type="hidden" id="order_email" name="email" value="<?php echo $sort_email; ?>">
              <button type="button" class="btn btn-outline-primary form-control" id="sort_email" title="Сlick to sort by email">Email</button>
          </th>
          <th>
              <input type="hidden" id="orderby_cd" name="email" value="create_date">
              <input type="hidden" id="order_cd" name="email" value="<?php echo $sort_create; ?>">
              <button type="button" class="btn btn-outline-primary form-control" id="sort_cd" title="Сlick to sort by create date">Create date</button>
          </th>
          <th>
              <input type="hidden" id="orderby_ud" name="email" value="update_date">
              <input type="hidden" id="order_ud" name="email" value="<?php echo $sort_update; ?>">
              <button type="button" class="btn btn-outline-primary form-control" id="sort_ud" title="Сlick to sort by update date">Update date</button>
          </th>
          <th width="15%" >
            <input type="button" class="btn btn-outline-primary form-control"  value="Action">
          </th>
      </tr>
    </thead>

    <thead>
     <form method="post" name="user_search_form" id="user_search_form" class="user_search_form">
      <tr>
          <th>
              <input type="number" class="sr form-control" id="search_id" name="search_id" placeholder="Enter id" value="<?= (isset($_POST['search_id'])) ? strip_tags($_POST['search_id']) : '' ?>" title="Enter the ID number to search">
          </th>
          <th>
              <input type="text" class="sr form-control" id="search_fn" name="search_fn" placeholder="Enter first name" value="<?= (isset($_POST['search_fn'])) ? strip_tags($_POST['search_fn']) : '' ?>" title="Enter data to search by first name">
          </th>
          <th>
              <input type="text" class="sr form-control" id="search_ln" name="search_ln" placeholder="Enter last name" value="<?= (isset($_POST['search_ln'])) ? strip_tags($_POST['search_ln']) : '' ?>" title="Enter data to search by last name">
          </th>
          <th>
              <input type="text" class="sr form-control" id="search_email" name="search_email" placeholder="Enter email" value="<?= (isset($_POST['search_email'])) ? strip_tags($_POST['search_email']) : '' ?>" title="Enter data to search by email">
          </th>
          <th>
              <input type="datetime-local" class="sr form-control" id="search_from_cd" name="search_from_cd" value="<?= (isset($_POST['search_from_cd'])) ? strip_tags($_POST['search_from_cd']) : '' ?>" title="Enter start date to sort by creation date">
              <input type="datetime-local" class="sr form-control" id="search_before_cd" name="search_before_cd" value="<?= (isset($_POST['search_before_cd'])) ? strip_tags($_POST['search_before_cd']) : '' ?>" title="Enter the end date to sort by creation date">
          </th>
          <th>
              <input type="datetime-local" class="sr form-control" id="search_from_ud" name="search_from_ud" value="<?= (isset($_POST['search_from_ud'])) ? strip_tags($_POST['search_from_ud']) : '' ?>" title="Enter start date to sort by update date">
              <input type="datetime-local" class="sr form-control" id="search_before_ud" name="search_before_ud" value="<?= (isset($_POST['search_before_ud'])) ? strip_tags($_POST['search_before_ud']) : '' ?>" title="Enter the end date to sort by update date">
          </th>
      </tr>
     </form>
    </thead>


    <tbody>

      <?php
        if (!empty($rows)){
            foreach ($rows as $row){
                ?>
                  <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo  $row['first_name'] ?></td>
                      <td><?php echo  $row['last_name'] ?></td>
                      <td><?php echo  $row['email'] ?></td>
                      <td><?php echo  $row['create_date'] ?></td>
                      <td><?php echo  $row['update_date'] ?></td>
                      <td>
                          <a href="#" id="edit" class="btn btn-outline-success" value="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#exampleModal" >Edit</a>
                          <a href="" id="del" class="btn btn-outline-danger" value="<?php echo $row['id'] ?>">Delete</a>
                      </td>

                  </tr>


                <?php
            }
        }
        else{
            echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                 No data
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>   
                 </div>
                 ";
        }
      ?>
    </tbody>

</table>

<?php

