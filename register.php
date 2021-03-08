<?php
    require_once "connection.php";

    if(isset($_REQUEST['btn_register'])) {
        $username = strip_tags($_REQUEST['txt_username']); 
        $email = strip_tags($_REQUEST['txt_email']); 
        $password = strip_tags($_REQUEST['txt_password']); 

        if(empty($username)) {
            $errorMsg[]="Please enter username"; 
        }
        else if(empty($email)) {
            $errorMsg[]="Please enter email"; 
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg[]="Please enter a valid email address"; 
        }
        else if(empty($password)) {
            $errorMsg[]="Please enter password"; 
        }
        else if(strlen($password) < 6) {
            $errorMsg[] = "Password must be atleast 6 characters";
        }
        else {
            try {
                $select_stmt=$db->prepare("SELECT username, email FROM tbl_user WHERE username=:uname 
                                    OR email=:uemail"); 
                $select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email)); 
                $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

                if($row["username"]==$username) {
                    $errorMsg[]="Sorry username already exists";
                }
                else if($row["email"]==$email) {
                    $errorMsg[]="Sorry email already exists";
                }
                else if(!isset($errorMsg)) {
                    $new_password = password_hash($password, PASSWORD_DEFAULT);

                    $insert_stmt=$db->prepare("INSERT INTO tbl_user (username,email,password) VALUES
                                    (:uname,:uemail,:upassword)"); 

                    if($insert_stmt->execute(array( ':uname' =>$username,':uemail'=>$email,
                                    ':upassword'=>$new_password))) {
                        $registerMsg="Register Successfully..... Please Click On Login Account Link"; 
                    }
                }
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Cadastro</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

        <?php
        if(isset($errorMsg)) {
            foreach($errorMsg as $error) { ?>
            <div class="alert alert-danger">
                <strong>WRONG ! <?php echo $error; ?></strong>
            </div> <?php
            }
        }
        if(isset($registerMsg)) { ?>
            <div class="alert alert-success">
                <strong><?php echo $registerMsg; ?></strong>
            </div> <?php
        } ?>

        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" name="txt_username" class="form-control" placeholder="enter username" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="txt_email" class="form-control" placeholder="enter email" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" name="txt_password" class="form-control" placeholder="enter password" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                    <input type="submit" name="btn_register" class="btn btn-primary " value="Register">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                    You have a account register here? <a href="index.php"><p class="text-info">Login Account</p></a>
                </div>
            </div>
        </form>
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>