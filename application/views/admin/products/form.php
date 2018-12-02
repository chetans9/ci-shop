<fieldset>
    <div class="form-group<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
        <label for="name">Name *</label>
        <?php echo form_input('name', (isset($record))? set_value("name", $record->name) : set_value("name"), array('class' => 'form-control', 'placeholder' => 'Product name', 'id' => 'name')); ?>
        <?php echo form_error('name', '<span class="help-block">', '</span>') ?>
    </div>
    <div class="form-group<?php echo (form_error('category_id')) ? ' has-error' : ''; ?>">
        <label for="category_id">Category *</label>
        <?php
        $select_categories = array();
        foreach ($categories as $category){
            $select_categories[$category['id']] = $category['name'];
        } ?>
        <?php echo form_dropdown('category_id',array(''=>'Select')+$select_categories, (isset($record))? set_value("category_id", $record->category_id) : set_value("category_id"), array('class' => 'form-control', 'placeholder' => '5000', 'id' => 'category_id')); ?>
        <?php echo form_error('category_id', '<span class="help-block">', '</span>') ?>
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

	<div class="form-group<?php echo (form_error('cover_image')) ? ' has-error' : ''; ?>">
		<label for="cover_image">Cover Image *</label>
		<input type="file" name="cover_image" class="form-control" id="cover_image"/>
		<?php echo form_error('cover_image', '<span class="help-block">', '</span>') ?>
	</div>

    <div class="form-group<?php echo (form_error('images[]')) ? ' has-error' : ''; ?>">
        <label for="images">images *</label>
        <input type="file" name="images[]" class="form-control" multiple="multiple"/>
        <?php echo form_error('images[]', '<span class="help-block">', '</span>') ?>
    </div>

    <div class="form-group<?php echo (form_error('status')) ? ' has-error' : ''; ?>">
        <label>Active * &nbsp  </label>

        <label class="radio-inline">
        <?php echo form_radio('status',1,(isset($record)) ?  $record->status :true ,array()); ?>Yes
        </label>

        <label class="radio-inline">
            <?php echo form_radio('active',0,(isset($record) && $record->status == 0) ?  true : false,array()); ?>No
        </label>
        <?php echo form_error('active', '<span class="help-block">', '</span>') ?>
    </div>
</fieldset>
