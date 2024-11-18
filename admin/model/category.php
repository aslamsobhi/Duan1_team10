<?php
include_once "pdo.php";

class Category {
    
    // Lấy tất cả danh mục
    public static function getAllCategories() {
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        return pdo_query($sql);
    }

    // Lấy danh mục theo ID
    public static function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        return pdo_query_one($sql, $id);
    }

    // Thêm danh mục mới
    public static function addCategory($name, $status) {
        $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
        return pdo_execute($sql, $name, $status);
    }

    // Cập nhật danh mục
    public static function updateCategory($id, $name, $status) {
        $sql = "UPDATE categories SET name = ?, status = ? WHERE id = ?";
        return pdo_execute($sql, $name, $status, $id);
    }

    // Xóa danh mục
    public static function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        return pdo_execute($sql, $id);
    }
}
