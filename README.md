# SeriesRecommendation
Projet Web étudiant dans le cadre de la licence MIASHS : Créer un site de recommandation de séries télé

## Installation

Pour les tests(avec php) le contenue du projet doit copier dans le dossier root du serveur web (www) car les configurations php et serveur sont propres aux machines. Attention à ça !

/!\ Pour pouvoir utiliser le projet. Il faut importer la base, en augmentant la capacité d'importation des requêtes dans le php.ini
Il faut ensuite ajouter les champs salt(varchar(96)) et gets_emails(tinyInt). Il faut également augmenter la type du champs password en le passant à 128.
Il vous faut aussi ajouter la table usersgenre avec deux colonnes. user_id(int(11)) et genre(varchar(18)).


## Qui fait Quoi ?

Maud: 
Le design - De la conception à la finalisation, elle a supervisé et contribué à l'avancement de la structure et de l'ergonomie du site. 
Elle a dessiné les premiers croquis. 
L'importation - Importer le fichier sql dans la base de données ne fut pas une mince affaire, pourtant aujourd'hui elle est totalement fonctionnelle.
La génération d'un Json fut faite pour montrer nos talents de programmeur, elle en est l'auteure. 
Affichage/consultation - Toute la partie concernant l'affichage et les redirections ont été redigée de sa main. La base de données n'a plus de secret pour elle.

Mathieu: 
Le design - Il a dopté le fonctionnement de bootstrap afin de nous créer un site élégant et responsif. 
Le marquage - Par des requêtes embriquées, il a tenté de marquer vos épisodes visionnées. Par des requêtes embriquées, il a échoué. Sans paniqué, il a persisté et les jointures, combiné à un doigté raffiné sont devenues ses principales alliées.
  
Maxime: 
Connexion/Inscription - Nuls ne sauraient nier l'importance de cette partie. Grâce à Maxime, elle fut réalisée avec minutie et aujourd'hui vous pouvez vous inscrire, vous connecter, vous déconnecter quand vous le souhaitez
Modification - La page d'administration permet la mise à jour des informations utilisateurs. Les oublis ne seront plus jamais un problème. 

Valère: 
Recherche - Elle permet de trouver les genres et séries que vous souhaitez. Non, il n'y a dans les coulisses le moteur de google mais nos requêtes sql fonctionnent et sont protégés contre les injections...normalement. 
Recommandation - La recommandation est le point sur lequel nous avons le plus débattu finalement le caroussel aura été la clé.
Intégration - Elle a été supervisée par lui, étrangement ça fonctionnait toujours sur son pc... Petits bugs, irritations, nausées appelez Docteur Valère.


