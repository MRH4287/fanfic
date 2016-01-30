/*global module:false*/
module.exports = function (grunt)
{

    // Project configuration.
    grunt.initConfig({
        // Metadata.
        banner: 
          '/* <%= grunt.template.today("yyyy-mm-dd") %>\n' +
          ' * Commit-Hash: <%= gitinfo.local.branch.current.SHA %>\n */\n',
        // Task configuration.

        typescriptFiles:
        [
			'build/Types.js',
            'build/Main.js'
		],

        concat: {
            options:
            {
                /*banner: '<%= banner %>',
                stripBanners: true*/
            },
            main:
            {
                src: '<%= typescriptFiles %>',
                dest: 'build/package.js' //<%= pkg.name %>

            }

        },
        uglify: {
            options: {
                banner: '<%= banner %>'
            },
            dist: {
                src: 'build/package.js', //'<%= concat.dist.dest %>',
                dest: 'build/package.min.js'
            }
        },
        tslint: {
            options: {
                configuration: grunt.file.readJSON("tslint.json")
            },
            files: {
                src: ['**/*.ts', '!**/*.d.ts', '!vendor/**/*.ts']
            }
        },
        typescript: {
            base: {
                src: ['**/*.ts', '!**/*.d.ts', '!node_modules/**/*.ts', '!vendor/**/*.ts'],
                dest: 'build',
                options: {
                    module: 'amd', //or commonjs
                    target: 'es5', //or es3
                    sourceMap: false,
                    declaration: true
                }
            }
        },
        replace:
        {
            //main:
            //{
            //    options:
            //    {
            //        patterns: [
            //          {
            //              match: 'VERSION',
            //              replacement: '<%= version %>'
            //          }
            //        ]
            //    },
            //    files: [
            //      { expand: true, flatten: true, src: ['lib/header.js'], dest: 'build/' }
            //    ]
            //}
        },
        gitinfo: {
            // Fills a local Array with Git-specific data
            // https://github.com/damkraw/grunt-gitinfo
            options: {}
        },
        copy:
        {
            app:
            {
                src: 'build/package.min.js',
                dest: 'public/assets/js/package.min.js'
            }
        },
        less: {
            production:
            {
                options:
                {
                    //paths: ["less"]
                },
                files:
                {
                    //"build/style.css": "style.less"
                }
            }
        },
        clean:
        {
            build:
            {
                src: ["build"]
            }
        },
        qunit:
        {
            options:
            {
                timeout: 30000
            },
            all: ['test/*.html']
        }
    });

    // These plugins provide necessary tasks.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-typescript');
    grunt.loadNpmTasks('grunt-tslint');
    grunt.loadNpmTasks('grunt-replace');
    grunt.loadNpmTasks('grunt-gitinfo');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-update-json');

    grunt.registerTask('compile',
      [
          'clean:build',
          'tslint',
          'typescript'
      ]);

    // Default task.
    grunt.registerTask('default',
		[
			'gitinfo',
			'clean:build',
            'tslint',
            'typescript',
            'concat:main',
            'uglify:dist',
			'copy:app'
		]);


   
};
