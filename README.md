# CodeIgniter
Tämä sivusto syntyi, kun opettelin CodeIgniter-ohjelmistokehystä opintojani varten.

## Käytetyt ohjelmointikielet
HTML, CSS, PHP

### Ohjelmistokehys: CodeIgniter 3 (PHP)
### Tietokanta: SQL
## Koodit löytyvät tiedostoista, jotka ovat hakemistoissa:
### CodeIgniter/codeigniter/application/controllers
### CodeIgniter/codeigniter/application/models
### CodeIgniter/codeigniter/application/views
### Sivusto
* Home (Kotisivu)
* About (Tietoa)
* Blog (Blogi)
  * Posts (Postaukset)
  * Categories (Kategoriat)
  * Create Post (Uusi postaus) Vaatii kirjautumisen
  * Create Category (Uusi kategoria) Vaatii kirjautumisen
* Bug Tracker (Bugien seuranta)
  * Bugs (Bugit)
  * Bug categories (Bugi kategoriat)
  * Report a Bug (Ilmoita uusi bugi) Vaatii kirjautumisen
  * New Bug Category (Uusi bugi kategoria) Vaatii kirjautumisen

## Toiminnallisuus
* Käyttäjätilit
  * Rekisteröinti / Kirjautuminen
  * Käyttäjät tallennetaan SQL-pöytään

* Blogi
  * Käyttäjät voivat selata postauksia ja siirtyä katsomaan yksittäistä postausta tarkemmin
  * Käyttäjät voivat myös selata postauksia kategorian mukaan
  * Kirjautuneet käyttäjät voivat kommentoida postauksia
  * Kirjautuneet käyttäjät voivat antaa postauksille joko ylös tai alas ääneen. (Upvote / Downvote) Postauksen pisteet ovat näkyvissä kaikille. Yksittäinen käyttäjä voi antaa vain yhden äänen postausta kohden
  * Kirjautuneet käyttäjät voivat luoda oman postauksen tai kategorian
  * Kirjautunut käyttäjä voi poistaa tai muokata itse luomaansa postausta
  * Kirjautunut käyttäjä voi poistaa oman kommenttinsa
  * Postaukset, kategoriat, kommentit ja äänet tallennetaan erillisiin SQL-pöytiin

* Bugien seuranta
  * Käyttäjät voivat selata ilmoitettuja bugeja niiden kriittisyyden mukaan
  * Käyttäjät voivat siirtyä katsomaan bugin tietoja tarkemmin
  * Kirjautuneet käyttäjät voivat ilmoittaa uuden bugin tai luoda uuden kategorian bugeille
  * Kirjautunut käyttäjä voi poistaa tai muokata itse ilmoittamaansa bugia
  * Kirjautunut käyttäjä voi myös merkata itse ilmoittamansa bugin korjatuksi
  * Ilmoitetut bugit ja niiden kategoriat tallennetaan erillisiin SQL-pöytiin

