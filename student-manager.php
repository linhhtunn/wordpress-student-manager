<?php

/**
 * Plugin Name: Student Manager
 * Description: Quản lý thông tin sinh viên với CPT và Meta Boxes.
 * Version: 1.0
 * Author: [Tên của bạn]
 */

// Ngăn chặn truy cập trực tiếp vào file
if (!defined('ABSPATH')) exit;

// Định nghĩa đường dẫn
define('SM_PATH', plugin_dir_path(__FILE__));

// Require các file xử lý logic
require_once SM_PATH . 'includes/cpt-student.php';
require_once SM_PATH . 'includes/meta-boxes.php';
require_once SM_PATH . 'includes/shortcode.php';
