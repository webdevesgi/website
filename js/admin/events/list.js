// Generated by CoffeeScript 1.4.0
(function() {

  require(['Shared'], function(Shared) {
    Handlebars.registerHelper('fullDate', function(datetime) {
      return Shared.fullDate(datetime);
    });
    return Shared.ApiMakeRequest('events/list.php', {
      id: 'e00001'
    }, function(result) {
      if (!(result.error != null)) {
        return require(['text!../../templates/admin/events/eventsList.html'], function(eventsListTmpl) {
          var template;
          template = Handlebars.compile(eventsListTmpl);
          return $('.h_events_list').html(template({
            events: result
          }));
        });
      }
    });
  });

}).call(this);
