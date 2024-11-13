<?php
include "../model/product.php";
include "../model/category.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Sử dụng pdo_query_one() để lấy thông tin sản phẩm
    $sql = "SELECT * FROM products WHERE id = :id";
    $product = pdo_query_one($sql, ['id' => $product_id]);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $additional_description = $_POST['additional_description'];
        $image = $_FILES['product_image']['name'];

        if ($image) {
            $image_path = "../uploads/" . basename($image);
            move_uploaded_file($_FILES['product_image']['tmp_name'], $image_path);
        } else {
            $image = $product['product_image'];
        }

        update_product($product_id, $name, $price, $image, $description, $additional_description, $category_id);
        echo '<script>alert("Cập nhật sản phẩm thành công");window.location.href="index.php?act=list_product";</script>';
    }

    $categories = Category::getAllCategories();
?>

<div class="content-wrapper">
    <h2>Cập nhật sản phẩm</h2>
    <form action="index.php?act=update_product&id=<?= $product_id ?>" method="POST" enctype="multipart/form-data">
        Tên sản phẩm: <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
        Giá: <input type="number" name="price" value="<?= $product['price'] ?>" required><br>
        Hình ảnh: <input type="file" name="product_image"><br>
        <img src="../uploads/<?= $product['product_image'] ?>" width="50" height="50"><br>
        Mô tả: <textarea name="description"><?= $product['description'] ?></textarea><br>
        Mô tả thêm: <textarea name="additional_description"><?= $product['additional_description'] ?></textarea><br>
        Danh mục:
        <select name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['id'] ?>" <?= ($category['id'] == $product['category_id']) ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Cập nhật sản phẩm">
    </form>
</div>

<?php
} else {
    echo '<script>alert("Không tìm thấy sản phẩm!");window.location.href="index.php?act=list_product";</script>';
}
?>
