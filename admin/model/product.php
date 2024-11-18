<?php
// Thêm sản phẩm mới vào bảng products
function insert_product($name, $price, $image, $description, $additional_description, $category_id)
{
    $sql = "INSERT INTO products (name, price, product_image, description, additional_description, category_id) 
            VALUES (:name, :price, :image, :description, :additional_description, :category_id)";
    pdo_execute($sql, ['name' => $name, 'price' => $price, 'image' => $image, 'description' => $description, 'additional_description' => $additional_description, 'category_id' => $category_id]);
}

// Xóa sản phẩm theo id
function delete_product($id)
{
    $sql = "DELETE FROM products WHERE id = :id";
    pdo_execute($sql, ['id' => $id]);
}

// Cập nhật sản phẩm theo id
function update_product($id, $name, $price, $image, $description, $additional_description, $category_id)
{
    if ($image != "") {
        $sql = "UPDATE products SET name = :name, price = :price, product_image = :image, description = :description, 
                additional_description = :additional_description, category_id = :category_id WHERE id = :id";
        pdo_execute($sql, ['id' => $id, 'name' => $name, 'price' => $price, 'image' => $image, 'description' => $description, 'additional_description' => $additional_description, 'category_id' => $category_id]);
    } else {
        $sql = "UPDATE products SET name = :name, price = :price, description = :description, 
                additional_description = :additional_description, category_id = :category_id WHERE id = :id";
        pdo_execute($sql, ['id' => $id, 'name' => $name, 'price' => $price, 'description' => $description, 'additional_description' => $additional_description, 'category_id' => $category_id]);
    }
}

// Lấy tất cả sản phẩm hoặc tìm kiếm theo từ khóa hoặc danh mục
function load_all_products($keyword = "", $category_id = 0)
{
    $sql = "SELECT * FROM products WHERE 1";
    $params = [];

    if ($keyword != "") {
        $sql .= " AND name LIKE :keyword";
        $params['keyword'] = "%$keyword%";
    }

    if ($category_id > 0) {
        $sql .= " AND category_id = :category_id";
        $params['category_id'] = $category_id;
    }

    $sql .= " ORDER BY id DESC";
    return pdo_query($sql, $params);
}

// Lấy danh sách sản phẩm bán chạy theo số lượt xem
function load_best_selling_products()
{
    $sql = "SELECT * FROM products WHERE view > 0 ORDER BY view DESC";
    return pdo_query($sql);
}

// Lấy danh sách 10 sản phẩm có lượt xem cao nhất
function load_top_10_products()
{
    $sql = "SELECT * FROM products ORDER BY view DESC LIMIT 10";
    return pdo_query($sql);
}

// Tải thông tin của các sản phẩm có id trong danh sách (idList) phục vụ cho giỏ hàng
function load_products_by_ids($idList)
{
    $placeholders = implode(',', array_fill(0, count($idList), '?'));
    $sql = "SELECT * FROM products WHERE id IN ($placeholders)";
    return pdo_query($sql, $idList);
}

// Lấy tên danh mục theo id
function load_category_name($category_id)
{
    $sql = "SELECT name FROM categories WHERE id = :id";
    $category = pdo_query_one($sql, ['id' => $category_id]);
    return $category['name'] ?? "";
}
