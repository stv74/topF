// Определяем константы Gulp
const { src, dest, parallel, series, watch } = require('gulp');

// Подключаем Browsersync
const browserSync = require('browser-sync').create();

// Подключаем gulp-concat
const concat = require('gulp-concat');

// Подключаем gulp-uglify-es
const uglify = require('gulp-uglify-es').default;

// Подключаем модули gulp-sass
const sass = require('gulp-sass')(require('sass'));

// Подключаем Autoprefixer
const autoprefixer = require('gulp-autoprefixer');

// Подключаем модуль gulp-clean-css
const cleancss = require('gulp-clean-css');

// Подключаем gulp-imagemin для работы с изображениями
const imagecomp = require('compress-images');

// Подключаем модуль del
const del = require('del');

// Определяем логику работы Browsersync
function browsersync() {
	browserSync.init({
		// Инициализация Browsersync
		server: { baseDir: 'src/' }, // Указываем папку сервера
		notify: false, // Отключаем уведомления
		online: true, // Режим работы: true или false
	});
}

function scripts() {
	return src([
		// Берём файлы из источников
		'node_modules/jquery/dist/jquery.min.js',
		'src/js/slick.js',
		'src/js/script.js', // Пользовательские скрипты, использующие библиотеки, должны быть подключены в конце
	])
		.pipe(concat('script.min.js')) // Конкатенируем в один файл
		.pipe(uglify()) // Сжимаем JavaScript
		.pipe(dest('src/js/')) // Выгружаем готовый файл в папку назначения
		.pipe(browserSync.stream()); // Триггерим Browsersync для обновления страницы
}

function styles() {
	return src('src/sass/**/*.+(scss|sass)') // Выбираем источник
		.pipe(sass().on('error', sass.logError))
		.pipe(concat('style.min.css')) // Конкатенируем в файл style.min.css
		.pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true })) // Создадим префиксы с помощью Autoprefixer
		.pipe(cleancss({ level: { 1: { specialComments: 0 } } /* , format: 'beautify' */ })) // Минифицируем стили
		.pipe(dest('src/css/')) // Выгрузим результат в папку "src/css/"
		.pipe(browserSync.stream()); // Сделаем инъекцию в браузер
}

async function images() {
	imagecomp(
		'src/img-src/**/*', // Берём все изображения из папки источника
		'src/images/', // Выгружаем оптимизированные изображения в папку назначения
		{ compress_force: false, statistic: true, autoupdate: true },
		false, // Настраиваем основные параметры
		{ jpg: { engine: 'mozjpeg', command: ['-quality', '75'] } }, // Сжимаем и оптимизируем изображеня
		{ png: { engine: 'pngquant', command: ['--quality=75-100', '-o'] } },
		{ svg: { engine: 'svgo', command: '--multipass' } },
		{ gif: { engine: 'gifsicle', command: ['--colors', '64', '--use-col=web'] } },
		function (err, completed) {
			// Обновляем страницу по завершению
			if (completed === true) {
				browserSync.reload();
			}
		}
	);
}

function cleanimg() {
	return del('src/images/**/*', { force: true }); // Удаляем всё содержимое папки "dist/images/"
}

function startwatch() {
	// Выбираем все файлы JS в проекте, а затем исключим с суффиксом .min.js
	watch(['src/**/*.js', '!src/**/*.min.js'], scripts);

	// Мониторим файлы препроцессора на изменения
	watch('src/sass/**/*.+(scss|sass|css)', styles);

	// Мониторим файлы HTML на изменения
	watch('src/**/*.html').on('change', browserSync.reload);

	// Мониторим папку-источник изображений и выполняем images(), если есть изменения
	watch('src/img-src/**/*', images);
}

// Экспортируем функцию browsersync() как таск browsersync. Значение после знака = это имеющаяся функция.
exports.browsersync = browsersync;

// Экспортируем функцию scripts() в таск scripts
exports.scripts = scripts;

// Экспортируем функцию styles() в таск styles
exports.styles = styles;

// Экспорт функции images() в таск images
exports.images = images;

// Экспортируем функцию cleanimg() как таск cleanimg
exports.cleanimg = cleanimg;

// Экспортируем дефолтный таск с нужным набором функций
exports.default = parallel(styles, scripts, images, browsersync, startwatch);
