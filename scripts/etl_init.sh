#!/bin/sh
if [ -f .env ] 
then
  export $(cat .env | sed 's/#.*//g' | xargs)
  mysql -h $DB_HOST -P $DB_PORT  -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE < $ETL_INIT_FILE 2>/dev/null
fi