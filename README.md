#PROJECT TEST UNITAIRE
#DEBUT faire migration, sinon pas de table
commande de test :
docker run --rm -w /home/exo -v ${PWD}:/home/exo php:latest ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests 

si ne marche pas faire :
composer require phpunit/phpunit; composer i


fonctionnement fonction verif
si pas de pb = false, pour un if dans la fonction controlleur new contact
si pas bon = message d'erreur

PB à cause de ça, fonction de test retourne failure si FAUX, à cause du message d'erreur
