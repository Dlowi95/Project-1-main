<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function pdo_execute($sql, $params = []){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=Demo_jessica", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(':' . $key, $val);
        }
        $stmt->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function get_catalog(){
    $sql = "SELECT * FROM catalog ORDER BY name";
    return get_all($sql);
}
function get_catalog_one($id){
    $sql = "SELECT * FROM catalog WHERE id =".$id;
    return get_one($sql);
}

function set_catalog($id,$name){
    $sql = "UPDATE catalog SET name = '".$name."' WHERE id = $id";
    update($sql);
}

function delete_catalog($id){
    $checkcatalog = check_catalog($id);
    
    if ($checkcatalog > 0) {
        $tb = "Danh mục đã có khóa ngoại không xóa được!!";
    } else {
        $sql = "DELETE FROM catalog WHERE id = :id";
        $stmt = pdo_execute($sql, ['id' => $id]);
        $tb = "Xóa thành công";
    }
    return $tb;
}

function insert_catalog($tenloai){
    $sql = "INSERT INTO catalog (name) VALUES (:name_catalog)";
    pdo_execute($sql, ['name_catalog' => $tenloai]);
}


?>
