## Conditions
### What is this package?

This package aims to consolidate logic I find myself using over and over again. Specifically, using "conditions" to filter logic like applying tags, executing an action, scheduling an event, filtering transactions, custom alerts, and much more.

## Installing

```
composer require spork/conditions
```

Publish your assets

```
php artisan vendor:publish --provider=Spork\Conditions\\SporkServiceProvider
```

You'll need to run `artisan migrate` to ensure your database gets the new repeating events schema

Lastly, register the Service Provider in your Spork App's `config/app.php` file.
