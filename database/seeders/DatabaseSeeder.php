<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $azerty =bcrypt('azerty');
        $nb_users = 50;
        for($i = 1; $i <= $nb_users; $i++)
            DB::table('users')->insert([
            'name' => "user$i",
            'email' => "user$i@gmail.com",
            'avatar_lien' => "link",
            'password' => $azerty,
        ]);

        DB::table('genres')->insert([
            'label' => "SF"
        ]);
        DB::table('genres')->insert([
            'label' => "Comics"
        ]);
        DB::table('genres')->insert([
            'label' => "Policier"
        ]);
        DB::table('genres')->insert([
            'label' => "Drame"
        ]);
        DB::table('genres')->insert([
            'label' => "Comédie"
        ]);

        DB::table('histoires')->insert([
            'titre' => 'z1 ou la vie d\'un demi-octet',
            'pitch' => "z1 n'a pas une vie très compliquée. Quelque soit la question, la réponse se limite à 0 ou 1. 
             En même temps, cela lui permet au mois de représenter des nombres en mode binaire. C'est déjà cela !",
            'photo'  => "/images/bit-1.webp",
            'user_id' => 1,
            'active'=>1,
            'genre_id'=>1
        ]);



        // A
        DB::table('chapitres')->insert([
            'titrecourt' => 'et 1',
            'texte' => "Aujourd'hui z1 ne sait pas trop quel nombre il va représenter. Tout dépend déjà de la première question.",
            'question'  => "Est-ce-qu'il fait beau aujourd'hui ?",
            'histoire_id'  => 1,
            'premier' => 1
        ]);

        // B
        DB::table('chapitres')->insert([
            'titrecourt' => 'et 2',
            'texte' => "Dommage, le ciel est gris. Mais ce n'est pas grave !. Aujourd'hui z1 représentera un petit nombre... Et cette deuxième
 question, où va-t-elle nous amener ?",
            'media' => "https://img.20mn.fr/XDQLMICIT4KqIOy3ubcYIg/310x190_homme-marche-sous-pluie-a-caen-9-juin-2014.jpg",
            'question'  => "Prêt pour aller voir Ready Player One ?",
            'histoire_id'  => 1,
            'premier' => 0
        ]);

        // C
        DB::table('chapitres')->insert([
            'titrecourt' => 'et 2',
            'texte' => "Super, il fait beau !!!! A partir de la, le plus grand bit de z1 est vrai. Quelle fierté. Mais quel suspense, Que va t
 il se passer maintenant ? ",
            'histoire_id'  => 1,
            "question" => "Un tour à la plage ou une marche ?",
            "media" => "https://www.lsa-conso.fr/mediatheque/2/4/0/000144042_5.jpg",
            'premier' => 0
        ]);

        // D
        DB::table('chapitres')->insert([
            'titrecourt' => ' et 3 zéro !!',
            'texte' => "Elle est pourtant bien cette histoire. z1 est vraiment ronchon aujourd'hui. Que des zeros, 
            Il représente donc le néant, le vide, rien, le zéro quoi.. Demain sera un autre jour, espérons que cela finisse mieux",
            'media' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBF26Ci41Ys3I9jbIbYyWF4NAKl6VADyioelHpvGm4b9wJmgza",
            'histoire_id'  => 1,
            'premier' => 0
        ]);

        // E
        DB::table('chapitres')->insert([
            'titrecourt' => ' et 3 zéro !!',
            'texte' => "Super, réprésentant le 1, c'est pas mal d'aller voir Ready Player One !!",
            'media' => "https://img.bfmtv.com/c/1256/708/00f29/b41bac1ae3222f9b727c6198f2e.jpeg",
            'histoire_id'  => 1,
            'premier' => 0
        ]);

        // F
        DB::table('chapitres')->insert([
            'titrecourt' => ' et 3 zéro !!',
            'texte' => "La plage, le soleil, la mer !!! Représenter un 2, ca a du bon quelque fois !",
            "media" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDHh_Cu9fL0f0d-7EejUzb1XzNPyfgu7RZLlUweSswf8anOevY6Q",
            'histoire_id'  => 1,
            'premier' => 0
        ]);

        // G

        DB::table('chapitres')->insert([
            'titrecourt' => ' et 3 zéro !!',
            'texte' => " Belle journée pour z1. Il ne possède que des 1 ! En allant marcher il croisera peut-être les 3 petits cochons. ",
            'histoire_id'  => 1,
            "media" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgrp7jlZZSLC8iejw3NGoSkvo8JCE7VxZ0uhSNuaiVNzVSRydt",
            'premier' => 0
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 1 ,
            'chapitre_destination_id' => 2,
            'reponse' =>'0'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 1 ,
            'chapitre_destination_id' => 3,
            'reponse' =>'1'
        ]);


        DB::table('suites')->insert([
            'chapitre_source_id' => 2,
            'chapitre_destination_id' => 4,
            'reponse' =>'0'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 2 ,
            'chapitre_destination_id' => 5,
            'reponse' =>'1'
        ]);
        DB::table('suites')->insert([
            'chapitre_source_id' => 3 ,
            'chapitre_destination_id' => 6,
            'reponse' =>'0'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 3 ,
            'chapitre_destination_id' => 7,
            'reponse' =>'1'
        ]);

        //------------------------------------------------

        DB::table('histoires')->insert([
            'titre' => 'THX1138',
            'pitch' => "THX1138 est un robot mal dans sa peau et qui cherche un sens à sa vie.",
            'photo'  => "https://m.media-amazon.com/images/M/MV5BYzRiY2I3M2EtODJkMy00NTEyLTgxNmYtYzYwYjk1ZDE1MDE1XkEyXkFqcGdeQXVyNTAyODkwOQ@@.
_V1_UY1200_CR111,0,630,1200_AL_.jpg",
            'user_id' => 1,
            'genre_id' => 1,
            'active' => 1
        ]);
        // 8
        DB::table('chapitres')->insert([
            'titrecourt' => 'Les oracles',
            'texte' => "Le robot, privé de certains capteurs sensoriels, vivait particulièrement mal sa désorientation
temporo-spatiale. Son degré de sensibilité était devenu très élevé avec la mise à jour 2187
version THX 1138. Cette légère défaillance le désobligeait, autant techniquement que parce
qu'elle ternissait sa réputation de modèle incomparable, de must de la robotique
intelligente, de George Clooney version Asimov.


Au seuil de l'atelier, il dut se résoudre à faire ce pour quoi il était pourtant programmé,
demander de l'aide. Issu de la dernière génération des robots dotés d'intelligence artificielle
créée derrière les hauts murs du Consortium Robotique International Libertaire, le CRIL, une
forteresse classée AAA dans les milieux autorisés, il avait appris à choisir.",
            'histoire_id'  => 2,
            "question" => "Sonner ? Téléphoner ? Demander conseil aux trois Fred, les oracles technologiques d'un
monde nouveau, FredH, FredB et FredZ ?",
            "media" => "https://www.cril-limouzi.com/img/lgm-production-logo-1505993315.jpg",
            'premier' => 1
        ]);

        // 9
        DB::table('chapitres')->insert([
            'titrecourt' => 'Boum !',
            'texte' => "La sonnette eut à peine le temps de retentir qu'une déflagration d'une violence
sismique marqua d'une fine rayure son Kevlar renforcé et explosa totalement son
réseau neuronal artificiel en même temps que tout le réseau synaptique de synthèse
associé. Il avait cédé à la plus ancienne des ruses développées par les SolBots,
compter sur un réflexe d’humain : sonner à une porte. Le piège était grossier, il était
tombé dedans. A force de s’humaniser, il eut à peine le temps de comprendre qu’il
mourait d’avoir trop ressemblé aux hommes. **Fin de partie.**",
            'histoire_id'  => 2,
            "media" => "http://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Explosions.jpg/800px-Explosions.jpg",
            'premier' => 0
        ]);

        //10
        DB::table('chapitres')->insert([
            'titrecourt' => 'Dring !',
            'texte' => "La sonnerie du téléphone ne fit que retentir dans un silence assourdissant qui lui
pesa tant qu'il ressentit une solitude poisseuse, presque philosophique. Rien à faire, il
entendait cette musique ultrasonique et familière de la tentative de connexion
neuronale, celle qui avait remplacé les appels classiques. Rien, le néant, le vide
sidéral.",
            'histoire_id'  => 2,
            "media" => "https://cdnb.artstation.com/p/assets/images/images/004/706/561/large/nicolas-martinez-matrix-telephone-1.jpg?148567536
8",
            'premier' => 0,
            "question" => "Ne lui restaient que <b>deux</b> possibilités :"
        ]);

        //11
        DB::table('chapitres')->insert([
            'titrecourt' => 'Help !',
            'texte' => "Les Oracles se tournèrent lentement vers lui, les yeux aussi verts qu'une ligne de code sur
un MO5 et l’écoutèrent attentivement. Après de longs palabres dans une langue connue
d’eux seuls, ils consentirent à lui répondre dans une langue commune. Ils s’avouaient
dépassés, il fallait consulter d’autres devins, capables d’autres formes de divinations, Blam
Blam, Kangoo et Verre brisé, inconnus sous d’autres noms. Seuls ces trois-là sauraient. Peut-
être. La route serait longue, sinueuse, hasardeuse.",
            'histoire_id'  => 2,
            "media" => "https://i.ytimg.com/vi/eVF4kebiks4/maxresdefault.jpg",
            'premier' => 0,
            "question" => "Que faire alors ?"
        ]);

        //12
        DB::table('chapitres')->insert([
            'titrecourt' => 'Spaceshifter',
            'texte' => "En remontant dans son l’habitacle, Un fin sourire trancha son visage en une lame
courbe, il savait que sa conscience serait transférée rapidement dans une autre
enveloppe corporelle en cas de problème. Transhumaniste et Marxiste, il fallait bien
qu’il en reste un pour que ces idées progressistes survivent. Il avait tout prévu. Il ne
savait pas que si ce n’était pas tout à fait sa dernière pensée, ce serait en tout cas le
dernier moment de cette enveloppe robotique. Les Solbots avaient encore frappé. Le
spaceshifter se désintégra sous l’effet cumulé des charges sourdes et subsoniques, la
nouvelle manière de procéder. Aucun bruit, une oppressante sensation de vide et
l’implosion.",
            'histoire_id'  => 2,
            "media" => "http://4everstatic.com/images/art/film-et-serie/battlestar-galactica,-vaisseau-spatial-172243.jpg",
            'premier' => 0,
        ]);

        // 13
        DB::table('chapitres')->insert([
            'titrecourt' => 'Voyage interstellaire',
            'texte' => "Intuitivement, étonné par son incapacité à élaborer un
raisonnement, il leur fit confiance, prit la route qu’ils leur indiquaient et songea
malicieusement à LUH 3417, son âme sœur, sa quête, son Graal, celle qui motivait
ces allers-retours planétaires, sidéraux, ses circuits fatigués, ses calculateurs saturés,
ce soupçon de lassitude inconnu jusqu’alors. Les oracles lui avaient indiqué que ces
trois-là sauraient et lui ne savait rien. Il n’avait pas d’autre choix, il le savait,
intuitivement et rationnellement. LULUH serait peut-être au bout d’un nouveau
voyage. Il y croyait, ne croyait qu’en ça, n’avait plus que ça. Elle était son tout
organique et robotique. En route...",
            'histoire_id'  => 2,
            "media" => "https://i.ytimg.com/vi/aockugeMFyg/maxresdefault.jpg",
            'premier' => 0,
        ]);


        //-------------


        DB::table('suites')->insert([
            'chapitre_source_id' => 8 ,
            'chapitre_destination_id' => 9,
            'reponse' =>'Sonner'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 8 ,
            'chapitre_destination_id' => 10,
            'reponse' =>'Téléphoner'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 8 ,
            'chapitre_destination_id' => 11,
            'reponse' =>'Demander conseil au 3 Fred'
        ]);


        DB::table('suites')->insert([
            'chapitre_source_id' => 10 ,
            'chapitre_destination_id' => 11,
            'reponse' =>'consulter les oracles aux yeux d’émeraude'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 10 ,
            'chapitre_destination_id' => 12,
            'reponse' =>'remonter dans son spaceshifter dans l’hypothétique espoir d’une rencontre miraculeuse'
        ]);
        DB::table('suites')->insert([
            'chapitre_source_id' => 11 ,
            'chapitre_destination_id' => 12,
            'reponse' =>'Rester méfiant et remonter dans son spaceshifter'
        ]);
        DB::table('suites')->insert([
            'chapitre_source_id' => 11 ,
            'chapitre_destination_id' => 13,
            'reponse' =>'Leur faire confiance'
        ]);


        $nb_histoires = 20;
        for($i = 3; $i <= $nb_histoires; $i++) {
            DB::table('histoires')->insert([
                'titre' => "l'histoire vide $i",
                'pitch' => "Ben il n'y a rien on vous dit",
                'photo'  => "/images/bit-1.webp",
                'user_id' => rand(1, $nb_users),
                'active'=>1,
                'genre_id'=>rand(1,5)

            ]);

            // A
            DB::table('chapitres')->insert([
                'titrecourt' => 'Rien ',
                'texte' => "Ca commence ici...  ca s'arrête ici",
                'histoire_id'  => $i,
                'premier' => 1
            ]);

        }

        for($i = 1; $i <= $nb_users; $i++) {
            for($j = 1; $j <= $nb_histoires; $j += 1) {
                if (rand(0, 10) > 7)
                    DB::table("avis")->insert([
                        "histoire_id" => $j,
                        "user_id" => $i,
                        "contenu" => implode(" ", array_map(function($x) {return Str::random(rand(3,10));}, range(0, 9)))
                    ]);

                if (rand(0, 10) > 7)
                    DB::table("terminees")->insert([
                        "histoire_id" => $j,
                        "user_id" => $i,
                        "nombre" => rand(1, 5)
                    ]);
            }
        }


        DB::table('histoires')->insert([
            "id" => 100,
            'titre' => 'THX1138 -- Le retour',
            'pitch' => "THX1138 est un robot mal dans sa peau et qui cherche un sens à sa vie.",
            'photo'  => "https://m.media-amazon.com/images/M/MV5BYzRiY2I3M2EtODJkMy00NTEyLTgxNmYtYzYwYjk1ZDE1MDE1XkEyXkFqcGdeQXVyNTAyODkwOQ@@.
_V1_UY1200_CR111,0,630,1200_AL_.jpg",
            'user_id' => 1,
            'genre_id' => 1,
            'active' => 0
        ]);
        // 8
        DB::table('chapitres')->insert([
            'titrecourt' => 'Les oracles',
            'texte' => "Le robot, privé de certains capteurs sensoriels, vivait particulièrement mal sa désorientation
temporo-spatiale. Son degré de sensibilité était devenu très élevé avec la mise à jour 2187
version THX 1138. Cette légère défaillance le désobligeait, autant techniquement que parce
qu'elle ternissait sa réputation de modèle incomparable, de must de la robotique
intelligente, de George Clooney version Asimov.


Au seuil de l'atelier, il dut se résoudre à faire ce pour quoi il était pourtant programmé,
demander de l'aide. Issu de la dernière génération des robots dotés d'intelligence artificielle
créée derrière les hauts murs du Consortium Robotique International Libertaire, le CRIL, une
forteresse classée AAA dans les milieux autorisés, il avait appris à choisir.",
            'histoire_id'  => 100,
            "question" => "Sonner ? Téléphoner ? Demander conseil aux trois Fred, les oracles technologiques d'un
monde nouveau, FredH, FredB et FredZ ?",
            "media" => "https://www.cril-limouzi.com/img/lgm-production-logo-1505993315.jpg",
            'premier' => 1
        ]);

        // 9
        DB::table('chapitres')->insert([
            'titrecourt' => 'Boum !',
            'texte' => "La sonnette eut à peine le temps de retentir qu'une déflagration d'une violence
sismique marqua d'une fine rayure son Kevlar renforcé et explosa totalement son
réseau neuronal artificiel en même temps que tout le réseau synaptique de synthèse
associé. Il avait cédé à la plus ancienne des ruses développées par les SolBots,
compter sur un réflexe d’humain : sonner à une porte. Le piège était grossier, il était
tombé dedans. A force de s’humaniser, il eut à peine le temps de comprendre qu’il
mourait d’avoir trop ressemblé aux hommes. **Fin de partie.**",
            'histoire_id'  => 100,
            "media" => "http://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Explosions.jpg/800px-Explosions.jpg",
            'premier' => 0
        ]);

        //10
        DB::table('chapitres')->insert([
            'titrecourt' => 'Dring !',
            'texte' => "La sonnerie du téléphone ne fit que retentir dans un silence assourdissant qui lui
pesa tant qu'il ressentit une solitude poisseuse, presque philosophique. Rien à faire, il
entendait cette musique ultrasonique et familière de la tentative de connexion
neuronale, celle qui avait remplacé les appels classiques. Rien, le néant, le vide
sidéral.",
            'histoire_id'  => 100,
            "media" => "https://cdnb.artstation.com/p/assets/images/images/004/706/561/large/nicolas-martinez-matrix-telephone-1.jpg?148567536
8",
            'premier' => 0,
            "question" => "Ne lui restaient que <b>deux</b> possibilités :"
        ]);

        //11
        DB::table('chapitres')->insert([
            'titrecourt' => 'Help !',
            'texte' => "Les Oracles se tournèrent lentement vers lui, les yeux aussi verts qu'une ligne de code sur
un MO5 et l’écoutèrent attentivement. Après de longs palabres dans une langue connue
d’eux seuls, ils consentirent à lui répondre dans une langue commune. Ils s’avouaient
dépassés, il fallait consulter d’autres devins, capables d’autres formes de divinations, Blam
Blam, Kangoo et Verre brisé, inconnus sous d’autres noms. Seuls ces trois-là sauraient. Peut-
être. La route serait longue, sinueuse, hasardeuse.",
            'histoire_id'  => 100,
            "media" => "https://i.ytimg.com/vi/eVF4kebiks4/maxresdefault.jpg",
            'premier' => 0,
            "question" => "Que faire alors ?"
        ]);

        //12
        DB::table('chapitres')->insert([
            'titrecourt' => 'Spaceshifter',
            'texte' => "En remontant dans son l’habitacle, Un fin sourire trancha son visage en une lame
courbe, il savait que sa conscience serait transférée rapidement dans une autre
enveloppe corporelle en cas de problème. Transhumaniste et Marxiste, il fallait bien
qu’il en reste un pour que ces idées progressistes survivent. Il avait tout prévu. Il ne
savait pas que si ce n’était pas tout à fait sa dernière pensée, ce serait en tout cas le
dernier moment de cette enveloppe robotique. Les Solbots avaient encore frappé. Le
spaceshifter se désintégra sous l’effet cumulé des charges sourdes et subsoniques, la
nouvelle manière de procéder. Aucun bruit, une oppressante sensation de vide et
l’implosion.",
            'histoire_id'  => 100,
            "media" => "http://4everstatic.com/images/art/film-et-serie/battlestar-galactica,-vaisseau-spatial-172243.jpg",
            'premier' => 0,
        ]);

        // 13
        DB::table('chapitres')->insert([
            'titrecourt' => 'Voyage interstellaire',
            'texte' => "Intuitivement, étonné par son incapacité à élaborer un
raisonnement, il leur fit confiance, prit la route qu’ils leur indiquaient et songea
malicieusement à LUH 3417, son âme sœur, sa quête, son Graal, celle qui motivait
ces allers-retours planétaires, sidéraux, ses circuits fatigués, ses calculateurs saturés,
ce soupçon de lassitude inconnu jusqu’alors. Les oracles lui avaient indiqué que ces
trois-là sauraient et lui ne savait rien. Il n’avait pas d’autre choix, il le savait,
intuitivement et rationnellement. LULUH serait peut-être au bout d’un nouveau
voyage. Il y croyait, ne croyait qu’en ça, n’avait plus que ça. Elle était son tout
organique et robotique. En route...",
            'histoire_id'  => 100,
            "media" => "https://i.ytimg.com/vi/aockugeMFyg/maxresdefault.jpg",
            'premier' => 0,
        ]);

        DB::table('histoires')->insert([
            "id" => 21,
            'titre' => 'Caro en 1988',
            'pitch' => "Plongez dans l'uchronie d'une  France communiste en 1988. Suivez Caro, résistante, dans une quête périlleuse pour sauver des vies. Entre choix difficiles et rencontres surprenantes, découvrez comment une alliance improbable peut naître même dans les moments les plus sombres. Une histoire de résilience, d'amitié et de lutte contre l'oppression. ",
            'photo'  => "/images/book_cover_1.png",
            'user_id' => 1,
            'active'=>1,
            'genre_id'=>4
        ]);

        DB::table('chapitres')->insert([
            'titre'=>"Étau Communiste : L'Échiquier de la Résistance en 1988",
            'titrecourt' => "Étau Communiste : L'Échiquier de la Résistance en 1988",
            'texte' => "En l'année 1988, la France succombe à un régime communiste suite à la victoire de l'URSS sur
             l'Allemagne et les États-Unis. Sous le contrôle oppressant du KGB, les mineurs du nord travaillent ardemment,
              et toute idéologie opposée est étouffée.
              Caroline, une résistante cachant ses convictions, détient les plans du goulag, une information critique
               pour l'avenir de l'URSS. Dans un bar connu comme repaire de résistants, elle souhaite transférer ces
                plans à ses alliés partageant des idéologies extrémistes.À l'entrée du bar, les affiches de propagande,
                 arborant la devise de l'URSS 'travail, famille, patrie', témoignent du contrôle strict du régime.
                  Alors que Caroline s'apprête à rejoindre ses amies, un homme l'intercepte en lui proposant un verre.
                  Pourtant, ce qui semble être une rencontre fortuite cache une mission sinistre. Un meurtrier, agent
                   du KGB, est déployé pour récupérer les plans du goulag détenus par Caroline. La détention de ces
                    plans mettrait sérieusement en péril l'URSS. Ainsi, dans ce contexte tendu, les destins de Caroline
                     et du meurtrier s'entremêlent dans un bar où chaque geste pourrait changer le cours de l'histoire.",
            'question'  => "Quel est votre choix ?",
            'histoire_id'  => 21,
            'premier' => 1
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Échos d'une Nuit Ombreuse : Le Mystère du Bar",
            'titrecourt' => 'Refuser poliment le verre et chercher une autre entrée au bar.',
            'texte' => "Dans la pénombre du bar, elle remarque avec inquiétude que l'homme qui lui a proposé le verre l'attend patiemment à l'entrée. Un air de déjà-vu flotte dans l'atmosphère, accentué par le tatouage distinctif sur son cou, semblable à celui d'une connaissance du passé. Le doute s'installe, laissant planer l'ombre d'une connexion obscure entre cet homme et son histoire.

Face à cette découverte troublante, la prudence guide Caroline. Au lieu de s'approcher davantage, elle choisit l'option de l'évasion. En scrutant discrètement la salle, elle repère une porte dérobée, dissimulée à côté des toilettes. Une opportunité de fuite inattendue qui pourrait changer le cours de la soirée.

Contournant habilement les tables et les convives, elle évite le regard de l'homme à l'entrée et se dirige vers la porte secrète. Chaque pas résonne comme une pulsation de suspense, tandis que les mystères du bar semblent prêts à se dévoiler derrière cette issue dissimulée.

Arrivée à la porte, Caroline se demande ce qui l'attend de l'autre côté. L'inconnu et la tension de la situation créent une atmosphère électrique. D'une main hésitante, elle pousse doucement la porte, prête à découvrir ce qui se cache derrière cet élément mystérieux de l'établissement. Chaque choix, chaque action, pourrait avoir des répercussions sur le déroulement de cette nuit cruciale.",
            'question'  => "Que choisir ?",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Sombres Détours : Caroline face au Dilemme des Ruelles",
            'titrecourt' => 'Partir par la porte secrète',
            'texte' => "Évitant les regards indiscrets, Caroline se glisse furtivement vers la porte dérobée. Chaque pas résonne comme une pulsation de suspense. Les mystères du bar semblent prêts à se dévoiler derrière cette issue dissimulée.
Arrivée à la porte, Caroline retient son souffle, l'inconnu de l'autre côté. D'une main hésitante, elle pousse doucement la porte.
S'échappant par la porte arrière, Caroline ressent un profond soulagement. Les ténèbres de la nuit l'accueillent. Cependant, cette quiétude est éphémère, car elle réalise rapidement que l'agent du KGB est à ses trousses, le danger est loin d'être écarté.
Une course effrénée s'engage dans les ruelles sombres. 
Au détour d'une rue, Caroline se trouve confrontée à une bifurcation, chacun des chemins offrant une opportunité d'échapper à son poursuivant. Son souffle haletant, elle doit prendre une décision rapide, sachant que la moindre erreur pourrait changer le cours de cette nuit cruciale.
Une question se pose maintenant :",
            'question'  => "Comment partir ?",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Échos de l'Obscurité : Le Dernier Recours de Caro",
            'titrecourt' => 'Partir du tunnel',
            'texte' => "À travers le tunnel obscur, elle court, les échos de ses pas rebondissant contre les murs en béton. L'agent du KGB la traque de plus en plus étroitement. Alors qu'elle avance dans le tunnel, Caro réalise qu'elle a atteint une impasse.

L'agent du KGB, approchant dangereusement, lui demande de prononcer son dernier mot. C'est à cet instant crucial qu'elle doit décider : se battre en dernier recours ou exprimer ses ultimes paroles.",
            'question'  => "Que choisir ?",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Résistance Éteinte : Le Dernier Souffle de Caro dans le Tunnel Obscur",
            'titrecourt' => 'Se battre en dernier recours',
            'texte' => "
Les échos de ses pas rebondissent dans le tunnel obscur. L'agent du KGB la traque de près, les ombres du tunnel se resserrant autour d'eux. Alors qu'elle s'enfonce plus profondément, Caro réalise soudainement qu'elle a atteint une impasse.
L'agent du KGB, se rapprochant dangereusement, lui demande de prononcer son dernier mot. À cet instant crucial, Caro, dans un dernier sursaut de détermination, décide de tenir tête. Ses paroles empreintes de résistance résonnent dans le tunnel obscur, mais l'agent du KGB, imperturbable, dégaine son Makarov.
Une détonation perce le silence, et Caro s'effondre sur le sol du tunnel, son dernier acte de bravoure réduit à néant par la froideur impitoyable d'une balle de Makarov. La fin tragique marque ce lieu sombre, où la résistance de Caro s'éteint dans l'obscurité du tunnel, sa voix réduite au silence. Vous avez perdu.",

            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Une Alliance dans l'Ombre : Pelves, Passé Partagé et Plans de Liberté",
            'titrecourt' => 'Dire son dernier mot',
            'texte' => "
Dans un élan de bravoure, Caro relève la tête et lui dit qu'elle se souvient de lui, qu'ils partageaient autrefois la même ville, Pelves. Une lueur d'intrigue traverse les yeux de l'agent du KGB, perturbant la froideur de son regard.

C'est alors que quelque chose change en lui. Un éclat de lucidité perce l'endoctrinement dont il a été victime. Le soldat, confronté à son passé et à la réalité de ses actions, se calme. Il se rend compte qu'il a été manipulé par l'URSS pour devenir un simple pion du KGB. Dans un moment de vérité, il ouvre son cœur à Caro, partageant les détails de son histoire et les raisons qui l'ont conduit jusqu'ici.

Calmé par cette révélation, l'agent du KGB s'allie à Caro. Ensemble, ils décident de livrer le plan aux amis de Caro, ceux qui détiennent le pouvoir de libérer tous les prisonniers du goulag. Une alliance improbable naît dans l'obscurité du tunnel, unissant deux destinées qui, autrement, se seraient affrontées.",

            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Course Mortelle : Les Plans Perdus de Caro",
            'titrecourt' => 'Partir vers la ruelle',
            'texte' => "À toute vitesse, elle dévale la petite ruelle, poursuivie de près par l'agent KGB qui n'hésite pas à ouvrir le feu sur Caro. 

Alors qu'elle court, les plans glissent de ses mains, tombant au sol. Malgré sa fuite réussie, elle réalise avec amertume qu'elle a perdu les précieux plans. Elle reste vivante mais sa mission de sauver la France prend fin.",

            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Entre Barreaux et Détermination : Caro dans les Entrailles du Goulag Lensois",
            'titrecourt' => 'Partir par la porte classique',
            'texte' => "Caro se fait arrêter par l'agent du KGB, subissant une fouille approfondie qui révèle la possession de la carte du goulag et son opposition aux idéologies communistes en tant que résistante. Menottée, avec les yeux dissimulés par une cagoule, elle est conduite au poste du KGB le plus proche.

Actuellement, elle est contrainte de travailler de force au goulag Lensois. Cette nouvelle réalité découle de sa confrontation avec les autorités totalitaires. Caro doit maintenant faire face aux défis du quotidien dans le goulag tout en maintenant sa détermination à lutter contre l'oppression.",

            'histoire_id'  => 21,
            'premier' => 0
        ]);


        DB::table('chapitres')->insert([
            'titre' => "Sérum Amère : Les Choix de Caroline dans l'Étau du KGB",
            'titrecourt' => 'Accepter son verre',
            'texte' => "Caroline, succombant à la confiance momentanée, accepte le verre offert par l'homme mystérieux. Les effets ne se font pas attendre, et bientôt, elle ressent des vertiges qui s'intensifient, plongeant son esprit dans un tourbillon nauséeux.
La transition entre la lucidité et le malaise l'égare. Lorsqu'elle reprend conscience, elle se trouve confinée dans une cellule, un éclairage blafard accentuant la froideur des murs. La réalisation brutale de sa captivité la pénètre, et l'urgence de l'évasion s'impose, surtout avant que le criminel du KGB ne fasse son apparition.
Observant rapidement les lieux, Caroline découvre deux options d'échappatoire. La première, plus risquée, consiste à sauter par la fenêtre, l'inconnu de la chute planant dans son esprit. La seconde, sortir par la porte, offre une fuite moins périlleuse mais potentiellement confrontante. Chacune de ces alternatives représente un dilemme, chacune porte le poids d'une décision cruciale dans son évasion de cette cellule oppressante. Le temps presse, et chaque instant compte dans la course contre le KGB.",
            'question'  => "Que faire ?",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "Évasion Sombrale : Caroline, Entre Deux Portes de l'Ombre",
            'titrecourt' => 'S’échapper par la porte d’entrée',
            'texte' => "La porte s'ouvre devant elle, un grincement sinistre marquant sa libération de la cellule oppressante. Caroline s'élance dans le couloir sombre, ses sens en alerte maximale dans cette course contre le temps.
Cependant, l'ombre menaçante du mystérieux geôlier plane toujours. Pour descendre et échapper aux griffes qui pourraient la saisir à tout moment, deux options s'offrent à elle. La tension dans l'air est palpable, chaque pas dans le couloir résonne comme un écho de liberté fragile. Choisir le bon chemin est crucial, car derrière chaque porte peut se cacher la clé de son évasion ou la menace imminente du danger qui la poursuit.",

            'question'  => "Que choisissez-vous ?",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "L'Escalier de la Confrontation : Caroline face à l'Ombre du KGB",
            'titrecourt' => 'Escalier',
            'texte' => "Guidée par son instinct de survie, Caroline opte pour l'escalier. Ses pas résonnent à toute allure, descendant les marches avec une détermination sans faille. À la dernière marche, la confrontation inévitable se matérialise : l'agent du KGB se tient face à elle.
Sans la moindre hésitation, Caroline lève son arme et abat son poursuivant. L'écho du coup de feu résonne dans le couloir, une victoire amère marquant la fin d'une course éperdue pour la liberté. Cependant, la réalité cruelle subsiste, car la menace qui plane n'est pas éradiquée. La victoire d'aujourd'hui pourrait bien devenir le prélude à de nouveaux défis dans sa quête de survie.
Vous avez perdu.",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "L'Escalier de la Confrontation : Caroline face à l'Ombre du KGB",
            'titrecourt' => 'Ascenceur',
            'texte' => "
Optant pour l'ascenseur, Caroline presse le bouton avec une hâte fébrile. Lorsque la porte de l'ascenseur s'ouvre enfin, une vision cauchemardesque s'impose à elle : le criminel en question, muni d'un couteau scintillant. Le couloir sombre devient le théâtre d'une confrontation tendue. Caroline doit agir avec rapidité et intelligence pour échapper à cette menace imminente. La prochaine décision de Caroline sera cruciale dans cette lutte désespérée pour la liberté.
Vous avez perdu.
",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('chapitres')->insert([
            'titre' => "L'Échec Ascendant : Caro Face à l'Infini de la Captivité",
            'titrecourt' => 'Sauter par la fenêtre',
            'texte' => "
S'emparant de sa détermination, Caro se prépare à l'action. L'immeuble qui se dresse sur cinq étages semble être le seul moyen d'échapper à sa captivité. Sans perdre de temps, elle se précipite vers la fenêtre, cherchant une issue vers la liberté.
Cependant, la réalité s'avère implacable. À mesure qu'elle grimpe, les étages semblent s'étendre à l'infini, son espoir se heurtant à l'insurmontable. Malgré sa détermination, ses forces la trahissent, et elle échoue dans sa tentative désespérée d'évasion.
",
            'histoire_id'  => 21,
            'premier' => 0
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 38 ,
            'chapitre_destination_id' => 39,
            'reponse' =>'Refuser poliment le verre et chercher une autre entrée au bar.'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 38 ,
            'chapitre_destination_id' => 46,
            'reponse' =>'Accepter son verre'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 39 ,
            'chapitre_destination_id' => 40,
            'reponse' =>'Partir par la porte secrète'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => 39 ,
            'chapitre_destination_id' => 45,
            'reponse' =>'Partir par la porte classique'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>40 ,
            'chapitre_destination_id' => 44,
            'reponse' =>'Partir vers la ruelle'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>40 ,
            'chapitre_destination_id' => 41,
            'reponse' =>'Partir du tunnel'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>41 ,
            'chapitre_destination_id' => 43,
            'reponse' =>'Dire son dernier mot'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>41 ,
            'chapitre_destination_id' => 42,
            'reponse' =>'Se battre en dernier recours'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>46 ,
            'chapitre_destination_id' => 47,
            'reponse' =>'S’échapper par la porte d’entrée'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>46 ,
            'chapitre_destination_id' => 50,
            'reponse' =>'Sauter par la fenêtre'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>47 ,
            'chapitre_destination_id' => 50,
            'reponse' =>'Escalier'
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' =>47 ,
            'chapitre_destination_id' => 49,
            'reponse' =>'Ascenceur'
        ]);





        DB::insert("INSERT into lectures values(1,1, ?)", [json_encode([1, 2])]);

    }


}
