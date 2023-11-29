<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./sign.css">
        <title>Sign Up Here!!</title>
    </head>
    <body>
        <?php
        require('./connections.php');
        if(isset($_POST['signUp_button'])){
           $firstName=$_POST['firstName'];
           $lastName=$_POST['lastName'];
           $email=$_POST['email'];
           $password=$_POST['password'];
           $confirmPassword=$_POST['confirmPassword'];
           $image=$_POST['image'];


           if (!empty($_POST['firstName'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['image'])) {
            if($password == $confirmPassword){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $p=crud::connect()->prepare('INSERT INTO crudTable(firtName,lastName,email,password, image), VALUES(:f, :l, :e, :p, :i)');
                $p->bindValue(':f', $firstName);
                $p->bindValue(':l',$lastName);
                $p->bindValue(':e',$email);
                $p->bindValue(':p',$hashedPassword);
                $p->bindValue(':p',$image);
                $p->execute();

                echo 'Successfully Signed Up!!';

                // Redirect to Login Page
                header("Location: login.php");
                // exit();
                
            }else{
                echo 'Password Does Not Match';
            }
           }
           
        }
        ?>
         <?php include 'header.php'; ?>
        <div class="form">
            <div class="title">
                <p>Sign Up Form</p>
            </div>
            <form action="" method="post">
                <input type="text" name="firstName" placeholder="First Name">
                <input type="text" name="lastName" placeholder="Last Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="confirmPassword" placeholder="Confirm Password">  
                
                <input type="file" name="image" id="imageInput" accept="image/*">
                <div id="uploadResult"></div>

                <script src="upload.js"></script>
                <input type="submit" value="Sign Up" name="signUp_button">
            </form>
        </div> 
    </body> 
</html>