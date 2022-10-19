# HEIG-VD - FabLab New Name Survey 2022

This web application is a survey to find a new name for the FabLab at HEIG-VD.
It will be part of the HEIG-VD FabLab 2022 Extension Project in which the FabLab will be doubled in size. A new name is wanted to reflect the new size and the new possibilities also to remove the constraint of the name "FabLab" which is a trademark.

This App is developed on Laravel and Vue with InertiaJS.

## Development

### Install

```bash
git clone
cd
npm install
composer install
$ npm run build
$ php artisan migrate:fresh --seed
$ npx vite
$ php artisan serve
```

### Seed

When the app is in `local` mode, you can seed the database with plenty of fake data using the following command:

```bash
php artisan migrate:fresh --seed
php artisan db:seed --class=VoteSeeder
```

### Versions

```
$ npm --version
8.15.0
$ node --version
v16.17.1
$ php --version
PHP 8.1.11 (cli)
```

## Deployment

### Apache

Create a virtual host in `/etc/apache2/sites-available` with the following content:

```apache
<VirtualHost *:80>
        ServerName fablab-name-survey.chevallier.io

        ServerAdmin yves.chevallier@heig-vd.ch
        DocumentRoot /srv/fablab-name/public

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

    <Directory /srv/fablab-name>
        OPtions Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Enable the site with:

```bash
a2ensite fablab-name-survey.chevallier.io
systemctl reload apache2
```

### LetsEncrypt

```bash
certbot --apache -d fablab-name-survey.chevallier.io
```

### Install app

```bash
cd /srv/fablab-name
git pull
chown -R www-data:www-data /srv/fablab-name

rm database.sqlite # remove old database
touch database.sqlite # create new database

composer install
npm install

cp .env.example .env
# Populate .env

php artisan key:generate
php artisan migrate:fresh --seed
npm run build
```

## TODO list

- [ ] End of survey, what to display?
- [ ] Server error what to display?
- [ ] Display random order of names ?
- [ ] CSRF protection
- [ ] Folding text too long
- [ ] Confuse stats and rules on the same location.
- [ ] Tooltip not disappearing when clicking on the button.
- [ ] SingleFile is hooking the IntersectionObserver API to detect and load deferred images.
