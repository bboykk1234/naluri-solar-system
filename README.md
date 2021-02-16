## Limitations
- The accuracy for the Pi value, some decimal precisions at the last one or two digits not always accurate due to the float number rounding, but after calculation move on to next decimal precision, it will be corrected and accurate.

## Formula that use to calculate PI
- Bailey-Borwein-Plouffe formula

## Assumptions
- Radius of the sun is taken the number from nasa. https://solarsystem.nasa.gov/solar-system/sun/by-the-numbers/

## Explanation
The server use cron to increase the Pi accuracy, by calculating the Pi decimal precision incrementally every minute.

## Prerequisites
- Docker
- Docker compose

## Getting started
1. Create env file by copying env.example
```
cp ./.env.example ./.env
```

2. Build image, this will take a while
```
WWWGROUP="$(id -g)" WWWUSER=${UID} docker-compose build --no-cache
```

3. Install packages
```
WWWGROUP="$(id -g)" WWWUSER=${UID} docker-compose run --rm laravel.test composer install
```

4. Run artisan commands
```
./vendor/bin/sail run --rm laravel.test php artisan key:generate
./vendor/bin/sail run --rm laravel.test php artisan storage:link
./vendor/bin/sail run --rm laravel.test php artisan migrate
./vendor/bin/sail run --rm laravel.test npm install && npm run dev
```

5.  Start container
``` 
./vendor/bin/sail up -d
```

6. Access http://localhost to see the output, stay on the page, the Pi and circumference of the sun should be updated every minute with the most accurate value from the server.

NOTE:
If you need to customize the port, please add `APP_PORT=8080` in your .env file, please run `./vendor/bin/sail down` and `./vendor/bin/sail up -d` to take effect, then you can access using `http://localhost:{APP_PORT}`

If got any problems during getting started, please try to run `./vendor/bin/sail down` then try again the steps above.

