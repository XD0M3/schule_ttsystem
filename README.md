# Schulprojekt - Abgabe 01.05.2018

# Website
Wollen sie es sich ansehen:
[XD0M3's Website](https://xd0m3.eu/schulprojekt/)

# Funktionen
1. Regrestrieren (Ohne Email Abfrage)
..* Password wird mit dem BCRYPT gehashed.
..* Eine Random User ID wird vergeben
..* Und danach wird der User gespeichert.
2. Login (Password wird gehashed und mit dem Hash verglichen)
..* Email wird in der Datenbank gesucht.
..* Password gehashed und verglichen
3. Ticket erstellen
4. Ticket antworten
..* Als Admin aknnst du es auch schließen
..* Als User kannst du normal antworten
5. Alle Ticket lassen sich als Admin anzeigen
6. User kann alle seine Tickets einsehen.
..* Die von anderen Usern nicht.

# Datenbases

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

## Tickets (Example)
|    3696521 | testst                         |  357405 | ss         | drpc    | tteets                                  | ["","Ticket wird geschlossen!"]                                                                                                                                             | N      |      NULL | 2018-04-05 08:45:35 | Y      |
|    4275914 | Test                           |  357405 | test 2tt   | drpc    | ss

s
s

s
s                      | [""]                                                                                                                                                                        | N      |      NULL | 2018-04-17 08:40:38 | Y      |
|    5149543 | du bist scheise                |  743347 | Hollabrunn | werk    | Was soll diese. du nix gute. du schaisn | ["fhgf","herst du zigeuna
","Gib mir ticket herst
","Wos is herst","Hallo Dominik GrUEnberger,

Ticket abgeschlossen

Best regards,
XD0M3","Jetzt aber wirklich :D"] | N      |    357405 | 2018-04-17 10:47:15 | Y      |
|    6629397 | Jdkdkek                        |  357405 | Keldkel    | anderes | Jekekekwlmfbfnenen                      | ["Hallo","Test","Op","Is it still working?","Hallo?","Antwortet mir auch einmal wer?","Hallooooooooooooooooooooo?"]                                                         | N      |      NULL | 2018-04-17 08:56:01 | N      |
|    9438472 | Hiast du Schwuchtel gib Ticket |  743347 | Hollabrunn | anderes | Gib Ticketz heaast i Brauch des         | []                                                                                                                                                                          | N      |    357405 | 2018-04-17 10:31:46 | N      |


# Kontakt

Bei fragen einfach an mich, entweder in der Schule oder per email an
[@xd0m3](mailto:xd0m3@staff.eslgaming.com)
oder
[@dominik](mailto:grunbergerdominik@gmail.com)
