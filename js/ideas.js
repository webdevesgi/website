(function() {

  require(['underscore', 'handlebars', 'Shared', 'jquery'], function(_, Handlebars, Shared) {
    var refreshIdeas;
    refreshIdeas = function() {
      return Shared.ApiMakeRequest('ideas/list.php', {}, function(result) {
        if (!(result.error != null)) {
          return require(['text!../templates/ideas.html'], function(ideasTpl) {
            var template;
            template = Handlebars.compile(ideasTpl);
            return $('.current-ideas').html(template({
              ideas: result
            }));
          });
        }
      });
    };
    $('.ideas-form form').submit(function(e) {
      var data, form, handleError, method, url;
      e.preventDefault();
      form = $(this);
      url = form.attr('action');
      method = form.attr('method');
      data = {
        title: form.find('input#inputTitle').val(),
        description: form.find('textarea#inputDescription').val(),
        type: form.find('select#inputType option:selected').val(),
        email: form.find('input#inputEmail').val(),
        firstname: form.find('input#inputFirstname').val(),
        lastname: form.find('input#inputLastname').val()
      };
      handleError = function(msg) {
        var errorAlert;
        errorAlert = $('.form-error');
        errorAlert.removeClass('hide');
        if (msg != null) {
          return errorAlert.find('.error-msg').html('Message d\'erreur : ' + msg);
        }
      };
      return Shared.ApiMakeRequest(url, data, function(result) {
        var errorAlert;
        if (result.error != null) {
          return handleError(result.message);
        } else {
          form.addClass('hide');
          $('.form-success').removeClass('hide');
          errorAlert = $('.form-error');
          if (!errorAlert.hasClass('hide')) errorAlert.addClass('hide');
          return refreshIdeas();
        }
      }, function(error) {
        return handleError();
      }, method);
    });
    return refreshIdeas();
  });

}).call(this);
