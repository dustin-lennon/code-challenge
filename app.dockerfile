FROM php:7.2-fpm-alpine
MAINTAINER "Dustin Lennon <dustin.lennon@stelth2000inc.com>"

ENV TZ=America/New_York
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN printf "\n%s\n%s" "@edge http://dl-cdn.alpinelinux.org/alpine/edge/main" "@testing http://dl-cdn.alpinelinux.org/alpine/edge/testing" >> /etc/apk/repositories

RUN apk --update upgrade \
  && apk add autoconf automake make gcc g++ libtool libmcrypt-dev ca-certificates freetype-dev \
  php7-curl php7-intl php7-tokenizer libjpeg-turbo-dev bzip2 bzip2-dev imagemagick-dev libxml2-dev \
  php7-pdo_mysql php7-xsl php7-imagick php7-pspell php7-xmlrpc curl libcurl curl-dev enchant-dev \
  gmp-dev php7-gmp icu icu-dev icu-libs openssl openssl-dev php7-openssl php7-pspell aspell-dev \
  readline readline-dev libedit libedit-dev recode-dev tidyhtml-dev exim-utils tidyhtml-libs php7-tidy \
  php7-dom php7-xmlreader libxslt-dev libxml2 libxml2-utils libxml++-dev@testing libxml++@testing \
  libxslt-dev musl php7-common \
  && update-ca-certificates

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install bcmath bz2 calendar dba enchant exif gd gettext gmp intl mysqli pcntl \
  pdo_mysql pspell recode soap sockets tidy xmlrpc xsl zip  

RUN pecl install imagick 
RUN docker-php-ext-enable imagick