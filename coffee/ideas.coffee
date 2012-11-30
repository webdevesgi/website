require ['underscore', 'handlebars','Shared', 'jquery'], (_, Handlebars, Shared) ->

  refreshIdeas = ->
    Shared.ApiMakeRequest 'ideas/list.php', {}, (result) ->
      if !result.error?
        ideasTpl = $('#ideas-template').text()
        template = Handlebars.compile ideasTpl
        $('.current-ideas').html template(ideas: result)

  $('.ideas-form form').submit (e)->
    e.preventDefault()
    form = $ @
    url = form.attr 'action'
    method = form.attr 'method'
    data =
      title:       form.find('input#inputTitle').val()
      description: form.find('textarea#inputDescription').val()
      type:        form.find('select#inputType option:selected').val()
      email:       form.find('input#inputEmail').val()
      firstname:   form.find('input#inputFirstname').val()
      lastname:    form.find('input#inputLastname').val()

    handleError = (msg) ->
      errorAlert = $('.form-error')
      errorAlert.removeClass 'hide'
      errorAlert.find('.error-msg').html('Message d\'erreur : ' + msg) if msg?

    Shared.ApiMakeRequest url, data, (result) ->
      if result.error?
        handleError(result.message)
      else
        form.addClass 'hide'
        $('.form-success').removeClass 'hide'
        errorAlert = $('.form-error')
        errorAlert.addClass('hide') if !errorAlert.hasClass('hide')

        refreshIdeas()

    , (error) ->
      handleError()
    , method

  refreshIdeas()