# =========================================================
# Redis
#
# Redis docker image
# 
# version:1.0
#
# OS:Debian,
#
# =========================================================

ARG REDIS_DOCKER_VERSION=""
FROM redis:${REDIS_DOCKER_VERSION}


MAINTAINER Aldrich Saltson <aldrich.saltson@txtghana.com>

RUN mkdir -p /usr/local/etc/redis
COPY redis.conf /usr/local/etc/redis/redis.conf

VOLUME /data

EXPOSE 6379

CMD ["redis-server", "/usr/local/etc/redis/redis.conf"]
