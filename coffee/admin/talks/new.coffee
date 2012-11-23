require ['Shared'], (Shared) ->

  params = $('#require_js').data('params')
  eventId = params.eventId
  formUrl = params.formUrl

  talk =
    event_id: eventId
    title: ''
    description: ''
    speaker: ''

  require ['text!../../templates/admin/talks/talksShow.html'], (talksShowTmpl) ->
    template = Handlebars.compile(talksShowTmpl)
    $('.h_talk').html template(formUrl: formUrl, talk: talk)

    handleCreate()


  handleCreate = ->
    form = $('#talk-form')
    form.submit (e) ->
      e.preventDefault()
      url = form.attr 'action'
      method = form.attr 'method'
      data =
        event_id:    eventId
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