FROM mediawiki:1.41

RUN git clone https://github.com/wikimedia/mediawiki-extensions-CSS.git extensions/CSS && \
  git clone -b REL1_41 https://github.com/wikimedia/mediawiki-extensions-CodeMirror.git extensions/CodeMirror && \
  git clone -b REL1_41 https://github.com/wikimedia/mediawiki-extensions-MobileFrontend.git extensions/MobileFrontend

ADD config.php LocalSettings.php