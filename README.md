# InventoryTrack 📦

Application web d'inventaire d'équipements construite avec **Laravel 12**.
Projet réalisé en autodidacte pour monter en compétences sur Laravel 12 — dans le cadre d'une candidature à un poste de développeur PHP Laravel dans un organisme public.

> **Contexte** : 8 ans d'expérience en PHP natif, transition vers les frameworks modernes.

---

## 🚀 Fonctionnalités

- ✅ **Authentification** — Login / Register / Logout (Laravel Breeze)
- ✅ **CRUD complet** — Ajouter, modifier, supprimer des équipements
- ✅ **Page détail** — Voir toutes les infos dont les notes
- ✅ **Recherche** — Filtrer par nom ou catégorie
- ✅ **Filtre par statut** — Disponible, en utilisation, en maintenance, hors service
- ✅ **Pagination** — 5 équipements par page
- ✅ **API REST JSON** — Endpoints pour une app mobile
- ✅ **Validation** — FormRequest avec messages en français
- ✅ **Tests automatisés** — 27 tests PHPUnit, 0 échec

---

## 🛠️ Stack technique

| Technologie    | Version | Rôle                                |
| -------------- | ------- | ----------------------------------- |
| PHP            | 8.3     | Langage backend                     |
| Laravel        | 12      | Framework PHP                       |
| MySQL          | 8.0     | Base de données (XAMPP)             |
| Blade          | —       | Moteur de templates (rendu serveur) |
| Tailwind CSS   | CDN     | Styles                              |
| Laravel Breeze | 2.x     | Authentification                    |
| Vite + Node.js | —       | Compilation assets                  |
| PHPUnit        | 11      | Tests automatisés                   |
| Git + GitHub   | —       | Versioning                          |

**Architecture** : Full-Stack monolithique — rendu côté serveur via Blade.
API REST disponible pour une future app mobile.

---

## ⚙️ Installation

### Prérequis

- PHP 8.3+
- Composer
- MySQL (XAMPP ou autre)
- Node.js
- Git

### Étapes

```bash
# 1. Cloner le projet
git clone https://github.com/ansenthandrayen/inventory-track-application.git
cd inventory-track-application

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances JS
npm install && npm run build

# 4. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 5. Configurer la BDD dans .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_track
DB_USERNAME=root
DB_PASSWORD=

# 6. Créer la BDD et insérer les données de démo
php artisan migrate:fresh --seed

# 7. Lancer le serveur
php artisan serve
```

Ouvre **http://127.0.0.1:8000** — crée un compte et explore l'app !

---

## 🔌 API REST

| Méthode | Endpoint               | Description                        |
| ------- | ---------------------- | ---------------------------------- |
| GET     | `/api/equipments`      | Liste tous les équipements en JSON |
| GET     | `/api/equipments/{id}` | Détail d'un équipement en JSON     |

### Exemple de réponse

```json
{
  "success": true,
  "count": 8,
  "data": [
    {
      "id": 2,
      "name": "MacBook Pro 14\"",
      "category": "Ordinateur portable",
      "serial_number": "MBP-2024-001",
      "location": "Bureau 3A",
      "status": "en_utilisation",
      "notes": "Attribué au service marketing",
      "created_at": "2026-09-10T20:00:00.000000Z"
    }
  ]
}
```

---

## 🧪 Tests

```bash
php artisan test
```

Tests: 27 passed (59 assertions)
Duration: 3.94s

| Suite         | Tests | Rôle                    |
| ------------- | ----- | ----------------------- |
| EquipmentTest | 8     | CRUD, validation, API   |
| Auth (Breeze) | 19    | Login, register, logout |

---

## 📁 Structure du projet

app/
├── Http/
│ ├── Controllers/
│ │ ├── EquipmentController.php # CRUD web
│ │ └── Api/EquipmentController.php # API REST
│ └── Requests/
│ ├── StoreEquipmentRequest.php # Validation création
│ └── UpdateEquipmentRequest.php # Validation modification
└── Models/
└── Equipment.php # Modèle Eloquent

database/
├── migrations/ # Structure BDD
├── seeders/EquipmentSeeder.php # 8 équipements de démo
└── factories/EquipmentFactory.php # Données de test (Faker)

resources/views/
├── layouts/app.blade.php # Template commun
└── equipments/
├── index.blade.php # Liste + recherche + pagination
├── show.blade.php # Détail
├── create.blade.php # Formulaire création
└── edit.blade.php # Formulaire modification

routes/
├── web.php # Routes HTML (protégées par auth)
└── api.php # Routes API REST

tests/Feature/
└── EquipmentTest.php # 8 tests fonctionnels

---

## 📊 Modèle de données

| Colonne         | Type            | Description                                                 |
| --------------- | --------------- | ----------------------------------------------------------- |
| `id`            | integer         | Identifiant unique auto-incrémenté                          |
| `name`          | string          | Nom de l'équipement                                         |
| `category`      | string          | Catégorie (PC, écran, imprimante...)                        |
| `serial_number` | string (unique) | Numéro de série                                             |
| `location`      | string          | Localisation (Bureau 3A, Salle 12...)                       |
| `status`        | enum            | disponible / en_utilisation / en_maintenance / hors_service |
| `notes`         | text (nullable) | Notes optionnelles                                          |
| `created_at`    | timestamp       | Date de création (auto)                                     |
| `updated_at`    | timestamp       | Date de modification (auto)                                 |

---

## 🔄 Workflow Git

Ce projet utilise un workflow professionnel avec branches et Pull Requests :
main (stable)
├── feature/equipment-show → PR → merge
├── feature/search-filter → PR → merge
├── feature/pagination → PR → merge
├── feature/api-rest → PR → merge
├── feature/mysql-migration → PR → merge
├── feature/form-requests → PR → merge
├── feature/authentication → PR → merge
└── feature/tests → PR → merge

---

## 👨‍💻 Auteur

**Ansen** — Développeur PHP Full Stack

- 8 ans d'expérience PHP natif
- Transition vers Laravel et les frameworks modernes
- [GitHub](https://github.com/ansenthandrayen)
