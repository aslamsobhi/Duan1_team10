<?php
require_once 'pdo.php';

class user {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Hàm login
    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username AND is_active = 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user; // Trả về thông tin người dùng nếu mật khẩu đúng
        }
        return false; // Đăng nhập không thành công
    }
}
?>
