#!/bin/bash

if [ ! -f .env.local ]; then
  exit 0;
fi 

PROJECT=`grep ^PROJECT_DIRECTORY .env.local | head -n 1 | cut -d'=' -f2`
DEPLOY_TO=`grep ^DEPLOY_HOST .env.local | cut -d'=' -f2`
DEPLOY_HOST=`echo $DEPLOY_TO | cut -d':' -f1`

echo "Deploy $PROJECT"

rm -rf var/cache/*
cd ..
rsync -a --delete --exclude var/local --exclude public/local $PROJECT root@$DEPLOY_TO
#rsync -a --delete --exclude public/local $PROJECT root@$DEPLOY_TO
#rsync -a --delete $PROJECT root@$DEPLOY_TO
ssh root@$DEPLOY_HOST "echo 'APP_ENV=dev' >> /var/www/html/$PROJECT/.env.local"
ssh root@$DEPLOY_HOST "chown -R apache:apache /var/www/html/$PROJECT"

scp -r -q root@${DEPLOY_TO}/$PROJECT/var/local $PROJECT/var
scp -r -q root@${DEPLOY_TO}/$PROJECT/public/local $PROJECT/public

cd $PROJECT


