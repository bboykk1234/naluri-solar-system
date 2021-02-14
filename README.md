Limitations:
- The result from the calculation, max decimal places is 13.

Algorithm that use to calculate PI:
- Nilakantha infinite series

Explanation:
The server use cron to increase the Pi accuracy every minute.

Prerequisites
- Docker

Getting started
1. Install packages
```
docker run --rm \
-v $(pwd):/opt \
-w /opt \
laravelsail/php80-composer:latest \
composer install
```

2. Create env file by copying env.example
```
cp ./.env.example ./.env
```
3. Build image
```
./vendor/bin/sail build --no-cache
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

If got any problems during getting started, please try to run `./vendor/bin/sail down` then try again the steps above.

Assumptions
- Radius of the sun is taken the number from nasa. https://solarsystem.nasa.gov/solar-system/sun/by-the-numbers/
