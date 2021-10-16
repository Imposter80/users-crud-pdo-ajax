<?php


class Database
{
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "root";
    private $dbName = "test_encomage_db";

    private $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->serverName}; dbname={$this->dbName}; charset=utf8";
            $options = array(PDO::ATTR_PERSISTENT);
            $this->conn = new PDO($dsn, $this->userName, $this->password, $options);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

    }

    public function insert(){
        if (isset($_POST['submit'])){
           if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])){
               if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])){
                   $first_name = $_POST['first_name'];
                   $last_name = $_POST['last_name'];
                   $email = $_POST['email'];

                   $query = "INSERT INTO users (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
                   if ($sql = $this->conn->exec($query)){
                       echo "
                      <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Record added successfully
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>
                   ";
                   }
                   else{
                       echo "
                      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     Failed to add record
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>
                   ";
                   }
               }
               else{
                   echo "
                      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     Empty fields
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>
                   ";
               }
           }
        }
    }

    public function show($sql){

        $data = null;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;

    }

    public function delete($del_id){
        $query = "DELETE FROM users WHERE id = '$del_id' ";
        if ($sql = $this->conn->exec($query)) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Record delete
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            not delete
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }


    public function edit($edit_id){
        $data = null;

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id='$edit_id'");

        $stmt->execute();
        $data = $stmt->fetch();

        return $data;

    }


    public function update($data){

        $query = "UPDATE users SET first_name = '$data[edit_firstname]', last_name = '$data[edit_lastname]' , email = '$data[edit_email]' WHERE id='$data[edit_id]'";

        if ($sql = $this->conn->exec($query)) {
            echo "
                 <div class='alert alert-success alert-dismissible fade show' role='alert'>
                   Record update successfully
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
                </div>  <!--<script>                
                 $('.close').click();
                 </script> -->";
        }else {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Failed to update
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">  <span aria-hidden="true">&times;</span>  </button>
                </div>  ';
        }
    }
}