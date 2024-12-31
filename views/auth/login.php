<?php include __DIR__.'/../layouts/header.php'; ?>
<?php
    include "../../database/connection.php";
    session_start();
    if (isset($_POST["login"])){
        $name = $_POST["username"];
        $pass = $_POST["password"];

         $checkName = $conn->prepare("SELECT * FROM users WHERE username = ?");
         $checkName->execute([$name]);
         $check = $checkName->fetch(PDO::FETCH_ASSOC);
         if ($check) {
             if (password_verify($pass, $check["password"])) {
                 $checkRole = $conn -> prepare("SELECT id, name from usRole where id = {$check["role_id"]} ");
                 $checkRole -> execute();
                 $getTheRole = $checkRole -> fetch(PDO::FETCH_ASSOC);
                 if ($check["role_id"] == $getTheRole["id"] ){
                    if ($getTheRole["name"] == "Admin"){
                        $_SESSION["usRole"] = $getTheRole["name"];
                        $_SESSION["usId"] = $check["id"];
                        $_SESSION["usName"] = $check["fullname"];
                        header("location: ../admin/dashboard.php");
                        exit();
                    } else {
                        $_SESSION["usRole"] = $getTheRole["name"];
                        $_SESSION["usId"] = $check["id"];
                        $_SESSION["usName"] = $check["fullname"];
                        exit();
                    }
                 }
                
             } else {
                 echo "password incorrect";
             }
         } else {
             echo "invalid email";
         }
    }

?>

<h2>Login</h2>
<!-- TODO: Add login form with input fields for username and password -->
<!-- Add Bootstrap form classes as needed -->
<form method="post" action="login.php">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>

<?php include __DIR__.'/../layouts/footer.php'; ?>
