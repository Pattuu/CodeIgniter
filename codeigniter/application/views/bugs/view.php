<h1><?php echo $bug['title']; ?></h1>
<small class="post-date">Reported on: <strong><?php echo $bug['reported_at']; ?></strong> in <strong><?php echo $name; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small>
<?php if($bug['solved'] == 1): ?>
    <small class="post-date">Solved on: <strong><?php echo $bug['solved_at']; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small>
<?php endif; ?>
<div class="post-body">
    <h3>Description</h3>
    <?php echo $bug['description']; ?>
</div>
<div class="post-body">
    <h3>Reproduction</h3>
    <?php echo $bug['reproduce']; ?>
</div>
<div class="post-body">
    <h3>Error Message</h3>
    <?php echo $bug['error_message']; ?>
</div>
<div class="post-body">
    <h3>Additional Information</h3>
    <?php echo $bug['info']; ?>
</div>
<hr>
<?php if($bug['bug_image'] != 'noimage'): ?>
    <h3>Bug Image</h3>
    <img class="bug-image" src="<?php echo site_url(); ?>assets/images/bugs/<?php echo $bug['bug_image']; ?>">
<?php endif; ?>
<div class="post-body">
    <h3>Status: <?php echo $bug['status']; ?></h3>
</div>
<div class="post-body">
    <h3>Severity: <?php echo $bug['severity']; ?></h3>
</div>

<?php if($this->session->userdata('user_id') == $bug['user_id']): ?>
    <?php if($bug['solved'] == 0): ?>
        <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>bugs/edit/<?php echo $bug['slug']; ?>">Edit</a>
    <?php endif; ?>
    <?php echo form_open('/bugs/delete/'.$bug['bug_id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
    <?php echo form_close(); ?>
    <?php if($bug['solved'] == 0): ?>
        <?php echo form_open('/bugs/solved/'.$bug['bug_id']); ?>
            <input type="submit" value="Mark as Solved" class="btn btn-primary">
        <?php echo form_close(); ?>
    <?php endif; ?>
    <hr>
<?php endif; ?>