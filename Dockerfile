FROM virusvn/docker-centos-v8js:nginx-php-fpm

RUN yum clean all
RUN yum install -y php-mysqli vim

RUN cd /tmp \
  && curl -LO http://wordpress.org/latest.tar.gz

COPY start.sh /usr/local/bin/
COPY nginx/wordpress.conf /etc/nginx/conf.d

RUN rm /etc/nginx/conf.d/default.conf

RUN chmod +x /usr/local/bin/start.sh

RUN curl -L -o /usr/local/bin/phpunit https://phar.phpunit.de/phpunit.phar
RUN chmod +x /usr/local/bin/phpunit

RUN cd /tmp \
  && curl -L -O https://launchpad.net/libmemcached/1.0/1.0.16/+download/libmemcached-1.0.16.tar.gz \
  && tar -xvf libmemcached-1.0.16.tar.gz \
  && cd libmem* \
  && bash configure --disable-memcached-sasl \
  && make \
  && make install


RUN cd /tmp \
  && git clone https://github.com/php-memcached-dev/php-memcached \
  && cd php-memcached \
  && git checkout php7 \
  && phpize \
  && ./configure --disable-memcached-sasl \
  && make \
  && make install

RUN bash -c "echo extension=memcached.so > /etc/php.d/memcached.ini"

RUN curl -L -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x /usr/local/bin/wp

CMD ["start.sh"]
