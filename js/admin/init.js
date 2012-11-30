// Generated by CoffeeScript 1.4.0
(function() {

  require.config({
    shim: {
      underscore: {
        exports: '_'
      },
      handlebars: {
        exports: 'Handlebars'
      }
    },
    config: {
      text: {}
    },
    paths: {
      jquery: 'lib/jquery-1.8.2.min',
      bootstrap: 'lib/bootstrap.min',
      underscore: 'lib/underscore.min',
      handlebars: 'lib/handlebars',
      text: 'lib/text',
      Shared: 'Shared.class'
    },
    baseUrl: '/js/'
  });

  require(['admin/main']);

}).call(this);
