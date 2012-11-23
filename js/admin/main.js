(function() {

  require(['handlebars', 'underscore', 'jquery', 'bootstrap'], function(Handlebars, _) {
    var actions, script;
    actions = function() {};
    script = $('#require_js').data('script');
    if (script.length > 0) {
      return require([script], function() {
        return actions();
      });
    } else {
      return actions();
    }
  });

}).call(this);
