<?php
session_start();
include "header.php";
include "navbar.php";
include "sidebar.php";
include "../model/pdo.php";
include "../model/product.php";
// include "../model/category.php";

// Kiểm tra quyền Admin
if ($_SESSION['role'] != 1) {
    echo '<script>alert("Bạn không phải Admin");window.location.href="../index.php";</script>';
    exit();
}

// Điều hướng hành động
if (isset($_GET["act"]) && $_GET["act"] != "") {
    $act = $_GET["act"];
    switch ($act) {
        // sản phẩm
        case 'list_product':
            include "list_product.php";
            break;
        case 'add_product':
            include "add_product.php";
            break;
        case 'update_product':
            if (isset($_GET['id'])) {
                include "update_product.php";
            } else {
                echo '<script>alert("Không tìm thấy sản phẩm!");window.location.href="index.php?act=list_product";</script>';
            }
            break;
        case 'delete_product':
            if (isset($_GET['id'])) {
                delete_product($_GET['id']);
                echo '<script>alert("Xóa sản phẩm thành công");window.location.href="index.php?act=list_product";</script>';
            }
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
