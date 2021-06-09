<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('bugs/update'); ?>
    <input type="hidden" name="id" value="<?php echo $bug['bug_id']; ?>">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $bug['title']; ?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea rows="10" class="form-control" name="description" placeholder="Add Description"><?php echo $bug['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Reproduction</label>
        <textarea rows="10" class="form-control" name="reproduction" placeholder="Add Text"><?php echo $bug['reproduce']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Error Message</label>
        <textarea rows="10" class="form-control" name="error_message" placeholder="Add Error Message"><?php echo $bug['error_message']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Additional Information</label>
        <textarea rows="10" class="form-control" name="info" placeholder="Additional Information"><?php echo $bug['info']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Bug Category</label>
        <select name="category_id" class="form-control">
            <option value="<?php echo $bug['bug_category_id']; ?>"><?php echo $name; ?></option>
            <?php foreach($bug_categories as $bug_category): ?>
                <?php if($bug_category['id'] != $bug['bug_category_id']): ?>
                    <option value="<?php echo $bug_category['id']; ?>"><?php echo $bug_category['name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Severity (Low 1-5 High)</label>
        <select name="severity" class="form-control">
            <option value="<?php echo $bug['severity']; ?>"><?php echo $bug['severity']; ?></option>
            <?php for($x=1;$x<6;$x++): ?>
                <?php if($x != $bug['severity']): ?>
                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endif; ?>
            <?php endfor; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>