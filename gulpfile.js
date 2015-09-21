'use strict';

var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var del = require('del');
var gulp = require('gulp');
var header = require('gulp-header');
var htmlmin = require('gulp-htmlmin');
var jshint = require('gulp-jshint');
var moment = require('moment');
var rename = require('gulp-rename');
var replace = require('gulp-replace-task');
var run = require('gulp-run');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var svgmin = require('gulp-svgmin');
var svgstore = require('gulp-svgstore');
var template = require('gulp-template');
var uglify = require('gulp-uglify');

var sassParams = {
	includePaths: [
		'libraries/normalize-scss/',
		'libraries/bourbon/app/assets/stylesheets/',
		'libraries/compass-mixins/lib/',
		'libraries/compass-breakpoint/stylesheets/',
		'libraries/singularity/stylesheets/',
		'libraries/spinners/stylesheets/',
		'src/sass/'
	],
	errLogToConsole: true
};

var pkg = require('./package.json');
var banner = '/* <%= pkg.name %> <%= pkg.version %> (build <%= moment().toISOString() %>) */\n';

gulp.task('sass:prod', function (cb) {
	gulp.src('src/sass/**/*.scss')
		.pipe(sass(sassParams).on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 2 versions', 'ie >= 8', 'ff >= 5', 'chrome >= 20', 'opera >= 12', 'safari >= 4', 'ios >= 6', 'android >= 2', 'bb >= 6']
		}))
		.pipe(gulp.dest('css'))
		.on('end', cb);
});

gulp.task('sass:dev', function (cb) {
	gulp.src('src/sass/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass(sassParams).on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 2 versions', 'ie >= 8', 'ff >= 5', 'chrome >= 20', 'opera >= 12', 'safari >= 4', 'ios >= 6', 'android >= 2', 'bb >= 6']
		}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('css'))
		.on('end', cb);
});

gulp.task('dev:css', ['sass:dev'], function (cb) {
	run('bash sync.sh css').exec(cb);
});

//gulp.task('dev:js', ['js'], function (cb) {
//	run('bash sync.sh js').exec(function () {
//		del(['tmp'], cb);
//	});
//});

gulp.task('sync:php', function (cb) {
	run('bash sync.sh php 1').exec(cb);
});

gulp.task('watch', function () {
	gulp.watch(['!tmp', 'src/sass/**/*.scss'], ['dev:css']);
//	gulp.watch(['!tmp', 'src/js/**/*.html', 'src/js/**/*.js'], ['dev:js']);
	gulp.watch(['!tmp', '**/*.inc', '**/*.info', '**/*.make', '**/*.php'], ['sync:php']);
});

gulp.task('default', ['sass:dev', 'watch']);
