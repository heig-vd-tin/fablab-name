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

### Versions

```
$ npm --version
8.15.0
$ node --version
v16.17.1
$ php --version
PHP 8.1.11 (cli)
```

## TODO list

- [x] Retrieve votes from user
- [x] Dispatch remaining votes
- [x] Remember vote value on each name
- [x] Show my name on the name?
- [x] Do not allow to vote on own name
- [x] Error messages in french
- [x] Choose pictures
- [x] Adjust style of text
- [x] Indicates number of votes per name
- [x] Propose names
  - [x] Make form
  - [x] Validate form
  - [x] Refresh page
- [x] Anonymous or not for names
- [x] Can vote only once per day
- [x] Order votes by popularity or randomly
- [ ] Remove votes below -5
- [ ] Display random order of names ?
- [ ] Is it better to store vote direction instead of bool upvote in db?
- [ ] Test login with switch aai
- [ ] CSRF protection
- [ ] GitHub link to sources

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
composer install
npm install
cp .env.example .env
# Populate .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run build
```
