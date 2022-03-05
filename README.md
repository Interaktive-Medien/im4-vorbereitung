#  Das 9️⃣ Schritte Theme
`Frühjahrssemester 2022 - IM4 - Vorbereitung Wordpress`

---

Als Vorbereitung auf den Wordpress-Kurs in IM4 wird mit diesem Tutorial ein erstes Mal ein sehr einfaches eigenes Wordpress-Theme erstellt. 
Für dieses Tutorial wird vorausgesetzt, dass du schon einmal mit dem Backend Wordpress gearbeitet hast. 

Damit ihr wirklich von diesem Tutorial profitiert, solltet ihr euch mindestens zwei Stunden Zeit dafür nehmen. 
Ihr könnt das Tutorial hier in Textform durcharbeiten oder als Video, welcher unter diesem Link zu finden ist.

Viel Spass 🎉

---

## 🍽️ 01 - Das Mise en Place
Wir beginnen wie beim Kochen und machen ein Mise-en-place. Sprich: Wir bauen uns unsere Entwicklungsumgebung auf. Die Zutaten, die wir brauchen, sind folgende:

| Was                          | Link                                          |
|------------------------------|-----------------------------------------------|
| Den Code-Editor Atom         | https://atom.io                               |
| Webserver der FHGR           | https://my.fh-htwchur.ch/index.php?id=ftpstud |
| WordPress-Installationsdatei | https://de.wordpress.org/download/            |

---

## 💻 02 - Die Installation
Setze zuerst eine neue Umgebung auf dem Schulserver auf. Wichtig: **Eine Datenbank wird benötigt**. 
Lade dann alle Dateien der entzippten Wordpress-Installationsdatei in's Verzeichnis `web` des Servers. Wichtig hier: **Lade nicht den Ordner `wordpress` hoch, sondern alle sich darin befindenden Dateien. 

Sobald alles hochgeladen ist, kannst du die Webseite öffnen und dem Installationsassistenten folgen. 

---

## 🧥 03 - Das Theme
Du hast im Moment das Standarttheme von WordPress auf deiner Webseite installiert. Genau das wollen wir jetzt ändern, denn wir wollen im Anschluss ein eigenes, 100% individualisierbares Theme erstellen.
Nimm deshalb folgende Schritte vor: 
- Erstelle lokal auf deinem Gerät einen Ordner `neunschrittetheme` 
- Erstelle auch auf dem Server unter `web/wp-content/themes/` eine Ordner mit dem Namen `neunschrittetheme`
- Öffne den lokal gespeicherten Ordner im Atom und erstelle zwei Dateien: `index.php` und `style.css`

Um ein funktionierendes Wordpress-Theme zu erstellen, werden mindestens diese zwei Dateien vorausgesetzt.  

Kopiere in die Datei `index.php` folgenden Code rein. Der gibt die HTML-Grundstrukturen des Themes vor.
<details>
<summary>HTML Kopiervorlage</summary>

```html
<!DOCTYPE html>
<html lang="de-CH" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Das neun Schritte Theme</title>
</head>
<body>
<header>
    <h1>Das neun Schritte Theme</h1>
    <p>Slogan</p>
    <nav>
        <ul>
            <li>Das ist ein Navigationspunkt</li>
            <li>Das ebenfalls</li>
        </ul>
    </nav>
</header>
<main>
    <article>
        <p>Hier kommt der Hauptinhalt</p>
    </article>
</main>
<footer>
    <p>© Lea Moser - März 2022</p>
</footer>
</body>
</html>
```
</details>

In der Datei CSS gibst du folgende Definitionen an:
```css
/*
Theme Name: Neun Schritte Theme
Author: Lea Moser
Author URI: https://www.lea-moser.ch/
Description: FS22 Vorbereitung Wordpress Kurs Mai 2022
Version: 1.0
*/
```
Alle Dinge die nach mir benannt sind, kannst und sollst du natürlich umbenennen :) Wenn du das gemacht hast, hast du eigentlisch schon ein erstes, eigenes Wordpress-Theme erstellt. 

---

## 👓 04 - Der erste Blick
Auf deiner WordPress-Seite hat sich nun natürlich noch nichts geändert. 
Dafür musst du zuerst dein eigenes, soeben erstelltes, Theme hochladen und aktivieren. 

---

### ⬆️ 04.1 - Hochladen
Für's wird das Package Remote FTP genutzt. Klicke im Atom folgendes: `packages/Remote FTP/Create FTP config file`. 
In diesem File berarbeitest du nun folgende vier Zeilen: 
```json
{
  "host": "web1.fh-htwchur.ch",
  "user": "dein_username",
  "pass": "dein_password",
  "remote": "/web/wp-content/themes/neunschrittetheme/"
}
```
Wähle anschliessend `packages/Remote FTP/toggle`, klicke dann auf den neuen Remote-Tab und wähle `Connect`.
Wenn das klappt, kannst du anschliessend auf `Project` klicken, alle Dateien anwählen und mit Rechtsklick `Sync local -> remote` auf den Server laden.

### ▶️ 04.2 - Aktivieren
Wenn das hochladen klappt, muss das Theme aktiviert werden. Das machst du im Backend unter dem Punkt Appearance/Themes. 
Wenn du dort drauf gehst sollte nun dein Theme erscheinen. 
Unten sollte sich ein Button finden, mit dem du das Theme aktivieren kannst. 
Wenn du die Seite auf dem Webserver neu lädst (ev. mit SHIFT und dem Refresh-Pfeil) erscheint nun die Webseite mit deinem eigenen Theme.

---

## 👯‍♂️ 05 - Die Dynamik
Bis jetzt kann unser Theme nichts. 
Also wirklich nichts 🙂 Aber das ändert sich bald, denn wir fügen nun einige Dinge ein, die das Theme dynamischer machen und mit dem Backend zusammenspielen lassen.

### 🧑‍🦲 05.1 - Seitentitel und Slogan
Wir wollen, dass im `h1` im Header der im Backend definierte Seitentitel für unsere Webseite ausgegeben wird. 
Dieser soll sich, wenn wir im Backend den Namen ändern, auch anpassen. 
Dafür löschst du den Inhalt zwischen den `h1` raus und ersetzt ihn durch diesen:
```injectablephp
<?php bloginfo('name') ;?>
```
Füge dasselbe Snippet auch im Head zwischen die `title`-Tags ein. 
Zwischen den p-Tag im Header wo der Slogan hin soll fügst du folgendes Snippet:
```injectablephp
<?php bloginfo('description') ;?>
```
Wenn du die `index.php`-Datei abgespeichert hast, kannst du im Backend unter Einstellungen nun den Titel und den Untertitel ändern. 
Dieser wird sich auf der Webseite nun automatisch anpassen.
### 🖌️ 05.2 - Stylesheet
Die `style.css`-Datei hast du ja ganz zu Beginn schon erstellt. Doch darin sind bisher nur die Angaben zum Theme gemacht worden, 
die Webseite ist noh ungestylt. Mit folgendem Tag im head kannst du das Stylesheet mit `index.php` verknüpfen.
```html
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url') ;?>">
```
Füge in die Datei `style.css` nun folgende Zeilen ein. 
Wenn du dann dein eigenes Theme schreibst musst du diese Datei natürlich selbst schreiben, aber damit du dich hier nur auf die Funtkionalitäten von WordPress konzentrieren kannst, 
habe ich das CSS schon vorgeschrieben.
<details>
<summary>Kopiervorlage CS</summary>

```css
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

/* --- Grundlagen */
* {
    margin: 0 0;
    box-sizing: border-box;
    letter-spacing: 0.5px;
    line-height: 1.4;
    font-family: Poppins, sans-serif;
}

body {
    width: 100%;
    background-color: white;
    overflow-x: hidden;
}

/* --- Header */
header h1{
    font-size: 3rem;
    font-weight: 700;
    text-align: center;
}

header p,
header nav {
    font-size: 1.1rem;
    font-weight: 300;
    text-align: center;
}

header {
    background: linear-gradient(0deg, orange 0%, darkorange 100%);
    color: white;
    padding-top: 40px;
    width: 100%;
}

header a {
    color: white;
    text-decoration: none;
}

header a:hover {
    opacity: 0.5;
}

header nav {
    margin-top: 40px;
    background-color: darkorange;
    padding: 40px 0;
}

header nav ul {
    list-style-type: none;
    padding-left: 0px;
}

header nav li {
    display: inline;
}

header nav li:not(:last-of-type)::after {
    content: " | ";
}

/* --- Main */
main {
    width: 50vw;
    padding: 100px 0;
    margin: 0 auto;
    min-height: 60vh;
    color: #3a3a3a;
}

main h2 {
    font-size: 2.5rem;
    padding-top: 20px;
}

main h4 {
    color: orange;
}

main p {
    font-size: 1.2rem;
    line-height: 140%;
    margin: 15px 0;
}
main a {
  font-size: 1.2rem;
  line-height: 140%;
  color: darkorange;
  display: inline-block;
}
main a:hover {
  text-decoration: none;
}

/* --- Footer */

footer {
    padding: 40px 0;
    text-align: center;
    background-color: #3a3a3a;
    color: white;
}
```
</details>

Und voila, jetzt sieht deine Webseite auch schon schön aus 🙂

### 🔗 05.3 - Logo / Titel verlinken
Damit man wenn man auf Unterseiten ist mit einem Klick auf das Logo (bei uns jetzt einfach der Seitentitel) immer zurück auf die Startseite kommt, 
müssen wir diesen Titel dynamisch mit der Startseite verlinken. 
Das machen wir, indem wir in den `h1`-Tag folgendes einfügen:
```html
<a href="<?php echo home_url('/') ;?>">
    <?php bloginfo('name') ;?>
</a>
```
Dein Logo (oder in diesem Fall Titel) verweis jetzt immer auf die Startseite, 
auch wenn du diese im Verlauf der Erstellung deines Themes änderst.

### 📢 05.4 - Unterstützdende Tags
Die nachfolgenden Angaben sind extrem wichtig! 
Sie verändern auf den ersten Blick nicht viel, sind aber für die Funktionalität essentiell! 
Das einzige was du auf den ersten Blick als Veränderung erkennst, ist die Bearbeitungsleiste die dir dann angezeigt wird.

Ändere den `body`-Tag so ab:
```html
<body <?php body_class() ;?>>
```
Füge vor den schliessenden `head`-Tag folgendes ein:
```injectablephp
<?php wp_head() ;?>
```
Füge vor dem schliessenden `body`-Tag folgendes ein:
```injectablephp
<?php wp_footer() ;?>
```
Et voila, nun hast du dein Theme zum ersten Mal etwas dynamischer gemacht 🙂

---

## ✂️ 06 - Das Zerstückeln
Eine Webseite ist ja meistens so aufgebaut, dass sie auf der ganzen Seite immer denselben Header und denselben Footer hat. 
Genau dafür sorgen wir jetzt, in dem wir unser Theme «zerstückeln».

Erstelle eine Datei namens `header.php` und eine namens `footer.php`.
Nun schneidest du alle Inhalte aus `index.php` bis und mit öffnendem `main`-Tag aus und fügst alles in die Datei `header.php` ein. 
Danach schneidest du alles ab dem schliessenden `main`-Tag aus und fügst es in die Datei `footer.php` ein.

Jetzt speicherst du alle Dateien mal ab. In einem Nächsten Schritt musst du die Teile die du entfernt hast wieder einfügen. 
Das geschieht mit den Template-Iclude-Tags.

Zuoberst in der Datei `index.php` fügts du folgendes ein:
```injectablephp
<?php get_header(); ?>
```
Und zuuntest das:
```injectablephp
<?php get_footer(); ?>
```
Wenn du die Seite aktualisierst, sollte sich nun nichts verändert haben. Das ist aber gut so 🙂

---

## 🧭 07 - Die Navigation
Nun fügen wir eine Navigation ein, die nachher im frei Backend anpassbar ist. Dafür müssen zwei Dinge getan werden:

1. Die Navigation muss im Backend registriert werden.
2. Der Navigation muss im Frontend ein Platz zugewiesen werden.

Doch beginnen wir zuoberst. Zu Beginn muss eine neue Datei erstellt werden, `functions.php`. 
Diese würde, wenn das Theme anschliessend an diese neun Schritte weiter optimiert würde, sehr häufig gebraucht werden. 
In diese Datei fügst du nun dieses Schnipsel ein:
```injectablephp
<?php
    add_action('after_setup_theme', 'navigation_registrieren');
    function navigation_registrieren(){
        register_nav_menu('hauptnavigation', 'Hauptnavigation oben');
    };
?>
```
Einige Begriffe aus der Funktion die du nun eingefügst hab, erkläre ich kurz:

| Befehl              | Definition                                                                                                                                                   |
|---------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `add_action`        | Mit diesem Befehl definierst du, wann die Funktion aufgerufen werden soll.                                                                                   |
| `after_setup_theme` | Mit diesem Befehl sagst du, dass die Funktion durchgeführt werden soll, nachdem das Theme geladen ist.                                                       |
| `register_nav_menu` | Dieser Befehl registriert nachher deine Navigation.                                                                                                          |
| `hauptnavigation`   | Das ist der Name, der die Navigation erhält. Wenn du diese Navigation nachher platzieren willst, brauchst du diesen Namen. Du kannst diesen beliebig wählen. |
| `Navigation oben`   | So wird deine Navigation im Backend benannt.                                                                                                                 |

Wenn du nun alles speicherst und das Backend neu lädst sollte unter dem Punkt Design der Punkt „Menus“ erscheinen. 
Dort kannst du deine Navigation nun mal erfassen. 
Füge dazu einfach mal die Startseite als Beispielseite ein.

Wenn du das Frontend nachher aktualisierst, wirst du noch nichts sehen. 
Das, weil wir den Ort für diese Navigation noch nicht bestummen haben. 
Das machen wir jetzt, und zwar in dem wir das folgende Codeschnipsel zwischen die `nav`-Tags einfügen.
```injectablephp
<?php wp_nav_menu(array('theme_location' => 'hauptnavigation')) ;?>
```
Du siehst, dass wir nun den Namen den wir der Navigation gegeben haben, hier auch angeben mussten. So wird der Code von vorher zugewiesen. 
Nach einem Refresh sollte dir jetzt die Startseite als Navigationspunkt angezeigt werden.

---

## 🫀 08 - Das Query aka. das Herzstück aka. der Loop
Bevor wir mit dem achten Schritt beginnen, musst du Testinhalte erstellen.

- `page` -> Impressum
- `page` -> About Us
- `post` -> Hallo Welt! (sollte schon bestehen)
- `post` -> Hallo another Welt!

Fülle diese Posts mit Dummycontent und füge die Seiten `Impressum` und `About Us` in die Navigation ein.
Wenn jetzt auf einen dieser Menupunkte geklickt wird, wechselt sich zwar die URL,
aber der definierte Inhalt wird nicht angezeigt. Das ändern wir jetzt. 

Füge in der Datei `index.php` zwischen die `article`-Tags folgendes Snippet ein:
```injectablephp
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title() ?></h2>
    <p><?php the_content() ?></p>
<?php endwhile; else : ?>
    <p>Es können keine Posts geladen werden.</p>
<?php endif; ?>
```
Diese Codezeilen, bzw. die if-while-else-Anweisung, ist der sogenannte Loop, der macht, dass auf der Seite die richtigen Inhalte angezeit werden.

Die zwei Tags `the_title()` und `the_content()` sind sogenannte Template-Tags. 
Solche Template-Tags gibt es unendlich viele, so können beispielsweise auch der Autor, das Veröffentlichungsdatum des Beitrags, etc. ausgegeben werden.

Wenn jetzt auf die verschiedenen Seiten (z.B. Impressum) geschaut wird, wird dort der definierte Inhalt angezeigt. 
Auf der Startseite wird der gesamte Inhalt beider Blogbeiträge angezeigt. Das ist eher unschön. 
Für das braucht es den letzten Schritt.

---

## 📑 09 - Das Splitting

Jetzt kommt noch der finale Schritt, der fehlt, um das Theme abzuschliessen. 
Wir erstellen nämlich für die verschiedenen Beitragstypen eigene Ansichten. 
Und zwar für:

| Dateiname         | Beschreibung                                                                                 |
|-------------------|----------------------------------------------------------------------------------------------|
| `page.php`        | Seiten/Pages. Meist für statische Seiten wie z.B. Impressum, Kontakt oder Portfolio genutzt. |
| `single.php`      | Beiträge/Posts. Meist für dynamische Inhalte gebraucht.                                      |
| `front-page.php`  | Startseite                                                                                   |

Es gäbe noch weitere dieser Seitentypen (z.b. archive.php, date.php, etc.). 
Eine Übersicht und deren Hierarchien (also wann welcher Seitentyp verwendet wird), findest du unter dieser Webseite.

Erstelle nun zuerst mal die drei oben aufgelisteten Dateien.

- `page.php`
- `single.php`
- `front-page.php`

Kopiere in alle diese den Inhalt von `index.php` rein. 
Füge aber auf der zweite Linie jeweils eine Markierung ein,
um welche Datei es sich handelt. So etwa: 
```html
<mark>front-page.php</mark>
```
Für page.php und single.php schreibst du natürlich die entsprechenden Namen zwischen die Mark-Klammern.

Wenn du anschliessend alles Abspeicherst und dich durch die Seiten und Beiträge klickst, 
siehst du dass für unteschiedliche Sachen unterschiedliche Templates verwedent werden. 
Das können wir uns jetzt zu Nutzen machen! 🙂

Wir nehmen nu folgende Änderungen vor: 

- `front-page.php` -> Zwischen den `p`-Tags geben wir anstatt dem content neu folgendes aus
```html
<?php the_excerpt() ?>
```
- `front-page.php` -> Nach dem `p`-Tag geben wir noch einen Link aus
```html
  <a href="<?php the_permalink() ?>">mehr lesen</a>
```
- `single.php` -> Wir geben bei den Beiträgen zusätzlich zum Inhalt auch Autor und Datum aus
```html
 <h4><?php the_author() ;?>,<?php the_time('d.m.Y') ;?></h4>
```
- `Backend Benutzter`: Damit der Autorenname korrekt angezeigt wird, kann man beim Benutzer das Feld **öffentlicher Name** angepasst werden.

Zum Abschluss können jetzt die `mark`-Tags wieder entfernt werden :)

# Das war's 🥳
Du hast dein erstes eigenes Theme geschrieben.
Im Verlaufe der IM4-Woche zu Wordpress wird dein Wissen in diesem Bereich noch erweitert. 

Bis dahin eine gute Zeit 🥂

