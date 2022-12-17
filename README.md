# Phico

Tiny WAF.

## native

```
$ composer install
$ composer run up

open http://127.0.0.1:8080/
```


## with docker

```
$ docker build . -t phico
$ docker run --rm -it -v `pwd`:/var/www/ -p 8080:80 phico
```
