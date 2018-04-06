#!/bin/bash

speed=20

while [ $speed -gt 0 ]; do
    BASEDIR=$(dirname "$0")
    `php $BASEDIR/main.php`

    sleep 2
    speed=$(($speed-1))
done