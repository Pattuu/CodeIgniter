<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('bug_categories/create'); ?>
    <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>