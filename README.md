# ffjvmutuweb
Sites FFJV Mutualisé

# Prerequis Package : 
* cronolog
* apache2-mpm-itk
* apache2 
* php5 libapache2-mod-php5
* mysql-server php5-mysql
* proftpd
* bsd-mailx / postfix

# Actions

* Creation
* Modification
* Suppresion
* Desactivation temporaire

# Creation

* Recuperer les informations necessaires : 
=> Nom du club (nom.ffjv.club)
=> Contact : Mail, Tel, Nom/Prenom (Photcopie de la CNI ?)
=> Generer un ID unique
=> Creations : Vhost Apache ITK, Base de donnee SQL, Compte FTP
=> Send mail

# Modification

Les champs qui peuvent etre modifie :
=> Contact
=> Nom du club

# Suppression 

=> Complete (Sauf Log access et web pendant 1an)
=> Contact

# Suspension/Activation

Desactivation d'un site :
=> Changement mot de passe FTP
=> Suppression du vhost
