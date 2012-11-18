require ['Shared'], (Shared) ->

  Handlebars.registerHelper 'fullDate', (datetime) ->
    m = /^(\d{4})-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)$/.exec(datetime)
    m[3] + '/' + m[2] + '/' + m[1] + ' à ' + m[4] + ':' + m[5]

  Shared.ApiMakeRequest 'events/list.php', {id: 'e00001'}, (result) ->
    if !result.error?
      require ['text!admin/events/eventsList.html'], (eventsListTmpl) ->
        template = Handlebars.compile(eventsListTmpl)
        $('.h_events_list').html template(events: result)