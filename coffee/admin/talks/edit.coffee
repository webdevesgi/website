require ['Shared'], (Shared) ->

  params = $('#require_js').data('params')
  eventId = params.eventId
  formUrl = params.formUrl
  talkId =  params.talkId

  Shared.ApiMakeRequest 'talks/show.php', {id: talkId}, (result) ->
    if !result.error?
      require ['text!../../templates/admin/talks/talksShow.html'], (talksShowTmpl) ->
        template = Handlebars.compile(talksShowTmpl)
        $('.h_talk').html template(formUrl: formUrl, talk: result)

        handleCreate()


  handleCreate = ->
    form = $('#talk-form')
    form.submit (e) ->
      e.preventDefault()
      url = form.attr 'action'
      method = form.attr 'method'
      data =
        id:          talkId
        title:       form.find('#inputTitle').val()
        description: form.find('#inputDescription').val()
        speaker:     form.find('#inputSpeaker').val()

      handleError = (msg) ->

      Shared.ApiMakeRequest url, data, (result) ->
        if result.error?
          handleError(result.message)
        else
          document.location.href = 'list.php?event_id=' + eventId
      , (error) ->
        handleError()
      , method