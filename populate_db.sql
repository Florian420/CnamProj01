USE quiz;

/* Modules */
INSERT INTO module(mod_level, mod_title, mod_name, mod_desc) VALUES (7, "Retro-Ingénierie (RCE)",  "mod_itsec", "Module de cybersécurité axé sur la rétro-ingénierie de code (RCE)");
INSERT INTO module(mod_level, mod_title, mod_name, mod_desc) VALUES (5, "Mécanique Automobile", "mod_mecanics", "Testez vos connaissances sur la mécanique auto !");

/* Questions RCE */
INSERT INTO question(mod_id, q_text) VALUES (1, "Que siginifie le terme PEB ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Quel est le nom du registre qui pointe sur la pile sur processeur x86 ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Que contient le segment .text ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Quel est le role du registre EIP ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Quelle est la version 'safe' de la fonction C strcpy ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Quelle interuption correspond à l'éxécution d'un appel système en asm x86 ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Laquelle de ces opcode ne fait rien ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Dans lequel de ces segments sont stockés les variables allouées dynamiquement (malloc/calloc) ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Par quelles lettres de l'entête peut-on reconnaitre un fichier PE ?");
INSERT INTO question(mod_id, q_text) VALUES (1, "Quel est le nom du format de fichier éxécutable sous GNU/Linux ?");

/* Suggestions IT sec */
INSERT INTO suggestion(q_id, sug_text) VALUES (1, "Primary Environment Batch");
INSERT INTO suggestion(q_id, sug_text) VALUES (1, "Process Environment Block");
INSERT INTO suggestion(q_id, sug_text) VALUES (1, "Post Execution Block");
INSERT INTO suggestion(q_id, sug_text) VALUES (1, "PE Execution Block");

INSERT INTO suggestion(q_id, sug_text) VALUES (2, "EIP");
INSERT INTO suggestion(q_id, sug_text) VALUES (2, "ESP");
INSERT INTO suggestion(q_id, sug_text) VALUES (2, "EAX");
INSERT INTO suggestion(q_id, sug_text) VALUES (2, "EBX");

INSERT INTO suggestion(q_id, sug_text) VALUES (3, "Le code de l'application");
INSERT INTO suggestion(q_id, sug_text) VALUES (3, "Les données de l'application");
INSERT INTO suggestion(q_id, sug_text) VALUES (3, "Les ressources de l'application");
INSERT INTO suggestion(q_id, sug_text) VALUES (3, "L'entête de l'application");

INSERT INTO suggestion(q_id, sug_text) VALUES (4, "Il pointe sur la base de la pile d'éxécution");
INSERT INTO suggestion(q_id, sug_text) VALUES (4, "C'est un registre qui permet de manipuler les chaines de caracètres");
INSERT INTO suggestion(q_id, sug_text) VALUES (4, "Il pointe sur la prochaine instruction à éxécuter");
INSERT INTO suggestion(q_id, sug_text) VALUES (4, "Il est réservé au système");

INSERT INTO suggestion(q_id, sug_text) VALUES (5, "strcpyn");
INSERT INTO suggestion(q_id, sug_text) VALUES (5, "nstrcpy");
INSERT INTO suggestion(q_id, sug_text) VALUES (5, "strncpy");
INSERT INTO suggestion(q_id, sug_text) VALUES (5, "n_strcpy");

INSERT INTO suggestion(q_id, sug_text) VALUES (6, "int 0x70");
INSERT INTO suggestion(q_id, sug_text) VALUES (6, "int 0x80");
INSERT INTO suggestion(q_id, sug_text) VALUES (6, "int 0x40");
INSERT INTO suggestion(q_id, sug_text) VALUES (6, "int 3");

INSERT INTO suggestion(q_id, sug_text) VALUES (7, "nop");
INSERT INTO suggestion(q_id, sug_text) VALUES (7, "lea");
INSERT INTO suggestion(q_id, sug_text) VALUES (7, "shl");
INSERT INTO suggestion(q_id, sug_text) VALUES (7, "jnz");

INSERT INTO suggestion(q_id, sug_text) VALUES (8, "bss");
INSERT INTO suggestion(q_id, sug_text) VALUES (8, "data");
INSERT INTO suggestion(q_id, sug_text) VALUES (8, "rsrc");
INSERT INTO suggestion(q_id, sug_text) VALUES (8, "heap");

INSERT INTO suggestion(q_id, sug_text) VALUES (9, "PE");
INSERT INTO suggestion(q_id, sug_text) VALUES (9, "MZ");
INSERT INTO suggestion(q_id, sug_text) VALUES (9, "MS");
INSERT INTO suggestion(q_id, sug_text) VALUES (9, "EP");

INSERT INTO suggestion(q_id, sug_text) VALUES (10, "mach-o");
INSERT INTO suggestion(q_id, sug_text) VALUES (10, "exe");
INSERT INTO suggestion(q_id, sug_text) VALUES (10, "nix");
INSERT INTO suggestion(q_id, sug_text) VALUES (10, "elf");

/* Answers IT sec */
INSERT INTO answer(q_id, sug_id) VALUES(1, 2);
INSERT INTO answer(q_id, sug_id) VALUES(2, 6);
INSERT INTO answer(q_id, sug_id) VALUES(3, 9);
INSERT INTO answer(q_id, sug_id) VALUES(4, 15);
INSERT INTO answer(q_id, sug_id) VALUES(5, 19);
INSERT INTO answer(q_id, sug_id) VALUES(6, 22);
INSERT INTO answer(q_id, sug_id) VALUES(7, 25);
INSERT INTO answer(q_id, sug_id) VALUES(8, 32);
INSERT INTO answer(q_id, sug_id) VALUES(9, 34);
INSERT INTO answer(q_id, sug_id) VALUES(10, 40);

/* Question mecanics */
INSERT INTO question(mod_id, q_text) VALUES (2, "Que signifie le terme ECU ?");
INSERT INTO question(mod_id, q_text) VALUES (2, "Dans quel mode se trouve un moteur au démarrage ?");
INSERT INTO question(mod_id, q_text) VALUES (2, "Qu'est-ce que l'AFR ?");
INSERT INTO question(mod_id, q_text) VALUES (2, "Quelle sonde lambda permet de meilleurs AFR et performances moteur ?");
INSERT INTO question(mod_id, q_text) VALUES (2, "Quel est le mélange stoechiométrique de l'essence ?");

/* Suggestion mecanics */
INSERT INTO suggestion(q_id, sug_text) VALUES (11, "Electronic Control Unit");
INSERT INTO suggestion(q_id, sug_text) VALUES (11, "Engine Control Unit");
INSERT INTO suggestion(q_id, sug_text) VALUES (11, "Electronic Catalyst Unit");
INSERT INTO suggestion(q_id, sug_text) VALUES (11, "Efficient Catback Unit");

INSERT INTO suggestion(q_id, sug_text) VALUES (12, "Closed Loop");
INSERT INTO suggestion(q_id, sug_text) VALUES (12, "Opened Loop");
INSERT INTO suggestion(q_id, sug_text) VALUES (12, "Middle Loop");
INSERT INTO suggestion(q_id, sug_text) VALUES (12, "State Loop");

INSERT INTO suggestion(q_id, sug_text) VALUES (13, "Le ratio Air/Essence");
INSERT INTO suggestion(q_id, sug_text) VALUES (13, "Le ration Air/Huile");
INSERT INTO suggestion(q_id, sug_text) VALUES (13, "Le ration Essence/Air");
INSERT INTO suggestion(q_id, sug_text) VALUES (13, "Le ration Huile/Essence");

INSERT INTO suggestion(q_id, sug_text) VALUES (14, "La sonde Bande Etroite");
INSERT INTO suggestion(q_id, sug_text) VALUES (14, "La sonde Bande Mince");
INSERT INTO suggestion(q_id, sug_text) VALUES (14, "La sonde Bande Longue");
INSERT INTO suggestion(q_id, sug_text) VALUES (14, "La sonde Bande Large");

INSERT INTO suggestion(q_id, sug_text) VALUES (15, "14.2");
INSERT INTO suggestion(q_id, sug_text) VALUES (15, "9.7");
INSERT INTO suggestion(q_id, sug_text) VALUES (15, "14.7");
INSERT INTO suggestion(q_id, sug_text) VALUES (15, "15.2");

/* Answers mecanics */
INSERT INTO answer(q_id, sug_id) VALUES(11, 42);
INSERT INTO answer(q_id, sug_id) VALUES(12, 45);
INSERT INTO answer(q_id, sug_id) VALUES(13, 49);
INSERT INTO answer(q_id, sug_id) VALUES(14, 56);
INSERT INTO answer(q_id, sug_id) VALUES(15, 59);
