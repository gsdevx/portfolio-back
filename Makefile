ARTISAN = php artisan

checkout-master:
	git checkout origin/master --force
composer-install:
	composer install
link-storage:
	@$(ARTISAN) storage:link
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
	@$(ARTISAN) view:cache

prod-release:
	@make checkout-master
	@make composer-install
	@make clear-cache
	@make migrate
	@make optimize
	@make link-storage
