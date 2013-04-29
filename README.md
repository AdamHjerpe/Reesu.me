# Reesu.me
===
## 1. Inledning
Idén bakom Reesu.me är att göra en innovativ sida för att enkelt kunna göra ett CV med enkla färdiga typografiska mallar, samt möjligt en administrativ sida där man kan hantera CV:n ur en arbetsgivares perspektiv. Sistnämnda är dock en sekundär  funktion som kan exkluderas ur första beta prototypen.

## Index
1. [Inledning](#1-Inledning)
2. [Projektide](2#-Projektide)
3. [Koncept](#3-Koncept)
4. [Planering](#4-planering)
5. [Kod stilmall](#5-Kod-stilmall)

## 2. Projektide

## 3. Koncept

## 4. Planering

### Att göra
- [ ] Gör en wireframe för layouten av sidan.
- [x] Ordna Git för projektet.

### Mål

## 5. Kod stilmall
Här följer generella regler för all kod som skall skrivas. Om ej språket i fråga är beroende av ett specifikt syntax.

### Filstruktur
All utvecklingskod i SASS eller JavaScript skall ligga i ```/dev/``` mappen, den skall därefter kompileras ut till en undermapp root direktivet, se nedan för en lista över specifika filtyper över hur de skall hanteras.

Använd korta beskrivande namn för undermappar. Korta namn ger mindre risk att stava fel, kortare länkar och lätt överskådlig mappstruktur.
-  CSS - Utveckling i CSS sker i SASS, utvecklings kod skall ligga i ```/dev/sass/``` för att sedan kompileras ut till ```/css/```
-  JavaScript - Utvecklingskod skall ligga i ```/dev/js/``` för att sedan minfieras ut till ```/js/```utan förändringar till filnamn. Vid manuell minifiering rekommenderas även att jsHint eller jsLint köras på koden för att analysera eventuella fel, detta underlättar testningen av koden.

### Indentering
All kod skall ha mjuka tabbar (två mellanslag), en rekommendation är att ändra inställningarna i din textredigerare för att underlätta detta. 


