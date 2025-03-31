.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t prueba-kata .

build-container:
	docker run -dt --name prueba-kata -v .:/540/prueba-kata-php prueba-kata
	docker exec prueba-kata composer install

start:
	docker start prueba-kata
test: start
	docker exec prueba-kata ./vendor/bin/phpunit tests

shell: start
	docker exec -it prueba-kata /bin/bash

stop:
	docker stop prueba-kata

clean: stop
	docker rm prueba-kata
	rm -rf vendor
