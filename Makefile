conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	sudo apt-get install mysql-server-5.7
	# $(MAKE) bd-conf

composer:
	apt-get install composer
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
	git config user.email "seuemail@gmail.com"
	git config user.name "luigimartins"

conf-git-jhonny:
	git config user.email "seuemail@gmail.com"
	git config user.name "seuusuario"

conf-git-cleyton:
	git config user.email "seuemail@gmail.com"
	git config user.name "seuusuario"

conf-git-ricardo:
	git config user.email "seuemail@gmail.com"
	git config user.name "seuusuario"

