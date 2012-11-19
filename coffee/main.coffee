require ['underscore', 'jquery', 'bootstrap'], (_) ->

  script = $('#require_js').data('script')
  require([script], ->) if !_.isEmpty(script)