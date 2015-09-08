<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chaplin Boilerplate Application</title>
  <style>body { font-family: sans-serif; }</style>
  <script src="bower_components/requirejs/require.js"></script>
  <script>
  // Configure the AMD module loader
  requirejs.config({
    // The path where your JavaScripts are located
    baseUrl: './js/',
    // Specify the paths of vendor libraries
    paths: {
      jquery: '../bower_components/jquery/jquery',
      underscore: '../bower_components/lodash/dist/lodash',
      backbone: '../bower_components/backbone/backbone',
      handlebars: '../bower_components/handlebars/handlebars',
      text: '../bower_components/requirejs-text/text',
      chaplin: '../bower_components/chaplin/chaplin'
    },
    // Underscore and Backbone are not AMD-capable per default,
    // so we need to use the AMD wrapping of RequireJS
    shim: {
      underscore: {
        exports: '_'
      },
      backbone: {
        deps: ['underscore', 'jquery'],
        exports: 'Backbone'
      },
      handlebars: {
        exports: 'Handlebars'
      }
    }
    // For easier development, disable browser caching
    // Of course, this should be removed in a production environment
    //, urlArgs: 'bust=' +  (new Date()).getTime()
  });

  // Bootstrap the application
  require(['application', 'routes'], function(Application, routes) {
    new Application({routes: routes, controllerSuffix: '-controller'});
  });
  </script>
</head>
<body></body>
</html>
