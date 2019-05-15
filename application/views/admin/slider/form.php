<fieldset>
    <div class="form-group<?php echo (form_error('title')) ? ' has-error' : ''; ?>">
        <label for="name">Title *</label>
        <?php echo form_input('title', (isset($record))? set_value("title", $record->title) : set_value("title"), array('class' => 'form-control', 'placeholder' => 'Big title', 'id' => 'title')); ?>
        <?php echo form_error('title', '<span class="help-block">', '</span>') ?>
    </div>
    <div class="form-group<?php echo (form_error('sub_title')) ? ' has-error' : ''; ?>">
        <label for="price">Sub title </label>
        <?php echo form_input('sub_title', (isset($record))? set_value("sub_title", $record->sub_title) : set_value("sub_title"), array('class' => 'form-control', 'placeholder' => 'best deal', 'id' => 'sub_title')); ?>
        <?php echo form_error('sub_title', '<span class="help-block">', '</span>') ?>
    </div>

	<div class="form-group<?php echo (form_error('link')) ? ' has-error' : ''; ?>">
		<label for="link">Link * </label>
		<?php echo form_input('link', (isset($record))? set_value("link", $record->link) : set_value("link"), array('class' => 'form-control', 'placeholder' => '/product/2', 'id' => 'link')); ?>
		<?php echo form_error('link', '<span class="help-block">', '</span>') ?>
	</div>

	<div class="form-group<?php echo (form_error('image')) ? ' has-error' : ''; ?>">
		<label for="image">Image *</label>
		<input type="file" name="image" class="form-control" id="image"/>
		<?php echo form_error('image', '<span class="help-block">', '</span>') ?>
	</div>
</fieldset>
