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
          'assets/css/app-min.css': 'assets/scss/app.scss'
        }
      }
    },

    //Autoprefixer
    autoprefixer: {
      options: {
         browsers: ['last 2 versions', 'ie 8', 'ie 9', '> 1%'],
         map: true,
      },
      //prefix all files
      multiple_files: {
        expand: true,
        flatten: true,
        src:'assets/css/*.css',
        dest:'assets/css/',
      }
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
        tasks: ['sass', 'autoprefixer'],
      },
      livereload: {
          options: { livereload: true },
          files: ['assets/scss/**/*.scss', 'assets/js/*.js', '**/*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
      }
    },

  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['build','watch']);
}
