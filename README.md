# Scottish Hills App

A Logger for Hills

## Local Installation with Docker ##

1. Build and tag the docker images
   * docker compose build
   * **Note**: On first run, this will pull down, build and tag the initial images required

2. Start the docker containers
   * docker-compose up
   * **Note**: On first run, this will pull down standalone images

3. Install package dependencies
   * docker-compose exec hills-app-php-fpm composer install
   * npm install

4. Configure site
   * cp .env.docker .env
   * docker-compose exec hills-app-php-fpm php artisan key:generate
   * Add the following line to /etc/hosts, to create an alias to the site:
       * `127.0.0.1        hills.test`

5. Create Database
   * docker compose exec hills-app-php-fpm php artisan migrate:install
   * docker compose exec hills-app-php-fpm php artisan migrate
   * docker compose exec hills-app-php-fpm php artisan db:seed

**Notes**
 - Uses PHP v8 and MySQL v8 - Laravel 10 with Vue 3, Pinia, Inertia, and tailwind css.
 - Built using node v18.

## Running Locally ##

1. Start the docker containers (detached, so run in the background)
   * docker compose up -d

2. View the docker logs 
   * docker compose logs -f

3. Create and watch the assets using vite
  * npm run dev

4. Using the containers
   * The code can be edited in an ide, the directory is mapped into the php and nginx directories
     * http://hills.test:8881

   * Access the db via cli
      * docker compose exec hills-app-mysql mysql -u hills_usr -phills_pw hills_dev
      * The db volume is mapped to ./docker/volumes/mysql so it persists
   * Interacting with artisan
     * docker compose exec hills-app-php-fpm php artisan {command here}
   * Using Terminal within Container
     * docker exec -ti {container-name} /bin/sh   
   * View Mail 
     * http://hills.test:8882/
     * mailtrap/mailtrap 

5. Running the tests
   * Run the php unit tests
      * docker compose exec hills-app-php-fpm php artisan test

6. Stop the running containers
   * docker compose down --remove-orphans