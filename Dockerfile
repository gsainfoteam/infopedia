FROM mediawiki:1.41

RUN git clone https://github.com/wikimedia/mediawiki-extensions-CSS.git extensions/CSS && \
  git clone -b REL1_41 https://github.com/wikimedia/mediawiki-extensions-CodeMirror.git extensions/CodeMirror && \
  git clone -b REL1_41 https://github.com/wikimedia/mediawiki-extensions-MobileFrontend.git extensions/MobileFrontend && \
  git clone --depth 1 https://github.com/edwardspec/mediawiki-aws-s3.git extensions/AWS

ADD composer.local.json .
ADD config.php LocalSettings.php

RUN curl -L https://getcomposer.org/composer-2.phar --output composer.phar && \
  php composer.phar install --no-dev
