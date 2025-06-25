# 📚 Application Étudiants & Forum - Laravel

## 📝 Description du projet

Ce projet est une **application de centralisation des données sur les étudiants**, intégrant un **forum d’articles**. Il a été développé avec le framework Laravel.

### Fonctionnalités principales :

- 🔍 **Index des étudiants** : afficher, ajouter, éditer et supprimer des profils étudiants.
- 🔐 **Authentification sécurisée** :
  - Seuls les étudiants déjà enregistrés (via leur courriel) peuvent créer un compte utilisateur.
  - Un courriel ne peut être utilisé qu’une seule fois pour un compte.
- 📰 **Section Articles** :
  - Création, modification et suppression d’articles.
  - Seul l’auteur d’un article peut le modifier ou le supprimer.
- 🌐 **Support multilingue** : l’application est disponible en **français et en anglais**.
- 📁 **Fonctionnalité non implémentée** : le stockage de documents (PDF, ZIP, etc.) a été prévu, mais non réalisé faute de temps.

## 🌐 Lien du projet

👉 [Voir sur GitHub](https://github.com/TekGeekdev/laravel-tp1/tree/tp02)

## 🛠️ Technologies utilisées

- Laravel
- MySQL
- Bootstrap

---
## 📜 Commandes artisan utilisées

```bash
php artisan lang:publish
php artisan make:Controller SetLocaleController
php artisan make:middleware SetLocale
php artisan make:controller AuthController -r
php artisan make:migration add_user_id_to_students_table --table=students
php artisan migrate
php artisan make:controller UserController -m User
php artisan make:model Post -m
php artisan make:controller PostsController -m Posts
php artisan make:resource PostResource
```

## 🚀 Installation du projet

### Pré-requis

- PHP ≥ 8.1
- Composer
- MySQL
- Node.js & npm (pour le frontend si nécessaire)

### Étapes

1. Cloner le dépôt :
```bash
git clone https://github.com/TekGeekdev/laravel-tp1.git
cd laravel-tp1
git checkout tp02
```

2. Installer les dépendances PHP :
```bash
composer install
```

3. Copier le fichier `.env` et générer la clé d’application :
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurer la base de données dans `.env`

5. Lancer les migrations :
```bash
php artisan migrate
```

6. Lancer le serveur de développement :
```bash
php artisan serve
```

7. (Optionnel) Installer les fichiers de langue :
```bash
php artisan lang:publish
```

## ✍️ Auteur

Projet réalisé par **Mathieu** ([@TekGeekdev](https://github.com/TekGeekdev)) dans le cadre d’un TP Laravel.
