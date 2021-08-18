#!/bin/sh
volumes=$(docker volume ls -q)
if [ ! -z "$volumes" ]; then
  echo 'Stopping containers and removing volumes'
  docker-compose down
  docker volume rm "$volumes"
fi
echo 'Building containers'
docker-compose build
echo 'Starting containers'
docker-compose up