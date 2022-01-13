# LaravelInstaller

[![Latest Stable Version](https://poser.pugx.org/minasyans/laravel-installer/v/stable.svg)](https://packagist.org/packages/minasyans/laravel-installer)
[![Total Downloads](https://poser.pugx.org/minasyans/laravel-installer/d/total.svg)](https://packagist.org/packages/minasyans/laravel-installer)
[![License](https://poser.pugx.org/minasyans/laravel-installer/license.svg)](https://packagist.org/packages/minasyans/laravel-installer)

- [About](#about)
- [Requirements](#requirements)
- [Installation](#installation)
- [Routes](#routes)
- [Usage](#usage)
- [Contributing](#contributing)
- [Help](#help)
- [Screenshots](#screenshots)
- [License](#license)

## About

Do you want your clients to be able to install a Laravel project just like they do with WordPress or any other CMS?
This Laravel package allows users who don't use Composer, SSH etc to install your application just by following the setup wizard.
The current features are :

- Check For Server Requirements.
- Check For Folders Permissions.
- Ability to set database information.
    - .env text editor
    - .env form wizard
- Migrate The Database.
- Seed The Tables.
- Choose a starter kit. Available starters [Larastarters](https://github.com/LaravelDaily/Larastarters)

## Requirements

* [Laravel 8.x](https://laravel.com/docs/installation)

## Installation

Via Composer

``` bash
$ composer require minasyans/laravel-installer
```

## Routes

* `/install`
* `/update`

## Usage

* **Install Routes Notes**
    * In order to install your application, go to the `/install` route and follow the instructions.
    * Once the installation has ran the empty file `installed` will be placed into the `/storage` directory. If this file is present the route `/install` will abort to the 404 page.

* **Update Route Notes**
    * In order to update your application, go to the `/update` route and follow the instructions.
    * The `/update` routes countes how many migration files exist in the `/database/migrations` folder and compares that count against the migrations table. If the files count is greater then the `/update` route will render, otherwise, the page will abort to the 404 page.

* Additional Files and folders published to your project :

| File                                       |File Information|
|:-------------------------------------------|:------------|
| `config/laravel-installer.php`             |In here you can set the requirements along with the folders permissions for your application to run, by default the array cotaines the default requirements for a basic Laravel app.|
| `resources/views/laravel-installer`        |This folder contains the HTML code for your installer, it is 100% customizable, give it a look and see how nice/clean it is.|
| `resources/lang/en/installer.php` |This file holds all the messages/text, currently only English is available, if your application is in another language, you can copy/past it in your language folder and modify it the way you want.|

## Contributing

* If you have any suggestions please let me know : https://github.com/Minasyans/laravel-installer/pulls.
* Please help us provide more languages for this awesome package please send a pull request https://github.com/Minasyans/laravel-installer/pulls.

## Screenshots

###### Installer
![Laravel web installer | Step 1](https://github.com/Minasyans/laravel-installer/raw/main/art/welcome.png)
![Laravel web installer | Step 2](https://github.com/Minasyans/laravel-installer/raw/main/art/requirements.png)
![Laravel web installer | Step 3](https://github.com/Minasyans/laravel-installer/raw/main/art/permissions.png)
![Laravel web installer | Step 4 Menu](https://github.com/Minasyans/laravel-installer/raw/main/art/configure-environment.png)
![Laravel web installer | Step 4 Classic](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-text.png)
![Laravel web installer | Step 4 Wizard 1](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-basics.png)
![Laravel web installer | Step 4 Wizard 2](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-database.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-application.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-application-bcsq.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-application-redis.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-application-mail.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-application-pusher.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-application-aws.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/environment-application-finished.png)
![Laravel web installer | Step 4 Wizard 3](https://github.com/Minasyans/laravel-installer/raw/main/art/starter-kits.png)

###### Updater
![Laravel web updater | Step 1](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-installer/update/1-welcome.jpg)
![Laravel web updater | Step 2](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-installer/update/2-updates.jpg)
![Laravel web updater | Step 3](https://s3-us-west-2.amazonaws.com/github-project-images/laravel-installer/update/3-finished.jpg)

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Credits

- [RachidLaasri Installer](https://github.com/rashidlaasri/LaravelInstaller)
- [RazorMeister](https://github.com/RazorMeister/laravel-installer)
- [LaravelDaily](https://github.com/LaravelDaily/Larastarters)

## License

license. Please see the [license file](license.md) for more information.
