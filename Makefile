PATH := vendor/bin:$(PATH)
.PHONY: sanity-test clean dev-env no-dev-env unit-test

sanity-test:
	@echo "\033[0;33m>>> Running sanity test\033[0m"
	composer validate --strict

dev-env:
	@echo "\033[0;33m>>> Prepare workspace for development\033[0m"
	composer install --no-interaction --prefer-source

no-dev-env:
	@echo "\033[0;33m>>> Prepare workspace for production\033[0m"
	composer install --no-dev --no-interaction --prefer-source

clean:
	@echo "\033[0;33m>>> Cleaning workspace\033[0m"
	rm -rf vendor composer.lock phpunit.xml report .phpunit.result.cache

unit-test:
	@echo "\033[0;33m>>> Running unit tests\033[0m"
	phpunit --testsuite Unit --process-isolation