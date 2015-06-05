#!/bin/bash
## Script permettant de configurer le serveur pour le vhost 
### INIT Variables
DIR_APACHE_CFG='/var/www/depots'
DIR_APACHE_ETC_CFG='/etc/apache2/sites-available/'
MODIF="0"
if [ ! -d $DIR_APACHE_CFG ] ; then
        mkdir $DIR_APACHE_CFG
        chown 33:33 -R $DIR_APACHE_CFG
fi
for i in `find $DIR_APACHE_CFG -type f `; do
	user=`cat $i |grep ServerName | awk '{print $2}'`
	/usr/sbin/groupadd $user
 	/usr/sbin/useradd $user -d /var/www/mutu/$user/www -g $user -s /bin/false
	mkdir -p /var/www/mutu/$user/www
	chown $user:$user -R /var/www/mutu/$user
	mv $i $DIR_APACHE_ETC_CFG
	mdp_ftp=`< /dev/urandom tr -dc _A-Z-a-z-0-9 | head -c${1:-15};echo;` 
        echo $user:$mdp_ftp | /usr/sbin/chpasswd
	mdp_mysql=`< /dev/urandom tr -dc _A-Z-a-z-0-9 | head -c${1:-15};echo;`
	clubcourt=`echo $user |awk -F'.' '{print $1}'`
	mysql -e "CREATE DATABASE $clubcourt;"
	mysql -e "GRANT USAGE ON *.* TO '$clubcourt'@'localhost' IDENTIFIED BY '$mdp_mysql';"
	mysql -e "GRANT ALL PRIVILEGES ON \`$clubcourt\`.* TO '$clubcourt'@'localhost';"
	emailsend=`mysql ffjv -e "SELECT email FROM contact WHERE id = (SELECT contact_id FROM club_contact WHERE club_id = (SELECT id FROM club WHERE name = \"$clubcourt\"))" | sed '1d' | while read email; do  echo "$email"; done`
	/usr/sbin/a2ensite $user.conf
	echo "Subject: [FFJV] Activation de votre site" > /tmp/email.txt
	echo "From: FFJV Noreply <noreply@ffjv.club>" >> /tmp/email.txt
	echo "To : $emailsend" >> /tmp/email.txt
	echo "" >> /tmp/email.txt
	echo "Bonjour," >> /tmp/email.txt
	echo "Votre site est desormais en ligne." >> /tmp/email.txt
	echo "" >> /tmp/email.txt
	echo "Vous trouverez ci-joint vos acces." >> /tmp/email.txt
	echo "" >> /tmp/email.txt
	echo "FTP :" >> /tmp/email.txt
	echo "User : $user " >> /tmp/email.txt
	echo "Pass: $mdp_ftp" >> /tmp/email.txt
	echo "Hote : $user" >> /tmp/email.txt
	echo "" >> /tmp/email.txt
	echo "Et vos acces Mysql :" >> /tmp/email.txt
	echo "Nom d'hote : localhost" >> /tmp/email.txt
	echo "User : $clubcourt" >> /tmp/email.txt
	echo "Mot de passe : $mdp_mysql" >> /tmp/email.txt
	echo "Nom de la base de donnees : $clubcourt" >> /tmp/email.txt
	echo "" >> /tmp/email.txt
	echo "Enfin vous avez a votre disposition le Phpmyadmin : http://phpmyadmin.ffjv.club" >> /tmp/email.txt
	echo "" >> /tmp/email.txt
	echo "" >> /tmp/email.txt
	echo "Nous vous remercions pour votre confiance" >> /tmp/email.txt
	echo "Le staff FFJV" >> /tmp/email.txt
	cat /tmp/email.txt | /usr/sbin/sendmail -f noreply@ffjv.club -oi $emailsend
	MODIF="1"
done
if [ "$MODIF" -eq "1" ] ; then
        /etc/init.d/apache2 reload
fi
