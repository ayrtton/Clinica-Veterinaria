<?php
    if(isset($errorMsg)) {
        foreach($errorMsg as $error) {
?>
        <div class="alert alert-danger">
            <strong><?php echo $error; ?></strong>
        </div>
<?php
        }
    }
    if(isset($loginMsg)) {
?>
        <div class="alert alert-success">
            <strong><?php echo $loginMsg; ?></strong>
        </div>
<?php
    }
?>



<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-3 control-label">Username or Email</label>
                <div class="col-sm-6">
                    <input type="text" name="txt_username_email" class="form-control" placeholder="enter username or email">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" name="txt_password" class="form-control" placeholder="enter password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                    <input type="submit" name="btn_login" class="btn btn-success" value="Login">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                    You don't have a account register here? <a href="register.php"><p class="text-info">Register Account</p></a>
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