<?php
$pageTitle = 'Startsida';
include("includes/head.php");
include("includes/mainnav.php");
?>

<h2>Startsida</h2>
<p>Välkommen till min första webbapplikation skapad med PHP</p>

<h3>Uppgift för laboration 2</h3>
<p>Laboration 2 är en introduktion till PHP med målet att skapa en enklare webbplats med HTML, CSS och objektorienterad PHP samt databasanslutning.</p>
<p>Webbplatsen ska bestå av minst tre undersidor (startsida, Bucketlist och AI), en huvudmeny och ska lagra data i en MySQL-databas. På startsidan ska uppgiften beskrivas, PHP ska utvärderas och AI-sidan ska beskriva arbete med AI-verktyg.</p>
<p>På undersidan bucketlist ska en lista med saker man önskar göra finnas med namn, beskrivning, datum när den skapades och prioriteringsordning. Dessa ska lagras i databasen via formulär och det ska gå att radera från en i webbplatsen utskrivna listan.</p>
<h4>Syfte: </h4>
<ul>
    <li>Att förstå hur en logisk och lättjobbad filstruktur underlättar vid utveckling och underhåll av applikationer,</li>
    <li>Att förstå hur anslutningar till MySQL- eller MariaDB-databaser fungerar med olika tekniker i PHP,</li>
    <li>Att kunna skapa en eller flera klasser eller funktioner för att sköta databasanslutning och databehandling,</li>
    <li>Att läsa in data från formulär, spara och radera data som lagras i en databas,</li>
    <li>Att kunna använda några vanliga SQL-kommandon såsom SELECT, INSERT, UPDATE och DELETE,</li>
    <li>Prova på att använda AI-baserade verktyg för att underlätta och snabba på utvecklingsprocessen.</li>
</ul>
<h4>Funktionella krav för godkänt: </h4>
<ul>
    <li>att webbplatsen fungerar väl i olika enheter och innehåller minst tre undersidor och en huvudmeny,</li>
    <li>att det finns möjlighet att läsa ut, lägga till och radera saker i din bucketlist,</li>
    <li>att en databas med lämpliga tabeller har skapats, tillsammans med ett ER-digram som beskriver dess uppbyggnad,</li>
    <li>att din lösning är objektorienterad och beskrivs i ett klassdiagram (UML-diagram),</li>
    <li>att du har en lättarbetad och tydlig filstruktur för alla dokument och script på din webbplats,</li>
    <li>att all genererad HTML-kod validerar korrekt,</li>
    <li>att webbplatsen finns publicerad för testkörning samt att källkods-filer, export av databas/installations-skript har lämnats in,</li>
    <li>att din lösning är versionshanterad med en git-baserad webbtjänst med regelbundna commits och en README.md-fil som beskriver repot.</li>
</ul>

<h3>Reflektioner PHP</h3>
<p>Det har varit kul att få lära sig PHP! Språket har varit ganska lätt att ta till sig och att enkelt kunna skriva direkt tillsammans med HTML-koden för att hantera exempelvis forumälr upplever jag som en stor fördel med PHP. En fördel jag tycker PHP har är att det finns stöd för objektorienterad programmering.</p>
<p>En nackdel som jag upplevde med PHP var att det blev lite stökigt i koden när det blandades med HTML och i ett större projekt kan jag tänka mig att det kan bli ett problem. Det kändes då viktigt att försöka ha bra struktur så man senare kan hitta det man söker när man ska göra ändringar eller uppdateringar.</p>

<?php
include("includes/footer.php");
?>