<html>
    <head>
        <title>CodeIgniter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/3.4.1/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">CodeIgniter</a>
            </div>
            <ul class="nav navbar-nav">
                <li class=""><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>about">About</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>posts">Posts</a></li>
                        <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
                        <?php if($this->session->userdata('logged_in')): ?>
                            <li><a href="<?php echo base_url(); ?>posts/create">Create Post</a></li>
                            <li><a href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bug Tracker
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>bugs">Bugs</a></li>
                        <li><a href="<?php echo base_url(); ?>bug_categories">Bug Categories</a></li>
                        <?php if($this->session->userdata('logged_in')): ?>
                            <li><a href="<?php echo base_url(); ?>bugs/create">Report a Bug</a></li>
                            <li><a href="<?php echo base_url(); ?>bug_categories/create">Create Bug Category</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Register/Login -->
                <?php if(!$this->session->userdata('logged_in')): ?>
                    <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
                    <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
                <?php endif; ?>
                <!-- Logout -->
                <?php if($this->session->userdata('logged_in')): ?>
                    <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container">

    <!-- Flash Messages -->
    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_logged_in')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_logged_out')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_logged_out').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('comment_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('comment_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_upvoted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_upvoted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_downvoted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_downvoted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_error')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_error').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('bug_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('bug_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('bug_category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('bug_category_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('bug_category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('bug_category_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('bug_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('bug_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('bug_edited')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('bug_edited').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('bug_solved')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('bug_solved').'</p>'; ?>
    <?php endif; ?>

