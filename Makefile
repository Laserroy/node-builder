install:
	composer install

start:
	php -S 127.0.0.1:8080 -t public/

sqlite-prepare:
	touch database/database.sqlite
	sqlite3 database/database.sqlite < database/db.dump

lint:
	composer run-script phpcs