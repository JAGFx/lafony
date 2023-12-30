SHELL=/bin/bash

CURRENT_UID := $(shell id -u)
CURRENT_GID := $(shell id -g)

# -- Start Docker
start:
	@docker compose up -d

stop:
	@docker compose down

restart: stop start
# -- End Docker

# -- Start Environment
build: stop
	@docker compose build --pull

build\:no-cache: stop
	@docker compose build --pull --no-cache

build\:ci: build\:no-cache
	@docker login ghcr.io -u jagfx -p ${GH_TOKEN}
	@docker push ghcr.io/jagfx/lafony-php:ci
	@docker push ghcr.io/jagfx/lafony-mysql:ci

db: start
	@sleep 1s
	@bin/artisan db:wipe
	@bin/artisan migrate

db\:test: start
	@sleep 1s
	@bin/artisan db:wipe --env=test
	@bin/artisan migrate --env=test

install: start db rights
	@sleep 1s
	@bin/composer install
	@npm i

fixture: db
	@bin/artisan db:seed

rights: start
	@sudo chmod -R 777 storage
	@sudo chmod -R 777 bootstrap/cache
	@sudo chown -R ${CURRENT_UID}:${CURRENT_GID} ./
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
	@make rights

ci: lint test
	@make rights
# -- End Code linter & test (CI)
