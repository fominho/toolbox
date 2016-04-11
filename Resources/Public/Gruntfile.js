module.exports = function(grunt) {

	grunt.initConfig({
		uglify: {
			my_target: {
				files: {
					'js/toolbox.min.js': [
						'Vendor/jquery.flexipage.js',
						'Vendor/flip/dist/jquery.flip.js',
						'Vendor/ui.js',

						'Vendor/jchartfx.system.js',
						'Vendor/jchartfx.coreVector.js',
						'Vendor/jchartfx.coreVector3d.js',
						'Vendor/jchartfx.animation.js',
						'Vendor/jchartfx.advanced.js',

						'js/Flashcard/flipcard.js',
						'js/Einordnung/einordnung.js',
						'js/Chart/chart.js',
						'js/Hangman/hangman.js',
						'js/QuestionHintAnswer/qha.js',
						'js/Quiz/quiz.js',
						'js/DragEndDropRanking/**/*.js'
					]
				}
			}
		},
		cssmin: {
			target: {
				files: {
					'css/toolbox.min.css': [
						'css/jchartfx.css',
						'css/toolbox.css',
						'css/main.css'
					]
				}
			}
		},
		compass: {
			dist: {
				options: {
					sassDir: 'css',
					cssDir: 'css',
					environment: 'production',
					raw: 'preferred_syntax = :sass\n',
					httpFontsPath: '/',
					javascriptsDir: 'JavaScripts',
					imagesDir: 'Images',
					force: true
				}
			}
		},
		jscs: {
			src: ['JavaScripts/Modules/**/*.js'],
			options: {
				config: ".jscsrc",
				excludeFiles: [],
				esnext: true,
				verbose: true,
				requireCurlyBraces: [ "if" ]
			}
		},
		jshint: {
			options: {
				curly: true,
				eqeqeq: true,
				eqnull: true,
				browser: true,
				globals: {
					jQuery: true
				},
				ignores: ['Vendor/**/*.js']
			},
			all:  ['Vendor/DragEndDropRanking/**/*.js']
		},
		watch: {
			files: [
				'js/Flashcard/flipcard.js',
				'js/Einordnung/einordnung.js',
				'js/Chart/chart.js',
				'js/Hangman/hangman.js',
				'js/QuestionHintAnswer/qha.js',
				'js/Quiz/quiz.js',
				'js/DragEndDropRanking/**/*.js',

				'css/jchartfx.css',
				'css/toolbox.css'
			],
			tasks: ['jshint', 'jscs', 'uglify', 'cssmin']
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-jscs');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-compass');

	grunt.registerTask('default', ['watch']);
};
