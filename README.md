# SeriesRecommendation
Projet Web étudiant dans le cadre de la licence MIASHS : Créer un site de recommandation de séries télé

## Installation

Pour les tests(avec php) le contenue du projet doit copier dans le dossier root du serveur web (www) car les configurations php et serveur sont propres aux machines. Attention à ça !

/!\ Pour pouvoir utiliser le projet. Il faut importer la base, en augmentant la capacité d'importation des requêtes dans le php.ini
Il faut ensuite ajouter les champs salt(varchar(96)) et gets_emails(tinyInt). Il faut également augmenter la type du champs password en le passant à 128.
Il vous faut aussi ajouter la table usersgenre avec deux colonnes. user_id(int(11)) et genre(varchar(18)).


## Se repérer dans le projet

La partie de Maud est accessible depuis series.html à la source du projet.(Attendant l'intégration au projet)
La partie de Mathieu est accessible depuis pageserie.php et series_utilisateur.php
La partie de Valère est accessible depuis pageserie.php
La partie de Maxime est accessible depuis pageserie.php
pageserie.php est la page de référence pour l'instant.
