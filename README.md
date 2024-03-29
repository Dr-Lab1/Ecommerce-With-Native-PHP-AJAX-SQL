# Ecommerce-With-Native-PHP-AJAX-SQL
**Des meilleurs produits avec les meilleures offres...**

Ceci est un projet rapidement monté pour un travail d'étude (TP). Mais a été conçu avec des codes natifs poussés fonctionnant comme un petit framework fait maison.

Disponible, gratuit et ouvert à tous

# Comment l'obtenir ?
* Vous pouvez techarger le fichier .zip du projet entier en cliquant sur <a href="https://github.com/Dr-Lab1/Ecommerce-With-Native-PHP-AJAX-SQL/archive/refs/heads/master.zip"> ce lien de telechargement </a>
* Vous pouvez faire un git clone :

        git clone https://github.com/Dr-Lab1/Ecommerce-With-Native-PHP-AJAX-SQL.git
* Vous pouvez aussi utilisez le CLI de GitHub :

        gh repo clone Dr-Lab1/Ecommerce-With-Native-PHP-AJAX-SQL

# Comment est structuré le projet ?
Le projet utilise l'architecture M.V.C :
* Model : dossier où sont implementées toutes les classes traitant avec la base de données
* View : dossier où sont implementées toutes les classes traitant avec les vues de l'application
* Controller : dossier où sont implementées toutes les classes traitant avec la logique de l'application

# Comment cela fonctionne ?
**Fichier à la RACINE - ROOT**

* .htaccess : Lorsque la session commence, l'utilisateur se trouve dans la racine du programme. Ce fichier sera le premier à être déclencher et son rôle sera de rediriger la session dans le dossier view
* Dans le dossier view, un autre fichier .htaccess va être déclencher pour ouvrir le fichier index.php du projet
* Les fichiers view seront appélés en premier, ensuite les controllers et enfin le model
* Dans la partie config, nous avons défini toutes les routes utilisées dans notre programmes. Ainsi, nous pourrons les appéler de n'importe où.
* Avec le fichier includes, nous avons inclus tous les fichiers clés de notre applications pour leur permettre de mieux collaborer
