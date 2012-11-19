require ['underscore', 'handlebars','Shared', 'jquery'], (_, Handlebars, Shared) ->

  Handlebars.registerHelper 'getEventDate', (dateStr) ->
    date = Shared.createDate(dateStr)
    frenchDate = Shared.getFrenchDate(date)
    str = frenchDate.day.slice(0,1).toUpperCase() + frenchDate.day.slice(1) + ' ' + frenchDate.date +
          ' ' + frenchDate.month + ' à ' + frenchDate.hours + ':' + frenchDate.minutes + '.'

  Shared.ApiMakeRequest 'events/last.php', {}, (result) ->
    if !result.error?
      require ['text!../templates/last-event.html'], (lastEventTpl) ->
        template = Handlebars.compile lastEventTpl
        $('.event').html template(event: result)