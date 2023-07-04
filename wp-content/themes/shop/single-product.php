<?php
	get_header();
?>

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
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?php echo get_field('image_product')?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo get_field('name_product')?></h3>
						<p class="single-product-pricing"><span><?php echo get_field('calculation_method')?></span> <?php echo get_field('price_product')?>
						<p><?php echo get_field("description");?></p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Categories: </strong>apple</p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	
	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
			<?php 
				$taxonomy = 'sanpham'; // Tên của taxonomy
				$post_id = get_the_ID(); // Lấy ID của bài viết hiện tại		
				// Lấy danh sách các term của taxonomy 'sanpham' cho bài viết hiện tại
				$terms = get_the_terms($post_id, $taxonomy);		
				if ($terms && !is_wp_error($terms)) {
					$dem =0;
					foreach ($terms as $term) {
						$term_slug = $term->slug;
						// Tạo truy vấn để lấy các bài viết khác có cùng term
						$args = array(
							'post_type' => 'product',  // Thay 'post' bằng loại bài viết của bạn
							'tax_query' => array(
								array(
									'taxonomy' => $taxonomy,
									'field' => 'slug',
									'terms' => $term_slug
								)
							),
							'posts_per_page' => 3,  // Số lượng bài viết khác bạn muốn hiển thị
							'post__not_in' => array($post_id)  // Loại bỏ bài viết hiện tại
						);
					
						// Thực hiện truy vấn
						$query = new WP_Query( $args );

						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								$dem++;			
								// Hiển thị thông tin theo mẫu template
								?>
								<div class="col-lg-4 col-md-6 text-center">
									<div class="single-product-item">
										<div class="product-image">
											<a href="<?php echo get_permalink(get_the_ID()); ?>"><img src="<?php echo get_field("image_product"); ?>" alt=""></a>
										</div>
										<h3><?php echo get_field("name_product"); ?></h3>
										<p class="product-price"><span><?php echo get_field('calculation_method');?></span> <?php echo get_field('price_product'); ?></p>
										<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
									</div>
								</div>
								<?php
							endwhile;
						endif;
						if($dem==0){
							echo 'Không tìm thấy bài viết khác.';
						}
					}
				}
			?>
			</div>
		</div>
	</div>
	<!-- end more products -->

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

	<!-- footer -->
	<?php
		get_footer();
	?>
	