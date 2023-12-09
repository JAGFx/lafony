# -- Start Docker
start:
	@docker compose up -d

stop:
	@docker compose down

restart: stop start
# -- End Docker

# -- Start Environment
build: stop
	@docker compose build --pull --no-cache

db: start
	@sleep 1s
	@bin/artisan db:wipe
	@bin/artisan migrate

db\:test: start
	@sleep 1s
	@bin/artisan db:wipe --env=test
	@bin/artisan migrate --env=test

install: start db
	@sleep 1s
	@bin/composer install
	@npm i

fixture: db
	@bin/artisan db:seed
# -- End Environment

# -- Start Code linter & test (CI)
test: db\:test test\:unit test\:feature

test\:unit:
	@bin/php vendor/bin/phpunit tests/Unit

test\:feature:
	@bin/php vendor/bin/phpunit tests/Feature

lint:
	@bin/php vendor/bin/pint -v
	@bin/php vendor/bin/phpstan analyse
	@bin/php vendor/bin/rector process --xdebug
#	@bin/php ./vendor/bin/psalm
#	@bin/php vendor/bin/phpcpd src
#	@npm run lint

ci: lint test
# -- End Code linter & test (CI)
