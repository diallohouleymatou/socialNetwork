# **Projet de Réseau Social**

Une plateforme de réseau social développée avec le framework Laravel. Ce projet vise à offrir une plateforme permettant aux utilisateurs de se connecter, partager du contenu et interagir entre eux;

---

## **Table des Matières**
1. [Introduction](#aperçu-du-projet)
2. [Fonctionnalités](#fonctionnalités)
3. [Installation](#installation)
4. [Utilisation](#utilisation)
5. [Contribution](#contribution)
6. [Technologies Utilisées](#technologies-utilisées)
7. [Auteurs](#auteurs)

---

### **Introduction**
réseau social permettant aux utilisateurs de créer des profils, publier des posts, commenter, aimer et interagir avec les autres membres de la communauté.

### **Fonctionnalités**
- **Inscription et Connexion des Utilisateurs** : Systeme de login complet.
- **Profils Utilisateurs** : Modification de profil avec photo de profil, biographie, etc.
- **Publication de Contenus** : Création, modification de posts.
- **Interactions Sociales** : likes, commentaires.
  
### **Installation**
1. **Clonez le dépôt** :
   ```bash
   git clone https://github.com/votre-utilisateur/nom-du-projet.git
   cd nom-du-projet
   ```

2. **Installez les dépendances** :
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Configurez l'environnement** :
   - Dupliquez le fichier `.env.example` et renommez-le en `.env`
   - Configurez les variables de base de données, email, etc., dans le fichier `.env`

4. **Générez la clé de l'application** :
   ```bash
   php artisan key:generate
   ```

5. **Exécutez les migrations de la base de données** :
   ```bash
   php artisan migrate --seed
   ```

6. **Lancez le serveur** :
   ```bash
   php artisan serve
   ```

### **Utilisation**
Après avoir suivi les étapes d'installation, vous pouvez accéder à l'application en local via `http://127.0.0.1:8000`.
### **Contribution**
Les contributions sont les bienvenues ! Pour contribuer :
1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité : `git checkout -b ma-fonctionnalité`.
3. Commitez vos changements : `git commit -m 'Ajouter une nouvelle fonctionnalité'`.
4. Poussez la branche : `git push origin ma-fonctionnalité`.
5. Créez une Pull Request pour examen.

### **Technologies Utilisées**
- **Backend** : Laravel
- **Frontend** : Blade
- **Base de Données** : MySQL, SQLite, Postgres
- **Outils de Développement** : Composer, NPM, Git

### **Auteurs**
- **Cheikh Tidiane Traore** - *Développeur Backend*
- **Houleymatou Diallo** - *Développeur Backend*

---
