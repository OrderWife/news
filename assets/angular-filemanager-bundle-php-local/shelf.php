<?php
    if (isset($_GET['root'])) {
      $root = $_GET['root'];
      if (empty($root)) {
        exit;
      }
    }else{
      echo "Not Found root path.";
      exit;
    }
 ?>
<!doctype html>
<html lang="th" data-ng-app="FileManagerApp">
<head>
  <!--
    * Angular FileManager v1.5.1 (https://github.com/joni2back/angular-filemanager)
    * Jonas Sciangula Street <joni2back@gmail.com>
    * Licensed under MIT (https://github.com/joni2back/angular-filemanager/blob/master/LICENSE)
  -->
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>MyShelf</title>

  <!-- third party -->
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-translate/angular-translate.min.js"></script>
    <script src="bower_components/ng-file-upload/ng-file-upload.min.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bower_components/bootswatch/paper/bootstrap.min.css" />
  <!-- /third party -->

  <!-- Uncomment if you need to use raw source code -->
    <!-- <script src="src/js/app.js"></script>
    <script src="src/js/directives/directives.js"></script>
    <script src="src/js/filters/filters.js"></script>
    <script src="src/js/providers/config.js"></script>
    <script src="src/js/entities/chmod.js"></script>
    <script src="src/js/entities/item.js"></script>
    <script src="src/js/services/apihandler.js"></script>
    <script src="src/js/services/apimiddleware.js"></script>
    <script src="src/js/services/filenavigator.js"></script>
    <script src="src/js/providers/translations.js"></script>
    <script src="src/js/controllers/main.js"></script>
    <script src="src/js/controllers/selector-controller.js"></script>
    <link href="src/css/animations.css" rel="stylesheet">
    <link href="src/css/dialogs.css" rel="stylesheet">
    <link href="src/css/main.css" rel="stylesheet"> -->


  <!-- Comment if you need to use raw source code -->
    <link href="dist/angular-filemanager.min.css" rel="stylesheet">
    <script src="dist/angular-filemanager.min.js"></script>
  <!-- /Comment if you need to use raw source code -->

  <script type="text/javascript">
    //example to override angular-filemanager default config
    angular.module('FileManagerApp').config(['fileManagerConfigProvider', function (config) {
      var defaults = config.$get();
      config.set({
        basePath: '<?php echo $root;?>',
        appName: 'angular-filemanager',
        pickCallback: function(item) {
          var msg = 'Picked %s "%s" for external use'
            .replace('%s', item.type)
            .replace('%s', item.fullPath());
          window.alert(msg);
        },

        listUrl: 'bridges/php-local/index.php',
        uploadUrl: 'bridges/php-local/index.php',
        renameUrl: 'bridges/php-local/index.php',
        copyUrl: 'bridges/php-local/index.php',
        moveUrl: 'bridges/php-local/index.php',
        removeUrl: 'bridges/php-local/index.php',
        editUrl: 'bridges/php-local/index.php',
        getContentUrl: 'bridges/php-local/index.php',
        createFolderUrl: 'bridges/php-local/index.php',
        downloadFileUrl: 'bridges/php-local/index.php',
        downloadMultipleUrl: 'bridges/php-local/index.php',
        compressUrl: 'bridges/php-local/index.php',
        extractUrl: 'bridges/php-local/index.php',
        permissionsUrl: 'bridges/php-local/index.php',

        allowedActions: angular.extend(defaults.allowedActions, {
          pickFiles: false,
          pickFolders: false,
          changePermissions: false,
        }),
      });
    }]);
  </script>
</head>
<body class="ng-cloak">
  <angular-filemanager></angular-filemanager>
</body>
</html>