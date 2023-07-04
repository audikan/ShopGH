<?php 
    if (!function_exists('GH_theme_setup')) {
        function GH_theme_setup()
        {
            add_theme_support('post-thumbnails');
            // add_image_size( 'custom-size', 320, 320 );
            register_nav_menu('main-menu-top', __('Main Menu Top', 'TOT'));
            register_nav_menu('main-menu-button', __('Main Menu Button', 'TOT'));
            register_nav_menu('main-menu-bottom', __('Main Menu Bottom', 'TOT'));
        }
        add_action('init', 'GH_theme_setup');
    }

    function GH_style(){
        wp_register_style('all-css', get_template_directory_uri() . "/assets/css/all.min.css", 'all');
        wp_enqueue_style('all-css');

        wp_register_style('bootstrap-css', get_template_directory_uri() . "/assets/bootstrap/css/bootstrap.min.css", 'all');
        wp_enqueue_style('bootstrap-css');

        wp_register_style('owl-css', get_template_directory_uri() . "/assets/css/owl.carousel.css", 'all');
        wp_enqueue_style('owl-css');

        wp_register_style('popup-css', get_template_directory_uri() . "/assets/css/magnific-popup.css", 'all');
        wp_enqueue_style('popup-css');

        wp_register_style('animate-css', get_template_directory_uri() . "/assets/css/animate.css", 'all');
        wp_enqueue_style('animate-css');

        wp_register_style('menu-css', get_template_directory_uri() . "/assets/css/meanmenu.min.css", 'all');
        wp_enqueue_style('menu-css');

        wp_register_style('main-css', get_template_directory_uri() . "/assets/css/main.css", 'all');
        wp_enqueue_style('main-css');

        wp_register_style('reponsive-css', get_template_directory_uri() . "/assets/css/responsive.css", 'all');

        wp_enqueue_style('reponsive-css');

        // ========================================= Nhung JS =========================================

        wp_register_script('jquery-js', get_template_directory_uri() . "/assets/js/jquery-1.11.3.min.js", 'all', '', true);
        wp_enqueue_script('jquery-js');

        wp_register_script('bootstrap-js', get_template_directory_uri() . "/assets/bootstrap/js/bootstrap.min.js", 'all', '', true);
        wp_enqueue_script('bootstrap-js');

        wp_register_script('countdown-js', get_template_directory_uri() . "/assets/js/jquery.countdown.js", 'all', '', true);
        wp_enqueue_script('countdown-js');

        wp_register_script('isotope-js', get_template_directory_uri() . "/assets/js/jquery.isotope-3.0.6.min.js", 'all', '', true);
        wp_enqueue_script('isotope-js');

        wp_register_script('waypoints-js', get_template_directory_uri() . "/assets/js/waypoints.js", 'all', '', true);
        wp_enqueue_script('waypoints-js');

        wp_register_script('carousel-js', get_template_directory_uri() . "/assets/js/owl.carousel.min.js", 'all', '', true);
        wp_enqueue_script('carousel-js');

        wp_register_script('magnific-popup-js', get_template_directory_uri() . "/assets/js/jquery.magnific-popup.min.js", 'all', '', true);
        wp_enqueue_script('magnific-popup-js');

        wp_register_script('meanmenu-js', get_template_directory_uri() . "/assets/js/jquery.meanmenu.min.js", 'all', '', true);
        wp_enqueue_script('meanmenu-js');

        wp_register_script('sticker-js', get_template_directory_uri() . "/assets/js/sticker.js", 'all', '', true);
        wp_enqueue_script('sticker-js');

        if(is_page_template('page-templates/contact.php')){
            wp_register_script('validate-js', get_template_directory_uri() . "/assets/js/form-validate.js", 'all', '', true);
            wp_enqueue_script('validate-js');
        }

        wp_register_script('main-js', get_template_directory_uri() . "/assets/js/main.js", 'all', '', true);
        wp_enqueue_script('main-js');

        if(is_page_template('page-templates/page-login.php') || is_page_template('page-templates/page-register.php')){
            wp_register_script('login-js', get_template_directory_uri() . "/assets/js/login.js", 'all', '', true);
            wp_enqueue_script('login-js');

            wp_register_style('login-css', get_template_directory_uri() . "/assets/css/login.css", 'all');
            wp_enqueue_style('login-css');
        }
    }
    add_action('wp_enqueue_scripts', 'GH_style');

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'  => 'Theme Settings',
            'menu_title'  => 'Theme Settings',
            'menu_slug'   => 'theme-general-settings',
            'capability'  => 'edit_posts',
            'redirect'    => false,
            'icon_url'    => 'dashicons-dashboard'
        ));
    }

    function product_post_type()
    {
        $label = array(
            'name' => 'Product', //Tên post type dạng số nhiều
            'singular_name' => 'Products' //Tên post type dạng số ít
        );
        $args = array(
            'labels' => $label, //Gọi các label trong biến $label ở trên
            'description' => 'Post type Product', //Mô tả của post type
            'supports' => array(
                'title',
                'editor',
                // 'excerpt',
                'author',
                'thumbnail',
                'comments',
                // 'trackbacks',
                // 'revisions',
                // 'custom-fields'
            ), //Các tính năng được hỗ trợ trong post type
            'taxonomies' => array('sanpham' ), //Các taxonomy được phép sử dụng để phân loại nội dung
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 3.2, //Thứ tự vị trí hiển thị trong menu (tay trái)
            'menu_icon' => 'dashicons-products', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'capability_type' => 'post' //
        );
        register_post_type('product', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
    }
    add_action('init', 'product_post_type');

    //------------------------------------------------ Đăng kí tài khoản -----------------------------------------------
    function custom_register_user() {
        $username_error = '';
        $password_error = '';
        $email_error = '';
    
        if (isset($_POST['register_submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
    
            if (empty($username)) {
                $username_error = 'Vui lòng nhập tên người dùng.';
            } else if (username_exists($username)) {
                $username_error = 'Tên người dùng đã tồn tại.';
            }
    
            if (empty($password)) {
                $password_error = 'Vui lòng nhập mật khẩu.';
            }
    
            if (empty($email)) {
                $email_error = 'Vui lòng nhập địa chỉ email.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = 'Email không hợp lệ.';
            } else {
                wp_create_user($username, $password, $email);
                $user_id = wp_create_user($username, $password, $email);
                if (!is_wp_error($user_id)) {
                    // Đăng ký thành công
                    echo 'Đăng ký thành công!';
                } else {
                    // Xử lý lỗi khi tạo tài khoản
                    $registration_error = $user_id->get_error_message();
                    echo 'Lỗi khi đăng ký: ' . $registration_error;
                }
            }
        }
        ?>
        <form method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" id="form-login">
            <h1 class="form-heading">Đăng Kí</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" name="username" class="form-input" placeholder="Tên đăng nhập">
            </div>            
            <div class="error-message"><?php echo $username_error;?></div>
    
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" name="password" class="form-input" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="error-message"><?php echo $password_error;?></div>

            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="email" name="email" class="form-input" placeholder="Email">                   
            </div>  
            <div class="error-message"><?php echo $email_error;?></div>             

            <div class="back">
                <a href="<?php echo get_permalink(201);?>">Quay lại đăng nhập</a>              
            </div>                  
            <input type="submit" name="register_submit" value="Đăng kí" class="form-submit">
        </form>
        <?php
    }
add_shortcode('registration_form', 'custom_register_user');

    // -------------------------------------------------- Đăng Nhập ----------------------------------------------
    function custom_login() {
        if ( isset( $_POST['login'] ) ) {
            $login_data = array(
                'user_login'    => sanitize_user( $_POST['username'] ),
                'user_password' => esc_attr( $_POST['password'] ),
                'remember'      => true,
            );
    
            $user = wp_signon( $login_data, false );
    
            if ( is_wp_error( $user ) ) {
                // Xử lý lỗi đăng nhập
                echo '<script>alert("Đăng nhập không thành công. Vui lòng kiểm tra thông tin đăng nhập của bạn.");</script>';
            } else {
                wp_redirect(get_permalink(18) );
                exit;
            }
        }
    }
    add_action( 'init', 'custom_login' );

    // -------------------------------------------------- Đăng Xuất ----------------------------------------------
    function custom_logout() {
        if ( isset( $_POST['logout'] )){   
        wp_logout();
        wp_redirect( get_permalink(201) ); // Điều hướng về trang chủ sau khi đăng xuất
        exit;
        }
    }
    add_action( 'init', 'custom_logout' );

    // ----------------------------------------------- TAXONAMI -----------------------------------------------
    // Đăng ký taxonomy
function custom_products() {
    $labels = array(
        'name'              => _x( 'Sản phẩm', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Sản Phẩm', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Tìm kiếm Sản Phẩm', 'textdomain' ),
        'all_items'         => __( 'Tất cả Sản Phẩm', 'textdomain' ),
        'edit_item'         => __( 'Sửa Sản Phẩm', 'textdomain' ),
        'update_item'       => __( 'Cập nhật Sản Phẩm', 'textdomain' ),
        'add_new_item'      => __( 'Thêm Sản Phẩm mới', 'textdomain' ),
        'new_item_name'     => __( 'Tên Sản Phẩm mới', 'textdomain' ),
        'menu_name'         => __( 'Products', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => false, // true nếu muốn taxonomy có cấu trúc phân cấp, false nếu không
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'sanpham' ), // Định dạng URL cho taxonomy
    );

    register_taxonomy( 'sanpham', array( 'post' ), $args ); // 'theloai' là slug của taxonomy, 'post' là post type áp dụng taxonomy
}
add_action( 'init', 'custom_products', 0 );
