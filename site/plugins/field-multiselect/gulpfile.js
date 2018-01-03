var gulp          = require('gulp');
var autoprefixer  = require('gulp-autoprefixer');
var sass          = require('gulp-sass');
var cssmin        = require('gulp-cssmin');
var rename        = require('gulp-rename');
var uglify        = require('gulp-uglify');

gulp.task('css', function() {
  return gulp.src('field/assets/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(rename('style.css'))
    .pipe(cssmin())
    .pipe(gulp.dest('field/assets/css'));
});

gulp.task('js', function() {
  return gulp.src('field/assets/js/src/script.js')
    .pipe(uglify())
    .pipe(gulp.dest('field/assets/js'));
});

gulp.task('watch', function() {
  gulp.watch('field/assets/scss/**/*.scss', ['css']);
  gulp.watch('field/assets/js/src/*.js', ['js']);
});
