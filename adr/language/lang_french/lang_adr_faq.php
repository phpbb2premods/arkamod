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

  
$faq[] = array("--","Questions G�n�rales");
$faq[] = array("Comment gagner de l'argent pour pouvoir acheter des objets ?", "Vous pouvez gagner de l'argent en postant sur le forum mais aussi en gagnant vos combats contre des monstres ou d'autres joueurs. La somme d�pend des valeurs d�termin�es par l'administrateur du forum.");
$faq[] = array("Qu'est-ce que les Points de Spiritualit� (SP) et � quoi servent-ils ?", "Les SP sont des points gagn�s uniquement en combattant des monstres qui permettent d'augmenter vos caract�ristiques. Ils ressemblent beaucoup � la monnaie qui vous permet d'acheter vos objets mais permettent d'�viter les tricheries au niveau de l'am�lioration de vos caract�ristiques");
$faq[] = array("Qu'est-ce que les Points de Faction (FP) et � quoi servent-ils ?", "Les FP fonctionnent comme les SP � la diff�rence qu'ils se gagnent gr�ce aux duels entre joueurs, il permettent d'acheter des objets sp�ciaux dans le magasin du forum. Actuellement ce syst�me n'est pas totalement impl�ment�, vous ne pouvez donc pas gagner de FP.");

$faq[] = array("--","Questions relatives � la feuille de personnage");
$faq[] = array("A quoi sert le fuseau horaire sp�cial ?", "Dans les prochaines versions de ce module, cela servira par exemple � d�terminer des heures d'ouverture/fermeture pour les magasins. Le temps s'y �coulera quatre fois plus vite pour ne pas d�favoriser les joueurs de certains fuseaux horaires du monde r�el.");
$faq[] = array("A quoi sert l'age de mon personnage ?", "Cela permet tout simplement de savoir depuis combien de temps votre personnage existe. Cela sera utilis� en ad�quation avec le fuseau horaire sp�cial d�crit au-dessus.");
$faq[] = array("A quoi sert la barre de Points de Vie (HP) ?", "C'est une jauge de la sant� actuelle de votre personnage. Pour la restaurer il vous faut acheter des potions de vie en magasin ou visiter le temple.");
$faq[] = array("A quoi sert la barre de Points de Mana (MP) ?", "C'est une jauge du mana (�nergie) actuel de votre personnage. Pour la restaurer il vous faut acheter des potions de mana en magasin ou visiter le temple. Les PM sont n�cessaires pour lancer des sorts.");
$faq[] = array("A quoi sert la barre de poids ?", "C'est le poids de tous les objets que vous avez dans votre inventaire. Vous pouvez r�duire ce poids en d�posant des objets � l'entrep�t.");
$faq[] = array("A quoi sert la barre d'Exp�rience ?", "Vous gagnez de l'exp�rience en combattant des monstres ou en remportant des duels, une fois le maximum atteint vous devez gagner un niveau, tant que vous ne l'accepterez pas vous ne pourrez combattre. L'administrateur peut aussi d�cider de vous permettre de gagner de l'exp�rience en cr�ant ou en r�pondant � des sujets.");
$faq[] = array("A quoi servent les quotas de combats et de comp�tences ?", "Ce sont les nombres maximums de combats et d'utilisation des comp�tences pour une p�riode donn�e, d�termin�s par l'administrateur du forum. Il vous faudra attendre le temps impos� par l'administrateur pour faire d'autres combats ou utiliser � nouveau vos comp�tences.");

$faq[] = array("--","Utilit� des caract�ristiques personnelles");
$faq[] = array("Classe d'armure", "Cette caract�ristique est utilis�e pour calculer votre d�fense au d�but d'un combat.");
$faq[] = array("Force", "Elle sert en partie � calculer votre force d'attaque en combat.");
$faq[] = array("Dext�rit�", "Elle sert en partie � calculer votre force d'attaque en combat.");
$faq[] = array("Constitution", "Elle sert en partie � calculer votre d�fense en combat.");
$faq[] = array("Intelligence", "Elle sert en partie � calculer votre force d'attaque magique en combat");
$faq[] = array("Sagesse", "Elle sert en partie � calculer votre d�fense magique en combat.");
$faq[] = array("Charme", "Elle peut servir a am�liorer les prix d'achat et de revente de vos objets.");

$faq[] = array("--","Questions sur les combats contre des monstres");
$faq[] = array("O� et comment puis-je combattre des monstres ?", "Il suffit d'aller dans 'L'ar�ne de combat' puis 'Combats contre des monstres', �quipez-vous puis d�butez le combat.");
$faq[] = array("Je re�ois un message d'erreur � propos de mon poids quand j'essaye d'aller me battre !", "Vous �tes surcharg� ! Il faut vous d�lester en revendant des objets ou en les stockant � l'entrep�t. Suivant votre race vous augmenterez plus ou moins rapidement votre capacit� � porter des objets � chaque changement de niveau.");
$faq[] = array("Comment puis-je m'�quiper avant le combat ?", "Vous pouvez faire cela via votre feuille de personnage, dans la partie 'Mon �quipement', ce que vous choisirez ici sera votre �quipement par d�faut quand vous engagerez un combat, mais il vous restera toujours la possibilit� d'en changer juste avant un combat.");
$faq[] = array("Je n'arrive pas � m'�quiper des objets que je viens tout juste d'acheter !", "C'est parce que votre administrateur a activ� les restrictions sur les objets utilis�s en combat. Ce qui veut dire que vous pouvez vous �quiper uniquement d'objets d'une puissance �gale ou inf�rieure � votre niveau actuel.");
$faq[] = array("Comment son calcul�s mes points d'attaque et de d�fense en combat ?", "Les points d'attaque suivent l'�quation (( Puissance + Endurance) x 2), les points de d�fense l'�quation (Agilit� + Volont� + Classe d'Armure).");
$faq[] = array("Comment fonctionnent les amulettes en combat ?", "Les amulettes redonnent des MP � chaque tour. La quantit� d�pend de vos objets et vous sera annonc�e uniquement si vous n'avez pas votre maximum de MP.");
$faq[] = array("Comment fonctionnent les anneaux en combat ?", "Les anneaux redonnent des HP � chaque tour. La quantit� d�pend de vos objets et vous sera annonc�e uniquement si vous n'avez pas votre maximum de HP.");
$faq[] = array("Un monstre a vol� un objet de mon inventaire, comment puis-je le r�cup�rer ?", "Les monstres ont la capacit� de vous voler de l'or et des objets. Vous pouvez r�cup�rer les objets en tuant le monstre, le cas �ch�ant vos objets seront perdus � jamais. L'argent n'est pas r�cup�rable.");
$faq[] = array("Comment puis-je �viter d'�tre vol� par les monstres ?", "En stockant � l'entrep�t vos objets qui ne vous servent pas et en d�posant � la banque votre argent.");
$faq[] = array("Pourquoi est-ce que mes attaques �chouent constamment contre un monstre ?", "Si votre niveau d'attaque est plus faible que celui du monstre alors vous avez plus de chance de rater votre attaque, ce pourcentage augmente proportionnellement � l'�cart entre vous et votre opposant.");
$faq[] = array("L'un de mes objets a disparu pendant le combat sans avoir �t� vol� !", "V�rifiez toujours la durabilit� de vos objets ! Si elle descend � z�ro votre objet se brise et ne sera plus utilisable ou r�parable.");
$faq[] = array("Je n'ai plus beaucoup de HP et MP apr�s un combat, comment les restaurer ?", "Acheter des potions ou aller vous restaurer dans le temple.");
$faq[] = array("Je suis mort en combat, comment ressusciter ?", "En allant au temple.");

$faq[] = array("--","Questions sur les duels entre joueurs");
$faq[] = array("Je re�ois un message d'erreur � propos de mon poids quand j'essaye d'aller me battre !", "Vous �tes surcharg� ! Il faut vous d�lester en revendant des objets ou en les stockant � l'entrep�t. Suivant votre race vous augmenterez plus ou moins rapidement votre capacit� � porter des objets � chaque changement de niveau.");
$faq[] = array("Je viens de commencer un duel et mes barres de HP/MP ne sont pas pleines, pourquoi ?", "Veillez � aller au temple avant chaque duel pour avoir le maximum de HP/MP");
$faq[] = array("Je n'arrive pas � m'�quiper des objets que je viens tout juste d'acheter !", "C'est parce que votre administrateur a activ� les restrictions sur les objets utilis�s en combat. Ce qui veut dire que vous pouvez vous �quiper uniquement d'objets d'une puissance �gale ou inf�rieure � votre niveau actuel.");
$faq[] = array("Pourquoi les duels sont-ils si longs ?", "Les duels d�pendent des deux joueurs, si l'un des duellistes n'est pas connect�, il faut attendre qu'il soit pr�sent.");
$faq[] = array("Vais-je gagner plus d'exp�rience et d'argent en remportant un duel ?", "Oui mais la quantit� d�pend de la diff�rence de niveau entre vous et votre adversaire, plus votre niveau est inf�rieur plus vos gains seront importants.");
$faq[] = array("Je n'ai plus beaucoup de HP et MP apr�s un duel, comment les restaurer ?", "Acheter des potions ou allez vous restaurer dans le temple.");
$faq[] = array("Je suis mort lors d'un duel mais suivant ma fiche de personnage ce n'est pas le cas, pourquoi ?", "Les duels fonctionnent diff�remment des combats contre des monstres, vos HP/MP sont stock�s � part lors du d�but du duel pour �viter de d�savantager les joueurs qui ont plusieurs duels en cours.");

$faq[] = array("--","Questions sur les comp�tences");
$faq[] = array("Quels sont les avantages � am�liorer ses comp�tences ?", "Les comp�tences vous permettent de payer moins cher vos objets ou d'am�liorer vos objets, ou autre. Plus vos comp�tences sont �lev�es plus les gains sont importants");
$faq[] = array("Qu'est-ce que la comp�tence �mineur� ?", "Vous pouvez aller � la mine chercher des mati�res premi�res que vous pourrez am�liorer avec la comp�tence 'tailleur de pierres' dans le but de les revendre par exemple.");
$faq[] = array("Qu'est-ce que la comp�tence �tailleur de pierres� ?", "Vous pouvez gr�ce � cela am�liorer la qualit� de vos mati�res premi�res et ainsi augmenter leur valeur.");
$faq[] = array("Qu'est-ce que la comp�tence �forgeron� ?", "Cette comp�tence vous permet de restaurer la durabilit� de vos objets ou de recharger vos sorts. La r�paration sera meilleure si cette comp�tence est �lev�e.");
$faq[] = array("Qu'est-ce que la comp�tence �enchanteur� ?", "Cela vous permet d'enchanter vos objets pour qu'ils disposent de propri�t�s magiques.");
$faq[] = array("Qu'est-ce que la comp�tence �voleur� ?", "Si vous choisissez cette voie pr�parez vous � passer au tribunal et atterrir en prison lorsque vous vous ferez attraper.");


?>
