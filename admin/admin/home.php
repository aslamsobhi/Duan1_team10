<div class="content-wrapper">
<div class="row">
    <!-- Small boxes -->
    <div class="col-lg-4 col-6">
        <!-- Danh mục -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3><?= isset($totalCategories) ? $totalCategories : '0'; ?></h3>
                <p>Danh Mục</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="index.php?act=list_categories" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- Sản phẩm -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53</h3>
                <p>Sản Phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="index.php?act=list_product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- Đơn hàng -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>
                <p>Đơn Hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <!-- 3 ô nhỏ dưới -->
    <div class="col-lg-4 col-6">
        <!-- Người dùng -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Người Dùng</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="index.php?act=list_user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- Khuyến mãi -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>20</h3>
                <p>Khuyến Mãi</p>
            </div>
            <div class="icon">
                <i class="ion ion-gift"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- Bình luận -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>78</h3>
                <p>Bình luận</p>
            </div>
            <div class="icon">
                <i class="ion ion-chatbox"></i>
            </div>
            <a href="index.php?act=list_comments" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<!-- Large box for statistics and revenue -->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Thống Kê và Doanh Thu</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <!-- Thống kê sản phẩm -->
                    <div class="col-md-6">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="ion ion-bag"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Tổng Số Sản Phẩm</span>
                                <span class="info-box-number">150</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">Tăng 5% trong tháng này</span>
                            </div>
                        </div>
                    </div>

                    <!-- Doanh thu -->
                    <div class="col-md-6">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="ion ion-social-usd"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Tổng Doanh Thu</span>
                                <span class="info-box-number">1,200,000 VNĐ</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%"></div>
                                </div>
                                <span class="progress-description">Tăng 10% trong tháng này</span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
