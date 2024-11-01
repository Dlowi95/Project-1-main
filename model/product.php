<?php
// get all
function getnewproduct($idcatalog=0){
   $sql="SELECT * FROM product WHERE 1";
   if($idcatalog>0){
      $sql.=" AND idcatalog=".$idcatalog;
   }
   $sql.=" ORDER BY id DESC";
   return get_all($sql);
}
function getsaleproduct(){
   $sql="SELECT * FROM product WHERE promotion>0 ORDER BY promotion DESC";
   return get_all($sql);
}
function getviewproduct(){
   $sql="SELECT * FROM product WHERE view>0 ORDER BY view DESC";
   return get_all($sql);
}
function getfeatureproduct(){
   $sql="SELECT * FROM product WHERE new=1 ORDER BY id DESC";
   return get_all($sql);
}
function get_related_product($idcatalog,$idproduct){
   $sql="SELECT * FROM product WHERE idcatalog=".$idcatalog." AND id<>".$idproduct." ORDER BY id DESC";
   return get_all($sql);
}
// get one record
function get_product_detail($idproduct){
   $sql="SELECT * FROM product WHERE id=".$idproduct;
   return get_one($sql);
}
// get value
function get_idcatalog($idproduct){
   $sql="SELECT idcatalog FROM product WHERE id=".$idproduct;
   $getone=get_one($sql);
   extract($getone);
   return $idcatalog;
}
//check khoa ngoai
function check_catalog($idcatalog){
   $sql = "SELECT * FROM product WHERE idcatalog=".$idcatalog;
   $prolist=get_all($sql);
   return count($prolist);
}



/*  ADMIN */
function update_product($id, $id_catalog, $name, $price, $img_name, $mota, $promotion) {
   $sql = "UPDATE product SET 
       idcatalog = :idcatalog, 
       name = :name, 
       price = :price, 
       mota = :mota, 
       promotion = :promotion";
   if ($img_name != "") {
       $sql .= ", img = :img";
   }
   $sql .= " WHERE id = :id";

   $params = [
       ':idcatalog' => $id_catalog,
       ':name' => $name,
       ':price' => $price,
       ':mota' => $mota,
       ':promotion' => $promotion,
       ':id' => $id
   ];

   if ($img_name != "") {
       $params[':img'] = $img_name;
   }

   $conn = connectdb();
   $stmt = $conn->prepare($sql);
   $stmt->execute($params);
}


function delete_product($id) {
   $sql = "DELETE FROM product WHERE id = :id";
   return delete($sql, ['id' => $id]);
}

function insert_product($id_catalog, $name, $price, $img_name, $mota, $promotion) {
   $sql = "INSERT INTO product (idcatalog, name, price, img, mota, promotion) VALUES (:idcatalog, :name, :price, :img, :mota, :promotion)";
   $params = [
       ':idcatalog' => $id_catalog,
       ':name' => $name,
       ':price' => $price,
       ':img' => $img_name,
       ':mota' => $mota,
       ':promotion' => $promotion
   ];
   return insert($sql, $params);
}

// Delete img from product
function get_img_name($id){
   $sql="SELECT img FROM product WHERE id=".$id;
   $img_name = get_one($sql);
   extract($img_name);
   return $img;
}

?>