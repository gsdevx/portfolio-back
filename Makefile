ARTISAN = php artisan

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
	git fetch --all
	git pull master --force
