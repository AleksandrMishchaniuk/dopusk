FROM node:8

ARG uid=1000

RUN usermod -u $uid node

RUN apt-get update

RUN apt-get install --no-install-recommends gcc make libpng-dev

