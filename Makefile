up:
	docker-compose up -d
down:
	docker-compose down
stop:
	docker-compose stop
build:
	docker-compose up -d --build --remove-orphans
rebuild:
	docker-compose down
	docker-compose up -d --build

reload:
	docker-compose down
	docker-compose up -d

php:
	docker exec -it php-b sh
