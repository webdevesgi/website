# Développement Web avancé @ ESGI

## Contribution

1. [Forkez][1] le projet
2. Créez une nouvelle branche pour votre fonctionnalité (`git checkout -b ma-fonctionnalite`)
3. Commitez vos changements (`git commit -am "Ajout d'une fonctionnalité"`)
4. Pushez vos changements (`git push origin ma-fonctionnalite`)
5. Créez un nouveau [Pull Request][2]

## Installation

Le fichier contenant les mots de passe n'est pas versionné pour des raisons de sécurité, il est donc nécessaire de recréer ce fichier et de le remplir avec les données correspondant à votre environnement de travail.

    git clone git@github.com:webdevesgi/website.git
    cd website/ajax/config
    mkdir db_secret.php

Le fichier `db_secret.php` doit ensuite être rédigé de la sorte :

    <?php

    define('DB_HOST',     'localhost');
    define('DB_USERNAME', 'VOTRE_IDENTIFIANT');
    define('DB_PASSWORD', 'VOTRE_MOT_DE_PASSE');
    define('DB_DBNAME',   'VOTRE_BASE_DE_DONNEES');

    define('API_URL',     'http://LIEN_VERS_VOTRE_REPERTOIRE/ajax/scripts/');

## Téléchargement

Le projet peut être téléchargé sous forme d'archive .zip à partir de [cette adresse][3].

[1]: https://help.github.com/articles/fork-a-repo
[2]: https://help.github.com/articles/using-pull-requests
[3]: https://github.com/webdevesgi/website/downloads