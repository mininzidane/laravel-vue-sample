## Install
```bash
docker-compose up -d
docker-compose exec php composer i
docker-compose exec php php artisan migrate
docker-compose exec php php artisan db:seed
```
I assume that you can build frontend on your local machine, so there is no container with node.
Build a frontend:
```bash
npm install
npm run build
```


## How to use
Solution is available by http://localhost:8019/ 
