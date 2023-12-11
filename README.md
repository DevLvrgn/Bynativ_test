<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Installation

Afin d'installer l'application :

- Mettre a jour le .env
- Lancer `composer install`
- Lancer `npm install`
- Faire les migrations `php artisan migrate`
- Lancer le serveur `php artisan serve`
- Compiler le front `npm run dev`
- Lancer le serveur websocket `php artisan websockets:serve`

Et vous devriez etre bon pour partir

## Pour Tester

- Rdv sur http://localhost:8000
  - Vous y verrez la page de formulaire pour la création d'un rdv
  - ainsi que 2 autres liens pour les page LIVE et API
- Rdv sur http://localhost:8000/{id} pour visionner une prise de rdv
- Rdv sur http://localhost:8000/live pour checker le push websocket apres création d'un rdv
- Rdv sur http://localhost:8000/api/bookings pour regarder le retour API en JSON de la liste des rdv

## Tests fonctionnels
Lancer la commande ``php artisan test``
