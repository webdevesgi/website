(function() {

  require(['Shared'], function(Shared) {
    Handlebars.registerHelper('fullDate', function(datetime) {
      return Shared.fullDate(datetime);
    });
    return Shared.ApiMakeRequest('talks/list.php', {
      event_id: 'e00001',
      fields: 'id'
    }, function(result) {
      if (!(result.error != null)) {
        return require(['text!../../templates/admin/talks/talksList.html'], function(eventsListTmpl) {
          var template;
          template = Handlebars.compile(eventsListTmpl);
          return $('.h_talks_list').html(template({
            talks: result
          }));
        });
      }
    });
  });

}).call(this);
