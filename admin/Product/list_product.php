<?php
include "../model/product.php";

$products = load_all_products();
?>

<div class="content-wrapper">
    <h2>Danh sách sản phẩm</h2>
    <a href="index.php?act=add_product">Thêm sản phẩm mới</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>

        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= number_format($product['price']) ?> VNĐ</td>
                <td><img src="../uploads/<?= $product['product_image'] ?>" width="50" height="50"></td>
                <td><?= load_category_name($product['category_id']) ?></td>
                <td><?= $product['description'] ?></td>
                <td>
                    <a href="index.php?act=update_product&id=<?= $product['id'] ?>">Sửa</a> | 
                    <a href="index.php?act=delete_product&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
