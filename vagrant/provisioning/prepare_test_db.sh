#!/bin/bash
set -e

# Make sure homepage user can create the test database
# sudo -u postgres psql --command 'ALTER USER rsr CREATEDB;'
MYSQL=`which mysql`
$MYSQL -uroot -e "GRANT ALL PRIVILEGES ON * . * TO 'homepage'@'localhost'; FLUSH PRIVILEGES;"

# For new data update the DUMP_URL
DUMP_URL='http://files.support.akvo-ops.org/devdbs/homepage_dump.20151215_103929.tar.gz'
DUMPDIR='/var/akvo/homepage/dump'
mkdir -p $DUMPDIR
curl -L $DUMP_URL > $DUMPDIR/homepage_dump.tar.gz

cd /var/akvo/homepage/ && ./load_dump.sh
