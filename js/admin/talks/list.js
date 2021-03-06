// Generated by CoffeeScript 1.4.0
(function() {

  require(['Shared'], function(Shared) {
    var eventId, params;
    Handlebars.registerHelper('fullDate', function(datetime) {
      return Shared.fullDate(datetime);
    });
    params = $('#require_js').data('params');
    eventId = params.event_id;
    return Shared.ApiMakeRequest('talks/list.php', {
      event_id: eventId
    }, function(result) {
      if (!(result.error != null)) {
        return require(['text!../../templates/admin/talks/talksList.html'], function(talksListTmpl) {
          var template;
          template = Handlebars.compile(talksListTmpl);
          return $('.h_talks_list').html(template({
            talks: result,
            event_id: eventId
          }));
        });
      }
    });
  });

}).call(this);
