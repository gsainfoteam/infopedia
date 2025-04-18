FROM mediawiki:1.43

RUN git clone https://github.com/wikimedia/mediawiki-extensions-CSS.git extensions/CSS && \
  git clone -b REL1_43 https://github.com/wikimedia/mediawiki-extensions-CodeMirror.git extensions/CodeMirror && \
  git clone -b REL1_43 https://github.com/wikimedia/mediawiki-extensions-MobileFrontend.git extensions/MobileFrontend && \
  git clone --depth 1 https://github.com/edwardspec/mediawiki-aws-s3.git extensions/AWS && \
  git clone -b REL1_43 https://gerrit.wikimedia.org/r/mediawiki/extensions/PluggableAuth extensions/PluggableAuth && \
  git clone -b REL1_43 https://gerrit.wikimedia.org/r/mediawiki/extensions/OpenIDConnect extensions/OpenIDConnect && \
  git clone -b REL1_43 https://gerrit.wikimedia.org/r/mediawiki/extensions/UserMerge extensions/UserMerge && \
  git clone https://github.com/StarCitizenTools/mediawiki-skins-Citizen/ skins/Citizen

ADD composer.local.json .
ADD config.php LocalSettings.php

RUN apt update && \
  apt install zip unzip libpq-dev -y && \
  docker-php-ext-install pgsql && \
  curl -sS https://getcomposer.org/installer -o composer-setup.php && \
  php composer-setup.php --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update
