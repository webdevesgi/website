(function() {

  define(['handlebars', 'underscore', 'jquery'], function(Handlebars, _) {
    var Shared;
    Shared = (function() {

      function Shared() {}

      Shared.prototype.apiUrl = '/ajax/scripts/';

      Shared.prototype.ApiMakeRequest = function(url, params, success, fail, method) {
        if (params == null) params = {};
        if (success == null) success = null;
        if (fail == null) fail = null;
        if (method == null) method = 'GET';
        if (!(success != null)) success = function() {};
        if (!(fail != null)) fail = function() {};
        url = this.apiUrl + url;
        return $.ajax({
          url: url,
          type: method,
          data: params,
          dataType: 'json',
          success: function(result) {
            return success(result);
          },
          error: function(result) {
            return fail(result);
          }
        });
      };

      Shared.prototype.fullDate = function(datetime) {
        var m;
        m = /^(\d{4})-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)$/.exec(datetime);
        return m[3] + '/' + m[2] + '/' + m[1] + ' à ' + m[4] + ':' + m[5];
      };

      Shared.prototype.createDate = function(datetime) {
        var r;
        r = /^(\d{4})-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)$/.exec(datetime);
        return new Date(r[2] + '/' + r[3] + '/' + r[1] + ' ' + r[4] + ':' + r[5] + ':' + r[6]);
      };

      Shared.prototype.getFrenchDate = function(date) {
        var french, result;
        french = {
          days: {
            '0': 'dimanche',
            '1': 'lundi',
            '2': 'mardi',
            '3': 'mercredi',
            '4': 'jeudi',
            '5': 'vendredi',
            '6': 'samedi'
          },
          months: {
            '0': 'janvier',
            '1': 'février',
            '2': 'mars',
            '3': 'avril',
            '4': 'mai',
            '5': 'juin',
            '6': 'juillet',
            '7': 'août',
            '8': 'septembre',
            '9': 'octobre',
            '10': 'novembre',
            '11': 'décembre'
          },
          addZero: function(date) {
            var result;
            result = date;
            if (date < 10) result = '0' + result;
            return result;
          }
        };
        return result = {
          day: french.days[date.getDay()],
          month: french.months[date.getMonth()],
          date: french.addZero(date.getDate()),
          hours: french.addZero(date.getHours()),
          minutes: french.addZero(date.getMinutes())
        };
      };

      return Shared;

    })();
    return new Shared;
  });

}).call(this);
