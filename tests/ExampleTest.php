<?php

use HopekellDev\DanArewa\DanArewa;

test('danarewa instance can be created', function () {
    $instance = new DanArewa();
    expect($instance)->toBeInstanceOf(DanArewa::class);
});
