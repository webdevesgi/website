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

    createDate: (datetime) ->
      r = /^(\d{4})-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)$/.exec(datetime)
      new Date(r[2] + '/' + r[3] + '/' + r[1] + ' ' + r[4] + ':' + r[5] + ':' + r[6])

    getFrenchDate: (date) ->
      french =
        days:
          '0': 'dimanche'
          '1': 'lundi'
          '2': 'mardi'
          '3': 'mercredi'
          '4': 'jeudi'
          '5': 'vendredi'
          '6': 'samedi'
        months:
          '0':  'janvier'
          '1':  'février'
          '2':  'mars'
          '3':  'avril'
          '4':  'mai'
          '5':  'juin'
          '6':  'juillet'
          '7':  'août'
          '8':  'septembre'
          '9':  'octobre'
          '10': 'novembre'
          '11': 'décembre'
        addZero: (date) ->
          result = date
          result = '0' + result if date < 10
          result

      result =
        day: french.days[date.getDay()]
        month: french.months[date.getMonth()]
        date: french.addZero(date.getDate())
        hours: french.addZero(date.getHours())
        minutes: french.addZero(date.getMinutes())


  new Shared
