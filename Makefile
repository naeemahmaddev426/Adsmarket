# ─── AdsMarket Docker Makefile ──────────────────────────────────────────────

.PHONY: up down build restart shell migrate seed fresh logs ps

## Start all containers (builds if needed)
up:
	docker compose up -d --build

## Stop all containers
down:
	docker compose down

## Rebuild all images
build:
	docker compose build --no-cache

## Restart containers
restart:
	docker compose restart

## Open shell in adsmarket container
shell:
	docker exec -it adsmarket bash

## Run migrations
migrate:
	docker exec adsmarket php artisan migrate --force

## Run seeders
seed:
	docker exec adsmarket php artisan db:seed --force

## Fresh migrate + seed
fresh:
	docker exec adsmarket php artisan migrate:fresh --seed --force

## Generate app key
key:
	docker exec adsmarket php artisan key:generate

## View container logs
logs:
	docker compose logs -f

## Show running containers
ps:
	docker compose ps

## Setup: copy .env.docker → .env and generate key
setup:
	cp .env.docker .env
	docker compose up -d --build
	docker exec adsmarket php artisan key:generate
	docker exec adsmarket php artisan migrate --force
	docker exec adsmarket php artisan storage:link
	docker exec adsmarket php artisan optimize
