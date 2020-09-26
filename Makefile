install:
	composer install

start:
	php -S 127.0.0.1:8080 -t public/

lint:
	composer run-script phpcs