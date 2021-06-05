const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const scsslint = require('gulp-sass-lint');

const config = {
  src: {
    scssPath: './src/scss'
  },
  dist: {
    cssPath:  './static/css',
    fontPath: './static/fonts'
  }
};


//
// CSS
//

// Lint scss files
gulp.task('scss-lint', () => {
  return gulp.src(`${config.src.scssPath}/*.scss`)
    .pipe(scsslint({
      'maxBuffer': 400 * 1024  // default: 300 * 1024
    }));
});

// Compile scss files
gulp.task('scss-build', function() {
  return gulp.src(`${config.src.scssPath}/style.scss`)
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest(config.dist.cssPath));
});

// All css-related tasks
gulp.task('css', gulp.series('scss-lint', 'scss-build'));


//
// Rerun tasks when files change
//
gulp.task('watch', () => {
  gulp.watch(`${config.src.scssPath}/**/*.scss`, gulp.series('css'));
});


//
// Default task
//
gulp.task('default', gulp.series('css'));
