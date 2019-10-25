# lecridelagirafe-wp-theme

Ce dépôt contient le thème wordpress du site du [cri de la girafe](http://lecridelagirafe.org). Ce site s'appuie principalement sur l'[extension Pods](https://fr.wordpress.org/plugins/pods/), qui permet de créer des types alternatifs aux billets et aux pages habituellement proposées par Wordpress, et qui propose un système de mise en forme automatique de ces nouveaux types de contenus.

Ainsi, le type le plus important utilisé par ce site s'appelle un cri, et est composé des champs suivants:

* *Contenu audio*, qui correspond au fichier mp3 d'un épisode
* *téléchargeable*, un booléen permettant de décider si on autorise ou non le téléchargement de l'épisode
* *auteur*, correspondant à la référence à un autre type pods (*giraphone*)
* *Contenus audios alternatifs*, permettant de compléter le contenu audio par d'autres
* *Contenus alternatifs téléchargeables*, là encore un booléen pour autoriser ou non le téléchargement
* *Sources*, permettant à l'auteur de donner ses sources
* *Cri suivant* et *cri précédent*, dans le cas où il s'agit d'une série, permet de naviguer entre les cris. Son type est une référence à un autre cri
* *Vous aimerez aussi*, correspondant à d'autres cris susceptibles d'intéresser les auditeurs
* *Virées associées*, correspondant à la référence à un autre type de pod (*virée*)

Ce contenu dispose également comme tous les contenus d'un texte, et d'une illustration mise en avant. Exemple de cri: [la résolution de spéculoos](http://lecridelagirafe.org/son/la-resolution-de-speculoos/).

Un autre type de contenu vient compléter avantageusement ce premier type, la *série de cris*, permettant de proposer un ensemble de cris de manière cohérente (à la manière d'un podcast par exemple).

L'avantage de s'appuyer sur un wordpress est que l'on peut générer un flux rss pour toute navigation sur le site. Ainsi, sur la page correspondant à une série de cris, on peut proposer à l'internaute le lien vers un flux RSS. Exemple de série de cris: [histoires courtes](http://lecridelagirafe.org/serie/histoires-courtes/).

Enfin, des taxonomies viennent compléter l'ensemble pour ajouter de la sémantique: durée, type de contenu, récurrence, thèmes, ... Ces éléments sont également associés à chaque cri.

Dans la version actuelle du site, s'il existe un flux rss par série de cri, par mot clé (par exemple [faits presque réels](http://lecridelagirafe.org/theme/faits-presque-reels/)), par type de contenu (par exemple [montage sonore](http://lecridelagirafe.org/type-de-contenu/montage-sonore/)), ou par durée (par exemple [~ 5 minutes](http://lecridelagirafe.org/duree/5-minutes/)), il n'y a qu'un seul podcast sur itunes de proposé.

