

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo base_url('images/contact_us.jpg') ?>);">
	<h2 class="l-text2 t-center">
		Contact Us
	</h2>
</section>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-b-30">
				<div class="p-r-20 p-r-0-lg">
					<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
				</div>
			</div>

			<div class="col-md-6 p-b-30">
				<?php $this->load->view('partials/flash') ?>

				<?php echo form_open(base_url('index.php/contact-us')) ?>
					<h4 class="m-text26 p-b-36 p-t-15">
						Send us your message
					</h4>

				<?php echo validation_errors('<div class="error" style="color: red; margin-bottom: 5px;">', '</div>'); ?>

					<div class="bo4 of-hidden size15 m-b-20">
						<?php echo form_input('name', set_value("name"), array('class' => 'sizefull s-text7 p-l-22 p-r-22', 'placeholder' => 'Name', 'id' => 'name')); ?>
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<?php echo form_input('phone', set_value("phone"), array('class' => 'sizefull s-text7 p-l-22 p-r-22', 'placeholder' => 'Phone Number', 'id' => 'phone')); ?>
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<?php echo form_input('email', set_value("email"), array('class' => 'sizefull s-text7 p-l-22 p-r-22', 'placeholder' => 'Email', 'id' => 'email')); ?>
					</div>
					<?php echo form_textarea('message', set_value("message"), array('class' => 'dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20', 'placeholder' => 'message', 'id' => 'message')); ?>

					<div class="w-size25">
						<!-- Button -->
						<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
							Send
						</button>
					</div>
<!--				</form>-->
				<?php echo  form_close() ?>
			</div>
		</div>
	</div>
</section>


