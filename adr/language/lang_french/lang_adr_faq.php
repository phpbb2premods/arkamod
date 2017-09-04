<?php
/***************************************************************************
 *                          	  lang_adr_faq.php
 *                            -------------------
 *   begin			: Wednesday Oct 13, 2004
 *   copyright		: Seteo-Bloke
 *   notes			: Based upon the phpBB faq file
 *
 * 	 Translation : BlackJowy (French)
 * 	 Forums : http://www.ev.power-heberg.com
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

  
$faq[] = array("--","Questions Générales");
$faq[] = array("Comment gagner de l'argent pour pouvoir acheter des objets ?", "Vous pouvez gagner de l'argent en postant sur le forum mais aussi en gagnant vos combats contre des monstres ou d'autres joueurs. La somme dépend des valeurs déterminées par l'administrateur du forum.");
$faq[] = array("Qu'est-ce que les Points de Spiritualité (SP) et à quoi servent-ils ?", "Les SP sont des points gagnés uniquement en combattant des monstres qui permettent d'augmenter vos caractéristiques. Ils ressemblent beaucoup à la monnaie qui vous permet d'acheter vos objets mais permettent d'éviter les tricheries au niveau de l'amélioration de vos caractéristiques");
$faq[] = array("Qu'est-ce que les Points de Faction (FP) et à quoi servent-ils ?", "Les FP fonctionnent comme les SP à la différence qu'ils se gagnent grâce aux duels entre joueurs, il permettent d'acheter des objets spéciaux dans le magasin du forum. Actuellement ce système n'est pas totalement implémenté, vous ne pouvez donc pas gagner de FP.");

$faq[] = array("--","Questions relatives à la feuille de personnage");
$faq[] = array("A quoi sert le fuseau horaire spécial ?", "Dans les prochaines versions de ce module, cela servira par exemple à déterminer des heures d'ouverture/fermeture pour les magasins. Le temps s'y écoulera quatre fois plus vite pour ne pas défavoriser les joueurs de certains fuseaux horaires du monde réel.");
$faq[] = array("A quoi sert l'age de mon personnage ?", "Cela permet tout simplement de savoir depuis combien de temps votre personnage existe. Cela sera utilisé en adéquation avec le fuseau horaire spécial décrit au-dessus.");
$faq[] = array("A quoi sert la barre de Points de Vie (HP) ?", "C'est une jauge de la santé actuelle de votre personnage. Pour la restaurer il vous faut acheter des potions de vie en magasin ou visiter le temple.");
$faq[] = array("A quoi sert la barre de Points de Mana (MP) ?", "C'est une jauge du mana (énergie) actuel de votre personnage. Pour la restaurer il vous faut acheter des potions de mana en magasin ou visiter le temple. Les PM sont nécessaires pour lancer des sorts.");
$faq[] = array("A quoi sert la barre de poids ?", "C'est le poids de tous les objets que vous avez dans votre inventaire. Vous pouvez réduire ce poids en déposant des objets à l'entrepôt.");
$faq[] = array("A quoi sert la barre d'Expérience ?", "Vous gagnez de l'expérience en combattant des monstres ou en remportant des duels, une fois le maximum atteint vous devez gagner un niveau, tant que vous ne l'accepterez pas vous ne pourrez combattre. L'administrateur peut aussi décider de vous permettre de gagner de l'expérience en créant ou en répondant à des sujets.");
$faq[] = array("A quoi servent les quotas de combats et de compétences ?", "Ce sont les nombres maximums de combats et d'utilisation des compétences pour une période donnée, déterminés par l'administrateur du forum. Il vous faudra attendre le temps imposé par l'administrateur pour faire d'autres combats ou utiliser à nouveau vos compétences.");

$faq[] = array("--","Utilité des caractéristiques personnelles");
$faq[] = array("Classe d'armure", "Cette caractéristique est utilisée pour calculer votre défense au début d'un combat.");
$faq[] = array("Force", "Elle sert en partie à calculer votre force d'attaque en combat.");
$faq[] = array("Dextérité", "Elle sert en partie à calculer votre force d'attaque en combat.");
$faq[] = array("Constitution", "Elle sert en partie à calculer votre défense en combat.");
$faq[] = array("Intelligence", "Elle sert en partie à calculer votre force d'attaque magique en combat");
$faq[] = array("Sagesse", "Elle sert en partie à calculer votre défense magique en combat.");
$faq[] = array("Charme", "Elle peut servir a améliorer les prix d'achat et de revente de vos objets.");

$faq[] = array("--","Questions sur les combats contre des monstres");
$faq[] = array("Où et comment puis-je combattre des monstres ?", "Il suffit d'aller dans 'L'arène de combat' puis 'Combats contre des monstres', équipez-vous puis débutez le combat.");
$faq[] = array("Je reçois un message d'erreur à propos de mon poids quand j'essaye d'aller me battre !", "Vous êtes surchargé ! Il faut vous délester en revendant des objets ou en les stockant à l'entrepôt. Suivant votre race vous augmenterez plus ou moins rapidement votre capacité à porter des objets à chaque changement de niveau.");
$faq[] = array("Comment puis-je m'équiper avant le combat ?", "Vous pouvez faire cela via votre feuille de personnage, dans la partie 'Mon équipement', ce que vous choisirez ici sera votre équipement par défaut quand vous engagerez un combat, mais il vous restera toujours la possibilité d'en changer juste avant un combat.");
$faq[] = array("Je n'arrive pas à m'équiper des objets que je viens tout juste d'acheter !", "C'est parce que votre administrateur a activé les restrictions sur les objets utilisés en combat. Ce qui veut dire que vous pouvez vous équiper uniquement d'objets d'une puissance égale ou inférieure à votre niveau actuel.");
$faq[] = array("Comment son calculés mes points d'attaque et de défense en combat ?", "Les points d'attaque suivent l'équation (( Puissance + Endurance) x 2), les points de défense l'équation (Agilité + Volonté + Classe d'Armure).");
$faq[] = array("Comment fonctionnent les amulettes en combat ?", "Les amulettes redonnent des MP à chaque tour. La quantité dépend de vos objets et vous sera annoncée uniquement si vous n'avez pas votre maximum de MP.");
$faq[] = array("Comment fonctionnent les anneaux en combat ?", "Les anneaux redonnent des HP à chaque tour. La quantité dépend de vos objets et vous sera annoncée uniquement si vous n'avez pas votre maximum de HP.");
$faq[] = array("Un monstre a volé un objet de mon inventaire, comment puis-je le récupérer ?", "Les monstres ont la capacité de vous voler de l'or et des objets. Vous pouvez récupérer les objets en tuant le monstre, le cas échéant vos objets seront perdus à jamais. L'argent n'est pas récupérable.");
$faq[] = array("Comment puis-je éviter d'être volé par les monstres ?", "En stockant à l'entrepôt vos objets qui ne vous servent pas et en déposant à la banque votre argent.");
$faq[] = array("Pourquoi est-ce que mes attaques échouent constamment contre un monstre ?", "Si votre niveau d'attaque est plus faible que celui du monstre alors vous avez plus de chance de rater votre attaque, ce pourcentage augmente proportionnellement à l'écart entre vous et votre opposant.");
$faq[] = array("L'un de mes objets a disparu pendant le combat sans avoir été volé !", "Vérifiez toujours la durabilité de vos objets ! Si elle descend à zéro votre objet se brise et ne sera plus utilisable ou réparable.");
$faq[] = array("Je n'ai plus beaucoup de HP et MP après un combat, comment les restaurer ?", "Acheter des potions ou aller vous restaurer dans le temple.");
$faq[] = array("Je suis mort en combat, comment ressusciter ?", "En allant au temple.");

$faq[] = array("--","Questions sur les duels entre joueurs");
$faq[] = array("Je reçois un message d'erreur à propos de mon poids quand j'essaye d'aller me battre !", "Vous êtes surchargé ! Il faut vous délester en revendant des objets ou en les stockant à l'entrepôt. Suivant votre race vous augmenterez plus ou moins rapidement votre capacité à porter des objets à chaque changement de niveau.");
$faq[] = array("Je viens de commencer un duel et mes barres de HP/MP ne sont pas pleines, pourquoi ?", "Veillez à aller au temple avant chaque duel pour avoir le maximum de HP/MP");
$faq[] = array("Je n'arrive pas à m'équiper des objets que je viens tout juste d'acheter !", "C'est parce que votre administrateur a activé les restrictions sur les objets utilisés en combat. Ce qui veut dire que vous pouvez vous équiper uniquement d'objets d'une puissance égale ou inférieure à votre niveau actuel.");
$faq[] = array("Pourquoi les duels sont-ils si longs ?", "Les duels dépendent des deux joueurs, si l'un des duellistes n'est pas connecté, il faut attendre qu'il soit présent.");
$faq[] = array("Vais-je gagner plus d'expérience et d'argent en remportant un duel ?", "Oui mais la quantité dépend de la différence de niveau entre vous et votre adversaire, plus votre niveau est inférieur plus vos gains seront importants.");
$faq[] = array("Je n'ai plus beaucoup de HP et MP après un duel, comment les restaurer ?", "Acheter des potions ou allez vous restaurer dans le temple.");
$faq[] = array("Je suis mort lors d'un duel mais suivant ma fiche de personnage ce n'est pas le cas, pourquoi ?", "Les duels fonctionnent différemment des combats contre des monstres, vos HP/MP sont stockés à part lors du début du duel pour éviter de désavantager les joueurs qui ont plusieurs duels en cours.");

$faq[] = array("--","Questions sur les compétences");
$faq[] = array("Quels sont les avantages à améliorer ses compétences ?", "Les compétences vous permettent de payer moins cher vos objets ou d'améliorer vos objets, ou autre. Plus vos compétences sont élevées plus les gains sont importants");
$faq[] = array("Qu'est-ce que la compétence ‘mineur’ ?", "Vous pouvez aller à la mine chercher des matières premières que vous pourrez améliorer avec la compétence 'tailleur de pierres' dans le but de les revendre par exemple.");
$faq[] = array("Qu'est-ce que la compétence ‘tailleur de pierres’ ?", "Vous pouvez grâce à cela améliorer la qualité de vos matières premières et ainsi augmenter leur valeur.");
$faq[] = array("Qu'est-ce que la compétence ‘forgeron’ ?", "Cette compétence vous permet de restaurer la durabilité de vos objets ou de recharger vos sorts. La réparation sera meilleure si cette compétence est élevée.");
$faq[] = array("Qu'est-ce que la compétence ‘enchanteur’ ?", "Cela vous permet d'enchanter vos objets pour qu'ils disposent de propriétés magiques.");
$faq[] = array("Qu'est-ce que la compétence ‘voleur’ ?", "Si vous choisissez cette voie préparez vous à passer au tribunal et atterrir en prison lorsque vous vous ferez attraper.");


?>
