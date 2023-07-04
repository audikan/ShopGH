<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri().'/assets/img/favicon.png'?>">
	<!-- title -->
	<title>Gia Hân Shop</title>

	<!-- favicon -->
	
	<!-- google font -->
	
	<?php wp_head();?>
</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="<?php echo get_home_url();?>">
								<img src="<?php echo get_template_directory_uri().'/assets/img/logo.png'?>" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
									<?php
										wp_nav_menu( 
											array( 
												'theme_location' => 'main-menu-top', 
												'container' => 'false', 
												'menu_id' => 'header-menu', 
												'menu_class' => 'menu_header'
											) 
										);
									?>	
									<?php
										if (isset($_COOKIE['wordpress_logged_in_'])) {
											$cookieValue = $_COOKIE['wordpress_logged_in_'];
											$user_data = wp_validate_auth_cookie($cookieValue, 'logged_in');
											var_dump($user_data);
										}
									?>								
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>