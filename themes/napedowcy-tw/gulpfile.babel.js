import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import browserSync from 'browser-sync';
import postcss from 'gulp-postcss';
import rgba from 'postcss-hexrgba';
import autoprefixer from 'autoprefixer';
import cssvars from 'postcss-simple-vars';
import nested from 'postcss-nested';
import cssImport from 'postcss-import';
import mixins from 'postcss-mixins';
import colorFunctions from 'postcss-color-function'

const server = browserSync.create();

const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    srcCss: 'src/assets/css/styles.css',
    src: 'src/assets/scss/styles.scss',
    dest: 'dist/assets/css'
  },
  images: {
    src: ['src/assets/images/**/*.{jpg, jpeg, png, svg, gif}', 'src/assets/images/icons/**/*.{jpg, jpeg, png, svg, gif}'],
    dest: 'dist/assets/images'
  },
  scripts: {
    src: 'src/assets/js/App.js',
    dest: 'dist/assets/js'
  },
  other: {
    src: ['src/assets/**/*', '!src/assets/{js,scss,css}', '!src/assets/{js,scss,css}/**/*'],
    dest: 'dist/assets'
  }
  // 
}

export const serve = (done) => {
  server.init({
    proxy: 'http://localhost/napedowcy-tw'
  });
  done();
}

export const reload = (done) => {
  server.reload();
  done();
}

export const clean = () => del(['dist']);

export const styles = () => {
  return gulp.src(paths.styles.srcCss)
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(postcss([cssImport, mixins, cssvars, nested, rgba, colorFunctions, autoprefixer]))
    .on('error', (error) => console.log(error.toString()))
    .pipe(gulpif(PRODUCTION, cleanCSS({
      compatibility: 'ie8'
    })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(server.stream());
}

// export const styles = () => {
//   return gulp.src(paths.styles.src)
//     .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
//     .pipe(sass().on('error', sass.logError))
//     .pipe(gulpif(PRODUCTION, cleanCSS({
//       compatibility: 'ie8'
//     })))
//     .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
//     .pipe(gulp.dest(paths.styles.dest))
//     .pipe(server.stream());
// }

export const images = () => {
  return gulp.src(paths.images.src)
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(gulp.dest(paths.images.dest));
}

export const watch = () => {
  gulp.watch('src/assets/css/**/*.css', styles);
  //gulp.watch('src/assets/scss/**/*.scss', styles);
  gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
  gulp.watch('**/*.php', reload);
  gulp.watch(paths.images.src, gulp.series(images, reload));
  gulp.watch(paths.other.src, gulp.series(copy, reload));
}

export const copy = () => {
  return gulp.src(paths.other.src)
    .pipe(gulp.dest(paths.other.dest))
}

export const scripts = () => {
  return gulp.src(paths.scripts.src)
    .pipe(webpack({
      module: {
        rules: [{
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        }]
      },
      output: {
        filename: 'main.js'
      },
      externals: {
        jquery: 'jQuery'
      },
      devtool: !PRODUCTION ? 'inline-source-map' : false,
      mode: !PRODUCTION ? 'development' : 'production'
    }))
    .pipe(gulpif(PRODUCTION, uglify()))
    .pipe(gulp.dest(paths.scripts.dest))
}

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));

export default dev;