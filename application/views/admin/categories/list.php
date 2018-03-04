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
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">
                            <a href="<?php echo base_url('index.php/'.uri_string()).'/create' ?>" class="btn btn-success"> Add new</a>
                        </div>
                    </div>
                        <div class="box-body">
                            <?php $this->load->view('admin/partials/flash') ?>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                <?php foreach ($records as $record) : ?>
                                <tr>
                                    <td><?php echo $record->id;?></td>
                                    <td><?php echo $record->name;?></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/admin/'.$this->uri->segment(2).'/edit/'.$record->id) ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="<?php echo base_url('index.php/admin/products/edit/'.$record->id) ?>" class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                </div>

            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('.delete_record').click(function () {
            alert();
        });
    });
</script>