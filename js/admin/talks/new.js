(function() {

  require(['Shared'], function(Shared) {
    var eventId, formUrl, handleCreate, params, talk;
    params = $('#require_js').data('params');
    eventId = params.eventId;
    formUrl = params.formUrl;
    talk = {
      event_id: eventId,
      title: '',
      description: '',
      speaker: ''
    };
    require(['text!../../templates/admin/talks/talksShow.html'], function(talksShowTmpl) {
      var template;
      template = Handlebars.compile(talksShowTmpl);
      $('.h_talk').html(template({
        formUrl: formUrl,
        talk: talk
      }));
      return handleCreate();
    });
    return handleCreate = function() {
      var form;
      form = $('#talk-form');
      return form.submit(function(e) {
        var data, handleError, method, url;
        e.preventDefault();
        url = form.attr('action');
        method = form.attr('method');
        data = {
          event_id: eventId,
          title: form.find('#inputTitle').val(),
          description: form.find('#inputDescription').val(),
          speaker: form.find('#inputSpeaker').val()
        };
        handleError = function(msg) {};
        return Shared.ApiMakeRequest(url, data, function(result) {
          if (result.error != null) {
            return handleError(result.message);
          } else {
            return document.location.href = 'list.php?event_id=' + eventId;
          }
        }, function(error) {
          return handleError();
        }, method);
      });
    };
  });

}).call(this);
