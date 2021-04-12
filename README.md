# PPE3


### Mise en route
> composer install (respecte le verisonning du composer.lock)
> créer un .env.local en reprennant les variables d'environnement et en les modifiant si nécessaire
> symfony console doctrine:database:create
> symfony console doctrine:migrations:migrate
> ajouter le fichier sql dans la DB qui contient les données (pas la structure) via un utilitaire de gestion de BD
> lancer la commande *symfony serve* pour lancer le projet
> 
> login : visiteur mdp : visiteur 


> ### Composants installés : 
>
> - #### **ORM**
> composer require orm 
> 
>
> - ### **Maker** - (entity etc)
> composer require symfony/maker-bundle --dev
> 
>
> - ### **Debug** - Outils de débuggage
> composer req debug
> 
>
> - ### **Twig**
> composer req twig
> 
>
> - ### **Profiler** - Permet d'obtenir des informations précises sur les requêtes
> ### WARNING installer uniquement en mode dev (--dev), ne surtout pas l'installer en mode production, au risque de mener le projet à des problèmes de sécurité majeurs
> composer req profiler --dev 
> 
>
> - ### **Asset** - Permet de donner le chemin des assets avec une fonction, donner une url d'image en dur n'est plus d'actualité (problème de versionning etc.)
> composer req asset
>
>
> - ### **Security****Validator**
> composer req security 
> 
>
> - ### **Form** 
> composer req form validator
> 
>
> - ### **Validator** 
> composer req validator
> 


- Commande pour afficher les composants installés
 **composer show**


### Gestion des branches Git
https://yangsu.github.io/pull-request-tutorial/