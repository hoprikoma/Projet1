FROM mailhog
RUN echo sendmail_path = docker exec -i mailhog sendmail -S localhost:1025 >> /opt/docker/etc/php/php.ini