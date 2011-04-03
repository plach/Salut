#!/bin/sh
php -d extension=curl.so -d extension=json.so -d include_path=".:../curl/" example.php
