<!-- Breadcrumb area Start -->
<section class="page-title-area bg-color" data-bg-color="#f4f4f4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Giỏ Hàng</h1>
                <ul class="breadcrumb">
                    <li><a href="index.php">trang chủ</a></li>
                    <li class="current"><span>Giỏ Hàng</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="page-content-inner ptb--80 pt-md--40 pb-md--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-md--50">
                    <form class="cart-form" action="#">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="table-content table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <?php
                                            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0){
                                                echo'<tr>
                                                <th>STT</th>
                                                <th>Sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                                <th>Hành động</th>
                                            </tr>';
                                            $i=1;
                                            foreach ($_SESSION['giohang'] as $item) {
                                                $tt = $item[3] * $item[4];
                                                echo'
                                                <tr>
                                                <td>'.$i.'</td>
                                                <td>'.$item[1].'</td>
                                                <td><img src="' . $item[2] . '" style="width: 100px; height: auto;"></td>
                                                <td>' .$item[3]. ' VNĐ</td>
                                                <td>' .$item[4]. '</td>
                                                <td>' .$tt.' VNĐ</td>
                                                <td><a href="" >xoa</a></td>
                                                </tr>';
                                                $i++;
                                                
                                            }
                                            } else {
                                                echo "<tr><td colspan='7'>Chưa có gì trong giỏ hàng</td></tr>";
                                            }
                                            ?>
                                        </thead>
                                    </table>
                                </div>
                                <br>
                                <a href="index.php">tiếp tục mua hàng</a> | <a href="index.php?act=xoagiohang">xoá tất |
                                    <a href="index.php?act=thanhtoan">thanh toán
                                        cả</a>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart-totals">
                            <h5 class="font-size-14 font-bold mb--15">Giỏ Hàng</h5>
                            <div class="cart-calculator">
                                <div class="cart-calculator__item">
                                </div>
                                <div class="cart-calculator__item order-total">
                                </div>
                            </div>
                        </div>
                        <a href="index.php?act=thanhtoan" class="btn btn-size-md btn-shape-square btn-fullwidth">
                            Mua hàng
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->