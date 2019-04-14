<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        Order Details
                    </div>
                    <?php echo form_open(base_url('index.php/admin/categories/edit/'.$this->uri->segment(4))) ?>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Id</th>
                                <td><?php echo xss_clean($record->id) ?></td>
                            </tr>
                            <tr>
                                <th>User</th>
                                <td><?php echo xss_clean($record->user_name) ?></td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td><?php echo xss_clean($record->email) ?></td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td><?php echo xss_clean($record->delivery_address) ?></td>
                            </tr>
                            <tr>
                                <th>Pincode</th>
                                <td><?php echo xss_clean($record->pincode) ?></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <?php echo form_close() ?>

                </div>

            </div>
        </div>
    </section>
</div>
