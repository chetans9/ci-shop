<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Contact Us
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                        <div class="box-body">
							<div class="box-header with-border">
								<div class="box-title">
								</div>
							</div>
                            <?php $this->load->view('admin/partials/flash') ?>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
									<th>Action</th>
                                </tr>
                                <?php foreach ($contact_us_rows as $contact_us) : ?>
                                <tr>
                                    <td><?php echo $contact_us->id;?></td>
                                    <td><?php echo $contact_us->name;?></td>
                                    <td><?php echo $contact_us->phone?></td>
									<td><?php echo $contact_us->email?></td>


                                    <td>
										<a href="<?php echo base_url('index.php/'.uri_string().'/'.$contact_us->id) ?>">
											<button class="btn btn-primary"><i class="fa fa-eye"></i></button>
										</a>
                                        <button data-toggle="modal" data-target = "#delete-modal<?php echo $contact_us->id ;?>" class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                    <!--                                Delete Modal-->
                                    <div class="modal modal-warning fade" id="delete-modal<?php echo $contact_us->id ;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Delete</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                    <?php echo form_open(base_url('index.php/'.uri_string().'/delete/'.$contact_us->id)) ?>
                                                    <button type="submit" class="btn btn-outline">Yes</button>
                                                    <?php echo form_close() ?>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

							<?php echo $this->pagination->create_links(); ?>
                        </div>
                </div>

            </div>
        </div>
    </section>
</div>
