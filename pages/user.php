<?php

include '../classes/database.php';

if (isset( $_GET['edit_user']))
{
    $database = new Database();

    $database->edit($_GET['edit_user']);

}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add new user</title>
</head>
<body>

<div class="conteiner">
    <div class="row">
        <nav class="col-sm-12 col-md-12 col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-tabs">
                        <li class="nav-item ">
                            <a class="nav-link " href="../index.php">Список пользователей</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link active" href="user.php">Добавить пользователя</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2 class="text-center">Add new user</h2>
            <hr style="height: 1px; color: black;background-color: black"
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="" method="post" id="form">
                <div id="result"></div>
                <div class="form-group">
                    <label for="">First name</label>
                    <input type="text" id="first_name" class="form-control" placeholder="First name" >
                </div>
                <div class="form-group">
                    <label for="">Last name</label>
                    <input type="text" id="last_name" class="form-control" placeholder="Last name" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" id="email" class="form-control" placeholder="Email" >
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <button type="submit" id="submit" class="btn btn-outline-primary">Create</button>
                </div>

            </form>
        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script>

        $(document).on("click","#submit", function (e){
          e.preventDefault();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var submit = $("#submit").val();
        $.ajax({
            url: "../function/insert.php",
            type: "post",
            data: {
                first_name:first_name,
                last_name:last_name,
                email:email,
                submit:submit
            },
            success: function(data) {
                $("#result").html(data);
            }
        });
        $("#form")[0].reset();
        });

    </script>

</body>
</html>