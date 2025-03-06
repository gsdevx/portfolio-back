ifneq ("$(wildcard .env)","")
  include .env
  export
endif

PHP ?= $(PHP_PATH)
PHP := $(PHP := php)
COMPOSER ?= $(COMPOSER_PATH)
ARTISAN = $(PHP) ./artisan

composer-install:
	@$(COMPOSER) install
clear-cache:
	@$(ARTISAN) optimize:clear
	@$(ARTISAN) filament:optimize-clear
migrate:
	@$(ARTISAN) migrate
optimize:
	@$(ARTISAN) optimize
	@$(ARTISAN) filament:optimize
	@$(ARTISAN) config:cache
	@$(ARTISAN) route:cache

master:
	git checkout origin/master --force

release:
	@make clear-cache
	@make migrate
	@make optimize
