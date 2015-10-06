FROM dylanlindgren/docker-laravel-phpunit

COPY . /data/SliPHP

WORKDIR /data/SliPHP

ENTRYPOINT ["phpunit", "--bootstrap", "./load.php", "tests"]