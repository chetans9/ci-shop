


	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url()?>images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Checkout
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
            <?php $this->load->view('partials/flash'); ?>
			<!-- Cart item -->
            <?php echo form_open('cart/update'); ?>
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2"></th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
                        <?php
                        $i = 0;
                        foreach ($cart as $item) : ?>

						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo (isset($item['options']['product_image'])) ? base_url() .$item['options']['product_image']: "";  ?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?php echo $item['name']; ?></td>
							<td class="column-3"><?php echo $item['price']; ?></td>
							<td class="column-4">
                                   <?php echo $item['qty'] ?>

							</td>
							<td class="column-5"><?php echo $item['subtotal']; ?></td>
						</tr>
                        <?php
                            $i++;
                        endforeach; ?>
					</table>
				</div>
			</div>
            <?php echo form_close() ?>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Order
				</h5>
                <?php echo validation_errors(); ?>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo "Rs. ".number_format($this->cart->total())." /-"; ?>
					</span>
				</div>
				<!--  -->
                <?php echo form_open(base_url('index.php/place-order')) ?>
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo "Rs. ".number_format($this->cart->total())." /-"; ?>
					</span>
				</div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Delivery Address:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
                         <?php echo form_input('delivery_address',set_value('delivery_address'),array("class"=>"form-control","required"=>"required")) ?>
					</span>
                </div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Pincode :
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
                         <?php echo form_input('pincode',set_value('pincode'),array("class"=>"form-control","required"=>"required")) ?>
					</span>
                </div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Place Order
					</button>
				</div>
                <?php echo form_close() ?>
            </div>
			</div>

	</section>


