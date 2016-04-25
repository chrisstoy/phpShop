# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.11"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=666"]
    
    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

    # See http://ubuntuforums.org/showthread.php?t=525257 to install XDebug
    # sudo apt-get update
    # sudo apt-get install php5-dev php-pear
    # sudo pecl install xdebug
    # FIND PATH TO THE xdebug.so
    # edit
end
