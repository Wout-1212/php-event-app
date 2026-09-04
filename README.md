# Event Management App

Een webapplicatie voor het beheren van evenementen, gebouwd met een PHP MVC-framework. Bezoekers krijgen een overzicht van komende evenementen inclusief live weersverwachtingen op de locatie. Admins kunnen achter een login evenementen toevoegen, aanpassen en verwijderen.

## Stack

- **Backend:** PHP (MVC architectuur)
- **Database:** MySQL
- **Frontend:** JavaScript (ES6+), Axios, SASS (SCSS)
- **Build Tool:** Vite
- **API:** Open-Meteo Geocoding & Weather Forecast API

## Features

- **Publiek overzicht:** Toont de komende evenementen.
- **Live Weer-API:** Automatische ophaal van de 3-daagse weersverwachting per locatie via de [Open-Meteo API](https://open-meteo.com/).
- **Authenticatie:** Beveiligde login voor admins met sessiebeheer.
- **Admin Dashboard (CRUD):** Volledig beheer van evenementen (toevoegen, bewerken, bekijken en verwijderen).
- **Client-side Validatie:** Directe validatie op formulieren met JavaScript.

## Screenshots

### Homepage
<img width="1870" alt="homepage" src="https://github.com/user-attachments/assets/9737e1f1-dbf4-4c30-8a66-2507810846e2" />

### Admin dashboard
<img width="1870" alt="admin dashboard" src="https://github.com/user-attachments/assets/1df8a19d-02d2-4d68-9c8a-238c293d3e70" />

### Admin event editor
<img width="1870" alt="event editor" src="https://github.com/user-attachments/assets/b02facc4-48c6-415a-b723-5e546ac9c86b" />
