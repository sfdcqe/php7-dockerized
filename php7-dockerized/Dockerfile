FROM nginx

# Remove default nginx configs.
RUN rm -f /etc/nginx/conf.d/*

# Install PHP 7 Repo
RUN apt-get update && apt-get install -my wget
RUN sh -c "echo 'deb http://packages.dotdeb.org jessie all' >> /etc/apt/sources.list"
RUN sh -c "echo 'deb-src http://packages.dotdeb.org jessie all' >> /etc/apt/sources.list"
RUN wget https://www.dotdeb.org/dotdeb.gpg -O - | apt-key add -
RUN wget https://nginx.org/keys/nginx_signing.key -O - | apt-key add -

# Install Packages
RUN apt-get update && apt-get install -my \
  supervisor \
  curl \
  php7.0-curl \
  php7.0-fpm \
  php7.0-mysql \
  php7.0-mcrypt \
  php7.0-sqlite \
  php7.0-xdebug \
  php7.0-mbstring \
  php-apc

# Ensure that PHP7 FPM is run as root.
RUN sed -i "s/user = www-data/user = root/" /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i "s/group = www-data/group = root/" /etc/php/7.0/fpm/pool.d/www.conf

# Prevent PHP Warning: 'xdebug' already loaded. XDebug loaded with the core
RUN sed -i '/.*xdebug.so$/s/^/;/' /etc/php/7.0/mods-available/xdebug.ini

# Add configuration files
COPY conf/nginx.conf /etc/nginx/
COPY conf/supervisord.conf /etc/supervisor/conf.d/
COPY conf/php.ini /etc/php/7.0/fpm/conf.d/40-custom.ini
COPY conf/my.cnf /etc/mysql/my.cnf
