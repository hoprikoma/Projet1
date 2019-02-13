#!/bin/bash 
set -e 
APP_ENV=development 
app bundle exec rake database:create 
mysqldump > /sql/setup.sql