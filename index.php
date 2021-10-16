

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>UsersList</title>
</head>
<body>

<div class="conteiner">
    <div class="row">
        <nav class="col-sm-12 col-md-12 col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-tabs">
                        <li class="nav-item active">
                            <a class="nav-link active" href="index.php">Список пользователей</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/user.php">Добавить пользователя</a>
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
            <h2 class="text-center">List of users</h2>
            <hr style="height: 1px; color: black;background-color: black"
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-1">
            <div id="user_info"></div>
            <div id="show"></div>
        </div>
    </div>
</div>

<!-- Edit Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="edit_info"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update" >Update</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>



<script>
    function show(){
        $.ajax({
            url: "../function/show.php",
            type: "post",
            success: function(data) {
                $("#show").html(data);
            }
        });
    }
    show();


//-------- SEARCH ----------
    function search(){

        var search_id = $('#search_id').val();
        var search_fn = $('#search_fn').val();
        var search_ln = $('#search_ln').val();
        var search_email = $('#search_email').val();
        var search_from_cd = $('#search_from_cd').val();
        var search_before_cd = $('#search_before_cd').val();
        var search_from_ud = $('#search_from_ud').val();
        var search_before_ud = $('#search_before_ud').val();

        $.ajax({
            url: "../function/show.php",
            type: "post",
            data:{
                search_id:search_id,
                search_fn:search_fn,
                search_ln:search_ln,
                search_email:search_email,
                search_from_cd:search_from_cd,
                search_before_cd:search_before_cd,
                search_from_ud:search_from_ud,
                search_before_ud:search_before_ud
            },
            success: function(data) {
                $("#show").html(data);
            }
        });
    }

    //Search ID
    $(document).on("input","#search_id", function (e){
        e.preventDefault();
        var search_id = $(this).val();
        setTimeout(function(){
            if(search_id == $('#search_id').val() && search_id != null && search_id != "") {
                search();
            }
        },1000);
    });

    //Search First name
    $(document).on("input","#search_fn", function (e){
        e.preventDefault();
        var search_fn = $(this).val();
        setTimeout(function(){
            if(search_fn == $('#search_fn').val() && search_fn != null && search_fn != "") {
                search();
            }
        },1000);
    });

    //Search Last name
    $(document).on("input","#search_ln", function (e){
        e.preventDefault();
        var search_ln = $(this).val();
        setTimeout(function(){
            if(search_ln == $('#search_ln').val() && search_ln != null && search_ln != "") {
                search();
            }
        },1000);
    });

    //Search email
    $(document).on("input","#search_email", function (e){
        e.preventDefault();
        var search_email = $(this).val();
        setTimeout(function(){
            if(search_email == $('#search_email').val() && search_email != null && search_email != "") {
                search();
            }
        },1000);
    });

    //Search from create date
    $(document).on("input","#search_from_cd", function (e){
        e.preventDefault();
        var search_from_cd = $(this).val();
        setTimeout(function(){
            if(search_from_cd == $('#search_from_cd').val() && search_from_cd != null && search_from_cd != "") {
                search();
            }
        },1000);
    });

    //Search before create date
    $(document).on("input","#search_before_cd", function (e){
        e.preventDefault();
        var search_before_cd = $(this).val();
        setTimeout(function(){
            if(search_before_cd == $('#search_before_cd').val() && search_before_cd != null && search_before_cd != "") {
                search();
            }
        },1000);
    });
    //Search from update date
    $(document).on("input","#search_from_ud", function (e){
        e.preventDefault();
        var search_from_ud = $(this).val();
        setTimeout(function(){
            if(search_from_ud == $('#search_from_ud').val() && search_from_ud != null && search_from_ud != "") {
                search();
            }
        },1000);
    });

    //Search before update date
    $(document).on("input","#search_before_ud", function (e){
        e.preventDefault();
        var search_before_cd = $(this).val();
        setTimeout(function(){
            if(search_before_cd == $('#search_before_ud').val() && search_before_ud != null && search_before_ud != "") {
                search();
            }
        },1000);
    });







    // Delete user
    $(document).on("click","#del", function (e){
        e.preventDefault();
        if (window.confirm("Do you want delete record")){
            var del_id = $(this).attr("value");
            $.ajax({
                url: "../function/delete.php",
                type: "post",
                data:{
                    del_id:del_id
                },
                success: function(data) {
                    show();
                    $("#user_info").html(data);
                }
            });
        }else{
            return false;
        }
    });

    // Edit user
    $(document).on("click","#edit", function (e){
        e.preventDefault();
        var edit_id = $(this).attr("value");
        $.ajax({
            url: "../function/edit.php",
            type: "post",
            data:{
                edit_id:edit_id
            },
            success: function(data) {
                $("#edit_info").html(data);
            }
        });
    });

    // Update user
    $(document).on("click","#update", function (e){
        e.preventDefault();

        var edit_id = $("#edit_id").val();
        var edit_firstname = $("#edit_firstname").val();
        var edit_lastname = $("#edit_lastname").val();
        var edit_email = $("#edit_email").val();
        var update = $("#update").val();

        $.ajax({
            url: "../function/update.php",
            type: "post",
            data:{
                edit_id:edit_id,
                edit_firstname:edit_firstname,
                edit_lastname:edit_lastname,
                edit_email:edit_email,
                update:update
            },
            success: function(data) {
                show();
                $("#user_info").html(data);
            }
        });

    });

    //Sort column ID
    $(document).on("click","#sort_id", function (e){
        e.preventDefault();
        var orderby = $("#orderby_id").val();
        var order = $("#order_id").val();
        $.ajax({
            url: "../function/show.php",
            type: "post",
            data:{
                orderby:orderby,
                order:order
            },
            success: function(data) {
                $("#show").html(data);
            }
        });
    });
    //Sort column First name
    $(document).on("click","#sort_fn", function (e){
        e.preventDefault();
        var orderby = $("#orderby_fn").val();
        var order = $("#order_fn").val();
        $.ajax({
            url: "../function/show.php",
            type: "post",
            data:{
                orderby:orderby,
                order:order
            },
            success: function(data) {
                $("#show").html(data);
            }
        });
    });
    //Sort column Last name
    $(document).on("click","#sort_ln", function (e){
        e.preventDefault();
        var orderby = $("#orderby_ln").val();
        var order = $("#order_ln").val();
        $.ajax({
            url: "../function/show.php",
            type: "post",
            data:{
                orderby:orderby,
                order:order
            },
            success: function(data) {
                $("#show").html(data);
            }
        });
    });
    //Sort column Email
    $(document).on("click","#sort_email", function (e){
        e.preventDefault();
        var orderby = $("#orderby_email").val();
        var order = $("#order_email").val();
        $.ajax({
            url: "../function/show.php",
            type: "post",
            data:{
                orderby:orderby,
                order:order
            },
            success: function(data) {
                $("#show").html(data);
            }
        });
    });
    //Sort column Create date
    $(document).on("click","#sort_cd", function (e){
        e.preventDefault();
        var orderby = $("#orderby_cd").val();
        var order = $("#order_cd").val();
        $.ajax({
            url: "../function/show.php",
            type: "post",
            data:{
                orderby:orderby,
                order:order
            },
            success: function(data) {
                $("#show").html(data);
            }
        });
    });
    //Sort column Update date
    $(document).on("click","#sort_ud", function (e){
        e.preventDefault();
        var orderby = $("#orderby_ud").val();
        var order = $("#order_ud").val();
        $.ajax({
            url: "../function/show.php",
            type: "post",
            data:{
                orderby:orderby,
                order:order
            },
            success: function(data) {
                $("#show").html(data);
            }
        });
    });

</script>



</body>
</html>

