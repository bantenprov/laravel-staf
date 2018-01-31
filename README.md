# Laravel Staf
Laravel package untuk mengolah data staf

## Install :
```bash
$ composer require bantenprov/staf:dev-master
```

## Edit `app/config.php`
```php
'providers' => [
        App\Providers\RouteServiceProvider::class,
        
        //...
        Bantenprov\Staf\StafServiceProvider::class,
```
