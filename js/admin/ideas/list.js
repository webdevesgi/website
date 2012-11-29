(function() {

  require(['Shared'], function(Shared) {
    Handlebars.registerHelper('fullDate', function(datetime) {
      return Shared.fullDate(datetime);
    });
    return Shared.ApiMakeRequest('ideas/list.php', {}, function(result) {
      if (!(result.error != null)) {
        return require(['text!../../templates/admin/ideas/ideasList.html'], function(ideasListTmpl) {
          var template;
          template = Handlebars.compile(ideasListTmpl);
          return $('.h_ideas_list').html(template({
            ideas: result
          }));
        });
      }
    });
  });

}).call(this);
