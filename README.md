# InventoryTrack 📦

Application web d'inventaire d'équipements construite avec **Laravel 12**.  
Projet réalisé dans le cadre d'une montée en compétences Laravel pour un poste de développeur PHP Laravel.

---

## 🚀 Fonctionnalités

- ✅ **CRUD complet** — ajouter, modifier, supprimer des équipements
- ✅ **Page détail** — voir toutes les infos d'un équipement
- ✅ **Recherche** — filtrer par nom ou catégorie
- ✅ **Filtre par statut** — disponible, en utilisation, en maintenance, hors service
- ✅ **Pagination** — 5 équipements par page
- ✅ **API REST JSON** — endpoints pour une app mobile
- ✅ **Validation** — formulaires sécurisés côté serveur
- ✅ **Messages flash** — retours utilisateur après chaque action

---

## 🛠️ Stack technique

| Technologie  | Version | Rôle                |
| ------------ | ------- | ------------------- |
| PHP          | 8.3     | Langage backend     |
| Laravel      | 12      | Framework PHP       |
| MySQL        | 8.0     | Base de données     |
| Blade        | —       | Moteur de templates |
| Tailwind CSS | CDN     | Styles              |
| Git          | —       | Versioning          |

---

## ⚙️ Installation

### Prérequis

- PHP 8.3+
- Composer
- MySQL (XAMPP ou autre)
- Git

### Étapes

```bash
# 1. Cloner le projet
git clone https://github.com/ansenthandrayen/inventory-track-application.git
cd inventory-track-application

# 2. Installer les dépendances
composer install

# 3. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Configurer la base de données dans .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_track
DB_USERNAME=root
DB_PASSWORD=

# 5. Créer la base de données et insérer les données de démo
php artisan migrate:fresh --seed

# 6. Lancer le serveur
php artisan serve
```

Ouvre **http://127.0.0.1:8000** dans ton navigateur.

---

## 🔌 API REST

| Méthode | Endpoint               | Description                |
| ------- | ---------------------- | -------------------------- |
| GET     | `/api/equipments`      | Liste tous les équipements |
| GET     | `/api/equipments/{id}` | Détail d'un équipement     |

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
      "created_at": "2026-09-10T20:00:00.000000Z",
      "updated_at": "2026-09-10T20:00:00.000000Z"
    }
  ]
}
```

---

## 📁 Structure du projet

app/
├── Http/Controllers/
│ ├── EquipmentController.php # CRUD web
│ └── Api/
│ └── EquipmentController.php # API REST
└── Models/
└── Equipment.php # Modèle Eloquent

database/
├── migrations/ # Structure BDD
└── seeders/ # Données de démo

resources/views/
├── layouts/app.blade.php # Template commun
└── equipments/
├── index.blade.php # Liste
├── show.blade.php # Détail
├── create.blade.php # Formulaire création
└── edit.blade.php # Formulaire modification

routes/
├── web.php # Routes HTML
└── api.php # Routes API

---

## 📊 Modèle de données

| Colonne         | Type            | Description                                                 |
| --------------- | --------------- | ----------------------------------------------------------- |
| `id`            | integer         | Identifiant unique                                          |
| `name`          | string          | Nom de l'équipement                                         |
| `category`      | string          | Catégorie                                                   |
| `serial_number` | string (unique) | Numéro de série                                             |
| `location`      | string          | Localisation                                                |
| `status`        | enum            | disponible / en_utilisation / en_maintenance / hors_service |
| `notes`         | text (nullable) | Notes optionnelles                                          |
| `created_at`    | timestamp       | Date de création                                            |
| `updated_at`    | timestamp       | Date de modification                                        |

---

## 👨‍💻 Auteur

**Ansen** — Développeur PHP Full Stack  
Projet réalisé en autodidacte pour monter en compétences sur Laravel 12.
