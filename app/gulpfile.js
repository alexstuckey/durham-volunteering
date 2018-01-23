var gulp = require('gulp')
var sourcemaps = require('gulp-sourcemaps')
var sass = require('gulp-sass')

gulp.task('sass', function () {
 return gulp.src(['./src/sass/**/*.scss', 'node_modules/bootstrap/scss/bootstrap.scss'])
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('./static/css'))
})

// Move JS Files to ./static/js
gulp.task('js', function() {
  return gulp.src(['./src/js/**/*.js', 'node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/tether/dist/js/tether.min.js', 'node_modules/popper.js/dist/umd/popper.min.js', 'node_modules/chart.js/dist/Chart.min.js'])
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./static/js"))
})

gulp.task('fonts', function() {
  return gulp.src('./src/fonts/**/*')
    .pipe(gulp.dest('./static/fonts'))
})

gulp.task('images', function() {
  return gulp.src('./src/images/**/*.+(png|jpg|jpeg|gif|svg)')
    .pipe(gulp.dest('./static/images'))
})

gulp.task('default', ['sass', 'js', 'fonts', 'images'])

// Watches project resouce directory for changes
gulp.task('serve', ['sass', 'js', 'fonts'], function() {

  gulp.watch('./src/sass/**/*.scss', ['sass'])
  gulp.watch('./src/js/**/*.js', ['js'])
  gulp.watch('./src/fonts/**/*', ['fonts'])
  gulp.watch('./src/images/**/*.+(png|jpg|jpeg|gif|svg)', ['images'])
})
