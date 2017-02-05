var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    scsslint = require('gulp-scss-lint');

var config = {
  local: {
    fontPath: './local/fonts'
  },
  src: {
    scssPath: './src/scss'
  },
  dist: {
    cssPath:  './static/css',
    fontPath: './static/fonts'
  }
};


//
// Fonts
//

// Web font processing
gulp.task('fonts', function() {
  return gulp.src(config.local.fontPath + '/**/*')
    .pipe(gulp.dest(config.dist.fontPath));
});


//
// CSS
//

// Lint scss files
gulp.task('scss-lint', function() {
  return gulp.src(config.src.scssPath + '/*.scss')
    .pipe(scsslint({
      'maxBuffer': 400 * 1024  // default: 300 * 1024
    }));
});

// Compile scss files
gulp.task('scss-build', function() {
  return gulp.src(config.src.scssPath + '/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest(config.dist.cssPath));
});

// All css-related tasks
gulp.task('css', ['scss-lint', 'scss-build']);


//
// Rerun tasks when files change
//
gulp.task('watch', function() {
  gulp.watch(config.src.scssPath + '/**/*.scss', ['css']);
});


//
// Default task
//
gulp.task('default', ['fonts', 'css']);
