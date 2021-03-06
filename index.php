<?php
/**
 * @author Fil Joseph Elman
 * @contact filjoseph22@gmail.com
 * @date 02-20-2016
 * @date 03-06-2016
 * @version 1.0.0
 *
 */
  require_once "vendor/autoload.php";
  require_once "functions/time.php";
  require_once "functions/function.php";
  require_once "parsecsv.lib.php";
  $csv = new parseCSV();
  $csv->import('uploads/task.csv');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/bootstrap.fd.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="css/font-awesome.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="css/material.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
  <script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
  <script type="text/javascript" src="js/material.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.csv.js"></script>
  <script type="text/javascript" src="js/taskman_functions.js"></script>
</head>
<body>
  <header data-scroll-header="" ng-class="{'open': open}">
    <div class="main-contained">
      <div class="hamburger-cover">
        <div class="logo"><i class="fa fa-tasks fa-3x"></i></div>
        <ul class="nav">
          <li class="active open_btn"><a href="#">Import</a></li>
          <li><a href="#">Export</a></li>
          <li><a href="#">Login</a></li>
          <li><a href="#">Signup</a></li>
        </ul>
        <div class="hamburger" ng-click="open = !open" ng-class="{'open': open}">
          <span class="icon"></span>
        </div>
      </div>
      <div class="hamburger-menu" ng-class="{'open': open}">
        <ul>
          <li class="active open_btn"><a href="#">Import</a></li>
          <li><a href="#">Export</a></li>
          <li><a href="#">Login</a></li>
          <li><a href="#">Signup</a></li>
          <li class="padded js-geo-hidden js-geo-waitlist">
            <a data-g-event="header:cta:waitlist" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button--brand" href="" data-upgraded=",MaterialButton,MaterialRipple">Join the waitlist<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></a>
          </li>
          <li class="padded js-geo-sign-in">
            <a data-g-event="header:cta:signin" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-button--brand js-pass-params js-exp-noww-ww" href="https://contributor.google.com/?utm_source=NOWW#/signuppayment" data-upgraded=",MaterialButton,MaterialRipple">Sign in<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></a>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <div class="container-fluid container-margin">
    <?php if (is_array($csv->data)) { ?>
      <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
        <?php
        $temp_class = "";
        $pos        = -1;
        $loop_cnt = 0;
        foreach ($csv->data as $key => $value) {
          $count_value = count($value);
          if ($key == 0) { ?>
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric"><?php echo $value[0]; ?></th>
                <?php for ($i=1; $i < $count_value; $i++) { ?>
                  <th><?php echo $value[$i]; ?></th>
                <?php } ?>
                <th>Timer</th>
              </tr>
            </thead>
            <tbody>
          <?php } else { ?>
            <?php
              $temp_class = task_toggle_class($value[0]);
              if ($pos < $temp_class['pos']) {
                $pos = $temp_class['pos'];
              }
            ?>
            <tr class="<?php echo "task".'-'.(($loop_cnt==1)?"parent":$temp_class['pos']); ?>">
              <td class="mdl-data-table__cell--non-numeric">
                <a href="#" onclick="popup('task', '<?php echo (($loop_cnt==1)?"parent":$temp_class['pos']); ?>')"><?php echo task_indent($value[0]); ?></a>
              </td>
              <?php for ($i = 1; $i < $count_value; $i++) { ?>
                <?php if ( isset($value[$i])) { ?>
                  <td><?php echo convert_date( checker($value[$i]) ); ?></td>
                <?php } else { ?>
                  <td>&nbsp;</td>
                <?php } # if ?>
              <?php } # for ?>
              <td><input type="checkbox" class="pauseResume" /><label for="pauseResume">Start</label></td>
            </tr>
          <?php } # if ?>
          <?php $loop_cnt++; ?>
        <?php } # foreach ?>
        </tbody>
      </table>
    <?php } else {
      echo "No data yet";
    } ?>
  </div>
  <script type="text/javascript">
    window.pos = "<?php echo $pos; ?>";
  </script>
  <script type="text/javascript" src="js/taskman.js"></script>
  <script type="text/javascript" src="js/bootstrap.fd.js"></script>
  <script type="text/javascript">
    $(".open_btn").click(function() {
      $.FileDialog({multiple: true}).on('files.bs.filedialog', function(ev) {
        var files  = ev.files;
        $.ajax({
          type: "POST",
          data: {
            "myfile":files[0].content,
            "name":files[0].name
          },
          url: "upload.php",
          success: function(data) {
            window.location = "http://localhost/taskman";
          },
          error: function(data) {
            alert("Problem ?!");
          }
        });
      }).on('cancel.bs.filedialog', function(ev) {
        // cancel message here
      });
    });
  </script>
</body>
</html>
