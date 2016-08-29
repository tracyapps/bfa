module.exports = function(grunt) {
	require('load-grunt-tasks')(grunt);

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		watch: {
			options: {
				livereload: 51188,
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
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},
			build: {
				src: 'src/<%= pkg.name %>.js',
				dest: 'build/<%= pkg.name %>.min.js'
			}
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