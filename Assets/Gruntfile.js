module.exports = function(grunt) {
    
    require('load-grunt-tasks')(grunt); // load all tasks
    require('time-grunt')(grunt);
    
    // Include only what you want! No trailing ","!
    var jsLibs = [
      // 'bower_components/foundation/js/vendor/modernizr.js', // updated - include modernizr separately at <head> and move the rest of [jsLibs] to before </body> for better page load
      'bower_components/foundation/js/vendor/jquery.js',
      'bower_components/foundation/js/vendor/jquery.cookie.js',
      'bower_components/foundation/js/vendor/placeholder.js',
      'bower_components/foundation/js/vendor/fastclick.js'
    ];

    // Include only what you want! No trailing ","!
    var jsFoundation = [
      'bower_components/foundation/js/foundation/foundation.js',
      'bower_components/foundation/js/foundation/foundation.abide.js',
      'bower_components/foundation/js/foundation/foundation.accordion.js',
      'bower_components/foundation/js/foundation/foundation.alert.js',
      'bower_components/foundation/js/foundation/foundation.clearing.js',
      'bower_components/foundation/js/foundation/foundation.dropdown.js',
      'bower_components/foundation/js/foundation/foundation.equalizer.js',
      'bower_components/foundation/js/foundation/foundation.interchange.js',
      'bower_components/foundation/js/foundation/foundation.joyride.js',
      'bower_components/foundation/js/foundation/foundation.magellan.js',
      'bower_components/foundation/js/foundation/foundation.offcanvas.js',
      'bower_components/foundation/js/foundation/foundation.orbit.js',
      'bower_components/foundation/js/foundation/foundation.reveal.js',
      'bower_components/foundation/js/foundation/foundation.slider.js',
      'bower_components/foundation/js/foundation/foundation.tab.js',
      'bower_components/foundation/js/foundation/foundation.tooltip.js',
      'bower_components/foundation/js/foundation/foundation.topbar.js'
    ];

    // Your custom javascript files. No trailing ","!
    var jsApp = [
      'js/app.js',
      'js/_*.js'
    ];

    grunt.initConfig({
      pkg: grunt.file.readJSON('package.json'),

      sass: {
        options: {
          includePaths: ['bower_components/foundation/scss']
        },
        dist: {
          options: {
            outputStyle: 'compressed',
            sourceMap: true
          },
          files: {
            '../public/css/app.css': 'scss/app.scss'
          }
        }
      },

      uglify: {
        options: {
          sourceMap: true
        },
        dist: {
          files: {
            '../public/js/libs/libs.min.js': [jsLibs],
            '../public/js/libs/foundation.min.js': [jsFoundation],
            '../public/js/app.min.js': [jsApp]
          }
        }
      },

      jshint: {
        all: [
          'Gruntfile.js',
          jsApp
        ]
      },

      watch: {
          grunt: {
            options: {
              reload: true
            },
            files: ['Gruntfile.js']
          },

          sass: {
            files: 'scss/**/*.scss',
            tasks: ['sass']
          },

          js: {
            files: [
                jsLibs,
                jsFoundation,
                '<%= jshint.all %>'
            ],
            tasks: ['jshint', 'uglify']

            }
          }
    });
    
    grunt.registerTask('build', [
        'sass',
        'jshint',
        'uglify'
    ]);
    
    grunt.registerTask('default', [
        'build',
        'watch'
    ]);
};
