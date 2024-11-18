<?php
include "../model/product.php";
include "../model/category.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $additional_description = $_POST['additional_description'];
    $image = $_FILES['product_image']['name'];
    $image_path = "../uploads/" . basename($image);

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $image_path)) {
        insert_product($name, $price, $image, $description, $additional_description, $category_id);
        echo '<script>alert("Thêm sản phẩm thành công");window.location.href="index.php?act=list_product";</script>';
    } else {
        echo "Lỗi tải ảnh lên";
    }
}

$categories = Category::getAllCategories();
?>

<div class="content-wrapper">
    <h2>Thêm sản phẩm mới</h2>
    <form action="index.php?act=add_product" method="POST" enctype="multipart/form-data">
        Tên sản phẩm: <input type="text" name="name" required><br>
        Giá: <input type="number" name="price" required><br>
        Hình ảnh: <input type="file" name="product_image" required><br>
        Mô tả: <textarea name="description"></textarea><br>
        Danh mục: 
        <select name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Thêm sản phẩm">
    </form>
</div>
