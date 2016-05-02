#!/bin/bash
echo I am provisioning...

sudo apt-get -y update
sudo apt-get -y install php5-dev php-pear
sudo pecl install --ignore-errors xdebug

echo Setting up XDebug...

# find path to xdebug.so
XDEBUG=$(find / -name 'xdebug.so' 2> /dev/null)
ZEND_LINE=zend_extension="$XDEBUG"
PHP_INI=/etc/php5/apache2/php.ini

if grep -q -i xdebug $PHP_INI
then
	echo XDebug already configured in $PHP_INI	
else
	echo Updating $PHP_INI with XDebug settings...
	echo >> $PHP_INI
	echo ";XDebug debugger setup" >> $PHP_INI
	echo $ZEND_LINE >> $PHP_INI
	echo [xdebug] >> $PHP_INI
	echo xdebug.cli_color=1 >> $PHP_INI
	echo xdebug.remote_enable=1 >> $PHP_INI
	echo xdebug.remote_connect_back=1 >> $PHP_INI
	echo xdebug.remote_port=9000 >> $PHP_INI	
fi

# Do we need to install the MongoDB extension?
if grep -q -i mongodb.so $PHP_INI
then
	echo MongoDB extension already configured in $PHP_INI
else
    echo Installing MongoDB PHP driver
    sudo pecl install mongodb
    echo >> $PHP_INI
    echo extension=mongodb.so >> $PHP_INI
fi

date > /etc/vagrant_provisioned_at
echo DONE
