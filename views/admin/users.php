<?php
use Destiny\Common\Utils\Tpl;
use Destiny\Common\Config;
use Destiny\Common\Utils\Date;
?>
<!DOCTYPE html>
<html>
<head>
<title><?=Tpl::title($this->title)?></title>
<meta charset="utf-8">
<?php include 'seg/commontop.php' ?>
<link href="<?=Config::cdnv()?>/admin.css" rel="stylesheet" media="screen">
</head>
<body id="admin" class="no-contain">
  <div id="page-wrap">

    <?php include 'seg/top.php' ?>
    <?php include 'seg/admin.nav.php' ?>

    <section class="container">

      <div class="content content-dark clearfix">
        <div class="ds-block clearfix">
          <form id="userSearchForm" class="form-inline" role="form">
            <div class="form-group">
              <input name="search" type="text" class="form-control" placeholder="Username or email..." value="<?=Tpl::out($this->search)?>" />
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <div class="form-group pull-right">
              <select name="feature" class="form-control">
                <option value="" disabled selected>Feature</option>
                <option value=""></option>
                <?php foreach ($this->features as $feature): ?>
                <option value="<?=Tpl::out($feature['featureName']);?>"><?=Tpl::out($feature['featureLabel']);?></option>
                <?php endforeach; ?>
              </select>
            </div>
            
          </form>
        </div>
      </div>
      <br />

      <div class="content content-dark clearfix">

        <div id="userlist" data-size="<?=Tpl::out($this->size)?>" data-page="<?=Tpl::out($this->page)?>" data-feature="<?=Tpl::out($this->feature)?>" class="stream stream-grid" style="width:100%;">

          <div class="ds-block clearfix">

            <?php if($this->users['totalpages'] > 1): ?>
            <form class="form-inline pull-left" role="form">
              <ul class="pagination" style="margin: 0 15px 0 0;">
                <li><a data-page="1" href="?page=0">First</a></li>
                <?php for($i = max(1, $this->users['page'] - 2); $i <= min($this->users['page'] + 2, $this->users['totalpages']); $i++): ?>
                <li <?=($this->users['page'] == $i) ? 'class="active"':''?>><a data-page="<?=$i?>" href="?page=<?=$i?>"><?=$i?></a></li>
                <?php endfor; ?>
                <li><a data-page="<?=$this->users['totalpages']?>" href="?page=<?=$this->users['totalpages']?>">Last</a></li>
              </ul>
            </form>
            <?php endif ?>

            <form class="form-inline pull-right" role="form">
              <div class="form-group">
                <label for="gridSize">Showing: </label>
                <select id="gridSize" name="size" class="form-control">
                  <option value=""></option>
                  <option value="20">20</option>
                  <option value="40">40</option>
                  <option value="60">60</option>
                  <option value="80">80</option>
                  <option value="100">100</option>
                  <option value="200">200</option>
                </select>
              </div>
              <button id="resetuserlist" class="btn btn-warning">Reset</button>
            </form>

          </div>

          <table class="grid">
            <thead>
              <tr>
                <td>User <small>(<?=$this->users['total']?>)</small></td>
                <td>Created on</td>
              </tr>
            </thead>
            <tbody>
            <?php foreach($this->users['list'] as $user): ?>
            <tr>
              <td><a href="/admin/user/<?=$user['userId']?>/edit"><?=Tpl::out($user['username'])?></a> (<?=Tpl::out($user['email'])?>)</td>
              <td><?=Tpl::moment(Date::getDateTime($user['createdDate']), Date::STRING_FORMAT)?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>

    </section>
  </div>

  <?php include 'seg/foot.php' ?>
  <?php include 'seg/commonbottom.php' ?>
  <script src="<?=Config::cdnv()?>/admin.js"></script>
  
</body>
</html>