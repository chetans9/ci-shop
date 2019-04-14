<fieldset>
    <div class="form-group<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
        <label for="name">Name *</label>
        <?php echo form_input('name', (isset($record))? set_value("name", $record->name) : set_value("name"), array('class' => 'form-control', 'placeholder' => 'Product name', 'id' => 'name')); ?>
        <?php echo form_error('name', '<span class="help-block">', '</span>') ?>
    </div>

    <div class="form-group<?php echo (form_error('price')) ? ' has-error' : ''; ?>">
        <label for="price">Parent category</label>
        <?php
        $select_categories = array();
        foreach ($categories as $category){
            $select_categories[$category['id']] = $category['name'];
        } ?>
        <?php echo form_dropdown('parent_id',array(''=>'Select')+$select_categories, (isset($record))? set_value("parent_id", $record->parent_id) : set_value("parent_id"), array('class' => 'form-control', 'placeholder' => '5000', 'id' => 'price')); ?>
        <?php echo form_error('price', '<span class="help-block">', '</span>') ?>
    </div>


	<div class="form-group<?php echo (form_error('cover_image')) ? ' has-error' : ''; ?>">
		<label for="cover_image">Cover Image *</label>
		<input type="file" name="cover_image" class="form-control" id="cover_image"/>
		<?php echo form_error('cover_image', '<span class="help-block">', '</span>') ?>
	</div>
</fieldset>
