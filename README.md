# My Laravel Frontend Preset

### What you're getting:
- Get rid of Bootstrap / jQuery
- Install Tailwind
- Enhance .gitignore
- Replace stock welcome.blade.php with Tailwind friendly version

### Installation:
`composer require calebporzio/laravel-frontend-preset`

### Usage:
`php artisan preset calebporzio`

Once finished, run the following command to properly run the build:

`npm install && node_modules/.bin/tailwind init && npm run dev`
