<?php
$pageTitle = "AI";
include("includes/head.php");
include("includes/mainnav.php");
?>

<h2>AI - Redovisning</h2>
<p>Denna sida beskriver hur AI används för uppgifen och vilket/vilka verktyg som används.</p>

<h3>AI-verktyg</h3>
<p><a href="https://claude.ai/">Claude.ai</a> har använts som handledare och kodstöd för denna uppgift</p>

<h3>Hur AI använts</h3>
<p>Jag promptade Claude.ai där jag bad om guidning för att bygga en applikation med OOP-PHP, MySQL och XAMPP. Skickade även med information att jag läser en kurs i PHP och tidigare har läst kurser i HTML, CSS, Javascript och Typescript.</p>
<p>AI levererade en guide i flera steg, förslag att arbeta i mindre testbara steg med ordningsförslag, förslag på mappstruktur och klassuppdelning samt förslag på eventuell fördjupning.</p>
<p>Jag använde underlaget från AI som grund och kombinerade det med kursmaterial för att testa olika lösningar för tex databasanslutningar.</p>
<blockquote><strong>Prompt:</strong> Jag läser en kurs i php och önskar guidning för att lära mig php genom att bygga en applikation med objektorienterad php. applikationen ska ha anslutning till en sql databas. data ska läsas in från formulär, läggas till och raderas i databasen. jag har tidigare läst: html, css, javascript, typescript. XAMPP kommer användas.
    applikationen ska ha tre undersidor: startsida, bucketlist och ai.</blockquote>

<h3>Utvärdering och reflektion</h3>
<p>Det är en ny värld att sätta sig in i och det var ett annorlunda sätt att lära sig på jämfört vad jag är van vid. Jag märkte relativt snabbt att även fast PHP är ett nytt språk så kunde jag lätt förstå koden. Något jag tyckte gav mig bra stöd var att AIn presenterade skillnaderna och jämförde PHP med Javascript/Typescript.</p>
<p>Överlag tyckte jag det fungerade bra med att använda AI-stöd. Jag har lärt mig mycket av grunderna i PHP, fått träna på OOP och fått läsa kod som jag granskat och testat för att slutligen skapat en fungerande applikation.</p>
<?php
include("includes/footer.php");
?>