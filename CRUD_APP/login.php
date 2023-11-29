<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sign.css">
    <title>Login Here!!</title>
    </head>

    <style>
        .form{
            width: 230px;
            height: 280px;
        }
    </style>
    <body>
        <?php
        require('./connections.php');
        if (isset($_POST['login_button'])) {
            $_SESSION['validate']=false;
            $name=$_POST['name'];
            $password=$_POST['password'];
            $p=crud::connect()->prepare('SELECT * FROM crudTable WHERE firstName=:f and pass=:p');
            $p->bindValue(':f',$firstName);
            $p->bindValue(':p',$password);
            $p->execute();
            $d=$p->fetchAll(PDO::FETCH_ASSOC);
            if ($p->rowCount()>0) {
                $_SESSION['firstName']=$firstName;
                $_SESSION['pass']=$password;
                $_SESSION['validate']=true;
                header('location:website.php');
            }else {
                echo'Make sure that you are registered!';
            }

    }
        ?>
        <?php include 'header.php'; ?>
        <div class="form">
            <div class="title">
                <p>Login Form</p>
            </div>
            <form action="" method="post">
                <input type="text" name="firstName" placeholder="Enter Your First Name">
                <input type="password" name="password"placeholder="Password">
                <input type="submit" value="Login" name="login_button">

            </form>
        </div>
    </body>
</html>