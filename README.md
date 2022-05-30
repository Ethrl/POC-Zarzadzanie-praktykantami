# POC-Zarzadzanie-praktykantami
Aplikacja do zarządzania praktykantami
Projekt wykonany w PHP OOP;
  
  Kilka uwag dot. aplikacji:
  - Dodałem od siebie system rejestracji użytkownika (aby się zalogować i móc zarządzać studentami najpierw trzeba założyć konto) - mam nadzieję, że to trochę urozmaici aplikację; 
  - Dodałem również bibliotekę Bootstrap, aby wszystko wyglądało w miarę estetycznie.

Czego nie udało mi się zrobić:
  - Nie zaimplementowałem szablonów Smarty ani jakiegokolwiek innego. Próbowałem z Twigiem, ponieważ wydawał się łatwy w obsłudze i zautomatyzowany, ale lekko mnie to przerosło;
  - Nie potrafiłem zaimplementować funkcjonalnego input type="file" na żadnej ze stron, aby plik był przesyłany na stronę servera (wszystkie input type="file" są disabled, ponieważ nie działały);
  - W podstronie "edytuj studenta" nie potrafiłem pobrać z powrotem z bazy danych pola "hobby", ponieważ nie potrafiłem poprawnie zastosować funkcji explode() aby oddzielić hobby od przecinków (na stronie edycji studenta checkboxa dałem na "disabled", ponieważ nie działały);
  - Nie zaimplementowałem działającej funkcji "Wyślij email", ponieważ nie wiedziałem jak sobie z tym poradzić. Dodatkowo od 30 maja 2022 Google wyłączyło opcje "dostęp mniej bezpiecznym aplikacjom", co trochę zepsuło mi możliwość skonfigurowania SMTP;

