
# Fonctionnalités de l'application

## 1. Inscription et Authentification(vianey) 1j

- **Inscription des utilisateurs** : Permettre aux utilisateurs de s'inscrire via un formulaire simple avec un pseudo et un mot de passe généré automatiquement.
- **Envoi d'email de confirmation** : Envoyer les détails de connexion par email après l'inscription pour assurer la sécurité et la vérification de l'email.
- **Connexion sécurisée** : Mettre en place un système de connexion avec gestion des sessions et des mots de passe.
- **Déconnexion** : Permettre aux utilisateurs de se déconnecter


## 2. Gestion des amis(christiane)1j

- **Ajout d'amis** : Offrir aux utilisateurs la possibilité d'envoyer des demandes d'amis aux autres utilisateurs.
- **Suggestions d'amis** : Proposer des amis potentiels basés sur des critères comme l'activité, les amis communs, ou des centres d'intérêt.
- **Liste d'amis** : Afficher une liste des amis de l'utilisateur avec des options pour les gérer (supprimer, bloquer, etc.).
- **Recherche d'amis** : Permettre aux utilisateurs de rechercher des amis

## 3. Rappels d'anniversaire(Ange)1j

- **Notifications d'anniversaire** : Envoyer des notifications par email aux utilisateurs pour les anniversaires de leurs amis.
- **Calendrier d'anniversaires** : Offrir une vue calendrier où les utilisateurs peuvent voir les anniversaires à venir.
- **Rappels personnalisés** : Permettre aux utilisateurs de configurer des rappels (par exemple, une semaine avant l'anniversaire).
- **Rappels automatiques** : Mettre en place un système pour envoyer des rappels automatiquement.

## 4. Notifications personnalisées(Arnaud)1j

- **Notifications par email pour les anniversaires** : Envoyer un email personnalisé à l'utilisateur le jour de son anniversaire.
- **Notifications en temps réel** : Utiliser des notifications push ou des alertes dans l'application pour les anniversaires imminents.
- **Paramètres de notification** : Offrir aux utilisateurs la possibilité de personnaliser (bonus)


## 5. Interface utilisateur conviviale (chirac)3j

- **Tableau de bord utilisateur** : Créer un tableau de bord centralisé où l'utilisateur peut voir ses amis, les anniversaires à venir, et les notifications.
- **Interface utilisateur intuitive** :  Conception d'une interface utilisateur simple et facile à utiliser pour les utilisateurs de tous âges.
- **Design responsive** : Assurer que l'application est accessible et agréable à utiliser sur tous les appareils (mobiles, tablettes, ordinateurs).
- **Intégration de thèmes** : Permettre aux utilisateurs de personnaliser leur interface avec des thèmes ou des couleurs.
- **Gestion de mail personnalisés** : Permettre aux utilisateurs de personnaliser les emails envoyés via l'application.
- **Interface de souhait de voeux à l'utilisateur** : Souhaiter un bon anniversaire à l'utilisateur.

## 6. Envoi de mail (Esthere)1j
- **Envoi de mail personnalisé** : Envoyer des emails personnalisés pour  les anniversaires, les invitations, les rappels, etc.
- **Envoi de mail automatique** :  Mettre en place un système pour envoyer des emails automatiquement pour les rappels, les notifications
- **Paramètres de mail** : Offrir aux utilisateurs la possibilité de personnaliser les emails (sujet, contenu, etc.)


policy
model
migration
seeder
controller

nom projet
logo
fiveicon
signature



# Proposition de Structure de Tables pour l'Application de Souhait d'Anniversaire

Cette proposition de structure est conçue pour assurer la performance, la normalisation et la facilité d'utilisation dans votre application. Elle est divisée en différentes tables avec leurs champs, types et descriptions.

## 1. Table `users`

| Champ      | Type       | Description                        |
|------------|------------|------------------------------------|
| id         | INT        | Identifiant unique (clé primaire)  |
| username   | VARCHAR    | Pseudonyme de l'utilisateur (unique)|
| email      | VARCHAR    | Email de l'utilisateur (unique)    |
| password   | VARCHAR    | Mot de passe haché                 |
| birthday   | DATE       | Date d'anniversaire                |
| created_at | TIMESTAMP  | Date de création                   |
| updated_at | TIMESTAMP  | Date de mise à jour                |

---

## 2. Table `friends`

| Champ      | Type       | Description                               |
|------------|------------|-------------------------------------------|
| id         | INT        | Identifiant unique (clé primaire)         |
| user_id    | INT        | Identifiant de l'utilisateur (FK)        |
| friend_id  | INT        | Identifiant de l'ami (FK)                |
| created_at | TIMESTAMP  | Date de création de l'amitié             |

---

## 3. Table `birthdays`

| Champ             | Type       | Description                                        |
|-------------------|------------|----------------------------------------------------|
| id                | INT        | Identifiant unique (clé primaire)                  |
| user_id           | INT        | Identifiant de l'utilisateur (FK)                 |
| date              | DATE       | Date de l'anniversaire                             |
| notification_sent | BOOLEAN    | Indicateur si la notification a été envoyée        |
| created_at        | TIMESTAMP  | Date de création                                  |
| updated_at        | TIMESTAMP  | Date de mise à jour                               |

---

## 4. Table `notifications`

| Champ        | Type       | Description                                       |
|--------------|------------|---------------------------------------------------|
| id           | INT        | Identifiant unique (clé primaire)                 |
| user_id      | INT        | Identifiant de l'utilisateur (FK)                |
| message      | TEXT       | Contenu de la notification                        |
| is_read      | BOOLEAN    | Indicateur si la notification a été lue           |
| created_at   | TIMESTAMP  | Date de création                                  |

---

## 5. Table `settings`

| Champ                    | Type       | Description                                               |
|--------------------------|------------|-----------------------------------------------------------|
| id                       | INT        | Identifiant unique (clé primaire)                         |
| user_id                  | INT        | Identifiant de l'utilisateur (FK)                        |
| notification_preferences | JSON       | Préférences de notification (format JSON)                 |
| created_at               | TIMESTAMP  | Date de création                                          |
| updated_at               | TIMESTAMP  | Date de mise à jour                                       |

---




## 6. Table `profiles`

| Champ        | Type       | Description                                               |
|--------------|------------|-----------------------------------------------------------|
| id           | INT        | Identifiant unique (clé primaire)                         |
| user_id      | INT        | Identifiant de l'utilisateur (FK)                        |
| full_name    | VARCHAR    | Nom complet de l'utilisateur                              |
| bio          | TEXT       | Biographie ou description personnelle                     |
| avatar       | VARCHAR    | URL de l'image de profil                                  |
| birthday     | DATE       | Date d'anniversaire de l'utilisateur                       |
| created_at   | TIMESTAMP  | Date de création                                          |
| updated_at   | TIMESTAMP  | Date de mise à jour  

## 7. Table `emails`

| Champ      | Type       | Description                                        |
|------------|------------|----------------------------------------------------|
| id         | INT        | Identifiant unique (clé primaire)                  |
| user_id    | INT        | Identifiant de l'utilisateur (FK)                 |
| recipient  | VARCHAR    | Adresse email du destinataire                      |
| subject    | VARCHAR    | Sujet de l'email                                   |
| body       | TEXT       | Contenu de l'email                                 |
| status     | ENUM       | Statut de l'email (ex : pending, sent, failed)     |
| sent_at    | TIMESTAMP  | Date et heure d'envoi                              |
| created_at | TIMESTAMP  | Date de création                                   |
| updated_at | TIMESTAMP  | Date de mise à jour                                |

---

# Relations entre les Tables et Optimisation de la Base de Données

Pour optimiser votre base de données en définissant clairement les relations entre les tables, il est essentiel de comprendre comment les différentes entités interagissent les unes avec les autres. Voici un aperçu des relations possibles entre les tables que vous avez définies :

## 1. Relation entre `users` et `profiles`
- **Type** : Un à Un
- **Description** : Chaque utilisateur peut avoir un profil associé qui contient des informations supplémentaires. La clé étrangère `user_id` dans la table `profiles` fait référence à `id` dans la table `users`.

## 2. Relation entre `users` et `friends`
- **Type** : Many-to-Many
- **Description** : Un utilisateur peut avoir plusieurs amis, et chaque ami peut également avoir plusieurs amis. Cette relation est modélisée à l'aide de la table `friends`, où `user_id` et `friend_id` font tous deux référence à `id` dans la table `users`.

## 3. Relation entre `users` et `birthdays`
- **Type** : Un à Plusieurs
- **Description** : Chaque utilisateur peut avoir plusieurs dates d'anniversaire à suivre (par exemple, pour des amis ou des membres de la famille), mais chaque enregistrement dans la table `birthdays` est associé à un seul utilisateur via le champ `user_id`.

## 4. Relation entre `users` et `notifications`
- **Type** : Un à Plusieurs
- **Description** : Chaque utilisateur peut recevoir plusieurs notifications. Le champ `user_id` dans la table `notifications` fait référence à `id` dans la table `users`.

## 5. Relation entre `users` et `settings`
- **Type** : Un à Un
- **Description** : Chaque utilisateur a un ensemble unique de paramètres. Le champ `user_id` dans la table `settings` fait référence à `id` dans la table `users`.

## 6. Relation entre `users` et `emails`
- **Type** : Un à Plusieurs
- **Description** : Un utilisateur peut avoir plusieurs emails envoyés, chacun référencé par le champ `user_id` dans la table `emails`.



## Représentation des Relations

Voici un schéma simplifié des relations entre les tables :
users 1 <--> 1 profiles users 1 <--> N birthdays users 1 <--> N notifications users 1 <--> 1 settings users 1 <--> N emails users N <--> N friends (via friends table)

---

## Considérations pour l'Optimisation

### 1. Indexation
- Ajoutez des index sur les champs fréquemment utilisés dans les requêtes, comme `user_id` dans les tables `friends`, `birthdays`, `notifications`, `settings`, et `emails` pour améliorer les performances.

### 2. Clés Étrangères
- Utilisez des clés étrangères pour maintenir l'intégrité référentielle entre les tables. Cela garantit que les données restent cohérentes lorsque des utilisateurs sont ajoutés ou supprimés.

### 3. Normalisation
- Assurez-vous que les tables sont correctement normalisées pour minimiser la redondance et maintenir l'intégrité des données.

### 4. Gestion des Effacements
- Pensez à la manière dont vous souhaitez gérer les effacements. Par exemple, si un utilisateur est supprimé, que doit-il arriver aux amis de cet utilisateur dans la table `friends` ou aux notifications associées ?

### 5. Performance des Requêtes
- Évitez des requêtes trop complexes qui pourraient ralentir les performances. Utilisez des jointures appropriées pour récupérer les données nécessaires de manière efficace.

---

## Conclusion

En définissant clairement les relations entre les tables et en mettant en œuvre des pratiques d’optimisation, vous pouvez garantir que votre base de données est à la fois performante et facile à utiliser. Cela contribuera à une expérience utilisateur fluide et à une gestion efficace des données.










