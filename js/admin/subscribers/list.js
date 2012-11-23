(function() {

  require(['Shared'], function(Shared) {
    var eventId, params;
    Handlebars.registerHelper('fullDate', function(datetime) {
      return Shared.fullDate(datetime);
    });
    params = $('#require_js').data('params');
    eventId = params.event_id;
    return Shared.ApiMakeRequest('subscribers/list.php', {
      event_id: eventId,
      fields: 'id,email'
    }, function(result) {
      if (!(result.error != null)) {
        return require(['text!../../templates/admin/subscribers/subscribersList.html'], function(subscribersListTmpl) {
          var template;
          template = Handlebars.compile(subscribersListTmpl);
          return $('.h_subscribers_list').html(template({
            subscribers: result,
            event_id: eventId
          }));
        });
      }
    });
  });

}).call(this);
