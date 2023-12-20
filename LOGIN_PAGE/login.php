<?php
    include './functions/helper.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <link rel="stylesheet" href="style/style.css">
    <title>LOGIN PAGE</title>

    <style>
        body.bg-dark{
            background: black !important;
            color: #fff;
        }
        body.bg-light{
            background: #fff;
            color: #181818;
        }
        .logo.bg-dark{
            color: #fff;
        }
    </style>
</head>
<body class="<?= cook('color') ? cook('color') : 'bg-dark'; ?>">
    
    <div class="d-flex align-items-center justify-content-center p-2">
       <img src="images/logo1.png" alt="logo" class="h-25 w-25">
    </div>

    <div class="container  d-flex align-items-center justify-content-center mb-5">
        
       <div class="card pb-2 shadow <?= cook('color') ? cook('color') : 'bg-dark'; ?> " style="width: 35rem;" >
            <div class="card-header">
               <h3>Login</h3>
            </div>
            <div class="card-body">
                <?php if(session('error')):  ?>
                    <div class="alert alert-danger">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <form action="islem.php?islem=giris" method="post">
                    <label for="username" class="form-label" >User Name</label>
                    <input type="text" class="form-control mb-4" value="<?= session('username') ?>" name="username" placeholder="Enter your user name.." >

                    <label for="password" class="form-label mt-2">Password</label>
                    <input type="password" class="form-control mb-4" value="<?=session('password') ?>" name="password" placeholder="Enter your password..">

                    <button class="btn btn-success mt-2 w-100 logın">Login</button>

                </form>
                
            </div>
            <div class="card-footer mb-1 bg-secondary d-flex justify-content-between align-items-center">
                <a href="islem.php?islem=renk&color=bg-light" class="btn btn-md btn-light">Light Mod</a>
                <a href="islem.php?islem=renk&color=bg-dark" class="btn btn-md btn-secondary">Dark Mod</a>
            </div>
       </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
    $_SESSION['error'] = null;
    $_SESSION['username'] = null;
    $_SESSION['password'] = null;

?>