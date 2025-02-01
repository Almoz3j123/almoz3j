<?php
$dataFile = 'data.json';
$data = json_decode(file_get_contents($dataFile), true);

if ($_GET['action'] == 'register') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = $_POST['username'];

    foreach ($data['users'] as $user) {
        if ($user['email'] === $email) {
            die("البريد الإلكتروني مسجل مسبقًا!");
        }
    }

    $data['users'][] = ["id" => uniqid(), "email" => $email, "password" => $password, "username" => $username, "balance" => 0];

    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
    echo "تم التسجيل بنجاح!";
}

if ($_GET['action'] == 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach ($data['users'] as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            echo "تم تسجيل الدخول!";
            exit;
        }
    }
    echo "بيانات غير صحيحة!";
}
?>
