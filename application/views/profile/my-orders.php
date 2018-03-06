<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
         style="background-image: url(<?php echo base_url() ?>/assets/images/header/cart.jpg); background-position: center;">
    <h2 class="l-text2 t-center">
        My-orders
    </h2>
</section>

<!-- Profile section -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <!-- Profile Left bar-->
                <?php $this->load->view("profile/sidebar"); ?>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Preview</th>
                        <th>qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order_products as $order_product) :?>
                    <tr>
                        <td> <?php echo $order_product->order_id ;?></td>
                        <td><?php echo $order_product->product_name;?> </td>
                        <td>
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="<?php echo base_url().thumbImage($order_product->product_img)?>">
                            </div>
                        </td>
                        <td><?php echo $order_product->qty;?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>