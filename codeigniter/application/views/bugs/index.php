<h1><?= $title ?></h1>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Severity: 5</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
        <?php foreach($bugs as $bug) : ?>
            <?php if($bug['severity'] == 5 && $bug['solved'] == 0): ?>
                <h3><?php echo $bug['bug_id']; ?> : <?php echo $bug['title']; ?></h3>
                <small class="post-date">Reported on: <strong><?php echo $bug['reported_at']; ?></strong> in <strong><?php echo $bug['name']; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small><br>
                <p><a class="btn btn-default" href="<?php echo site_url('/bugs/'.$bug['slug']); ?>">Read More</a></p>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Severity: 4</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
        <?php foreach($bugs as $bug) : ?>
            <?php if($bug['severity'] == 4 && $bug['solved'] == 0): ?>
                <h3><?php echo $bug['bug_id']; ?> : <?php echo $bug['title']; ?></h3>
                <small class="post-date">Reported on: <strong><?php echo $bug['reported_at']; ?></strong> in <strong><?php echo $bug['name']; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small><br>
                <p><a class="btn btn-default" href="<?php echo site_url('/bugs/'.$bug['slug']); ?>">Read More</a></p>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Severity: 3</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
        <?php foreach($bugs as $bug) : ?>
            <?php if($bug['severity'] == 3 && $bug['solved'] == 0): ?>
                <h3><?php echo $bug['bug_id']; ?> : <?php echo $bug['title']; ?></h3>
                <small class="post-date">Reported on: <strong><?php echo $bug['reported_at']; ?></strong> in <strong><?php echo $bug['name']; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small><br>
                <p><a class="btn btn-default" href="<?php echo site_url('/bugs/'.$bug['slug']); ?>">Read More</a></p>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Severity: 2</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
      <?php foreach($bugs as $bug) : ?>
            <?php if($bug['severity'] == 2 && $bug['solved'] == 0): ?>
                <h3><?php echo $bug['bug_id']; ?> : <?php echo $bug['title']; ?></h3>
                <small class="post-date">Reported on: <strong><?php echo $bug['reported_at']; ?></strong> in <strong><?php echo $bug['name']; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small><br>
                <p><a class="btn btn-default" href="<?php echo site_url('/bugs/'.$bug['slug']); ?>">Read More</a></p>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Severity: 1</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">
      <?php foreach($bugs as $bug) : ?>
            <?php if($bug['severity'] == 1 && $bug['solved'] == 0): ?>
                <h3><?php echo $bug['bug_id']; ?> : <?php echo $bug['title']; ?></h3>
                <small class="post-date">Reported on: <strong><?php echo $bug['reported_at']; ?></strong> in <strong><?php echo $bug['name']; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small><br>
                <p><a class="btn btn-default" href="<?php echo site_url('/bugs/'.$bug['slug']); ?>">Read More</a></p>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Solved</a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse">
      <div class="panel-body">
      <?php foreach($bugs as $bug) : ?>
            <?php if($bug['solved'] != 0): ?>
                <h3><?php echo $bug['bug_id']; ?> : <?php echo $bug['title']; ?></h3>
                <small class="post-date">Solved on: <strong><?php echo $bug['solved_at']; ?></strong> by <strong><?php echo $bug['found_by']; ?></strong></small><br>
                <p><a class="btn btn-default" href="<?php echo site_url('/bugs/'.$bug['slug']); ?>">Read More</a></p>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>









