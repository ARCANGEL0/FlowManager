
<div align="center">
    <img height="20%" width="20%" src="https://cdn-icons-png.flaticon.com/512/5501/5501564.png" >
  <br>
  <h1>FlowManager 💲</h1>
  <strong>Tableau de bord financier pour gérer les abonnements, les revenus et les résultats, rapport mensuel et annuel et informations</strong>
</div>
<br>
<p align="center">
  
  <a href="https://www.gnu.org/licenses/agpl-3.0">
    <img src="https://img.shields.io/badge/License-AGPL_v3-blue.svg" alt="License: AGPL v3">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://views.whatilearened.today/views/github/ARCANGEL0/FlowManager.svg" alt="Views">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://img.shields.io/github/stars/ARCANGEL0/FlowManager?label=Stars&color=yellow&style=flat-square" alt="Stars">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://img.shields.io/github/watchers/ARCANGEL0/FlowManager?label=Watchers&color=green&style=flat-square" alt="Watchers">
</a>
<a href="https://github.com/ARCANGEL0/FlowManager">
    <img src="https://img.shields.io/github/forks/ARCANGEL0/FlowManager?label=Forks&color=orange&style=flat-square" alt="Forks">
</a>
</p>

  <table align="center">
 <tr align='center'>
 <td colspan="3">
 ၊၊||၊||၊
 </td>
 </tr>
 <tr><td><a href="README.md"><img src="https://raw.githubusercontent.com/ARCANGEL0/ARCANGEL0/master/img/us-flag.png" height="13"> English</a></td>
 <td><a href="README_fr.md"><img src="https://raw.githubusercontent.com/ARCANGEL0/ARCANGEL0/master/img/fr-flag.png" height="13"> Français</a></td>
 <td><a href="README_pt.md"><img src="https://raw.githubusercontent.com/ARCANGEL0/ARCANGEL0/master/img/br-flag.png" height="13"> Português</a></td></tr>
</table>

#### Ce projet a été réalisé pour les Sea Scouts [77GEMAR Jair Mattenauer Silveira](https://www.77gemar-jairmattenauer.com) situé en SP/Brésil, un tableau de bord financier pour gérer l'abonnement des scouts... avec leur site Web

## Description du projet

FlowManager est un tableau de bord de gestion financière complet construit à l'aide de Phinx. Il fournit une authentification de connexion sécurisée et une interface conviviale pour la gestion des abonnements mensuels, le suivi des paiements et l'affichage des informations clients / abonnés. Le tableau de bord permet également aux utilisateurs de contrôler leurs données, de gérer les finances mensuelles et annuelles, d'accès aux statistiques financières et de générer des rapports détaillés pendant des mois ou des années spécifiques.

## Table des matieres

- [Description du projet](#description-du-projet)
- [Table of Contents](#table-des-matieres)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Pour commencer](#pour-commencer)
  - [Structure du projet](#Structure-du-projet)
  - [Fonctions et methodes](#fonctions-et-methodes)
- [Contribuer](#contribuer)
- [Licence](#Licence)

## Installation 


Tout d’abord, vérifiez si PHP et Phinx sont installés sur votre appareil. Clonez le dépôt à votre emplacement préféré et modifiez les fichiers de configuration Phinx et de base de données pour vos données de base de données.

```shell
    git clone https://github.com/ARCANGEL0/FlowManager.git
    cd FlowManager
    nano phinx.php
    nano database.php
```
Sur phinx.php, éditez la configuration phinx en fonction de votre base de données SQL
```php 
FlowManager ' => [
            'adapter' => 'mysql',
            'host' => '',
            'name' => '', // database Name || nome do Banco de dados, é preciso já existir um banco com esse nome
            'user' => '',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],

```
Et puis modifiez les variables globales du projet sur database.php:
```php
<?php

// Define your database connection details as global variables
// Définissez les détails de votre connexion à la base de données en tant que variables globales
// Defina as variaveis de conexao aqui
// 
$GLOBALS['sql'] = array(
    'host' => 'your_host',
    'db' => 'your_database_name',
    'user' => 'your_username',
    'pass' => 'your_password'
);

?>
```
et pour couronner le tout, models/db.php:
```php
Class db {
	
	private $maquina = "";
	private $user = "";
	private $password ="";
	private $db = "";
```

### Utilisation 
Assurez-vous d'avoir créé une base de données à utiliser pour le système
Exécutez les migrations pour générer les tables et les données dans la base de données souhaitée.

```shell
    vendor/bin/phinx migrate -e flowManager
    vendor/bin/phinx seed:run -e flowManager
 ```
 Assurez-vous d'ajouter une entrée à Administradores dans votre base de données et de l'utiliser comme identifiant.
 Exécutez ensuite le serveur local dans le dossier racine comme vous préférez.

```shell
 php -S localhost:8000 -t . 
```
 &nbsp; ou

```shell
 symfony server:start
```



## Pour commencer 

Cette section fournit un guide de démarrage rapide de haut niveau, expliquant la structure, les fonctions et les processus du projet.

### Structure du projet 

Le projet suit la structure Modèle-Vue-Contrôleur, divisée par dossiers.

```txt
|- Models 
|    |- Gastos
|    |- Mensalidades
|    |- Usuarios
|    |- Administrador
|    '- Banco de dados
|- Controllers
|    |- AdministradorControl
|    |- GastosControl
|    |- MensalidadesControl
|    |- UsuariosControl
|    |- db
|    |  '- Controllers to fetch SQL Data
|    |- login
|    |  '- Controllers to handle login
|    '- data
|        '- Controllers to handle CRUD methods
 '- Views
      |- Dashboard
      |- Users
      |- Subscriptions page 
      |- Incomes and outcomes
      |- Reports
```

### Fonctions et methodes

Dans ce projet, il existe un modèle Utilisateurs pour gérer les données des clients
> Créer des utilisateurs et gérer leurs données
> Définir la catégorie, le rang de scout ou autre (à faire)
> Mettre à jour et supprimer des données

Un modèle d'abonnement

Dans ce projet, il existe un modèle Utilisateurs pour gérer les données des clients
> Créer des utilisateurs et gérer leurs données
> Définir la catégorie, le rang de scout ou autre (à faire)
> Mettre à jour et supprimer des données

Un modèle d'abonnement
> Établir la valeur du paiement mensuel
> Contrôlez les paiements mensuels, basculez entre les abonnements payants ou non
> Voir le solde du mois en cours par abonnement 

Un modèle de contrôle de l’argent
> Gérer les revenus et les résultats par mois ou par année
> Vérifiez le solde actuel en fonction du mois dernier

Un modèle de contrôle de l’argent
> Gérer les revenus et les résultats par mois ou par année
> Vérifiez le solde actuel en fonction du mois dernier
> Générez des rapports avec toutes les transactions monétaires 

## Licence

Ce programme est un logiciel gratuit: vous pouvez le redistribuer et / ou le modifier en vertu des termes de la licence GNU Affero General Public tel que publié par la Free Software Foundation, soit la version 3 de la licence, soit (à votre option) n'importe quelle version ultérieure. Veuillez consulter le fichier [LICENSE](./LICENSE) dans le dépôt pour le texte intégral. 

Comme de nombreux projets open source, il est nécessaire que les contributeurs fournissent un contrat de licence de contributeur (CLA). En soumettant le code utilisé, vous accordez le droit d'utiliser ce code aux termes de la CLA.

<br>


<p align="center">
 <a href="https://ko-fi.com/henryarcangelo">
   <img src="https://ko-fi.com/img/githubbutton_sm.svg" alt="Buy Me a Coffee at ko-fi.com" data-canonical-src="https://ko-fi.com/img/githubbutton_sm.svg" style="max-width: 100%;">
 </a> <br>
&nbsp;&nbsp;&nbsp; <strong>Happy Coding</strong> ❤️
</p>



[🔝](#table-des-matieres)