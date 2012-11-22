require ['Shared'], (Shared) ->

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  Shared.ApiMakeRequest 'talks/list.php', {event_id: 'e00001', fields: 'id'}, (result) ->
    if !result.error?
      require ['text!../../templates/admin/talks/talksList.html'], (talksListTmpl) ->
        template = Handlebars.compile(talksListTmpl)
        $('.h_talks_list').html template(talks: result)