
<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">

				<?php foreach ($slider_images as $slider_image) { ?>
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('images/slider/'.$slider_image->path) ?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo xss_clean($slider_image->sub_title) ?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?php echo xss_clean($slider_image->title) ?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<?php } ?>





			</div>
		</div>
	</section>


<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">

			<?php foreach ($categories as $category) : ?>
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="<?php echo  base_url('/images/categories/'.$category->cover_image);?>" alt="IMG-BENNER">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="<?php echo base_url('index.php/shop/'.$category->id);  ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            <?php echo xss_clean($category->name); ?>
                        </a>
                    </div>
                </div>
            </div>
			<?php endforeach ?>
        </div>
    </div>
</section>
