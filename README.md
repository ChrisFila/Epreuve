# PPE3

Composants installés : 

composer require orm 
# ORM 

composer require symfony/maker-bundle --dev
# Maker (entity etc)

composer req debug
# Outils de débuggage

composer req twig

composer req profiler --dev 
# Permet d'obtenir des informations précises sur les requêtes
# WARNING installer uniquement en mode dev (--dev), ne surtout pas l'installer en mode production, au risque de mener le projet à des problèmes de sécurité majeurs

composer req asset
# Permet de donner le chemin des assets avec une fonction, donner une url d'image en dur n'est plus d'actualité (problème de versionning etc.)

composer req security form validator
# Pour les formulaires, connexion etc (3 composants)



afficher les composants installés
# composer show


Étapes :

symfony console doctrine:database:create

