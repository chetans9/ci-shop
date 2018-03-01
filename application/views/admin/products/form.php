<fieldset>
    <div class="form-group<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
        <label for="name">Name *</label>
        <?php echo form_input('name', (isset($record))? set_value("name", $record->name) : set_value("name"), array('class' => 'form-control', 'placeholder' => 'Product name', 'id' => 'name')); ?>
        <?php echo form_error('name', '<span class="help-block">', '</span>') ?>
    </div>
    <div class="form-group<?php echo (form_error('description')) ? ' has-error' : ''; ?>">
        <label for="description">Description *</label>
        <?php echo form_textarea('description', (isset($record))? set_value("description", $record->description) : set_value("description"), array('class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description')); ?>
        <?php echo form_error('description', '<span class="help-block">', '</span>') ?>

    </div>
    <div class="form-group<?php echo (form_error('price')) ? ' has-error' : ''; ?>">
        <label for="price">Price *</label>
        <?php echo form_input('price', (isset($record))? set_value("price", $record->price) : set_value("price"), array('class' => 'form-control', 'placeholder' => '5000', 'id' => 'price')); ?>
        <?php echo form_error('price', '<span class="help-block">', '</span>') ?>
    </div>

    <div class="form-group<?php echo (form_error('images')) ? ' has-error' : ''; ?>">
        <label for="images">images *</label>
        <input type="file" name="images" class="form-control"/>
        <?php echo form_error('images', '<span class="help-block">', '</span>') ?>
    </div>
</fieldset>