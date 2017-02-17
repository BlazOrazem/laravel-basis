# Numencode - Content Management System

**Numencode** is a web application, based on Laravel framework 5.4, that allows publishing, editing and modifying 
content, organizing, deleting as well as maintenance from a central interface.

It is used to run websites containing pages, blogs, news, galleries, catalogs and shopping.

**Numencode** is a stand-alone application to create, deploy, manage and store content on web pages. 
Web content includes text and embedded graphics, photos, video, audio and code (e.g., for applications) 
that displays content or interacts with the user.

**Numencode** contains built-in back-office administration panel for managing content and structure on a specific website.

## Official Documentation

Documentation for the **Numencode** can be found on the [Numencode website](http://www.numencode.com/page/docs/).

**The application is still in development mode.**

## About the Author

**Numencode** was created by and is maintained by [Blaz Orazem](http://www.orazem.si/).

Follow [@blazorazem](https://twitter.com/blazorazem) on Twitter.

## Installation

Create a project directory and initialize a repository
```bash
$ git init
```

Clone this repository to your project directory
```bash
$ git clone https://github.com/BlazOrazem/numencode.git
```

Set up environment configuration 
```bash
$ cp .env.sample .env
```

Edit .env file and enter your credentials for database, etc.
```bash
$ vi .env
```

Install the project
```bash
$ php artisan project:install
```

You will be prompted for the admin account email and password.

## Admin Dashboard

The URL for the admin dashboard should be your APP_URL (in .env file) followed by /admin, eg.: http://www.numencode.app/admin

The credentials are set by the php artisan project:install command.

## Front-end workflow with Laravel Mix

Install [Node.js](https://nodejs.org/) on your system.

Go to your project root folder and install npm dependencies with [npm](https://www.npmjs.com/):
```bash
$ npm install
```

Alternatively you can install dependencies with [Yarn](https://yarnpkg.com/):
```bash
$ npm install --global yarn
$ yarn install
```

Resources for the default theme (styles and scripts) are stored in:
~~~
/modules/Cms/Resources/assets/
~~~

After the changes in styles and/or scripts run Laravel Mix:

Development mode (non-minified code):
```bash
$ npm run dev
```
Production mode (minified code):
```bash
$ npm run production
```
Watch mode (runs in the background and watches files for changes):
```bash
$ npm run watch
```
## Back-end workflow with Laravel Elixir

Install [Node.js](https://nodejs.org/) and [Bower](https://bower.io/#install-bower) on your system.

From the project root directory navigate to:
```bash
$ cd modules/Admin/Resources/assets/vendor
```

Install npm dependencies with [npm](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/):
```bash
$ npm install
$ yarn install
```

Install Bower dependencies:
```bash
$ bower install
```

Resources for the admin theme (styles and scripts) are stored in:
~~~
/modules/Admin/Resources/assets/
~~~

After the changes in styles and/or scripts run Gulp in directory 'modules/Admin/Resources/assets/vendor':
```bash
$ gulp
```

## License

The Numencode is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

[<img src="https://img.shields.io/packagist/l/doctrine/orm.svg?style=flat-square" alt="MIT License">](LICENSE)
