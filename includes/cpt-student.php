<?php
function sm_register_student_post_type()
{
    $labels = array(
        'name' => 'Sinh viên',
        'singular_name' => 'Sinh viên',
        'menu_name' => 'Sinh viên',
        'add_new' => 'Thêm sinh viên mới',
        'add_new_item' => 'Thêm sinh viên',
        'edit_item' => 'Sửa thông tin sinh viên',
        'new_item' => 'Sinh viên mới',
        'view_item' => 'Xem sinh viên',
        'search_items' => 'Tìm kiếm sinh viên',
        'not_found' => 'Không tìm thấy sinh viên',
        'not_found_in_trash' => 'Không có sinh viên trong thùng rác',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-id', // Icon thẻ sinh viên
        'supports' => array('title', 'editor'), // Họ tên và Tiểu sử
        'rewrite' => array('slug' => 'sinh-vien'),
    );

    register_post_type('student', $args);
}
add_action('init', 'sm_register_student_post_type');
