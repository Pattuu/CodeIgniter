<h1><?php echo $post['title']; ?></h1>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?><strong class="pull-right">Post score: <?php echo $post['score']; ?></strong></small><br>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<div class="post-body">
    <?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('logged_in')): ?>
        <?php $attributes = array('class' => 'vote-form'); ?>
        <?php echo form_open('/posts/upvote/'.$post['id'], $attributes); ?>
            <input type="submit" value="Ʌ" class="btn btn-success">
        <?php echo form_close(); ?>
        <?php echo form_open('/posts/downvote/'.$post['id'], $attributes); ?>
            <input type="submit" value="V" class="btn btn-danger">
        <?php echo form_close(); ?>
<?php endif; ?>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
    <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
    <?php echo form_open('/posts/delete/'.$post['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
    <?php echo form_close(); ?>
    <hr>
<?php endif; ?>

<hr>
<?php if($comments): ?>
    <?php foreach($comments as $comment): ?>
        <div class="well">
            <h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
        <?php if($this->session->userdata('user_id') == $comment['user_id']): ?>
            <form class="cat-delete" action="deletec/<?php echo $comment['id']; ?>" method="POST">
                <input type="submit" class="btn-link text-danger" value="[X]">
            </form>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No Comments To Display</p>
<?php endif; ?>

<hr>
<h3>Add Comment</h3>
<?php if($this->session->userdata('logged_in')): ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('comments/create/'.$post['id']); ?>
            <input type="hidden" name="name" value="<?php echo $this->session->userdata('username'); ?>">
        <div class="form-group">
            <label>Message</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php else: ?>
    <h4 class="text-danger">You need to be logged in to comment</h4>
    <a href="<?php echo base_url().'users/login'; ?>">Login</a>
    <a href="<?php echo base_url().'users/register'; ?>">Register</a>
<?php endif;

