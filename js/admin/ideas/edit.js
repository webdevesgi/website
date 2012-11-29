(function() {

  require(['Shared'], function(Shared) {
    var formUrl, handleEdit, ideaId, params;
    params = $('#require_js').data('params');
    formUrl = params.formUrl;
    ideaId = params.ideaId;
    Shared.ApiMakeRequest('ideas/show.php', {
      id: ideaId
    }, function(result) {
      if (!(result.error != null)) {
        return require(['text!../../templates/admin/ideas/ideasShow.html'], function(ideasShowTmpl) {
          var template;
          template = Handlebars.compile(ideasShowTmpl);
          $('.h_idea').html(template({
            formUrl: formUrl,
            idea: result
          }));
          return handleEdit();
        });
      }
    });
    handleEdit = function() {
      var form;
      form = $('#idea-form');
      return form.submit(function(e) {
        var data, handleError, method, url;
        e.preventDefault();
        url = form.attr('action');
        method = form.attr('method');
        data = {
          id: ideaId,
          title: form.find('#inputTitle').val(),
          description: form.find('#inputDescription').val(),
          type: form.find('#inputType').val(),
          email: form.find('#inputEmail').val(),
          firstname: form.find('#inputFirstname').val(),
          lastname: form.find('#inputLastname').val()
        };
        handleError = function(msg) {};
        return Shared.ApiMakeRequest(url, data, function(result) {
          if (result.error != null) {
            return handleError(result.message);
          } else {
            return document.location.href = 'list.php';
          }
        }, function(error) {
          return handleError();
        }, method);
      });
    };
    return Handlebars.registerHelper('selectOption', function(type, item) {
      var str;
      str = '';
      if (type === item) return str = ' selected="selected"';
    });
  });

}).call(this);
