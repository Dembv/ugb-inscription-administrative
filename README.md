# Projet de Gestion des Inscriptions Administratives - Université Gaston Berger
Ce projet est une application web développée en utilisant le framework Laravel pour gérer les processus d'inscription administrative à l'Université Gaston Berger.

## 1. Fonctionnalités
Inscription des étudiants: Permet aux étudiants de s'inscrire en ligne en fournissant leurs informations personnelles et académiques.
Gestion des filières et des cours: Administration des filières et des cours proposés par l'université.
Gestion des utilisateurs: Administration des comptes etudiant.
Reporting: Génération de certificats sur les inscriptions.
## 2. Configuration Requise
PHP >= 7.3
Composer
MySQL
## 3. Installation
Clonez le dépôt depuis GitHub :
git clone https://github.com/votrenomdutilisateur/projet-inscriptions-ugb.git
Accédez au répertoire du projet :

```bash
cd projet-inscriptions-ugb
```

Installez les dépendances PHP via Composer :
```bash 
composer install
```

Copiez le fichier .env.example et renommez-le en .env :
```bash
cp .env.example .env
```

Générez une clé d'application Laravel :
```bash
php artisan key:generate
```

Configurez votre base de données dans le fichier .env :
```makefile
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_votre_base_de_donnees
DB_USERNAME=votre_nom_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

Exécutez les migrations pour créer les tables de base de données :
```bash
php artisan migrate
```

Lancez le serveur de développement :
```bash
php artisan serve
```

## 4. Contributions
Les contributions sont les bienvenues ! Pour contribuer à ce projet, veuillez suivre ces étapes :
** Fork the repository **

Create your feature branch (git checkout -b feature/YourFeature)

Commit your changes (git commit -m 'Add some feature')

Push to the branch (git push origin feature/YourFeature)

Create a new Pull Request

### Auteurs

Nom de l'auteur

Email de l'auteur
