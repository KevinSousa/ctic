conf:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	sudo apt-get install mysql-server-5.7
	$(MAKE) bd-conf
	@git config user.email "kevinsmoura@hotmail.com"
	@git config user.name "kevinsousa"

composer:
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	$(MAKE) bd-conf

adc-user:
	mysql -u root -p --execute="use ctic; insert into funcaos (funcao_name) values ('Administração'); insert into users (user_name, user_cpf, user_numero_siap, user_email, user_password, user_funcao) values ('Erickson Ferreira', '3452343214', '65465', 'erickson@email.com', 'admin', 1);"

Windows:
	composer install --no-scripts
	copy .env.example .env
	php artisan key:generate

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

bd-conf:
	mysql -u root -p --execute=" SET GLOBAL validate_password_policy=LOW; drop database if exists ctic; create database ctic; drop user if exists 'ctic'; create user 'ctic' identified by 'ctic'; grant all privileges on ctic.* to 'ctic';"
	sed -i 's/DB_DATABASE.*/DB_DATABASE=ctic/' .env
	sed -i 's/DB_USERNAME.*/DB_USERNAME=ctic/' .env
	sed -i 's/DB_PASSWORD.*/DB_PASSWORD=123/' .env
	php artisan migrate:refresh --seed