1. docker-compose up -d --build site
2. docker-compose run --rm composer update
3. docker-compose run --rm npm run install
4. docker-compose run --rm npm run dev
5. docker-compose run --rm artisan migrate:fresh --seed

#Connection
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=todo_dot
DB_USERNAME=me
DB_PASSWORD=password

Note: Port 3306 Must Available
