echo I am provisioning...


sudo apt-get -y update
sudo apt-get -y install php5-dev php-pear
sudo pecl install --ignore-errors xdebug

echo Setting up XDebug...

# find path to xdebug.so
XDEBUG=$(find / -name 'xdebug.so' 2> /dev/null)
ZEND_LINE=zend_extension="$XDEBUG"
PHP_INI=/etc/php5/apache2/php.ini

echo Updating $PHP_INI

echo ";XDebug debugger setup" >> $PHP_INI
echo $ZEND_LINE >> $PHP_INI
echo [XDebug] >> $PHP_INI
echo xdebug.cli_color=1 >> $PHP_INI
echo xdebug.remote_enable=1 >> $PHP_INI

date > /etc/vagrant_provisioned_at
echo DONE
