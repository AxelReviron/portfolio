FROM dunglas/frankenphp

ENV SERVER_NAME=axel-reviron.fr

ARG USER=appuser

RUN \
	# Use "adduser -D ${USER}" for alpine based distros
	useradd ${USER}; \
	# Add additional capability to bind to port 80 and 443
	setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp; \
	# Give write access to /data/caddy and /config/caddy
	chown -R ${USER}:${USER} /data/caddy && chown -R ${USER}:${USER} /config/caddy

RUN install-php-extensions \
    pcntl \
    pdo_mysql \
    intl \
    gd
    # Add other PHP extensions here...

COPY uploads.ini /usr/local/etc/php/conf.d/uploads.ini

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY . /app

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
