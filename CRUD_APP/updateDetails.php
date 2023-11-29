<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sign.css">
    <title>Updates</title>
    </head>

    <body>
        <?php
        require('./connections.php');
        if (isset($_GET['id_up'])) {
            $id_up=$_GET['id_up'];
            $data=crud::userDataPerId($id_up);
        }
        if (isset($_POST['signUP_button'])) {
            $firstName=$_POST['firstName'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
           if (!empty($_POST['firstName'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&&!empty($_POST['password'])) {
    
                $p=crud::connect()->prepare('UPDATE crudTable SET name=:n,lastName=:l,email=:e,pass=:p where id=:id');
                $p->bindValue(':id',$id_up);
                $p->bindValue(':n', $firstName);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p',$password);
                $p->execute();
                echo 'Updated!';

            }
           }
        
        ?>
        <?php include 'header.php'; ?>
         <div class="form">
        <div class="title">
            <p>You are Updating your Data</p>
        </div>
        <form action="" method="post">
            <input type="text" name="firstName" placeholder="First Name" value="<?php if(isset($data)){
                echo $data['name'];
                            } ?>">
                            <input type="text" name="lastName" placeholder="Last name" value="<?php if(isset($data)){
                echo $data['lastName'];
                            } ?>">
                            <input type="email" name="email" placeholder="Email" value="<?php if(isset($data)){
                echo $data['email'];
                            } ?>">
                            <input type="password" name="password" placeholder="Password" value="<?php if(isset($data)){
                echo $data['pass'];
                            } ?>">
                            <input type="submit" value="UPDATE DETAILS" name="signUp_button"> 
        </form>
    </div>
    </body>
</html>