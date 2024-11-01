<?php

// Hàm kết nối cơ sở dữ liệu
function connectdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=Demo_jessica", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

// Hàm lấy tất cả các bản ghi
function get_all($sql, $params = []) {
    $conn = connectdb();
    if ($conn === null) {
        return [];
    }

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        return [];
    } finally {
        $conn = null;
    }
}

// Hàm lấy một bản ghi
function get_one($sql, $params = []) {
    $conn = connectdb();
    if ($conn === null) {
        return null;
    }

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        return null;
    } finally {
        $conn = null;
    }
}

// Hàm cập nhật dữ liệu
function update($sql, $params = []) {
    $conn = connectdb();
    if ($conn === null) {
        return false;
    }

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($params);
        if (!$result) {
            $errorInfo = $stmt->errorInfo();
            echo "Update failed: " . $errorInfo[2];
        }
        return $result;
    } catch (PDOException $e) {
        echo "Update failed: " . $e->getMessage();
        return false;
    } finally {
        $conn = null;
    }
}

// Hàm xóa dữ liệu
function delete($sql, $params = []) {
    $conn = connectdb();
    if ($conn === null) {
        return false;
    }

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($params);
        if (!$result) {
            $errorInfo = $stmt->errorInfo();
            echo "Delete failed: " . $errorInfo[2];
        }
        return $result;
    } catch (PDOException $e) {
        echo "Delete failed: " . $e->getMessage();
        return false;
    } finally {
        $conn = null;
    }
}

// Hàm chèn dữ liệu
function insert($sql, $params = []) {
    $conn = connectdb();
    if ($conn === null) {
        return false;
    }

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($params);
        if (!$result) {
            $errorInfo = $stmt->errorInfo();
            echo "Insert failed: " . $errorInfo[2];
        }
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        echo "Insert failed: " . $e->getMessage();
        return false;
    } finally {
        $conn = null;
    }
}

function getBaseUrl() {
    // Check if the server is running on localhost
    if ($_SERVER['SERVER_NAME'] == 'localhost') {
        return 'http://localhost/Project_demo'; // You can append port number if necessary
    } else {
        // Assuming you're using www.example.com for production
        return 'https://www.dlow2.id.vn'; // Replace with your actual domain
    }
}

function getLoginUrl() {
    return getBaseUrl() . '/login.php';
}

?>
