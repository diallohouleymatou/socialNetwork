# **Projet de Réseau Social**

Une plateforme de réseau social riche en fonctionnalités, développée avec le framework Laravel. Ce projet vise à offrir une plateforme permettant aux utilisateurs de se connecter, partager du contenu et interagir entre eux à travers une interface dynamique et conviviale.

---

## **Table des Matières**
1. [Aperçu du Projet](#aperçu-du-projet)
2. [Fonctionnalités](#fonctionnalités)
3. [Installation](#installation)
4. [Utilisation](#utilisation)
5. [Contribution](#contribution)
6. [Technologies Utilisées](#technologies-utilisées)
7. [Auteurs](#auteurs)

---

### **Aperçu du Projet**
Ce projet de réseau social permet aux utilisateurs de créer des profils, publier des posts, commenter, aimer et interagir avec les autres membres de la communauté. Conçu pour offrir une expérience utilisateur optimale, le projet met l'accent sur la performance, la sécurité et l'ergonomie.

### **Fonctionnalités**
- **Inscription et Connexion des Utilisateurs** : Enregistrement sécurisé avec gestion des mots de passe et validation par email.
- **Profils Utilisateurs** : Modification de profil avec photo de profil, biographie, etc.
- **Publication de Contenus** : Création, modification de posts.
- **Interactions Sociales** : Système de likes, commentaires.
  
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
Après avoir suivi les étapes d'installation, vous pouvez accéder à l'application en local via `http://127.0.0.1:8000`. Inscrivez-vous ou connectez-vous pour commencer à utiliser les fonctionnalités du réseau social.

### **Contribution**
Les contributions sont les bienvenues ! Pour contribuer :
1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité : `git checkout -b ma-fonctionnalité`.
3. Commitez vos changements : `git commit -m 'Ajouter une nouvelle fonctionnalité'`.
4. Poussez la branche : `git push origin ma-fonctionnalité`.
5. Créez une Pull Request pour examen.

### **Technologies Utilisées**
- **Backend** : Laravel
- **Frontend** : Blade, Vue.js (ou un autre framework JS si utilisé)
- **Base de Données** : MySQL (ou tout autre SGBD configuré)
- **Outils de Développement** : Composer, NPM, Git

### **Auteurs**
- **Cheikh Tidiane Traore** - *Développeur Backend*
- **Houleymatou Diallo** - *Développeur Backend*

---
