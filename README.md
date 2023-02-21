# UserManagement-Laravel



## Project Setup
```bash
    git clone https://github.com/WaiYanPhoneAant/UserManagement-Laravel.git
```
```bash
    cd UserManagement-Laravel
```

## Database
- Rename `.env.example` file to `.env`inside your project root and fill the database information.

- Run `composer install` or ```php composer.phar install```
```bash
   composer install
```

- Install `npm `
```bash
    # Run the Vite development server...
    npm install
    
    # Build and version the assets for production...
    npm run build
```

- Connect your database in .env file

### migration and Default Data Seeding
```php
  php artisan migrate --seed
```
### key generate
```php
  php artisan key:generate
```
### serve project
```bash
   php artisan serve
```


### serve project
```bash
   php artisan serve
```


###  Now You Can Start Login with admin account
```info
    username=admin
    password=admin1234
```
