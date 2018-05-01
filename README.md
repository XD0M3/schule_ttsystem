# Schulprojekt - Abgabe 01.05.2018

**Ersteller**
Dominik 'XD0M3' Grünberger

# Website
Wollen sie es sich ansehen:
[XD0M3's Website](https://xd0m3.eu/schulprojekt/)

# Funktionen
1. Regrestrieren (Ohne Email Abfrage)
* Password wird mit dem BCRYPT gehashed.
* Eine Random User ID wird vergeben
* Und danach wird der User gespeichert.
2. Login (Password wird gehashed und mit dem Hash verglichen)
* Email wird in der Datenbank gesucht.
* Password gehashed und verglichen
3. Ticket erstellen
4. Ticket antworten
* Als Admin aknnst du es auch schließen
* Als User kannst du normal antworten
5. Alle Ticket lassen sich als Admin anzeigen
6. User kann alle seine Tickets einsehen.
* Die von anderen Usern nicht.

# Datenbases

Leider sind die Datenbanke nicht ganz so geworden, wie ich es wollte, aber ein Projekt lebt mit seinem Ersteller :)

## Logins (Example)
|**Userid**|**Email**|**Name**|**Hashed PW**|
|---|---|---|---|
| 193107 | kainz@kaint.at            | Felix Kainz         | $2y$10$7kd1zkd8Hf3C5ICgBM8Y3udIFhJnWX0jhT2Gj9c7BG13rBh8FJCXa |
| 357405 | abc@abc.de                | Max Mustermann      | $2y$10$28Ehx0pqr5o2d/PkwQ1oJ.hisEhA2btFoGJpUOQdTXi3oTuaj16gC |
| 474512 | abcd@gmail.com            | ivan                | $2y$10$iRyw96h/3zTi.pwMiQx64OFj3W4ns2OilYxJ9BWY04Vx7ZJWBWQRy |
| 524106 | dominik@gruenberger.co.at | Dominik Grünberger  | $2y$10$WM4rTehjvZZkBmN8PYGaW.g2wpdFXraSmsT2UBK8RKEvpAQteg/OG |
| 672869 | test@test.de              | test test           | $2y$10$FRZ4QplOBYOClEFHGkWqnOjhefIfZ5fZAKtOtH4gX51UZOGn1MmkW |
| 712696 | test@test.de              | Test Test           | $2y$10$uxX5keX2a5L.PdgNyIVj4.Wuo3IHuH459eDhbrxO4r2gdKkb66yZa |
| 743347 | ichhabka@hotmail.com      | Dominik GrUEnberger | $2y$10$Tw.3s7R0bPq0Pby2qWvCf.FDJOJ/waP32cSeAydQjCzg3Acm.84r6 |
| 761523 | aut.visualroam@gmail.com  | Dominik Grünberger  | $2y$10$tLPQ1Horye4ulEPpehRcfOoKAdbAaFOQRf2KAOnYccR/kZ9qL0HKC |

## Admins (Example)
|**Admin ID**|**Userid**|**Name**|
|---|---|---|
|     4637 |  672869 | test test      |
|     4738 |  357405 | Max Mustermann |

# Kontakt

Bei fragen einfach an mich, entweder in der Schule oder per email an
[@xd0m3](mailto:xd0m3@staff.eslgaming.com)
oder
[@dominik](mailto:grunbergerdominik@gmail.com)
