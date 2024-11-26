<?php 
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}
include 'model/pdo.php';
include 'model/sanpham.php';
include 'model/danhmuc.php';
include 'view/header.php';
include 'global.php';

$dssp_new=load_sanpham_home();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch($act){
        case 'sanpham':
            // Khởi tạo các biến mặc định
            $category_id = isset($_GET['category_id']) && $_GET['category_id'] > 0 ? $_GET['category_id'] : "";
            $keyw = isset($_POST['search']) ? trim($_POST['search']) : ""; 
            // Xử lý giá trị tìm kiếm (nếu có)
            
            // Tải danh sách sản phẩm và danh mục
            $list_sp_danhmuc = loadAll_sanphampage($keyw, $category_id);
            $list_danhmuc = loadall_danhmuc();
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
        case 'themgiohang':
            if (isset($_POST['themgiohang'])&&($_POST['themgiohang'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                $sl=1;
                $fg=0;
                $i=0;
                foreach ($_SESSION['giohang'] as $item) {
                    if($item[1]===$tensp){
                        $slnew = $sl+$item[4];
                        $_SESSION['giohang'][$i][4]=$slnew;
                        $fg=1;
                        break;
                    }
                    $i++;
                }
                
                if($fg==0){
                $item = array($id,$tensp,$img,$gia,$sl);
                $_SESSION['giohang'][]=$item;
            }
                header('Location: index.php?act=giohang');
                
            }
            // include 'view/cart/giohang.php';
            break;
            case 'xoagiohang':
                if (isset($_POST['giohang'])) unset($_SESSION['giohang']);
                header('Location: index.php');
                break;
        case 'giohang':
            include 'view/cart/giohang.php';
            break;
        case 'thanhtoan':
            include 'view/cart/thanhtoan.php';
            break;
        case 'dangky':
            include 'view/taikhoan/dangky.php';
        case 'dangnhap':
            include 'view/taikhoan/dangnhap.php';
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