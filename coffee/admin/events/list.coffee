require ['Shared'], (Shared) ->

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  Shared.ApiMakeRequest 'events/list.php', {id: 'e00001'}, (result) ->
    if !result.error?
      require ['text!../../templates/admin/events/eventsList.html'], (eventsListTmpl) ->
        template = Handlebars.compile(eventsListTmpl)
        $('.h_events_list').html template(events: result)