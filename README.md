# Examen Web development basics

## Algemeen

- Werk via de Github classroom link
- Commit regelmatig, dit is een deel van de beoordeling, 1 commit waar plots alles in orde is wordt dus NIET aanvaard
- Je hoeft niet verder te werken met de boilerplate code maar dit zal het wel het makkelijkste maken

## Project uitleg

Je maakt een website voor het event bureau "Er op of er onder". Ze organiseren verschillende evenementen en willen een website waar ze deze kunnen beheren. De website moet een overzicht geven van alle evenementen, en de mogelijkheid om nieuwe evenementen toe te voegen, te bewerken en te verwijderen. De website moet ook een login hebben zodat enkel de beheerder toegang heeft tot de beheerpagina's. Op de homepagina (niet achter de login) moet een overzicht komen van de eerst 5 komende evenementen. Op diezelfde homepagina moet ook informatie getoond worden die uit een externe API komt.

## Backend (PHP) - 70%

### Uitleg

- In `_assets/database.sql` vind je de structuur van de database, je kan dit volledig uitvoeren in je database
- De website start bij `index.php`
- Je kan routes toevoegen in de `index.php` op volgende manier:

```php
// $router->add('url', 'controller', 'method');
$router->add('/', 'HomeController', 'index');
```

- Op sommige plaatsen zal je in de comments meer info vinden

### Te doen

- Installeer `filp/whoops`
- Voeg authenticatie toe (inloggen en uitloggen)
- Voeg CRUD-functionaliteit toe (enkel beschikbaar na login)
  - Item toevoegen
  - Item verwijderen
  - Item bekijken
  - Item aanpassen
- Verander zeker alle referenties in de placeholders en zorg ervoor dat je de nodige velden hebt om de juiste data te beheren. We willen dus geen referenties zien naar Todo's, Contacts en dergelijke, alles staat in het kader van deze event applicatie
- Werk zoveel mogelijk in OOP structuur (dit niet doen = -2)
- Ervoor zorgen dat elke gebruiker enkel aan zijn eigen records kan op alle acties = +1 punt

## Frontend (HTML, CSS, JS) - 30%

### Uitleg

In de map `_assets` vind je een aantal HTML templates en een CSS bestand.

- De HTML files tonen **hoe de website er visueel moet uitzien**
- Deze templates zijn **niet werkend**, maar dienen als referentie voor de structuur

Je mag deze structuur gebruiken, maar let op dat je de correcte velden en assets uit het project gebruikt.

### Te doen

Installeer de frontend packages via `npm install`, alle nodige packages zouden beschikbaar moeten zijn in de `package.json` file.

### HTML

- Implementeer de HTML templates uit `_assets/` in de PHP files in `app/views`
- Zorg dat de layout (header, footer, etc.) op **alle pagina’s wordt gebruikt**, behalve op de login pagina
- Gebruik:
  - een **form** om items toe te voegen of te bewerken
  - een **table** om items weer te geven

### SCSS

In `_assets/main.css` vind je de CSS van de website.

Zet deze CSS om naar **SCSS** in de `theme` folder.

Vereisten:

- Start vanuit `theme/main.scss`
- Splits de CSS op in **componenten** en zet deze in een logische mappenstructuur (atomic, of een eigen variant)
- Gebruik `_partials`
- Importeer deze via `@use`
- Maak een `_config.scss` file waarin je **Sass variabelen** verzamelt
- Gebruik **nesting waar relevant**

Voorbeeld structuur (niet verplicht exact na te maken):

```txt
theme/
  main.scss
  main.js
  components/
    button/
    form/
    header/
    ...
```

### Javascript

Gebruik JavaScript om **form validatie** toe te voegen.

- Gebruik **geen standaard browser validatie**
- Toon **eigen foutmeldingen**
- De validatie moet minstens controleren of verplichte velden correct ingevuld zijn

Voeg je JavaScript toe in `theme/main.js` (entry van Vite). Je kan extra bestanden importeren in `main.js` om alles te bundelen.

### AJAX request

Voeg een **AJAX GET request** toe dat het weer ophaalt voor de komende **3 dagen**.

Gebruik de API:

```txt
https://api.open-meteo.com/v1/forecast?latitude=[LAT]&longitude=[LON]&daily=temperature_2m_max,temperature_2m_min,weather_code&timezone=Europe%2FBerlin&forecast_days=3
```

Gebruik de latitude en longitude uit de database.

Toon voor elke dag:

- maximum temperatuur
- minimum temperatuur
- weersituatie

Documentatie:

- Weather codes:
  https://open-meteo.com/en/docs#weather_variable_documentation
- API:
  https://open-meteo.com/en/docs?timezone=Europe%2FBerlin&forecast_days=3&hourly=&daily=temperature_2m_max,temperature_2m_min,weather_code

Je kan de coordinaten van een locatie via de search in het formulier op de Open-Meteo documentatiepagina omzetten naar coordinaten.

### Vite

Gebruik Vite, met de Laravel Vite plugin, om je CSS en JS te bundelen.

Tijdens development:

```bash
npm run dev
```

Voor productie:

```bash
npm run build
```

### Live reload met Laravel Herd

Om de site lokaal te openen via een vhost en live reload te laten werken:

1. **Vhost toevoegen in Herd**
   Open Laravel Herd, ga naar **Sites** en voeg de projectmap toe. Herd maakt een lokaal domein aan, bijvoorbeeld `2webdevbasics-examen-boilerplate.test`.

2. **`.env` aanmaken met `APP_URL`**
   Kopieer `.env.example` naar `.env` en zet `APP_URL` op dat domein:

   ```env
   APP_URL=https://2webdevbasics-examen-boilerplate.test
   ```

   Of gebruik `http://...` als je de site niet secured. Zo weet de app op welk adres ze draait en kan de Vite dev server correct verbinden voor hot reload.

3. **Dev server starten**
   Start in de projectmap `npm run dev` en open de site via het Herd-domein in je browser. Wijzigingen in SCSS en JS worden automatisch geladen.

## Extra (bonus)

Deze zaken leveren **extra punten** op:

- Gebruik van **BEM class naming**
- Omzetten van **Sass variabelen naar CSS variabelen** via loops
- Gebruik van CSS variabelen in je styles
