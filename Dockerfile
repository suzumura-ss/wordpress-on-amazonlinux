FROM public.ecr.aws/amazonlinux/amazonlinux:latest

RUN dnf update -y && \
    dnf install -y wget php-mysqlnd httpd php-fpm php-mysqli mariadb105-server php-json php php-devel pip && \
    mkdir -p /run/php-fpm && \
    pip install supervisor && \
    dnf clean all
RUN dnf install -y net-tools vim procps

WORKDIR /var/www/
RUN wget https://wordpress.org/latest.tar.gz && \
    tar -xzf latest.tar.gz && \
    rm -rf latest.tar.gz && \
    chown -R apache:apache /var/www/ && \
    rm -rf /var/www/html && \
    mv /var/www/wordpress /var/www/html && \
    find /var/www/ -type d -exec chmod 2775 {} \; && \
    find /var/www/ -type f -exec chmod 0664 {} \;

COPY ./src/supervisord/supervisord.conf /etc/supervisord.conf
COPY ./src/httpd/httpd.conf /etc/httpd/conf/httpd.conf
COPY ./src/wordpress/wp-config.php /var/www/html/wp-config.php
COPY ./src/entrypoint.sh /entrypoint.sh

ENV WORDPRESS_DEBUG=
ENV WORDPRESS_DB_COLLATE=utf8mb4_unicode_ci

EXPOSE 80
ENTRYPOINT [ "/entrypoint.sh" ]
