<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Admin - <?php echo $title ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/main.css" rel="stylesheet">
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="/admin">Admin</a><a class="brand" href=""> - <?php echo $title ?></a>
          <p class="navbar-text pull-right">
            <a href="/">Back to Web-dev-esgi</a>
          </p>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Évènements</li>
              <li><a href="/admin/events/list.php">Liste</a></li>
              <li><a href="/admin/events/new.php">Ajouter</a></li>
              <li class="nav-header">Propositions</li>
              <li><a href="/admin/ideas/list.php">Liste</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span10">

          <?php Util::adminFlashNoticeHelper(); ?>
          <?php require isset($_c) ? $_c : Util::view(); ?>

        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Développement Web avancé ESGI 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <script id="require_js" data-params='<?php echo json_encode($requireParams); ?>' data-script="<?php echo $requireScript; ?>" data-main="/js/admin/init" src="/js/lib/require.js"></script>

  </body>
</html>