require ['Shared'], (Shared) ->

  params = $('#require_js').data('params')
  formUrl = params.formUrl
  ideaId =  params.ideaId

  Shared.ApiMakeRequest 'ideas/show.php', {id: ideaId}, (result) ->
    if !result.error?
      require ['text!../../templates/admin/ideas/ideasShow.html'], (ideasShowTmpl) ->
        template = Handlebars.compile(ideasShowTmpl)
        $('.h_idea').html template(formUrl: formUrl, idea: result)

        handleEdit()


  handleEdit = ->
    form = $('#idea-form')
    form.submit (e) ->
      e.preventDefault()
      url = form.attr 'action'
      method = form.attr 'method'
      data =
        id:          ideaId
        title:       form.find('#inputTitle').val()
        description: form.find('#inputDescription').val()
        type:        form.find('#inputType').val()
        email:       form.find('#inputEmail').val()
        firstname:   form.find('#inputFirstname').val()
        lastname:    form.find('#inputLastname').val()

      handleError = (msg) ->

      Shared.ApiMakeRequest url, data, (result) ->
        if result.error?
          handleError(result.message)
        else
          document.location.href = 'list.php'
      , (error) ->
        handleError()
      , method

  Handlebars.registerHelper 'selectOption', (type, item) ->
    str = ''
    str = ' selected="selected"' if type is item