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

// Move JS Files to ./static/js
gulp.task('js', function() {
  return gulp.src(['./src/js/**/*.js', 'node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/tether/dist/js/tether.min.js'])
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./static/js"))
});
