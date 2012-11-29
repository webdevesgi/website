require ['Shared'], (Shared) ->

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  Shared.ApiMakeRequest 'ideas/list.php', {}, (result) ->
    if !result.error?
      require ['text!../../templates/admin/ideas/ideasList.html'], (ideasListTmpl) ->
        template = Handlebars.compile(ideasListTmpl)
        $('.h_ideas_list').html template(ideas: result)