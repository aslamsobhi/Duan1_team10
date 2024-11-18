<?php 
session_start();
include 'model/pdo.php';
include 'model/sanpham.php';
include 'view/header.php';
include 'global.php';
$dssp_new=load_sanpham_home();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch($act){
        case 'sanpham':
            $category_id = "";
            if (isset($_GET['category_id']) && ($_GET['category_id']) > 0) {
                $category_id = $_GET['category_id'];
            }
            if (isset($_POST['search']) && ($_POST['search'])) {
                $keyw = $_POST['search'];
            } else {
                $keyw = '';
            }
            $list_sp_danhmuc = loadAll_sanphampage($keyw, $category_id);
            include 'view/sanpham.php';
            break;
        case 'chitietsp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $id = $_GET['id'];
                $category_id = "";
                $load__one = loadone_sanpham($id);
                $load__size = loadAll_size();
                extract($load__one);
                $load__sp__cungloai = load_sanpham_cungloai($id, $category_id);
                include "view/chitietsp.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'giohang':
            include 'view/cart/giohang.php';
            break;
        case 'thanhtoan':
            include 'view/cart/thanhtoan.php';
            break;
        case 'dangky-dangnhap':
            include 'view/taikhoan/dangky-dangnhap.php';
        case 'lienhe':
            include 'view/lienhe.php';
        case 'blog':
            include 'view/blog.php';
       
    }
} else {
    
   include 'view/home.php';
}
include 'view/footer.php';

?>