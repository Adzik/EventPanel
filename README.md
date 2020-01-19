# EventPanel

Aplikacja napisana w języku PHP umożliwia tworzenie spisu wydarzeń i późniejsze parsowanie ich przy pomocy Json   
W pliku `config.php` znajdują się zmienne wykorzystywane do łączenia się z bazą danych   
Plik `eventpanel.sql` zawiera bazę danych do zaimportowania.

Login: TestUser   
Hasło: test

Obecnie działające funkcje to:   
- Dodawanie, usuwanie, edycja wydarzeń   
- Zarządzanie użytkownikami (Zmiana nicku, hasła, uprawnień)   
- Logowanie   
- Wylogowanie   

W pliku `Authorization.php` znajdują się wszystkie funkcje odpowiedzialne za zarządzanie użytkownikami. Logowanie, rejestracja, zmiana loginu oraz hasła, hashowanie hasła.
System uprawnień jest obecnie bardzo prosty (0 - Zablokowane konto, 1 - Wszystkie uprawnienia, 2 - Tylko zarządzanie wydarzeniami)

Skrypt będzie rozwijany


Wykorzystany front-end: https://www.egrappler.com/responsive-bootstrap-admin-template-edmin/
