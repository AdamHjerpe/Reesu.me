
<section id="paper">
	<header>
		<hgroup>
			<h1>What is Reesume?</h1>
		</hgroup>
	</header>

	<section id="resume">
		<article class="content edit">
			<h2>Reesu.me | Den enkla CV skaparen</h2>
			<h3>1. Inledning</h3>
			<p>
			Idén bakom Reesu.me är att göra en innovativ sida för att enkelt kunna göra ett CV med enkla färdiga typografiska mallar, samt möjligt en administrativ sida där man kan hantera CV:n ur en arbetsgivares perspektiv. Sistnämnda är dock en sekundär funktion som kan exkluderas ur första beta prototypen.
			</p>

			<h3>Index</h3>
			<ol>
				<li>Inledning</li>
				<li>Projektide</li>
				<li>Koncept</li>
				<li>Planering</li>
				<li>Riktlinjer för innehåll</li>
				<li>Kod stilmall</li>
			</ol>
		</article>

		<article class="content edit">
			<h2>2. Projektide</h2>
			<p>
			Idén bakom Reesu.me är att förenkla skapandet av ens CV. Det viktiga är att:
			</p>

			<ul>
				<li>Sidan är lättnavigerad, med ett enkelt UI.</li>
				<li>Slutresulatet ska se bra ut.</li>
			</ul>

			<p>
			Det måste finnas en fördel med att använda sidan, den givna fördelen är att det ska vara enkelt, därför ges användaren färdiga typografiska mallar för utseendet på det slutgiltiga CV:t. Dessa Färdiga
			</p>
		</article>

		<article class="content edit">
			<h2>3. Koncept</h2>
			<p>
			För att underlätta i jobbsökandet så vill vi underlätta hur du skapar och hanterar ditt CV. Vi vill att du ska kunna hantera flera versioner av ditt CV för att enkelt kunna skräddarsy varje CV du skickar ut för att maximera dina chanser att få drömjobbet. För att kunna skräddarsy ditt CV ytterligare får du färdiga typografiska mallar, hitta en som beskriver dig bäst.
			</p>
			<h3>Målgrupp</h3>
			<p>
			Sidan är inriktad mot unga jobbsökande som är på väg ut till arbetsmarknaden.
			</p>
		</article>

		<article class="content edit">
			<h2>4. Planering</h3>
			
			<h3>Ideér</h3>
			<ul>
				<li>Möjlighet att hantera flera versioner av ens CV, för att gör detta enkelt ska innehållet enkelt kunna hämtas från ett annat CV.</li>
				<li>Möjlighet att kunna lägga till referenser i PDF format på olika</li>
			</ul>

			<h3>Daterade Mål</h3>

			<ul>
				<li>[ ] Grovmanus och flödesschema | till den 2 Maj -13.</li>
			</ul>

			<h3>Typografiska Mallar</h3>

			<p>Inled till en början med tre färdiga mallar. Några mallar som kan tänkas användas:</p>
			<ul>
			<li>Klassisk</li>

			<li>Enkla Serifa typsnitt som ger ett pålitligt och intryck</li>

			<li>Modern</li>

			<li>Moderna tydliga Sans-serifa typsnitt som förmedlar en modern känsla.</li>
		</ul>

			<h3>Att göra</h3>
		<p>
			[<b>x</b>] Gör en wireframe för layouten av sidan.<br />
			[<b>x</b>] Ordna Git för projektet.<br />
			[<b>x</b>] Synopsis av projekt.<br />
			[ ] Planera ut vilka undersidor som behövs och vilket innehåll de skall ha.<br />
			[ ] Gör typgrafiska Mallar för slutrendering av CV.<br />
			[<b>/</b>] Gör HTML Mockups för undersidor.<br />
			- [<b>Pågående</b>] Redigeringsida<br />
			- [<b>Pågående</b>] Inloggningssida<br />
			- [<b>Pågående</b>] Visningssida<br />
		</p>

		<h3>Sidstruktur</h3>
		<p>
			Sidan kommer inte ha så många undersidor, för att få en lättnavigerad sida kommer det bara finnas 3–4 undersidor. Sidan kommer behöva följande sidor:
		</p>

		<p>
		Inloggningssida, sida som ger en enkel registrering, inloggning och förklaring av sidan.
		Redigeringssida, den huvudsakliga sidan där man kan skapa och redigera sitt CV.
		Visningssida, en sida som man enkelt kan länka till för att referera till sitt CV, denna sida måste även ha en gedigen utskrifts funktion.
		Arbetsgivarsida, kommer exkluderas ur betan, tanken är att skapa en sida där arbetsgivare kan hantera arbetssökandes CV:n och kommentera och sortera dem.
		</p>
		</article>

		<article class="content edit">
		<h2>5. Riktlinjer för innehåll</h2>
		<p>
			Innehålls riktlinjerna nedan skall följas för att ge ett konsekvent utseende och kvalité på allt innehåll.
		</p>

		<h3>Bilder</h3>
		<p>
			Samtliga bilder skall vara i PNG format. Fotografier som skall användas måste vara korrekt exponerade, om annat alternativ ej finns.
		</p>

		<h3>Innan Publicering</h3>
		<p>
			Bilder skall beskäras och optimeras innan publicering. Använd t.ex. Smushit.com, Imageoptim.com eller liknande tjänst.
		</p>

		<h3>Siffror i text</h3>
		<p>
		Samtliga tal i text under 10 (0–9) skall bokstaveras ut, t.ex “Sidan har tre typografiska mallar”, tal över 10 skrivs ut i sifferformat, t.ex. “Året var 1984”.
		</p>
	</article>

	<article class="content edit">
		<h2>6. Kod stilmall</h2>
		<p>
		Här följer generella regler för all kod som skall skrivas. Om ej språket i fråga är beroende av ett specifikt syntax.
		</p>
		
		<h3>Kommentering av kod</h3>
		<p>
		All kod kommentering skall vara på engelska. Kommentera kod ofta, kortfattat och beskrivande. Alla filer i utvecklings kod skall vara indexerade. Indexeringen skall vara uppdelad i numrerade listor, dela upp sektioner i underkategorier vid behov, t.ex.
		</p>

		<ul>
			<li>1. Variables</li>
			<li>2. Mixins</li>
			<li>3. Layout</li>
			<li>- 3.1 Header</li>
			<li>- 3.2 Main content</li>
			<li>- 3.3 Sidebar</li>
		</ul>

		<p>
		Här är en lista över några speciella saker att tänka på vid kommentering av vissa språk.
	</p>

		<h3>HTML</h3>
		<p>
		Avsluta samtliga stängande taggar på större sektioner, över fem rader, med en kommentar, t.ex. <header class=“main-header”> </header> <!- /.main-header -> Vid användning av Emmett kan kodsnutten “|c” användas för att automatiskt skapa en slutkommentar, t.ex. header.main-header|c.
		</p>
		<h3>SCSS</h3>

		<h3>Filnamn</h3>
		
		<p>
		Samtliga filer skall endast namnges på engelska samt ha små bokstäver i filnamn, ersättning av mellanslag skall ske med bindestreck, t.ex. logo-header.png. Delfiler som ska importeras till huvudfiler skall ha ett understreck i början av namnet, t.ex. _typography.scss
		</p>

		<h3>Filstruktur</h3>

		<p>
			All utvecklingskod i SASS eller JavaScript skall ligga i /dev/ mappen, den skall därefter kompileras ut till en undermapp root direktivet, se nedan för en lista över specifika filtyper över hur de skall hanteras.
		</p>

		<p>
			Använd korta beskrivande namn för undermappar. Korta namn ger mindre risk att stava fel, kortare länkar och lätt överskådlig mappstruktur.
		</p>

		<h3>CSS</h3>
		
		<p>
		Utveckling i CSS sker i SASS, utvecklings kod skall ligga i /dev/sass/ för att sedan kompileras ut till /css/
		JavaScript
		</p>

		<p>
		Utvecklingskod skall ligga i /dev/js/ för att sedan minfieras ut till /js/med tillägget “.min” innan filbeteckning, t.ex. jquery.min.js
		Vid manuell minifiering rekommenderas även att jsHint eller jsLint köras på koden för att analysera eventuella fel, detta underlättar testningen av koden.
		Tabbning
		</p>

		<p>
		All kod skall ha mjuka tabbar (två mellanslag), en rekommendation är att ändra inställningarna i din textredigerare för att underlätta detta.
		</p>
		</article>
	</section>
</section>
<div style="clear: both; font-size: 1px;">&nbsp;</div>
