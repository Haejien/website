<?php
use Destiny\Common\Utils\Tpl;
use Destiny\Common\Config;
?>
<!DOCTYPE html>
<html>
<head>
<title><?=Tpl::title($model->title)?></title>
<meta charset="utf-8">
<?php include Tpl::file('seg/commontop.php') ?>
</head>
<body id="admin" class="no-contain">
  <div id="page-wrap">
    <?php include Tpl::file('seg/top.php') ?>
    <?php include Tpl::file('seg/admin.nav.php') ?>

    <section class="container">
      <h3>Ban / Mute <small>(<a href="/admin/user/<?=Tpl::out($model->user['userId'])?>/edit"><?=Tpl::out($model->user['username'])?></a>)</small></h3>
      <div class="content content-dark clearfix">

        <?php
        if(!empty($model->ban['id'])):
          $href='/admin/user/'. Tpl::out($model->user['userId']) .'/ban/'. Tpl::out($model->ban['id']) .'/update';
        else:
          $href='/admin/user/'. Tpl::out($model->user['userId']) .'/ban';
        endif;
        ?>

        <form action="<?=$href?>" method="post">

          <div class="ds-block">
            <div class="form-group">
              <label class="control-label" for="inputUsername">Banned user</label>
              <div class="controls">
                <input type="text" class="form-control uneditable-input" readonly="readonly" value="<?=Tpl::out($model->user['username'])?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label" for="inputUsername">Reason</label>
              <div class="controls">
                <input type="text" class="form-control" name="reason" id="inputReason" value="<?=Tpl::out($model->ban['reason'])?>" placeholder="Reason">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label" for="inputStarttimestamp">Start</label>
              <div class="controls">
                <input type="text" class="form-control" name="starttimestamp" id="inputStarttimestamp" value="<?=Tpl::out($model->ban['starttimestamp'])?>" placeholder="Y-m-d H:i:s">
                <span class="help-block">time specificed in UCT</span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label" for="inputEndtimestamp">End</label>
              <div class="controls">
                <input type="text" class="form-control" name="endtimestamp" id="inputEndtimestamp" value="<?=Tpl::out($model->ban['endtimestamp'])?>" placeholder="Y-m-d H:i:s">
                <span class="help-block">time specificed in UCT</span>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
            <a href="/admin/user/<?=Tpl::out($model->user['userId'])?>/edit" class="btn btn-link">Back</a>
          </div>

        </form>
      </div>
    </section>

  </div>

  <?php include Tpl::file('seg/foot.php') ?>
  <?php include Tpl::file('seg/commonbottom.php') ?>
  
  <script src="<?=Config::cdnv()?>/web/js/admin.js"></script>
  
</body>
</html>