
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/libs/noui/nouislider.min.css">

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/images/header/shop.jpg') ?>">
		<h2 class="l-text2 t-center">
			SHOP
		</h2>
		<p class="m-text13 t-center">

		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">

					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">

							<li class="p-t-4">
								<a href="<?php echo base_url('index.php/shop/') ?>" class="s-text13 <?php echo ($this->uri->segment(2) == "") ? 'active1':''; ?>">
									All
								</a>
							</li>
                            <?php foreach ($categories as $category) :?>
							<li class="p-t-4">
								<a href="<?php echo base_url('index.php/shop/'.$category->id) ?>" class="s-text13 <?php echo ($this->uri->segment(2) == $category->id) ? 'active1':''; ?>">
									<?php echo $category->name ?>
								</a>
							</li>
                            <?php endforeach; ?>

						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>
						<?php echo form_open('',array('method'=>'GET','id'=>'filters_form'))?>
						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: <span id="price-lower"></span> - <span id="price-upper"></span>
								</div>
                                <input type="hidden" id="min_price" name="min_price" value="<?php echo $this->input->get('min_price'); ?>">
                                <input type="hidden" id="max_price" name="max_price" value="<?php echo $this->input->get('max_price'); ?>">
							</div>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search_str" value="<?php echo $this->input->get('search_str'); ?>" id="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4 filter_button">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						<?php echo  form_close() ?>
					</div>

				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <?php echo form_dropdown("sort_type",array(""=>"Default","asc" => "Price: low to high","desc"=>"Price: high to low"),$this->input->get('sort_type'),array("class"=>"selection-2","id"=>"sort_type")) ?>
							</div>
						</div>
						<span class="s-text8 p-t-5 p-b-5">
							<?php echo "Showing 1-9 of ".$total_rows; ?> results
						</span>
					</div>
					<!-- Products -->
					<div class="row">
                        <?php $this->load->view('partials/flash'); ?>
                        <?php
                        $product_count = 1;

                        foreach ($products as $product) : ?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">

                                    <img src="<?php echo product_images($product->cover_image) ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4" data-product-id="<?php echo $product->id ?>">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
                                            <?php echo form_open(base_url('index.php/add-to-cart')); ?>


											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
                                            <input type="hidden" name="id" value="<?php echo $product->id ?>">
                                            <?php echo form_close(); ?>
										</div>
									</div>
								</div>
								<div class="block2-txt p-t-20">
									<a href="<?php echo base_url("index.php/product/$product->id"); ?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $product->name; ?>
									</a>
									<span class="block2-price m-text6 p-r-5">
										Rs <?php echo number_format($product->price); ?>
									</span>
								</div>
							</div>
						</div>
                        <?php if($product_count%3 == 0) : ?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                        <?php
                            $product_count ++;


                        endforeach; ?>
					</div>
                    <?php echo $this->pagination->create_links(); ?>
				</div>

			</div>
		</div>
	</section>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });

        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect2')
        });
    </script>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets/libs/noui/nouislider.min.js')?>"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');
        var noui_initial_min =  0;
        var noui_initial_max = 1000000;

        var min_price_selected = document.getElementById('min_price').value;
        var max_price_selected = document.getElementById('max_price').value;
        if(min_price_selected){
            noui_initial_min = min_price_selected;
        }
        if(max_price_selected){
            noui_initial_max = max_price_selected;
        }

	    noUiSlider.create(filterBar, {
	        start: [noui_initial_min,noui_initial_max],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 1000000
	        }
	    });

	    var skipValues = [
	    document.getElementById('price-lower'),
	    document.getElementById('price-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {

	        skipValues[handle].innerHTML = Math.round(values[handle]) ;

	        //Update
            document.getElementById('min_price').value = Math.round(values[0]);
            document.getElementById('max_price').value = Math.round(values[1]);

	    });
	</script>
<script>
    $('#sort_type').change(function () {
        $('#filters_form').submit();
    });
</script>
