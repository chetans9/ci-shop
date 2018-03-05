<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products
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
                            <?php $this->load->view('admin/partials/flash') ?>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Pincode</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>
                                </tr>
                                <?php foreach ($records as $record) : ?>
                                <tr>
                                    <td><?php echo $record->id;?></td>
                                    <td><?php echo $record->pincode;?></td>
                                    <td><?php echo $record->total_amt;?></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/admin/'.$this->uri->segment(2).'/show/'.$record->id) ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <button data-toggle="modal" data-target = "#delete-modal<?php echo $record->id ;?>" class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                    <!--                                Delete Modal-->
                                    <div class="modal modal-warning fade" id="delete-modal<?php echo $record->id ;?>">
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
                                                    <?php echo form_open(base_url('index.php/'.uri_string().'/delete/'.$record->id)) ?>
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
                        </div>
                </div>

            </div>
        </div>
    </section>
</div>