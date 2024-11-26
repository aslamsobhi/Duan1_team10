<div class="content-wrapper">
    <h2>Kho lưu trữ bình luận</h2>
    <a href="index.php?act=list_comments" class="btn btn-secondary mb-3">Danh sách bình luận</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Ngày xóa</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $comment['id'] ?></td>
                    <td><?= htmlspecialchars($comment['user_id']) ?></td>
                    <td><?= htmlspecialchars($comment['product_id']) ?></td>
                    <td><?= htmlspecialchars($comment['content']) ?></td>
                    <td><?= $comment['deleted_at'] ?></td>
                    <td>
                        <a href="index.php?act=restore_comment&id=<?= $comment['id'] ?>" 
                           class="btn btn-success btn-sm"
                           onclick="return confirm('Bạn có chắc chắn muốn khôi phục bình luận này?')">Khôi phục</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
