# Akvo.org Vagrant Development Environment 

## System setup

If you have never used Vagrant or the Akvo.org Vagrant development environment, follow these steps first.

1. Ensure you have at least Vagrant version 1.2 installed:
    
       ~$ vagrant --version
	   vagrant version 1.5.4

   If you don't have Vagrant installed or if you have an old version installed, head over to [http://vagrantup.com](http://vagrantup.com) to get it.
   
2. Ensure you have Oracle VirtualBox installed. If not, you can get it here: [https://www.virtualbox.org/wiki/Downloads](https://www.virtualbox.org/wiki/Downloads)

## First Start Up

The first time you use the environment:

1. Run `vagrant/setup_etc_hosts.sh` - this will add the necessary entries to your `/etc/hosts` file to be able to access the homepage

2. Go into the vagrant directory and start the Vagrant box: `cd vagrant` then `vagrant up`. The first time will take a long time, as it will first download the base virtual machine. This only needs to be done once.

3. Try out [http://homepage.localdev.akvo.org/](http://homepage.localdev.akvo.org/). This will not have any data yet.

## Upgrading

Periodically there will be a new base machine available, which will have updated infrastructure and supporting services. When this is the case, simply `vagrant destroy` to delete your old VM, then `vagrant up` as before; a completely new machine will be created.

You may also want to clean up the old base boxes. They can be found in `$HOME/.vagrant.d/boxes` on UNIXy OSs, and you can simply old ones that you do not use. 


## About the VM

The virtual machine is provisioned with the same [Puppet](http://puppetlabs.com/puppet/what-is-puppet) configuration as the produciton machines. This means that developing locally should take place using exactly the same setup as production.


## FAQ


## Helpful notes

* When you are done developing, run `vagrant halt` to shut down the virtual machine, or it'll just sit there consuming system resources.
 
* Run `vagrant ssh` to ssh into the virtual machine. You will then be logged in as the `vagrant` user, who can use sudo without a password.

* The homepage application information is in `/var/akvo/homepage/`

* The `akvo-web` repository from your local machine is synced to the virtual machine. Changes to code will change the homepage on the virtual machine, and if you change the code (by, for example, updating a plugin via the WordPress admin) then the code will be changed on your machine.

