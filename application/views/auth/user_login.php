<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
	<div class="container">
		<div class="row">


			<div class="col-lg-offset-3 col-md-6 p-b-30">
				<?php $this->load->view('partials/flash') ?>

				<?php echo form_open(base_url('index.php/user-login')) ?>
				<h4 class="m-text26 p-b-36 p-t-15">
					Login
				</h4>

				<?php echo validation_errors('<div class="error" style="color: red; margin-bottom: 5px;">', '</div>'); ?>

				<div class="bo4 of-hidden size15 m-b-20">
					<?php echo form_input('email', set_value("email"), array('class' => 'sizefull s-text7 p-l-22 p-r-22', 'placeholder' => 'Email', 'id' => 'email')); ?>
				</div>

				<div class="bo4 of-hidden size15 m-b-20">

					<input type="password" name="password" class="sizefull s-text7 p-l-22 p-r-22" id="password" placeholder="Password">


				</div>


				<div class="w-size25">
					<!-- Button -->
					<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
						Login
					</button>
				</div>
				<!--				</form>-->
				<?php echo  form_close() ?>
			</div>
		</div>
	</div>
</section>
