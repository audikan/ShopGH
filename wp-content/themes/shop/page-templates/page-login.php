<?php
/*
 Template Name: Login
 */
get_header(); ?>
    <div id="wrapper">
        <form method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" id="form-login">
            <h1 class="form-heading">Đăng Nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" name="username" class="form-input" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" name="password" class="form-input" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="forget"> <a href="<?php echo get_permalink(205);?>">Tạo Tài Khoản</a> <a href="">Quên mật khẩu</a></div>
            <input type="submit" name="login" value="Đăng nhập" class="form-submit">
        </form>
    </div>
<?php get_footer(); ?>
