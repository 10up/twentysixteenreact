FROM virusvn/docker-centos-v8js:nginx-php-fpm

RUN yum install -y php-mysqli vim

RUN cd /tmp \
  && curl -LO http://wordpress.org/latest.tar.gz

COPY start.sh /usr/local/bin/
COPY nginx/wordpress.conf /etc/nginx/conf.d

RUN rm /etc/nginx/conf.d/default.conf

RUN chmod +x /usr/local/bin/start.sh

CMD ["start.sh"]
