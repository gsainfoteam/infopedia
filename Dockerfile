FROM mediawiki:1.41

RUN git clone https://github.com/wikimedia/mediawiki-extensions-CSS.git extensions/CSS && \
  git clone -b REL1_41 https://github.com/wikimedia/mediawiki-extensions-CodeMirror.git extensions/CodeMirror && \
  git clone -b REL1_41 https://github.com/wikimedia/mediawiki-extensions-MobileFrontend.git extensions/MobileFrontend && \
  git clone --depth 1 https://github.com/edwardspec/mediawiki-aws-s3.git extensions/AWS && \
  git clone https://github.com/United-Earth-Team/MW-OAuth2Client.git extensions/MW-OAuth2Client

ADD composer.local.json .
ADD config.php LocalSettings.php

RUN apt update && \
  apt install zip unzip && \
  curl -sS https://getcomposer.org/installer -o composer-setup.php && \
  php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
  composer update && \
  composer update && \
  \
  cd extensions/MW-OAuth2Client && \
  git submodule update --init && \
  cd vendors/oauth2-client && \
  composer install && \
  cd ../../ && \
  cd ../../
