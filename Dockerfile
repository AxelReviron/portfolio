FROM dunglas/frankenphp

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
    intl
    # Add other PHP extensions here...

COPY . /app

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
