require ['Shared'], (Shared) ->

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  params = $('#require_js').data('params')
  eventId = params.event_id

  Shared.ApiMakeRequest 'talks/list.php', {event_id: eventId, fields: 'id'}, (result) ->
    if !result.error?
      require ['text!../../templates/admin/talks/talksList.html'], (talksListTmpl) ->
        template = Handlebars.compile(talksListTmpl)
        $('.h_talks_list').html template(talks: result, event_id: eventId)