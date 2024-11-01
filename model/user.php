<?php
require_once 'connect.php';

function check_user($username, $password, $password2) {
    $query = "SELECT * FROM user WHERE user = :username AND pass = :password AND pass2 = :password2" ;
    return get_one($query, ['username' => $username, 'password' => $password, 'password2' => $password2]);
}
function getuserinfo($user, $pass) {
    $conn = connectdb();
    $sql = "SELECT * FROM user WHERE user = :user";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userInfo && password_verify($pass, $userInfo['pass'])) {
        return $userInfo;
    }
    return false;
}

function createUser($username, $email, $password) {
    $conn = connectdb();
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);
    $status = 0; // Giả sử mặc định status là 0

    $stmt = $conn->prepare("INSERT INTO user (user, pass, email, status) VALUES (:user, :pass, :email, :status)");
    $stmt->bindParam(':user', $username);
    $stmt->bindParam(':pass', $password_hashed);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT); // Đảm bảo rằng status được bind với kiểu INT

    return $stmt->execute();
}


function activateUser($email) {
    $conn = connectdb();
    $sql = "UPDATE user SET status = 1 WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

function getUserByEmail($email) {
    $conn = connectdb();
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function savePasswordResetToken($email, $token) {
    $conn = connectdb();
    $sql = "UPDATE user SET reset_token = :token WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

function generateRandomString($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

function getUserByResetToken($token) {
    $conn = connectdb();
    $sql = "SELECT * FROM user WHERE reset_token = :token";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUserPassword($email, $newPassword) {
    $conn = connectdb();
    $password_hashed = password_hash($newPassword, PASSWORD_BCRYPT);
    $sql = "UPDATE user SET pass = :password, reset_token = NULL WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':password', $password_hashed);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

function load_user_infor($id_user){
    $conn = connectdb();
    $sql = "SELECT user, email, phone, address FROM user WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_user);
    $stmt->execute();
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($userInfo ) {
        return $userInfo;
    }
    return false;
}
?>
