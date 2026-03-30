<?php
// 1. Hiển thị Form nhập liệu trong Admin
function sm_add_student_meta_boxes()
{
    add_meta_box('student_details', 'Thông tin chi tiết', 'sm_student_callback', 'student', 'normal', 'high');
}
add_action('add_meta_boxes', 'sm_add_student_meta_boxes');

function sm_student_callback($post)
{
    // Sử dụng Nonce để bảo mật
    wp_nonce_field('sm_save_meta_box', 'sm_meta_box_nonce');

    // Lấy dữ liệu cũ nếu có
    $mssv = get_post_meta($post->ID, '_sm_mssv', true);
    $lop = get_post_meta($post->ID, '_sm_lop', true);
    $ngaysinh = get_post_meta($post->ID, '_sm_ngaysinh', true);

    echo '<p>MSSV: <input type="text" name="sm_mssv" value="' . esc_attr($mssv) . '" /></p>';
    echo '<p>Lớp: <select name="sm_lop">
            <option value="CNTT" ' . selected($lop, 'CNTT', false) . '>CNTT</option>
            <option value="Kinh tế" ' . selected($lop, 'Kinh tế', false) . '>Kinh tế</option>
            <option value="Marketing" ' . selected($lop, 'Marketing', false) . '>Marketing</option>
          </select></p>';
    echo '<p>Ngày sinh: <input type="date" name="sm_ngaysinh" value="' . esc_attr($ngaysinh) . '" /></p>';
}

// 2. Lưu dữ liệu
function sm_save_student_meta($post_id)
{
    if (!isset($_POST['sm_meta_box_nonce']) || !wp_verify_nonce($_POST['sm_meta_box_nonce'], 'sm_save_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $allowed_lop = array('CNTT', 'Kinh tế', 'Marketing');

    if (isset($_POST['sm_mssv'])) {
        update_post_meta($post_id, '_sm_mssv', sanitize_text_field(wp_unslash($_POST['sm_mssv'])));
    }

    if (isset($_POST['sm_lop'])) {
        $lop = sanitize_text_field(wp_unslash($_POST['sm_lop']));
        if (in_array($lop, $allowed_lop, true)) {
            update_post_meta($post_id, '_sm_lop', $lop);
        }
    }

    if (isset($_POST['sm_ngaysinh'])) {
        update_post_meta($post_id, '_sm_ngaysinh', sanitize_text_field(wp_unslash($_POST['sm_ngaysinh'])));
    }
}
add_action('save_post', 'sm_save_student_meta');
