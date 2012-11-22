require ['Shared'], (Shared) ->

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  Shared.ApiMakeRequest 'subscribers/list.php', {event_id: 'e00001', fields: 'id,email'}, (result) ->
    console.log result
    if !result.error?
      require ['text!../../templates/admin/subscribers/subscribersList.html'], (subscribersListTmpl) ->
        template = Handlebars.compile(subscribersListTmpl)
        $('.h_subscribers_list').html template(subscribers: result)