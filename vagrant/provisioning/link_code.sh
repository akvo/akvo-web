#!/bin/bash
set -e

rm -f /var/akvo/homepage/code
sudo -u homepage ln -s /vagrant/homepage/checkout/code /var/akvo/homepage/code

ln -sf /var/akvo/homepage/wp-config.php /var/akvo/homepage/code/wp-config.php
