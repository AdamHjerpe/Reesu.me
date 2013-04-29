# Reesu.me
---

## 1. Inledning
Idén bakom Reesu.me är att göra en innovativ sida för att enkelt kunna göra ett CV med enkla färdiga typografiska mallar, samt möjligt en administrativ sida där man kan hantera CV:n ur en arbetsgivares perspektiv. Sistnämnda är dock en sekundär  funktion som kan exkluderas ur första beta prototypen.

## Index
1. [Inledning](#1-inledning)
2. [Projektide](#2-projektide)
3. [Koncept](#3-koncept)
4. [Planering](#4-planering)
5. [Riktlinjer för innehåll](#5-riktlinjer-for-innehall)
6. [Kod stilmall](#6-kod-stilmall)

## 2. Projektide
Idén bakom Reesu.me är att förenkla skapandet av ens CV. Det viktiga är att:
- Sidan är lättnavigerad, med ett enkelt UI.
- Slutresulatet ska se bra ut. 

Det måste finnas en fördel med att använda sidan, den givna fördelen är att det ska vara enkelt, därför ges användaren färdiga typografiska mallar för utseendet på det slutgiltiga CV:t. Dessa Färdiga

## 3. Koncept

## 4. Planering

### Typografiska Mallar
Inled till en början med tre färdiga mallar.

### Att göra
- [ ] Gör en wireframe för layouten av sidan.
- [X] Ordna Git för projektet.
- [X] Synopsis av projekt
- [ ] Grovmanus och flödesschema | till den 2 Maj -13.
- [ ] Typgrafiska Mallar för slutrendering av CV.

### Mål

## 5. Riktlinjer för innehåll
Innehålls riktlinjerna nedan skall följas för att ge ett konsekvent utseende och kvalité på allt innehåll.

### Bilder

#### Innan Publicering
Bilder skall beskäras och optimeras innan publicering. Använd t.ex. [Smushit.com](http://www.smushit.com/), [Imageoptim.com](http://imageoptim.com/) eller liknande tjänst.

### Siffror i text
Samtliga tal i text under 10 (0–9) skall bokstaveras ut, t.ex “Sidan har tre typografiska mallar”, tal över 10 skrivs ut i sifferformat, t.ex. “Året var 1984”.

## 6. Kod stilmall
Här följer generella regler för all kod som skall skrivas. Om ej språket i fråga är beroende av ett specifikt syntax.

### Filstruktur
All utvecklingskod i SASS eller JavaScript skall ligga i ```/dev/``` mappen, den skall därefter kompileras ut till en undermapp root direktivet, se nedan för en lista över specifika filtyper över hur de skall hanteras.

Använd korta beskrivande namn för undermappar. Korta namn ger mindre risk att stava fel, kortare länkar och lätt överskådlig mappstruktur.
-  CSS - Utveckling i CSS sker i SASS, utvecklings kod skall ligga i ```/dev/sass/``` för att sedan kompileras ut till ```/css/```
-  JavaScript - Utvecklingskod skall ligga i ```/dev/js/``` för att sedan minfieras ut till ```/js/```utan förändringar till filnamn. Vid manuell minifiering rekommenderas även att jsHint eller jsLint köras på koden för att analysera eventuella fel, detta underlättar testningen av koden.

### Indentering
All kod skall ha mjuka tabbar (två mellanslag), en rekommendation är att ändra inställningarna i din textredigerare för att underlätta detta. 


