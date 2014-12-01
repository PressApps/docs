# [Docs Theme](http://pressapps.co/)

Docs is a WordPress theme for creating online product or service documentation [Docs](http://pressapps.co/docs/).

* Source: [https://github.com/pressapps/docs](https://github.com/pressapps/docs)
* Homepage: [http://pressapps.co/](http://pressapps.co/docs/)
* Documentation: [http://pressapps.co/docs/](http://pressapps.co/docs/)
* Twitter: [@pressapps](https://twitter.com/pressapps)

## Features

* [Grunt](http://pressapps.co/using-grunt-for-wordpress-theme-development/) for compiling LESS to CSS, checking for JS errors, live reloading, concatenating and minifying files, versioning assets, and generating lean Modernizr builds
* [Bower](http://bower.io/) for front-end package management
* [HTML5 Boilerplate](http://html5boilerplate.com/)
  * The latest [jQuery](http://jquery.com/) via Google CDN, with a local fallback
  * The latest [Modernizr](http://modernizr.com/) build for feature detection, with lean builds with Grunt
  * An optimized Google Analytics snippet
* [Bootstrap](http://getbootstrap.com/)
* Organized file and template structure
* ARIA roles and microformats
* [Theme activation](http://pressapps.co/docs-101/#theme-activation)
* [Theme wrapper](http://pressapps.co/an-introduction-to-the-docs-theme-wrapper/)
* Cleaner HTML output of navigation menus
* Posts use the [hNews](http://microformats.org/wiki/hnews) microformat
* [Multilingual ready](http://pressapps.co/wpml/) and over 30 available [community translations](https://github.com/docs/docs-translations)

### Additional features

Install the [Soil](https://github.com/docs/soil) plugin to enable additional features:

* Root relative URLs
* Nice search (`/search/query/`)
* Cleaner output of `wp_head` and enqueued assets markup

## Installation

Clone the git repo - `git clone git://github.com/docs/docs.git` - or [download it](https://github.com/docs/docs/zipball/master) and then rename the directory to the name of your theme or website.

If you don't use [Bedrock](https://github.com/docs/bedrock), you'll need to add the following to your `wp-config.php` on your development installation:

```php
define('WP_ENV', 'development');
```

## Configuration

Edit `lib/config.php` to enable or disable theme features and to define a Google Analytics ID.

Edit `lib/init.php` to setup navigation menus, post thumbnail sizes, post formats, and sidebars.

## Theme development

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

## Documentation

* [Docs 101](http://pressapps.co/docs-101/) — A guide to installing Docs, the files, and theme organization
* [Theme Wrapper](http://pressapps.co/an-introduction-to-the-docs-theme-wrapper/) — Learn all about the theme wrapper
* [Build Script](http://pressapps.co/using-grunt-for-wordpress-theme-development/) — A look into how Docs uses Grunt
* [Docs Sidebar](http://pressapps.co/the-docs-sidebar/) — Understand how to display or hide the sidebar in Docs

## Contributing

Everyone is welcome to help [contribute](CONTRIBUTING.md) and improve this project. There are several ways you can contribute:

* Reporting issues (please read [issue guidelines](https://github.com/necolas/issue-guidelines))
* Suggesting new features
* Writing or refactoring code
* Fixing [issues](https://github.com/docs/docs/issues)
* Replying to questions on the [forum](http://discourse.pressapps.co/)

## Support

Use the [Docs Discourse](http://discourse.pressapps.co/) to ask questions and get support.
