# from https://github.com/wikimedia/mediawiki-docker/blob/master/1.37/fpm-alpine/Dockerfile
FROM php:7.4-fpm-alpine

ENV PHPIZE_DEPS=autoconf\ dpkg-dev\ file\ g++\ gcc\ libc-dev\ make\	re2c\ curl-dev

# System dependencies
# TODO: Refer to imagetragick.com
RUN set -eux; \
	\
	apk add --no-cache \
		git \
		imagemagick \
		# Required for SyntaxHighlighting
		python3 \
		dpkg \
	;

# Install the PHP extensions we need
RUN set -eux; \
	\
	apk add --no-cache \
		$PHPIZE_DEPS \
		icu-dev \
		oniguruma-dev \
	;

RUN docker-php-ext-install -j "$(nproc)"\
		intl \
		mbstring \
		mysqli \
		opcache \
        curl \
		dom \
		json \
		zip \
	;\
	pecl install APCu-5.1.21; \
	docker-php-ext-enable \
		apcu \
	; \
	rm -r /tmp/pear; \
	\
	runDeps="$( \
		scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
			| tr ',' '\n' \
			| sort -u \
			| awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
	)"; \
	apk add $runDeps;

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=60'; \
		echo 'opcache.fast_shutdown=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

CMD ["php-fpm"]