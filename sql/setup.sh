#!/bin/bash 
set -e 
service mysql start 
mysql < /sql/projet_v1.sql 
service mysql stop 