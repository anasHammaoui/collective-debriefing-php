<?php include __DIR__.'/../layouts/header.php'; ?>
<?php include __DIR__.'/../../database/connection.php'; ?>
<?php
    session_start();
   $role =  $_SESSION["usRole"] ;
  $userId =   $_SESSION["usId"] ;
   $fullName =  $_SESSION["usName"] ;

   if ($role == "Admin"){
    $getUsers = $conn -> prepare("SELECT * FROM users");
    $getUsers -> execute();
    $users = $getUsers -> fetchAll(PDO::FETCH_ASSOC);
   } else {
    exit();
   }
?>
<h2>Admin Dashboard</h2>


<!-- Add User Button -->
<a href="./users/add.php" class="btn btn-primary mb-3">Add User</a>


<!-- TODO: Display a table of users with options to edit or delete -->
<!-- Use Bootstrap table classes -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
       <?php // TODO: Fetch and display users in the table
        foreach ($users as $user) { ?>
           <tr>
           <td><?=$user['id']?></td>
           <td><?=$user['username']?></td>
           <td><?=$user['fullname']?></td>
           <td> <?=$user['role_id']?></td>
       
           <?php } ?> 
        <?php // TODO: Add edit and delete links with appropriate href values?>
        <!-- <td> <a href='#' class='btn btn-warning'>Edit</a> | <a href='#' class='btn btn-danger'>Delete</a>
        </td>
        </tr> -->
        
    </tbody>
</table>

<?php include __DIR__.'/../layouts/footer.php'; ?>
        </body>
        </html>