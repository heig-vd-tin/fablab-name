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
- [ ] Is it better to store vote direction instead of bool upvote in db?
- [ ] Test login with switch aai
- [ ] CSRF protection
- [ ] GitHub link to sources
