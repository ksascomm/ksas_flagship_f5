module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //Sass Compiling Task
    sass: {
      options: {
        includePaths: ['assets/bower_components/foundation/scss']
      },
      dev: {
        options: {
          style: 'expanded',
          debugInfo: true,
          sourceMap: true,
        },
        files: {
          'assets/css/app.css': 'assets/scss/app.scss'
        }
      },
      dist: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true,
        },
        files: {
          'assets/css/app.min.css': 'assets/scss/app.scss',
          'assets/css/app.ie.css': 'assets/scss/app.scss'
        }
      }
    },

    //autoprefixer
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer')({browsers: ['last 2 versions', '> 10%']})
        ]
      },
      //prefix all files
      multiple_files: {
        expand: true,
        flatten: true,
        src:'assets/css/*.css',
        dest:'assets/css/',
      }
    },

    //imagemin
    imagemin: {
       dist: {
          options: {
            optimizationLevel: 5
          },
          files: [{
             expand: true,
             cwd: 'assets/images',
             src: ['**/*.{png,jpg,gif}'],
             dest: 'assets/images'
          }]
       }
    },
    //browserSync
    browserSync: {
        dev: {
            bsFiles: {
                    src : [
                        'assets/css/*.css',
                        '**/*.php',
                        'assets/js/vendor/*.js',
                        'assets/js/*.js',
                        'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}'
                    ]
            },
            options: {
                watchTask: true,
                proxy: "bicycle.dev"
            }
        }
    },

    //Copy Bower Components
    copy: {
        fontawesome: {
            expand: true,
            flatten: true,
            src: ['assets/bower_components/fontawesome/fonts/*'],
            dest: 'assets/fonts'
        },
foundation: {
            expand: true,
            flatten: true,
            src: ['assets/bower_components/foundation/js/foundation/foundation.js'],
            dest: 'assets/js'
        },    
        foundation_plugins: {
            expand: true,
            flatten: true,
            src: [
              'assets/bower_components/foundation/js/foundation/foundation.accordion.js',
              'assets/bower_components/foundation/js/foundation/foundation.interchange.js',
              'assets/bower_components/foundation/js/foundation/foundation.orbit.js',
              'assets/bower_components/foundation/js/foundation/foundation.reveal.js',
              'assets/bower_components/foundation/js/foundation/foundation.slider.js',
              'assets/bower_components/foundation/js/foundation/foundation.tab.js'
            ],
            dest: 'assets/js/foundation_plugins'
        },    
        modernizr: {
            expand: true,
            flatten: true,
            src: ['assets/bower_components/foundation/js/vendor/modernizr.js'],
            dest: 'assets/js/vendor'
        }
    },

    //minify js with uglify
     uglify: {
        dist: {
        options: {
          mangle: false,
          compress: true
        },
        files: {
          "assets/js/vendor/modernizr.min.js": ["assets/js/vendor/modernizr.js"],
          "assets/js/vendor/app.min.js": ["assets/js/vendor/app.js"],
          "assets/js/vendor/page.directory.min.js": ["assets/js/vendor/page.directory.js"],
          "assets/js/vendor/page.fieldsofstudy.min.js": ["assets/js/vendor/page.fieldsofstudy.js"],
          "assets/js/foundation.min.js": ["assets/js/foundation.js"],
          "assets/js/foundation.plugins.min.js": [
            "assets/js/foundation_plugins/foundation.accordion.js",
            "assets/js/foundation_plugins/foundation.interchange.js",
            "assets/js/foundation_plugins/foundation.orbit.js",
            "assets/js/foundation_plugins/foundation.reveal.js",
            "assets/js/foundation_plugins/foundation.slider.js",
            "assets/js/foundation_plugins/foundation.tab.js",
          ]
        },
      },
    },

    //Watch Task
    watch: {
      grunt: {
        options: {
          reload: true
        },
        files: ['Gruntfile.js']
      },
      sass: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass', 'postcss', 'imagemin'],
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['sass','browserSync','copy','uglify', 'watch']);
}
