


	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url()?>/assets/images/header/cart.jpg); background-position: center;">
		<h2 class="l-text2 t-center">
			Profile
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
                    <div class="card">
                        <?php echo form_open(base_url("index.php/"))?>
                        <div class="effect1 w-size9">
                            <label>Name :</label>
                            <?php echo form_input("name",set_value("name",$user->name),array()); ?>
                            <span class="effect1-line"></span>
                        </div>

                        <div class="effect1 w-size9">
                            <label>Email :</label>
                            <?php echo form_input("name",set_value("name",$user->email),array()); ?>
                            <span class="effect1-line"></span>
                        </div>

                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>

	</section>


