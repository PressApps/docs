# [Docs Theme](http://pressapps.co/docs-documentation-wordpress-theme/)

Docs is a WordPress theme for creating online product or service documentation [Docs](http://pressapps.co/docs-documentation-wordpress-theme/).

* Source: [https://github.com/pressapps/docs](https://github.com/pressapps/docs)
* Homepage: [http://pressapps.co/docs-documentation-wordpress-theme/](http://pressapps.co/docs-documentation-wordpress-theme/)
* Twitter: [@pressapps](https://twitter.com/pressapps)

## Features

* Responsive design (Twitter Bootstrap 3)
* ScrollSpy updating document navigation based on page scroll position
* AutoCollapse long document menus
* Home page template
* Filter search document
* Styling options for sidebar colors and width
* Automatic updates from within WP dashboard
* Google fonts
* Google analytics
* GPL2 license

## Installation

#### Get Docs theme in one of the following ways:
* Download from [PressApps](http://pressapps.co/docs-documentation-wordpress-theme/) site
* Clone the git repo - `git clone https://github.com/pressapps/docs.git`
* Download the git repo - [zip](https://github.com/pressapps/docs/archive/master.zip) and then rename the directory to `docs`

#### Dependencies
* Install [Redux](https://wordpress.org/plugins/redux-framework/) options framework plugin

## Theme development

* [Roots](http://roots.io/) starter theme has been used to develop Docs 
* [Grunt](http://mattbanks.me/grunt-wordpress-development-deployments/) for compiling LESS to CSS, checking for JS errors, live reloading, concatenating and minifying files, versioning assets, and generating lean Modernizr builds
* [Bower](http://bower.io/) for front-end package management
* [Bootstrap](http://getbootstrap.com/)
* [Theme wrapper](http://scribu.net/wordpress/theme-wrappers.html)


Add the following to your `wp-config.php` on your development installation:

```php
define('WP_ENV', 'development');
```


Docs uses [Grunt](http://gruntjs.com/) for compiling LESS to CSS, checking for JS errors, live reloading, concatenating and minifying files, versioning assets, and generating lean Modernizr builds.

### Install Grunt and Bower

**Unfamiliar with npm? Don't have node installed?** [Download and install node.js](http://nodejs.org/download/) before proceeding.

From the command line:

1. Install `grunt-cli` and `bower` globally with `npm install -g grunt-cli bower`.
2. Navigate to the theme directory, then run `npm install`. npm will look at `package.json` and automatically install the necessary dependencies. It will also automatically run `bower install`, which installs front-end packages defined in `bower.json`.

When completed, you'll be able to run the various Grunt commands provided from the command line.

**N.B.** 
You will need write permission to the global npm directory to install `grunt-cli` and `bower`. You will also likely have to be using an elevated terminal or prefix the command with `sudo`, i.e., `sudo npm install -g grunt-cli bower`. 

We also advise against running as root user. NPM deliberately uses limited privileges when executing certain commands such as those included in the Docs post-install process, and when this happens to the root user, any file system objects that are not expressly writable by the root user will fail to write during the execution of the command. These might include directories such as `/var/www` or `/home/someotheruser`. If you're running as root and have problems, don't say we didn't warn you.

### Available Grunt commands

* `grunt dev` — Compile LESS to CSS, concatenate and validate JS
* `grunt watch` — Compile assets when file changes are made
* `grunt build` — Create minified assets that are used on non-development environments

## License

Theme is licensed under [GNU](http://www.gnu.org/licenses/gpl-2.0.html) General Public License v2 or later

## Contributing

Everyone is welcome to help [contribute](CONTRIBUTING.md) and improve this theme. There are several ways you can contribute:

* Reporting [issues](https://github.com/pressapps/docs/issues)
* Suggesting new features
* Writing or refactoring code
* Fixing [issues](https://github.com/pressapps/docs/issues)

## Support

We aim to further develop and regularly update the theme, however we can’t provide user support.