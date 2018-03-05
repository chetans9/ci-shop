

	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			Women
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			T-Shirt
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Boxy T-Shirt with Roll Sleeve Detail
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
        <?php $this->load->view('partials/flash'); ?>
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
                        <?php foreach ($product_images as $product_image) :?>
						<div class="item-slick3" data-thumb="<?php echo base_url($product_image->path); ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo base_url($product_image->path); ?>" alt="IMG-PRODUCT">
							</div>
						</div>
                        <?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $product->name ?>
				</h4>

				<span class="m-text17">
					<?php echo "Rs. ".number_format($product->price) ?>
				</span>

				<p class="s-text8 p-t-10">
                    <?php echo $product->description ?>
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
<!--					<div class="flex-m flex-w p-b-10">-->
<!--						<div class="s-text15 w-size15 t-center">-->
<!--							Size-->
<!--						</div>-->
<!---->
<!--						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">-->
<!--							<select class="selection-2" name="size">-->
<!--								<option>Choose an option</option>-->
<!--								<option>Size S</option>-->
<!--								<option>Size M</option>-->
<!--								<option>Size L</option>-->
<!--								<option>Size XL</option>-->
<!--							</select>-->
<!--						</div>-->
<!--					</div>-->

<!--					<div class="flex-m flex-w">-->
<!--						<div class="s-text15 w-size15 t-center">-->
<!--							Color-->
<!--						</div>-->
<!---->
<!--						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">-->
<!--							<select class="selection-2" name="color">-->
<!--								<option>Choose an option</option>-->
<!--								<option>Gray</option>-->
<!--								<option>Red</option>-->
<!--								<option>Black</option>-->
<!--								<option>Blue</option>-->
<!--							</select>-->
<!--						</div>-->
<!--					</div>-->

					<div class="flex-r-m flex-w p-t-10">
                        <?php echo form_open(base_url('index.php/add-to-cart')) ?>
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button type="button" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

								<button type="button" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->

                                <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Add to Cart
                                </button>
                                <input type="hidden" name="id" value="<?php echo $product->id ?>">

							</div>
						</div>
                        <?php echo form_close(); ?>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">SKU: MUG-01</span>
					<span class="s-text8">Categories: Mug, Design</span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $product->description; ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


