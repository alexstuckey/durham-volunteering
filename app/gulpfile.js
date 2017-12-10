var gulp = require('gulp')
var sourcemaps = require('gulp-sourcemaps')
var sass = require('gulp-sass')

gulp.task('sass', function () {
 return gulp.src(['./src/sass/**/*.scss', 'node_modules/bootstrap/scss/bootstrap.scss'])
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('./static/css'));
});
