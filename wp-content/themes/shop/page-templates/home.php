<?php
/*
 Template Name: HomePage
 */
get_header();?>
<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<?php 
			foreach(get_field('repeater_banner') as $k => $banner):
		?>
		<div class="single-homepage-slider" style="background-image: url(<?php echo $banner['image_banner']?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle"><?php echo $banner['sub_title']?></p>
								<h1><?php echo $banner['title_banner']?></h1>
								<div class="hero-btns">
									<a href="<?php echo get_permalink(201)?>" class="boxed-btn">Đăng Nhập</a>
									<a href="<?php echo get_permalink(205)?>" class="bordered-btn">Đăng Kí</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>

	</div>

	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<?php 
					foreach (get_field('repeater_services') as $key => $value):
				?>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="
							<?php 
								switch ($key) {
									case '0':
										echo 'fas fa-shipping-fast';
										break;
									
									case '1':
										echo 'fas fa-phone-volume';
										break;
									case '2':
										echo 'fas fa-sync';
										break;
									default: 
										echo 'fas fa-sync';
										break;
								}
							?>
							fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3><?php echo $value['title_service'];?></h3>
							<p><?php echo $value['description_title'];?></p>
						</div>
					</div>
				</div>
				<?php endforeach?>				
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<?php echo get_field('title_produce')?>
						<p><?php echo get_field('content_product')?></p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php 
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 3,
					);
					$product = new WP_Query($args);
					if ($product-> have_posts()) : while ($product->have_posts()):
						$product-> the_post();
				?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="<?php echo get_field('image_product')?>" alt=""></a>
						</div>
						<h3><?php echo get_field('name_product')?></h3>
						<p class="product-price"><span><?php echo get_field('calculation_method')?></span> <?php echo get_field('price_product');?></p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<?php endwhile;endif; wp_reset_query() ?>
				<!-- <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="<?php echo get_template_directory_uri().'/assets/img/products/product-img-2.jpg'?>" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="<?php echo get_template_directory_uri().'/assets/img/products/product-img-3.jpg'?>" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
                    	<img src="<?php echo get_template_directory_uri().'/assets/img/a.jpg'?>" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Deal</span> of the month</h3>
                    <h4>Hikan Strwaberry</h4>
                    <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                	<a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="<?php echo get_template_directory_uri().'/assets/img/avaters/avatar1.png'?>" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="<?php echo get_template_directory_uri().'/assets/img/avaters/avatar2.png'?>" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="<?php echo get_template_directory_uri().'/assets/img/avaters/avatar3.png'?>" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
					<video controls>
						<source src="<?php echo get_field('advertisement_video');?>" class="video-play-btn popup-youtube">
					</video>
					<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<!-- <?php var_dump(get_field('repeater_comment'));?> -->
						<p class="top-sub"><?php echo get_field('time')?></p>
						<?php echo get_field('advertisement_title')?>
						<p class = 'w-br'><?php echo get_field('advertisement_content')?></p>
						<a href="about.html" class="boxed-btn mt-4"><?php echo get_field('name_button_more')?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<?php echo get_field('title_shop');?>
            <div class="sale-percent"><?php echo get_field('sub_title_shop');?></div>
            <a href="<?php echo get_permalink(18);?>" class="cart-btn btn-lg"><?php echo get_field('name_button_shop')?></a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<?php echo get_field('title_news'); ?>
						<p><?php echo get_field('content_news'); ?></p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
					);
					$post_list = new WP_Query($args);
					if ($post_list-> have_posts()) : while ($post_list->have_posts()):
						$post_list-> the_post();
				?>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="<?php echo get_post_permalink(get_the_ID())?>"><img class="latest-news-bg" src="<?php echo get_field('image_news')?>" alt=""></a>
						<div class="news-text-box">
							<h3><a href="<?php echo get_post_permalink(get_the_ID())?>"><?php echo get_the_title();?></a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i><?php echo get_the_author();?></span>
								<span class="date"><i class="fas fa-calendar"></i><?php echo get_the_time()?></span>
							</p>
							<p class="excerpt"><?php echo get_field('content');?></p>
							<a href="<?php echo get_post_permalink(get_the_ID())?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
					<?php endwhile; endif; wp_reset_query();?>
				<!-- <div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-2"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">A man's worth has its season, like tomato.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-3"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div> -->
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="<?php echo get_permalink(16);?>" class="boxed-btn"><?php echo get_field('name_button_news')?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<?php 
							foreach (get_field('logo_carousel') as $logo):
						?>
						<div class="single-logo-item">
							<img src="<?php echo $logo['image_logo']?>" alt="">
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
	<?php get_footer();?>