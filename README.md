<p align="center"><a href="https://laravel.com" target="_blank"><img src="./banners/banner.png"></a></p>

  </br>

  <a href="https://github.com/volt/admin-dashboard#contribute" target="_blank">
    <img alt="Contributors" src="https://img.shields.io/badge/all_contributors-2-orange.svg?style=flat-square">
  </a>

  <a href="https://standardjs.com" target="_blank">
    <img alt="ESLint" src="https://img.shields.io/badge/code_style-standard-brightgreen.svg?style=flat-square">
  </a>


  <a href="https://github.com/nsfw-filter/nsfw-filter/blob/master/LICENSE" target="_blank">
    <img alt="LICENSE" src="https://img.shields.io/github/license/navendu-pottekkat/nsfw-filter?style=flat-square&color=yellow">
  <a/>
</p>
<hr>

# Table of contents

<!-- - [Usage](#usage) -->

- [Installation](#installation)
    - [Environmental Variables](#environmental-variables)

<!-- 
# Usage
Login to the latest version of the dashboard at [admin..com](https://admin.metroipo.com). -->

# Installation

*For **development only**.*

Clone this repository and navigate inside the project folder and install the dependencies by running:

```sh
composer install
composer dump-autoload
```

# Docker

To start building images and run containers, run the following

```bash
docker-compose up -d
```

> Hint, we can check if Laravel Horizon is running with `supervisor`, it's a bit inconsistent, so try restarting if it fails We can restart with `docker-compose exec app supervisord` and check if laravel horizon is running with `docker-compose exec app supervisorctl`

### Environmental Variables

Before running a build or the development server, be sure to the [dotenv](https://github.com/motdotla/dotenv) files in
the root directory.

```sh
mv .env.example .env
```

The following variables are required for database connectivity:

- `DB_CONNECTION`
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

The following is required for sending emails:

- `MAIL_MAILER`
- `MAIL_HOST`
- `MAIL_PORT`
- `MAIL_USERNAME`
- `MAIL_PASSWORD`
- `MAIL_ENCRYPTION`

After installing the dependencies and configuring environmental variables,go ahead and generate the `jwt` key with

```sh
php artisan jwt:secret
```

Then run the migrations and finally seed the database with the following:

```sh
php artisan migrate
php artisan db:seed
```

Finally we run the development server

```sh
php artisan serve
```

