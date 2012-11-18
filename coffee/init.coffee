require.config

  shim:
    underscore:
      exports: '_'
    handlebars:
      exports: 'Handlebars'

  config:
    text: {}

  paths:
    # libs
    jquery:      'lib/jquery-1.8.2.min'
    bootstrap:   'lib/bootstrap.min'
    underscore:  'lib/underscore.min'
    handlebars:  'lib/handlebars'
    text:        'lib/text'

  baseUrl: 'js/'

require ['main']
