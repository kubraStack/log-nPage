<?php
    include './functions/helper.php';
    session_start();


    $user = [
        'Aleyna Kocak' => [
            'eposta' => 'aleynakocak@gmail.com',
            'password' => '123456'
        ],
        'Hakan Topan' => [
            'eposta' => 'hakantpn@gmail.com',
            'password' => '654321'
        ],
        'Mustafa Er' => [
            'eposta' => 'mustafaer@gmail.com',
            'password' => '147896'
        ]
    ];

    /* LOGIN CONTROL SECTION */
    if (get('islem') == 'giris') {
        $_SESSION['username'] = post('username');
        $_SESSION['password'] = post('password');

        if (!post('username')) {
            $_SESSION['error'] = 'Please enter your username!';
            header('Location: login.php');
            exit();
        }elseif (!post('password')) {
            $_SESSION['error'] = 'Please enter your password!';
            header('Location: login.php');
        }else {
            if (array_key_exists(post('username'), $user)) {
                if ($user[post('username')]['password'] == post('password')) {
                    $_SESSION['login'] = true;
                    $_SESSION['user_name'] = post('username');
                    $_SESSION['eposta'] = $user[post('username')]['eposta'];
                    header('Location: index.php');
                    exit();
                }else{
                    $_SESSION['error'] = 'No Registered User Found!';
                    header('Location: login.php');
                    exit();
                }
            }else{
                $_SESSION['error'] = 'No Registered User Found!';
                header('Location: login.php');
                exit();
            }
        }
    }


    /*ABOUT SECTION */

    if (get('islem') == 'hakkimda') {
        $hakkimda = post('hakkimda');
        $islem = file_put_contents('db/'.session('user_name').'.txt', htmlspecialchars($hakkimda));

        if ($islem) {
            header('Location: index.php?islem=true');
        }else{
            header('Location: index.php?islem=false');
        }
    }

    /*EXIT SECTION */
    if (get('islem') == 'cikis') {
        session_destroy(); //we ended the session
        session_start();
        $_SESSION['error'] = "Session Terminated !";
        header("Location: login.php");
    }

    /*MOD CHANGE SECTION */
    if (get('islem') == 'renk') {
        setcookie('color', get('color'), time() + (86400 * 360));
        header('Location:'.$_SERVER['HTTP_REFERER'] ?? 'index.php');
    }
?>