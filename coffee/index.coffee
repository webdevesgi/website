require ['underscore', 'handlebars','Shared', 'jquery'], (_, Handlebars, Shared) ->

  Shared.ApiMakeRequest 'events/last.php', {}, (result) ->
    if !result.error?
      startDate = Shared.fullDate(result.starts_at)
      str = 'Le prochain évènement aura lieu le ' + startDate + '. Il s\'intitule <em>' + result.title + '</em>.'
      str += '<p><a class="btn btn-primary btn-large" href="last-event.html">En savoir plus &raquo;</a></p>'
      $('.hero-unit .content').html str