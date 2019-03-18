conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	sudo apt-get install mysql-server-5.7
	# $(MAKE) bd-conf

composer:
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	# $(MAKE) bd-conf

conf-git-erickson:
	git config user.email "erickson.rinho@hotmail.com"
	git config user.name "Erickson"

conf-git-kevin:
	git config user.email "kevinsousa"
	git config user.name "kevinsmoura@hotmail.com"

conf-git-luigi:
	git config user.email "luigi.martins.355@gmail.com"
	git config user.name "Luigimartins"

conf-git-jhonny:
	git config user.email "jhonnyfarias87@gmail.com"
	git config user.name "jhonnyfreitas1"

conf-git-cleyton:
	git config user.email "cleytonv104@gmail.com"
	git config user.name "CleytonVieira"

conf-git-ricardo:
	git config user.email "cranioscaner@gmail.com"
	git config user.name "ricardomlp"

