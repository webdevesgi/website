(function() {

  require(['underscore', 'jquery', 'bootstrap'], function(_) {
    var script;
    script = $('#require_js').data('script');
    if (!_.isEmpty(script)) return require([script], function() {});
  });

}).call(this);
