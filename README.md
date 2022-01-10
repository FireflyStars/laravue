<p align="center">
  <img width="320" src="https://cp5.sgp1.cdn.digitaloceanspaces.com/zoro/laravue-cdn/laravue-logo-line.png">
</p>
<p align="center">
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/laravel-6.2-brightgreen.svg" alt="vue">
  </a>
  <a href="https://github.com/vuejs/vue">
    <img src="https://img.shields.io/badge/vue-2.6.10-brightgreen.svg" alt="vue">
  </a>
  <a href="https://github.com/ElemeFE/element">
    <img src="https://img.shields.io/badge/element--ui-2.12.0-brightgreen.svg" alt="element-ui">
  </a>
  <a href="https://github.com/tuandm/laravue/blob/master/LICENSE">
    <img src="https://img.shields.io/badge/license-MIT-brightgreen.svg" alt="license">
  </a>
</p>
## Getting started

### Prerequisites

 * Laravue is positioned as an enterprise management solution, and it is highly recommended to use it to start from scratch.
 * For existing Laravel project, you should check [Laravue Core](https://github.com/tuandm/laravue-core) for integration.
 * Your machine needs to be ready for the latest [Laravel](https://laravel.com/docs/6.x#installation) and [Node.js](https://nodejs.org).


### Installing
```bash
# Migration and DB seeder (after changing your DB settings in .env)
php artisan migrate --seed

# Generate JWT secret key
php artisan jwt:secret

# Install dependency - we recommend using Yarn instead of NPM since we get errors while using NPM
yarn install

# develop
yarn run dev # or yarn run watch

# Build on production
yarn run production
```

## Running the tests
* Tests system is under development

## Built with
* [Laravel](https://laravel.com/) - The PHP Framework For Web Artisans
* [VueJS](https://vuejs.org/) - The Progressive JavaScript Framework
* [Element](https://element.eleme.io/) - A  Vue 2.0 based component library for developers, designers and product managers
* [Vue Admin Template](https://github.com/PanJiaChen/vue-admin-template) - A minimal vue admin template with Element UI