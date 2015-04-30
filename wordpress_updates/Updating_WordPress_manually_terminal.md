### Updating WordPress in terminal where ftp is not possible

This guide assumes that you know the path to your WordPress installation/s on the remote server and that you have ssh details for that server.
Ensure that you have a location to which you can upload the WordPress update on the remote server.
Ensure that you have a backup directory on the remote server.

## WordPress update

Download the latest WordPress release to your local machine:  https://wordpress.org/download/

Either unzip the folder locally or unzip it on the  remote server once copied over.

## Upload to the remote server

Upload the new WordPress directory to the remote server using 'scp'

Open your command line application and run the following command:

scp -r /directory_location/wordpressdirectory  remote_user_name@your.domain.org:~/wp-updates_directory

##  Backup current Wordpress directory

ssh into your remote machine.

Create a backup directory.

Copy your current WordPress directory to the backup folder by running the following command:

cp -r yourwordpressdirectory /path/to/backups

Rename the backed up folder by date (datetime if you need to)

mv backedupdirectory backedupdirectoryDDMMYYHHMMSS





