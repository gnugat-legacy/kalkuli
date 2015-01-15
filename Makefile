clear:
	rm -rf app/cache/*
	php app/console doctrine:database:drop --force

install:
	composer install
	php app/console doctrine:database:create
	php app/console doctrine:schema:create

test:
	rm -rf app/cache/*
	php app/console --env=test doctrine:database:drop --force
	php app/console --env=test doctrine:database:create
	php app/console --env=test doctrine:schema:create
	php app/console --env=test doctrine:fixtures:load -n
	./vendor/bin/phpunit
	./vendor/bin/phpspec run
