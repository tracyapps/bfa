module.exports = function(grunt) {
	require('load-grunt-tasks')(grunt);

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		watch: {
			options: {
				livereload: true,
			},
			sass: {
				files: ['sass/**/*.{scss,sass}'],
				tasks: ['sass']
			},
			uglify: {
				files: ['js/plugins.js', 'js/plugins/**/*.js', 'js/main.js'],
				tasks: ['uglify']
			},
			files: "**/*.php"
		},
		uglify: {
			all: {
				files: [{
					'js/all.min.js': ['js/main.js', 'js/plugins/*.js']
				}]
			}
		},
		concat: {
			theme: {
				src: ['js/plugins/*.js', 'js/main.js'],
				dest: 'js/all.js',
			},
		},
		sass: {
			dist: {
				options: {
					includePaths: require('node-bourbon').includePaths,
					sourceMap: false,
					sourceComments: false,
					outputStyle: 'compressed'
				},
				files: {
					'css/style.min.css': 'sass/style.scss',
					'css/print.min.css': 'sass/print.scss'
				}
			},
			src: {
				options: {
					includePaths: require('node-bourbon').includePaths,
					sourceMap: true,
					sourceComments: false,
					outputStyle: 'expanded'
				},
				files: {
					'css/style.css': 'sass/style.scss',
					'css/print.css': 'sass/print.scss',
				}
			}
		}
	});

	// Load the plugins
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');


	// Default task(s).
	grunt.registerTask('default', ['watch']);

};