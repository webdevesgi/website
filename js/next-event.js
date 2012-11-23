(function() {

  require(['underscore', 'handlebars', 'Shared', 'jquery'], function(_, Handlebars, Shared) {
    var handleSubscribe;
    Shared.ApiMakeRequest('events/next.php', {}, function(result) {
      if (!(result.error != null)) {
        return require(['text!../templates/next-event.html', 'text!../templates/subscribe-form.html', 'text!../templates/subscribers.html'], function(nextEventTpl, subscribeFormTpl, subscribersTpl) {
          var eventTemplate, formTemplate, subscribersTemplate;
          eventTemplate = Handlebars.compile(nextEventTpl);
          formTemplate = Handlebars.compile(subscribeFormTpl);
          subscribersTemplate = Handlebars.compile(subscribersTpl);
          $('.event').html(eventTemplate({
            event: result
          }));
          $('.subscribe').html(formTemplate({
            event_id: result.id
          }));
          $('.subscribers').html(subscribersTemplate({
            subscribers: result.subscribers
          }));
          return handleSubscribe();
        });
      }
    });
    handleSubscribe = function() {
      return $('#event_subscribe_form').bind('submit', function(e) {
        var data, form, handleError, method, url;
        e.preventDefault();
        form = $(this);
        url = form.attr('action');
        method = form.attr('method');
        data = {
          event_id: form.find('input#event_id').val(),
          email: form.find('input#subscriber-email').val(),
          firstname: form.find('input#subscriber-firstname').val(),
          lastname: form.find('input#subscriber-lastname').val()
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
            return $('.subscribers').find('ul').append('<li>' + result.firstname + ' ' + result.lastname + '</li>');
          }
        }, function(error) {
          return handleError();
        }, method);
      });
    };
    Handlebars.registerHelper('getEventDate', function(dateStr) {
      var date, frenchDate, str;
      date = Shared.createDate(dateStr);
      frenchDate = Shared.getFrenchDate(date);
      return str = frenchDate.day.slice(0, 1).toUpperCase() + frenchDate.day.slice(1) + ' ' + frenchDate.date + ' ' + frenchDate.month + ' à ' + frenchDate.hours + ':' + frenchDate.minutes + '.';
    });
    Handlebars.registerHelper('fullDate', function(datetime) {
      return Shared.fullDate(datetime);
    });
    return Handlebars.registerHelper('showIfUpdated', function(var1, var2) {
      var str;
      str = '';
      if (var1 !== var2) {
        str = '<br />Dernière modification le ' + Shared.fullDate(var2);
      }
      return new Handlebars.SafeString(str);
    });
  });

}).call(this);
