# Reesu.me | Den enkla CV skaparen
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
För att underlätta i jobbsökandet så vill vi underlätta hur du skapar och hanterar ditt CV. Vi vill att du ska kunna hantera flera versioner av ditt CV för att enkelt kunna skräddarsy varje CV du skickar ut för att maximera dina chanser att få drömjobbet.
För att kunna skräddarsy ditt CV ytterligare får du färdiga typografiska mallar, hitta en som beskriver dig bäst.

### Målgrupp
Sidan är inriktad mot unga jobbsökande som är på väg ut till arbetsmarknaden.

## 4. Planering
### Ideér
- Möjlighet att hantera flera versioner av ens CV, för att gör detta enkelt ska innehållet enkelt kunna hämtas från ett annat CV. 
- Möjlighet att kunna lägga till referenser i PDF format på olika 

### Daterade Mål
- [ ] Grovmanus och flödesschema | till den 2 Maj -13.

### Typografiska Mallar
Inled till en början med tre färdiga mallar. Några mallar som kan tänkas användas:
#### Klassisk
Enkla Serifa typsnitt som ger ett pålitligt och  intryck

#### Modern
Moderna tydliga Sans-serifa typsnitt som förmedlar en modern känsla. 

### Att göra
- [ ] Gör en wireframe för layouten av sidan.
- [x] Ordna Git för projektet.
- [x] Synopsis av projekt.
- [ ] Planera ut vilka undersidor som behövs och vilket innehåll de skall ha.
- [ ] Gör typgrafiska Mallar för slutrendering av CV.
- [ ] Gör HTML Mockups för undersidor.
- - [Pågående] Redigeringsida
- - [ ] Inloggningssida
- - [ ] Visningssida

### Sidstruktur
Sidan kommer inte ha så många undersidor, för att få en lättnavigerad sida kommer det bara finnas 3–4 undersidor. Sidan kommer behöva följande sidor:
- Inloggningssida, sida som ger en enkel registrering, inloggning och förklaring av sidan.
- Redigeringssida, den huvudsakliga sidan där man kan skapa och redigera sitt CV.
- Visningssida, en sida som man enkelt kan länka till för att referera till sitt CV, denna sida måste även ha en gedigen utskrifts funktion.
- Arbetsgivarsida, kommer exkluderas ur betan, tanken är att skapa en sida där arbetsgivare kan hantera arbetssökandes CV:n och kommentera och sortera dem.

## 5. Riktlinjer för innehåll
Innehålls riktlinjerna nedan skall följas för att ge ett konsekvent utseende och kvalité på allt innehåll.

### Bilder
Samtliga bilder skall vara i PNG format. Fotografier som skall användas måste vara korrekt exponerade, om annat alternativ ej finns.

#### Innan Publicering
Bilder skall beskäras och optimeras innan publicering. Använd t.ex. [Smushit.com](http://www.smushit.com/), [Imageoptim.com](http://imageoptim.com/) eller liknande tjänst.

### Siffror i text
Samtliga tal i text under 10 (0–9) skall bokstaveras ut, t.ex “Sidan har tre typografiska mallar”, tal över 10 skrivs ut i sifferformat, t.ex. “Året var 1984”.

## 6. Kod stilmall
Här följer generella regler för all kod som skall skrivas. Om ej språket i fråga är beroende av ett specifikt syntax.

### Kommentering av kod
All kod kommentering skall vara på engelska. Kommentera kod ofta, kortfattat och beskrivande. Alla filer i utvecklings kod skall vara indexerade. Indexeringen skall vara uppdelad i numrerade listor, dela upp sektioner i underkategorier vid behov, t.ex. 
- 1. Variables
- 2. Mixins
- 3. Layout
- - 3.1 Header
- - 3.2 Main content
- - 3.3 Sidebar

Här är en lista över några speciella saker att tänka på vid kommentering av vissa språk.

#### HTML 
- Avsluta samtliga stängande taggar på större sektioner, över fem rader, med en kommentar, t.ex.
``` <header class=“main-header”>
    </header>
    <!-- /.main-header -->
```
Vid användning av [Emmett]() kan kodsnutten “|c” användas för att automatiskt skapa en slutkommentar, t.ex. ```header.main-header|c```.

#### SCSS

### Filnamn
Samtliga filer skall endast namnges på engelska samt ha små bokstäver i filnamn, ersättning av mellanslag skall ske med bindestreck, t.ex. ```logo-header.png```.
Delfiler som ska importeras till huvudfiler skall ha ett understreck i början av namnet, t.ex. ```_typography.scss```

### Filstruktur
All utvecklingskod i SASS eller JavaScript skall ligga i ```/dev/``` mappen, den skall därefter kompileras ut till en undermapp root direktivet, se nedan för en lista över specifika filtyper över hur de skall hanteras.

Använd korta beskrivande namn för undermappar. Korta namn ger mindre risk att stava fel, kortare länkar och lätt överskådlig mappstruktur.

#### CSS
 - Utveckling i CSS sker i SASS, utvecklings kod skall ligga i ```/dev/sass/``` för att sedan kompileras ut till ```/css/```

#### JavaScript
- Utvecklingskod skall ligga i ```/dev/js/``` för att sedan minfieras ut till ```/js/```med tillägget “.min” innan filbeteckning, t.ex. ```jquery.min.js``` 
- Vid manuell minifiering rekommenderas även att jsHint eller jsLint köras på koden för att analysera eventuella fel, detta underlättar testningen av koden.

### Tabbning
All kod skall ha mjuka tabbar (två mellanslag), en rekommendation är att ändra inställningarna i din textredigerare för att underlätta detta. 


