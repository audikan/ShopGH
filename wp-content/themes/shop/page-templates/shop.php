<?php
/*
 Template Name: Page Shop 
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
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<?php if (is_user_logged_in()) {?>
						<form method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" id="form-login">
							<input type="submit" name="logout" value="Đăng Xuất">
						</form>						
						<?php }else {?>
							<a href="<?php echo get_permalink(201);?>">Đăng Nhập</a>
						<?php } ?>
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
							<?php
								$taxonomy = 'sanpham'; // Taxonomy bạn muốn lấy
								$terms = get_terms( array(
									'taxonomy' => $taxonomy,
									'hide_empty' => false,
								) );

								if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
									foreach ( $terms as $i => $term):								
							?>
                            <li class="<?php if($i == 0) echo 'active';?>" data-filter="<?php echo '.'.$term->slug?>"><?php echo $term->name?></li>    
							<?php endforeach;endif ?>                        
                        </ul>
                    </div>
                </div>
            </div>


			<div class="row product-lists">
				<?php
					$taxonomy = 'sanpham'; // Taxonomy bạn muốn lấy
					$terms = get_terms( array(
						'taxonomy' => $taxonomy,
						'hide_empty' => false,
					) );
					foreach ( $terms as $i => $term):
						$args = array(
							'post_type' => 'product', // Loại bài viết
							'tax_query' => array(
								array(
									'taxonomy' => 'sanpham', // Thay thế bằng tên taxonomy của bạn
									'field'    => 'slug', // Cách bạn muốn tìm kiếm (slug, ID, ...)
									'terms'    => $term->slug, // Thay thế bằng giá trị taxonomy bạn muốn lấy
								)
							),
							'posts_per_page' => 6
						);			
						$query = new WP_Query( $args );

						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
				?>
							<div class="col-lg-4 col-md-6 text-center <?php echo $term->slug?>">
								<div class="single-product-item">
									<div class="product-image">
										<a href="<?php echo get_permalink(get_the_ID());?>"><img src="<?php echo get_field('image_product')?>" alt=""></a>
									</div>
									<h3><?php echo get_field('name_product') ?></h3>
									<p class="product-price"><span><?php echo get_field('calculation_method')?></span> <?php echo get_field('price_product')?></p>
									<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
								</div>
							</div>
							<?php endwhile; endif;endforeach ?>
		</div>
	</div>
	<!-- end products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<?php
		get_footer();
	?>