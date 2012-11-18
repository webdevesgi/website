require [
  'handlebars',
  'underscore',
  'jquery',
  'bootstrap'
], (Handlebars, _) ->

  actions = ->

  script = $('#require_js').data('script')
  if script.length > 0
    require [script], ()->
      actions()
  else actions()