<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('bugs/create'); ?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea rows ="10" class="form-control" name="description" placeholder="Add Description"></textarea>
    </div>
    <div class="form-group">
        <label>Reproduction</label>
        <textarea rows="10" class="form-control" name="reproduction" placeholder="Add Text"></textarea>
    </div>
    <div class="form-group">
        <label>Error message</label>
        <textarea rows="10" class="form-control" name="error_message" placeholder="Add error message"></textarea>
    </div>
    <div class="form-group">
        <label>Additional information</label>
        <textarea rows="10" class="form-control" name="info" placeholder="Additional information"></textarea>
    <div class="form-group">
        <label>Category</label>
        <select name="bug_category_id" class="form-control">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Severity (Low 1-5 High)</label>
        <select name="severity" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
    </div>
    <div class="form-group">
        <label>Upload image</label>
        <input type="file" name="userfile" size="20">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>