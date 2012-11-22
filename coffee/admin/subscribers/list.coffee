require ['Shared'], (Shared) ->

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  params = $('#require_js').data('params')
  eventId = params.event_id

  Shared.ApiMakeRequest 'subscribers/list.php', {event_id: eventId, fields: 'id,email'}, (result) ->
    if !result.error?
      require ['text!../../templates/admin/subscribers/subscribersList.html'], (subscribersListTmpl) ->
        template = Handlebars.compile(subscribersListTmpl)
        $('.h_subscribers_list').html template(subscribers: result, event_id: eventId)