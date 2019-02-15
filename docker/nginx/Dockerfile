FROM webdevops/php-nginx:7.3

LABEL maintener="CHARBONNIER Robin"

COPY ./docker/nginx/nginx.conf /etc/php/nginx/7.3

COPY . /app

VOLUME ["/app"]