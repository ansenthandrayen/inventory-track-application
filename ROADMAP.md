# InventoryTrack — Roadmap

Application d'inventaire d'équipements construite avec Laravel 12.
Projet réalisé dans le cadre d'une montée en compétences Laravel pour un poste de développeur PHP Laravel dans un organisme public.

---

## ✅ Fait

- [x] Installation Laravel 12 + PHP 8.3
- [x] Migration et modèle `Equipment`
- [x] CRUD complet (Controller + Routes + Views)
- [x] Validation des formulaires avec FormRequest
- [x] Messages flash (succès/erreur)
- [x] Messages d'erreur personnalisés en français
- [x] Statuts colorés (disponible, en utilisation, en maintenance, hors service)
- [x] Seeders avec 8 équipements réalistes
- [x] Page détail équipement avec notes
- [x] Recherche par nom / catégorie
- [x] Filtre par statut
- [x] Pagination (5 équipements par page)
- [x] API REST JSON (`/api/equipments` et `/api/equipments/{id}`)
- [x] Migration vers MySQL (XAMPP)
- [x] Authentification complète (Laravel Breeze)
- [x] Routes protégées par middleware auth
- [x] Tests fonctionnels — 27 tests, 0 échec (PHPUnit)
- [x] Factory pour données de test (Faker)
- [x] GitHub — branches, Pull Requests, Issues

---

## 📋 À faire (évolutions futures)

- [ ] Protection API avec Laravel Sanctum (tokens)
- [ ] Interface d'administration des utilisateurs
- [ ] Export CSV des équipements
- [ ] Notifications email (équipement en maintenance)
- [ ] Vue.js pour les filtres sans rechargement de page

---

## 🛠️ Stack technique

| Technologie      | Rôle                                |
| ---------------- | ----------------------------------- |
| PHP 8.3          | Langage backend                     |
| Laravel 12       | Framework PHP                       |
| MySQL (XAMPP)    | Base de données                     |
| Blade            | Moteur de templates (rendu serveur) |
| Tailwind CSS CDN | Styles                              |
| Laravel Breeze   | Authentification                    |
| Vite + Node.js   | Compilation assets (prod)           |
| PHPUnit          | Tests automatisés                   |
| Git + GitHub     | Versioning et collaboration         |

---

## 🏗️ Architecture

Stack **Full-Stack monolithique** — rendu côté serveur via Blade.
Pas de séparation frontend/backend — Laravel gère tout.
API REST disponible pour une future app mobile.

---

## 📊 Statistiques du projet

- **27 tests** — 0 échec
- **8 équipements** de démo (seeders)
- **7 routes CRUD** + 2 routes API
- **5 views Blade** + 1 layout commun
- **2 FormRequest** de validation
- **10+ commits** avec branches et PRs
