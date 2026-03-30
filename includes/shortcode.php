<?php
function sm_enqueue_shortcode_styles()
{
    if (!is_singular()) {
        return;
    }

    global $post;
    if (!$post || !isset($post->post_content) || !has_shortcode($post->post_content, 'danh_sach_sinh_vien')) {
        return;
    }

    wp_enqueue_style(
        'sm-student-list-style',
        plugins_url('assets/student-table.css', dirname(__FILE__)),
        array(),
        '1.1.0'
    );
}
add_action('wp_enqueue_scripts', 'sm_enqueue_shortcode_styles');

function sm_list_students_shortcode()
{
    $args = array('post_type' => 'student', 'posts_per_page' => -1);
    $query = new WP_Query($args);

    if (!$query->have_posts()) return 'Không có sinh viên nào.';

    $output = '<div class="sm-student-table-wrapper"><table class="sm-student-table">
                <thead>
                    <tr>
                        <th>STT</th><th>MSSV</th><th>Họ tên</th><th>Lớp</th><th>Ngày sinh</th>
                    </tr>
                </thead>
                <tbody>';

    $i = 1;
    while ($query->have_posts()) {
        $query->the_post();
        $mssv = get_post_meta(get_the_ID(), '_sm_mssv', true);
        $lop = get_post_meta(get_the_ID(), '_sm_lop', true);
        $ngaysinh = get_post_meta(get_the_ID(), '_sm_ngaysinh', true);
        $title = get_the_title();

        $output .= "<tr>
                        <td><span class=\"sm-index-badge\">" . esc_html($i) . "</span></td>
                        <td>" . esc_html($mssv) . "</td>
                        <td>" . esc_html($title) . "</td>
                        <td><span class=\"sm-class-badge\">" . esc_html($lop) . "</span></td>
                        <td>" . esc_html($ngaysinh) . "</td>
                    </tr>";
        $i++;
    }
    $output .= '</tbody></table></div>';
    wp_reset_postdata();
    return $output;
}
add_shortcode('danh_sach_sinh_vien', 'sm_list_students_shortcode');
