create table admins
(
  admin_id int          not null
    primary key,
  user_id  int          null,
  name     varchar(128) null
);

create table logins
(
  id       int          not null
    primary key,
  email    varchar(128) null,
  name     varchar(128) null,
  password varchar(128) null
);

create table tickets
(
  support_id int                                 not null
    primary key,
  subject    text                                null,
  creator    int                                 null,
  ort        text                                null,
  art        varchar(10)                         null,
  content    text                                null,
  answers    text                                null,
  locked     varchar(1)                          null,
  locked_by  int                                 null,
  created    timestamp default CURRENT_TIMESTAMP not null
  on update CURRENT_TIMESTAMP,
  closed     varchar(1)                          null
);

INSERT INTO ttsystem.admins (admin_id, user_id, name) VALUES (4637, 672869, 'test test');
INSERT INTO ttsystem.admins (admin_id, user_id, name) VALUES (4738, 357405, 'Max Mustermann');

INSERT INTO ttsystem.logins (id, email, name, password) VALUES (156534, 'aldi.@deutschland.at', '30.märz', '$2y$10$C4h2cPExOWxH4g10/AeL1.XH9AMVA/CkhTql9iF0pTQPrkFOgCh.6');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (193107, 'kainz@kaint.at', 'Felix Kainz', '$2y$10$7kd1zkd8Hf3C5ICgBM8Y3udIFhJnWX0jhT2Gj9c7BG13rBh8FJCXa');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (357405, 'abc@abc.de', 'Max Mustermann', '$2y$10$28Ehx0pqr5o2d/PkwQ1oJ.hisEhA2btFoGJpUOQdTXi3oTuaj16gC');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (474512, 'abcd@gmail.com', 'ivan', '$2y$10$iRyw96h/3zTi.pwMiQx64OFj3W4ns2OilYxJ9BWY04Vx7ZJWBWQRy');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (524106, 'dominik@gruenberger.co.at', 'Dominik Grünberger', '$2y$10$WM4rTehjvZZkBmN8PYGaW.g2wpdFXraSmsT2UBK8RKEvpAQteg/OG');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (532859, 'yuzi@ficker.com', 'Mac mustermann', '$2y$10$c3uKPGCDIH4/AfjE4mpa..0U30L3aVmaodZ98l8IkYnqeH7fxQve6');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (672869, 'test@test.de', 'test test', '$2y$10$FRZ4QplOBYOClEFHGkWqnOjhefIfZ5fZAKtOtH4gX51UZOGn1MmkW');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (712696, 'test@test.de', 'Test Test', '$2y$10$uxX5keX2a5L.PdgNyIVj4.Wuo3IHuH459eDhbrxO4r2gdKkb66yZa');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (743347, 'ichhabka@hotmail.com', 'Dominik GrUEnberger', '$2y$10$Tw.3s7R0bPq0Pby2qWvCf.FDJOJ/waP32cSeAydQjCzg3Acm.84r6');
INSERT INTO ttsystem.logins (id, email, name, password) VALUES (761523, 'aut.visualroam@gmail.com', 'Dominik Grünberger', '$2y$10$tLPQ1Horye4ulEPpehRcfOoKAdbAaFOQRf2KAOnYccR/kZ9qL0HKC');

INSERT INTO ttsystem.tickets (support_id, subject, creator, ort, art, content, answers, locked, locked_by, created, closed) VALUES (3696521, 'testst', 357405, 'ss', 'drpc', 'tteets', '["","Ticket wird geschlossen!"]', 'N', null, '2018-04-05 08:45:35', 'Y');
INSERT INTO ttsystem.tickets (support_id, subject, creator, ort, art, content, answers, locked, locked_by, created, closed) VALUES (9438472, 'Hiast du Schwuchtel gib Ticket', 743347, 'Hollabrunn', 'anderes', 'Gib Ticketz heaast i Brauch des', '[]', 'N', 357405, '2018-04-17 10:31:46', 'N');
