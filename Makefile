NAME=php

build:
	docker build --no-cache -t ${NAME}-web -f Dockerfile.web .
	docker build --no-cache -t ${NAME}-service .

deploy: build
	docker-compose up -d

up:
	docker-compose up -d

run: build
	docker-compose up -d

debug: build
	docker-compose up

down:
	docker-compose down