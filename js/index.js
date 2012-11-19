// Generated by CoffeeScript 1.4.0
(function() {

  require(['underscore', 'handlebars', 'Shared', 'jquery'], function(_, Handlebars, Shared) {
    return Shared.ApiMakeRequest('events/last.php', {}, function(result) {
      var startDate, str;
      if (!(result.error != null)) {
        startDate = Shared.fullDate(result.starts_at);
        str = 'Le prochain évènement aura lieu le ' + startDate + '. Il s\'intitule <em>' + result.title + '</em>.';
        str += '<p><a class="btn btn-primary btn-large" href="last-event.html">En savoir plus &raquo;</a></p>';
        return $('.hero-unit .content').html(str);
      }
    });
  });

}).call(this);