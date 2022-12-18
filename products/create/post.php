<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    include($_SERVER["DOCUMENT_ROOT"] . '/options/connection_database.php');
    $sql = "INSERT INTO tbl_products (name, price, datecreate, description) VALUES (:name, :price, NOW(), :description);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    $insert_id = $conn->lastInsertId();

    $images = $_POST['images'];
    $count=1;

    foreach ($images as $base64) {
        $dir_save = $_SERVER["DOCUMENT_ROOT"].'/images/';
        $image_name=uniqid().".jpeg";
        $file_save = $dir_save. $image_name;
        list(,$data) = explode(',', $base64);
        $data = base64_decode($data);
        file_put_contents($file_save, $data);
        $sql = "INSERT INTO tbl_product_images(name, datecreate, priority, product_id) VALUES(:name, NOW(), :priority, :product_id)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":name"=>$image_name, ":priority"=>$count, ":product_id"=>$insert_id]);
        $count++;
    }
    header("Location: /");
    exit();
}
