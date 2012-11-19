require ['underscore', 'handlebars','Shared', 'jquery'], (_, Handlebars, Shared) ->

  Handlebars.registerHelper 'getEventDate', (dateStr) ->
    date = Shared.createDate(dateStr)
    frenchDate = Shared.getFrenchDate(date)
    str = frenchDate.day.slice(0,1).toUpperCase() + frenchDate.day.slice(1) + ' ' + frenchDate.date +
          ' ' + frenchDate.month + ' à ' + frenchDate.hours + ':' + frenchDate.minutes + '.'

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  Handlebars.registerHelper 'showIfUpdated', (var1, var2) ->
    str = ''
    str = '<br />Dernière modification le ' + Shared.fullDate var2 if var1 isnt var2
    new Handlebars.SafeString str

  Shared.ApiMakeRequest 'events/last.php', {}, (result) ->
    if !result.error?
      require ['text!../templates/last-event.html'], (lastEventTpl) ->
        template = Handlebars.compile lastEventTpl
        $('.event').html template(event: result)