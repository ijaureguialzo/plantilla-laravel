#!make

ifneq (,$(wildcard ./.env))
    include .env
    export
else
$(error No se encuentra el fichero .env)
endif

help: _header
	${info }
	@echo Opciones:
	@echo ------------------------------------------
	@echo start / stop / restart / stop-all
	@echo start-dev / start-prod
	@echo workspace / workspace-root
	@echo test
	@echo seed
	@echo locales
	@echo outdated / update / install / install-prod
	@echo build / build-dev
	@echo redis-cli / redis-flush
	@echo stats
	@echo clean
	@echo ------------------------------------------

_urls: _header
	${info }
	@echo Sitios disponibles:
	@echo ------------------------------------------------------
	@echo [Sitio web] https://$${DOMAIN}
	@echo [phpMyAdmin] https://phpmyadmin.$${DOMAIN}
	@echo ------------------------------------------------------

_urls-dev: _header
	${info }
	@echo Sitios disponibles:
	@echo --------------------------------------------------------
	@echo [Sitio web] https://$${DOMAIN}
	@echo [phpMyAdmin] https://phpmyadmin.$${DOMAIN}
	@echo [Mailpit] https://mailpit.$${DOMAIN}
	@echo --------------------------------------------------------

_header:
	@echo -----------------
	@echo Plantilla Laravel
	@echo -----------------

_start-command:
	@docker compose up -d --remove-orphans

_start-command-dev:
	@docker compose -f docker-compose.yml -f docker-compose.dev.yml up -d --remove-orphans

_start-command-prod:
	@docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d --remove-orphans

start: _start-command _urls

start-dev: _start-command-dev _urls-dev

start-prod: _start-command-prod install-prod _urls

stop:
	@docker compose stop

restart: stop start

stop-all:
	@docker stop $(shell docker ps -aq)

workspace:
	@docker compose exec php /bin/bash

workspace-root:
	@docker compose exec --user root php /bin/bash

test:
	@docker compose exec php php artisan test

seed:
	@docker compose exec php php artisan migrate:fresh --seed
	@docker compose exec php php artisan db:seed --class=PermissionTableSeeder
	@docker compose exec php php artisan db:seed --class=CreateAdminUserSeeder

locales:
	@docker compose exec php php artisan translatable:export es
	@docker compose exec php php artisan translatable:export eu
	@docker compose exec php php artisan lang:update
	@-docker compose exec php php artisan translatable:inspect-translations es
	@-docker compose exec php php artisan translatable:inspect-translations eu

outdated:
	@echo Comprobando composer...
	@docker compose exec php composer outdated
	@echo Comprobando npm...
	@docker compose exec php npm outdated

update:
	@echo Actualizando composer...
	@docker compose exec php composer update
	@echo Actualizando npm...
	@docker compose exec php npm update
	@docker compose exec php npm run build
	@echo Generando commit...
	@sleep 5
	@git commit -a -m "Actualización de dependencias"

install:
	@docker compose exec php composer install
	@docker compose exec php npm install
	@docker compose exec php npm run build

install-prod:
	@docker compose exec php composer install --no-dev
	@docker compose exec php npm install
	@docker compose exec php npm run build

build:
	@docker compose pull && docker compose build --pull

build-dev:
	@docker compose pull && docker compose -f docker-compose.yml -f docker-compose.dev.yml build --pull

redis-cli:
	@docker compose exec redis redis-cli

redis-flush:
	@docker compose exec redis redis-cli flushall

stats:
	@docker stats

clean:
	@docker compose down -v --remove-orphans
