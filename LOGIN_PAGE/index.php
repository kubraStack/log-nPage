<?php 
    include './functions/helper.php';
    session_start();

    if (!isset($_SESSION['login']) || ($_SESSION['login'] == false)) {
        header("Location: login.php");
    }

    if(file_exists('db/aleynakocak.txt')){
        $hakkimda = file_get_contents('db/'.session('user_name').'.txt');
    }else {
        $hakkimda = '';
    }
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
    </style>
</head>
<body class="<?= cook('color') ? cook('color') : 'bg-dark'; ?>">
    <div class="d-flex align-items-center justify-content-center p-2">
       <img src="images/logo1.png" alt="logo" class="h-25 w-25">
    </div>
    <div class="container  d-flex align-items-center justify-content-center mb-5">
        
       <div class="card pb-2 shadow <?= cook('color') ? cook('color') :'bg-dark'; ?>" style="width: 35rem;" >
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <h5 class="card-title text-warning"><?= session('user_name') ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= session('eposta') ?></h6>

                <?php
                    if (get('islem') == 'true') {
                        echo "<div class='alert alert-success'>Process successful!</div>";
                    }elseif (get('islem') == 'false') {
                        echo "<div class='alert alert-danger'>Operation failed!</div>";
                    }
                ?>

                <form action="islem.php?islem=hakkimda" method="post">
                    <textarea class="form-control text-secondary h-100" name="hakkimda" id="" cols="30" rows="10"><?=htmlspecialchars_decode($hakkimda)  ?></textarea>
                    <button class="btn btn-md btn-success mt-2 w-100">Save</button>
                </form>
                <a href="islem.php?islem=cikis" class="btn btn-warning btn-md mt-2 w-100">Logout</a>
            </div>
            <div class="card-footer bg-secondary d-flex justify-content-between align-items-center">
                <a href="islem.php?islem=renk&color=bg-light" class="btn btn-md btn-light">Light Mod</a>
                <a href="islem.php?islem=renk&color=bg-dark" class="btn btn-md btn-dark">Dark Mod</a>
            </div>
       </div>
       
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>