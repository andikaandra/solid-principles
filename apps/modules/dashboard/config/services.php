<?php

use Phalcon\Init\Dashboard\Infrastructure\Repositories\IdeasRepository;

$di->setShared('ideasRepository', function () {
    return new IdeasRepository();
});