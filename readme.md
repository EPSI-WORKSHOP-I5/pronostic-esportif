# Pronostic esportifs

## Installation

### PHP Packages

```
composer install
```


### NodeJs packages

#### Packages installation

```
npm install
```

#### Assets compilation

```
npm run dev
```
Or use `npm run production`.


### .env

Copy `.env.example` to `env` and fill `APP_KEY` value :

```
cp .env.example .env
php artisan key:generate
```


### Database migration

```
php artisan migrate
```


### Launch the app

#### Run with built-in PHP Server

```
php artisan serve --host=0.0.0.0
```