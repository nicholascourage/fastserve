## Project Setup

1. Make sure you have Docker installed on your machine. You can download it from [Docker's official website](https://www.docker.com/).

2. You may install the application's dependencies by navigating to the app's root directory and executing the following command. This command uses a small Docker container containing PHP and Composer to install the application's dependencies:

   ```shell
   docker compose run --rm php composer install
   ```

3. Copy the `.env.example` file to `.env`

4. To start all the Docker containers in the background, start Sail in "detached" mode:

   ```shell
   docker compose up -d --build
   ```

5. Once the containers are running, you can run the database migrations and seeders to set up the database schema:

   ```shell
   docker compose run --rm artisan migrate
    ```

   ```shell
   docker compose run --rm artisan db:seed
    ```

6. Generate the application key by running the following command:

   ```shell
   docker compose run --rm artisan key:generate
   ```

7. Install and build the frontend assets:

   ```shell
   docker compose run --rm npm install
   docker compose run --rm run dev
   ```

8. You can now access the application in your web browser at http://localhost.
9. To stop the containers, run:

   ```shell
   docker compose down -v
   ```
