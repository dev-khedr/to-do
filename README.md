## To-Do Application

This is a simple To-Do application based on Laravel 11.

## Installation
 
First you should clone the repository

Then in the `root` directory, run 

```bash
docker-compose build
```

Then run

```bash
docker-compose up -d
```

After the application is up and running, run these commands in the container to finalize the installation

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
php artisan jwt:secret
```

```bash
php artisan migrate:fresh
```

```bash
php artisan db:seed
```

You can check the application status by visiting [localhost/up](http://localhost/up)

`ps` you may need to use `chmod` on `storage` firstly to make it writable.
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- **[Mohamed Khedr](https://github.com/MohamedKhedr700)**
