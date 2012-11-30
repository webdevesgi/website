require ['underscore', 'handlebars','Shared', 'jquery'], (_, Handlebars, Shared) ->

  Shared.ApiMakeRequest 'events/next.php', {}, (result) ->
    if !result.error?

      nextEventTpl =     $('#last-event-template').text()
      subscribeFormTpl = $('#suscribers-form-template').text()
      subscribersTpl =   $('#suscribers-template').text()

      eventTemplate =       Handlebars.compile nextEventTpl
      formTemplate =        Handlebars.compile subscribeFormTpl
      subscribersTemplate = Handlebars.compile subscribersTpl

      $('.event').html       eventTemplate(event: result)
      $('.subscribe').html   formTemplate(event_id: result.id)
      $('.subscribers').html subscribersTemplate(subscribers: result.subscribers)

      handleSubscribe()


  handleSubscribe = ->
    $('#event_subscribe_form').bind 'submit', (e)->
      e.preventDefault()
      form = $ @
      url = form.attr 'action'
      method = form.attr 'method'
      data =
        event_id:  form.find('input#event_id').val()
        email:     form.find('input#subscriber-email').val()
        firstname: form.find('input#subscriber-firstname').val()
        lastname:  form.find('input#subscriber-lastname').val()

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
          $('.subscribers').find('ul').append '<li>' + result.firstname + ' ' + result.lastname + '</li>'
      , (error) ->
        handleError()
      , method


  Handlebars.registerHelper 'getEventDate', (dateStr) ->
    date = Shared.createDate(dateStr)
    frenchDate = Shared.getFrenchDate(date)
    str = frenchDate.day.slice(0,1).toUpperCase() + frenchDate.day.slice(1) + ' ' + frenchDate.date +
          ' ' + frenchDate.month + ' à ' + frenchDate.hours + ':' + frenchDate.minutes + '.'

  Handlebars.registerHelper 'fullDate', (datetime) ->
    Shared.fullDate datetime

  Handlebars.registerHelper 'showIfUpdated', (var1, var2) ->
    str = ''
    str = '<br />Dernière modification le ' + Shared.fullDate var2 if var1 isnt var2
    new Handlebars.SafeString str