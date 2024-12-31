<?php include __DIR__.'/../layouts/header.php'; ?>
<?php
    include "../../database/connection.php";
    if (isset($_POST["login"])){
        $name = $_POST["username"];
        $pass = $_POST["password"];

         $checkName = $conn->prepare("INSERT INTO users(username,fullname,password,role_Id)");
         $checkName->execute([$name]);
         $check = $checkName->fetch(PDO::FETCH_ASSOC);
                 $checkRole = $conn -> prepare("SELECT id, name from usRole where id = {$check["role_id"]} ");
                 $checkRole -> execute();
                 $getTheRole = $checkRole -> fetch(PDO::FETCH_ASSOC);
    }

?>

<h2>Register</h2>
<!-- TODO: Add registration form with input fields for username, password, etc. -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="fullname">Fullname:</label>
        <input type="text" class="form-control" name="fullname" id="fullname" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <!-- Add other registration fields as needed -->
    <button type="submit" class="btn btn-success">Register</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; ?>
