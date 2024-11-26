<?php
require_once 'pdo.php';

class Comment
{
    // Lấy danh sách tất cả bình luận
    public static function getAll()
    {
        $sql = "SELECT * FROM comments WHERE deleted_at IS NULL";
        return pdo_query($sql);
    }

    // Lấy bình luận đã bị xóa mềm (archive)
    public static function getArchived()
    {
        $sql = "SELECT * FROM comments WHERE deleted_at IS NOT NULL";
        return pdo_query($sql);
    }

    // Thêm bình luận mới
    public static function add($product_id, $user_id, $content)
    {
        $sql = "INSERT INTO comments (product_id, user_id, content, created_at) 
                VALUES (?, ?, ?, NOW())";
        return pdo_execute($sql, $product_id, $user_id, $content);
    }

    // Cập nhật bình luận
    public static function update($id, $content)
    {
        $sql = "UPDATE comments SET content = ?, updated_at = NOW() WHERE id = ? AND deleted_at IS NULL";
        return pdo_execute($sql, $content, $id);
    }

    // Xóa mềm bình luận
    public static function softDelete($id)
    {
        $sql = "UPDATE comments SET deleted_at = NOW() WHERE id = ?";
        return pdo_execute($sql, $id);
    }

    // Khôi phục bình luận đã bị xóa mềm
    public static function restore($id)
    {
        $sql = "UPDATE comments SET deleted_at = NULL WHERE id = ?";
        return pdo_execute($sql, $id);
    }
}
?>
