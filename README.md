# UGB : Gestion des inscriptions administratives

![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white)

Application web **Laravel** de gestion des inscriptions administratives de l'Université Gaston Berger (UGB). Le service de scolarité gère les étudiants et le référentiel académique ; chaque étudiant s'inscrit en ligne et télécharge son **certificat d'inscription en PDF**.

---

## Fonctionnalités

**Page d'accueil** (publique) : présentation, annonces publiées par la scolarité (paginées).

**Espace scolarité** (`/scolarite`)
- Création, modification et suppression des étudiants, avec photo. La création génère automatiquement le compte : identifiant `nom.prenom`, e-mail institutionnel `nom.prenom@ugb.edu.sn`, code étudiant préfixé par `P`.
- Gestion des formations, niveaux et années académiques
- Gestion des inscriptions
- Publication d'informations (annonces de la page d'accueil)

**Espace étudiant** (`/etudiant`)
- Consultation de son profil et mise à jour de ses coordonnées (e-mail personnel, téléphone, adresse)
- Inscription en ligne : choix de la formation, du niveau et de l'année académique (une seule inscription par année)
- Historique de ses inscriptions et génération du certificat d'inscription en PDF (DomPDF)

L'authentification se fait par e-mail et mot de passe ; l'utilisateur est redirigé vers son espace selon son rôle.

## Stack technique

| Couche | Outils |
|---|---|
| Back-end | Laravel 10, Eloquent, Form Requests, middleware `auth` |
| Front-end | Blade, Bootstrap, Font Awesome |
| Base de données | MySQL (migrations Laravel) |
| PDF | `barryvdh/laravel-dompdf` |

**Tables principales** : `users`, `roles`, `students`, `formations`, `levels`, `years`, `registrations`, `informations`.

**Rôles** : `1` = étudiant, `2` = scolarité.

## Prérequis

- PHP 8.1 ou plus récent
- Composer
- MySQL ou MariaDB

## Installation

```bash
git clone https://github.com/Dembv/ugb-inscription-administrative.git
cd ugb-inscription-administrative
composer install
cp .env.example .env
php artisan key:generate
```

Renseignez la base de données dans `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ugb_inscription
DB_USERNAME=root
DB_PASSWORD=
```

Créez les tables et le lien vers le stockage public (photos des étudiants et images des annonces) :

```bash
php artisan migrate
php artisan storage:link
```

### Créer les rôles et le premier compte scolarité

Aucun seeder n'est fourni : créez les rôles et un premier compte scolarité avec Tinker.

```bash
php artisan tinker
```

```php
DB::table('roles')->insert([
    ['id' => 1, 'libelle_role' => 'etudiant'],
    ['id' => 2, 'libelle_role' => 'scolarite'],
]);

$u = new App\Models\User;
$u->name = 'scolarite';
$u->email = 'scolarite@ugb.edu.sn';
$u->password = 'changez-moi';   // haché automatiquement par le modèle
$u->role = 2;
$u->save();
```

### Lancer l'application

```bash
php artisan serve
```

Ouvrez `http://127.0.0.1:8000`, connectez-vous avec le compte scolarité, puis créez les formations, niveaux, années académiques et étudiants.

## Structure du projet

```
app/Http/Controllers/
├── AuthController.php          # Connexion / déconnexion, redirection selon le rôle
├── Scolarite/                  # Étudiants, formations, niveaux, années, inscriptions, informations
└── Etudiant/
    ├── StudentController.php   # Espace étudiant, mise à jour du profil, inscription
    └── PdfController.php       # Certificat d'inscription PDF
resources/views/
├── accueil.blade.php
├── auth/  scolarite/  etudiant/
routes/web.php
```

## Contribuer

1. Forkez le dépôt
2. Créez une branche : `git checkout -b feature/ma-fonctionnalite`
3. Commitez : `git commit -m "Ajoute ma fonctionnalité"`
4. Poussez : `git push origin feature/ma-fonctionnalite`
5. Ouvrez une Pull Request

## Auteur

Demba Hamet Guissé, guissedembahamet@gmail.com
