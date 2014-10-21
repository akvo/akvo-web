#!/bin/bash
if [ `whoami` != "root" ]
then
    echo >&2 "This script must be run as root"
    exit 1
fi

set -e

sed -i '/nameserver/d' /etc/resolv.conf
echo 'nameserver 192.168.50.101' >> /etc/resolv.conf

rm -f /var/akvo/homepage/code
sudo -u homepage ln -s /vagrant/homepage/checkout/code /var/akvo/homepage/code

ln -sf /var/akvo/homepage/wp-config.php /var/akvo/homepage/code/wp-config.php

