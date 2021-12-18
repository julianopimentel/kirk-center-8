#!/bin/sh
set -e
 
vendor/bin/phpunit
 
(git push) || true
 
git checkout
git pull