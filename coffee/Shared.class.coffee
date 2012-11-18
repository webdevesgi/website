define ['handlebars', 'underscore', 'jquery'], (Handlebars, _) ->

  class Shared

    constructor: ->

    ApiMakeRequest: (url, params = {}, success = null, fail = null, method = 'GET') ->
      if !success?
        success = ->
      if !fail?
        fail = ->

      url = '/ajax/scripts/' + url

      $.ajax
        url: url
        data: params
        dataType: 'json'
        success: (result) ->
          success result
        error: (result) ->
          fail (result)

    fullDate: (datetime) ->
      m = /^(\d{4})-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)$/.exec(datetime)
      m[3] + '/' + m[2] + '/' + m[1] + ' à ' + m[4] + ':' + m[5]


  new Shared
