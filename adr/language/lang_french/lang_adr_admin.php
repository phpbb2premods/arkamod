<?php 
/*************************************************************************** 
* 						lang_adr_admin.php [French] 
* 							------------------- 
*
* 						Translation : BlackJowy
* 					Forums : http://www.ev.power-heberg.com
* 
****************************************************************************/ 

if ( defined ('IN_ADR_ADMIN') )
{
	if ( defined ('IN_ADR_CHARACTER'))
	{
		// Races
		$lang['Adr_races_explain']='Vous pouvez configurer ici les races. Les ajouter, �diter et supprimer.'; 
		$lang['Adr_races_add']='Ajouter une race';
		$lang['Adr_races_add_edit']='Ajout ou �dition d\'une race';
		$lang['Adr_races_add_edit_explain']='Ici vous pouvez ajouter ou �diter une race.'; 
		$lang['Adr_races_name_explain']='Vous pouvez utiliser un alias du fichier de langues';
		$lang['Adr_races_image_explain']='L\'image doit �tre dans le r�pertoire /adr/images/races/';
		$lang['Adr_races_level']='Niveau d\'utilisateur';
		$lang['Adr_races_level_explain']='Vous pouvez restreindre l\'acc�s � certaines races en fonction du type d\'utilisateur';
		$lang['Adr_races_level_all']='Tous';
		$lang['Adr_races_level_admin']='Administrateur';
		$lang['Adr_races_level_mod']='Mod�rateur';
		$lang['Adr_race_successful_added']='Nouvelle race correctement ajout�e';
		$lang['Adr_race_successful_edited']='Race correctement �dit�e';
		$lang['Adr_race_default']='Vous ne pouvez pas supprimer la race par d�faut';
		$lang['Adr_race_successful_deleted']='Race correctement supprim�e';
		$lang['Adr_races_weight']='Poids maximum initial';
		$lang['Adr_races_weight_per_level']='Pourcentage de poids suppl�mentaire par niveau gagn�';

		// Classes
		$lang['Adr_classes_explain']='Vous pouvez configurer ici les classes. Les ajouter, �diter et supprimer.'; 
		$lang['Adr_classes_add']='Ajouter une classe';
		$lang['Adr_classes_add_edit']='Ajout ou �dition d\'une classe';
		$lang['Adr_classes_add_edit_explain']='Ici vous pouvez ajouter ou �diter une classe.'; 
		$lang['Adr_classes_image_explain']='L\'image doit �tre dans le r�pertoire /adr/images/classes/';
		$lang['Adr_classes_level_explain']='Vous pouvez restreindre l\'acc�s � certaines classes en fonction du type d\'utilisateur';
		$lang['Adr_classes_req_might']='Valeur minimum de la caract�ristique Puissance';
		$lang['Adr_classes_req_dext']='Valeur minimum de la caract�ristique Agilit�';
		$lang['Adr_classes_req_const']='Valeur minimum de la caract�ristique Endurance';
		$lang['Adr_classes_req_int']='Valeur minimum de la caract�ristique Intelligence';
		$lang['Adr_classes_req_wis']='Valeur minimum de la caract�ristique Sagesse';
		$lang['Adr_classes_req_cha']='Valeur minimum de la caract�ristique Charme';
		$lang['Adr_classes_req_ma']='Valeur minimum de la caract�ristique Attaque magique';
		$lang['Adr_classes_req_md']='Valeur minimum de la caract�ristique D�fense magique';
		$lang['Adr_class_successful_added']='Nouvelle classe correctement ajout�e';
		$lang['Adr_class_successful_edited']='Classe correctement �dit�e';
		$lang['Adr_class_default']='Vous ne pouvez pas supprimer la classe par d�faut';
		$lang['Adr_class_successful_deleted']='Classe correctement supprim�e';
		$lang['Adr_classes_update_xp_req']='Points d\'exp�rience n�cessaires pour gagner un niveau';
		$lang['Adr_classes_update_of']='Est une �volution de';
		$lang['Adr_classes_update_of_req']='Niveau requis pour �voluer en cette classe';
		$lang['Adr_classes_selectable']='Peut-�tre choisi � la cr�ation du personnage';
		$lang['Adr_classes_evolution_none']='N\'est pas une �volution';

		// Elements
		$lang['Adr_elements_add']='Ajouter un �l�ment';
		$lang['Adr_elements_explain']='Vous pouvez configurer ici les �l�ments. Les ajouter, �diter et supprimer.'; 
		$lang['Adr_elements_add_edit']='Ajout et �dition d\'�l�ments';
		$lang['Adr_elements_add_edit_explain']='Ici vous pouvez ajouter ou supprimer un �lement';
		$lang['Adr_elements_colour']='Couleur de l\'�l�ment';
		$lang['Adr_elements_colour_ex']='Ici vous pouvez choisir une couleur � appliquer aux noms des objets durant les combats.<br>Vous pouvez choisir un alias (par exemple : red) tant que celui-ci est d�fini dans votre fichier css, ou sinon utiliser le <a href="http://www.w3schools.com/html/html_colornames.asp" target="_blank">code hexad�cimal</a> qui correspond � la couleur souhait�e.';
		$lang['Adr_elements_image_explain']='L\'image doit �tre dans le r�pertoire /adr/images/elements/';
		$lang['Adr_elements_level_explain']='Vous pouvez restreindre l\'acc�s � certains �l�ments en fonction du type d\'utilisateur';
		$lang['Adr_element_successful_added']='Nouvel �l�ment correctement ajout�';
		$lang['Adr_element_successful_edited']='El�ment correctement �dit�';
		$lang['Adr_element_successful_deleted']='El�ment correctement supprim�';
		$lang['Adr_element_default']='Vous ne pouvez pas supprimer l\'�l�ment par d�faut';

		$lang['Adr_element_oppose_str']='Choisissez un �l�ment oppos� contre lequel cet �l�ment sera plus fort';
		$lang['Adr_element_oppose_weak']='Choisissez un �l�ment oppos� contre lequel cet �l�ment sera moins fort';
		$lang['Adr_element_oppose_str_dmg']='Choisissez un pourcentage pour l\'�l�ment le plus fort';
		$lang['Adr_element_oppose_same_dmg']='Choisissez un pourcentage pour le m�me �l�ment';
		$lang['Adr_element_oppose_weak_dmg']='Choisissez un pourcentage pour l\'�l�ment le plus faible';

		// Alignments
		$lang['Adr_alignments_add']='Ajouter un alignement';
		$lang['Adr_alignments_explain']='Vous pouvez configurer ici les alignements. Les ajouter, �diter et supprimer.'; 
		$lang['Adr_alignments_add_edit']='Ajout ou �dition d\'un alignement';
		$lang['Adr_alignments_add_edit_explain']='Ici vous pouvez �diter ou ajouter un alignement';
		$lang['Adr_alignments_image_explain']='L\'image doit �tre dans le r�pertoire /adr/images/alignments/';
		$lang['Adr_alignments_level_explain']='Vous pouvez restreindre l\'acc�s � certains alignements en fonction du type d\'utilisateur';
		$lang['Adr_alignment_successful_added']='Nouvel alignement correctement ajout�';
		$lang['Adr_alignment_successful_edited']='Alignement correctement �dit�';
		$lang['Adr_alignment_successful_deleted']='Alignement correctement supprim�';
		$lang['Adr_alignment_default']='Vous ne pouvez pas supprimer l\'alignement par d�faut';

		//Skills
		$lang['Adr_skills_explain']='Ici vous pouvez �diter les comp�tences';
		$lang['Adr_skills_req']='Utilisations';
		$lang['Adr_skills_add_edit']='Edition des comp�tences';
		$lang['Adr_skills_req_explain']='Nombre d\'utilisations r�ussies avant l\'am�lioration de la comp�tence';
		$lang['Adr_skills_successful_edited']='Comp�tence correctement mise � jour';
		$lang['Adr_skills_chance']='Chances';
		$lang['Adr_skills_chance_explain']='Pourcentage d\'utilisation r�ussie de la comp�tence � chaque niveau';

		// Inventory
		$lang['Adr_character_admin_inventory']='Voir l\'inventaire du personnage';
		$lang['Adr_delete_inventory']='Supprimer l\'inventaire';
		$lang['Adr_character_inventory_title']=' Contenu de l\'inventaire et de l\'entrep�t';
		$lang['Adr_admin_delete_entire_inventory']='Totalit� de l\'inventaire supprim�';
		$lang['Adr_admin_item_deleted']='Objets supprim�s de l\'inventaire';
	}

	if ( defined ('IN_ADR_SETTINGS'))
	{
		// General settings	
		$lang['Adr_admin_general_settings']='Param�tres g�n�raux';
		$lang['Adr_admin_general_settings_explain']='Ici vous pouvez �diter les options li�es � l\'ADR';
		$lang['Adr_admin_general_character_creation']='Cr�ation de personnage';
		$lang['Adr_admin_general_character_page_name']='Nom de la page de cr�ation du personnage';
		$lang['Adr_admin_general_character_allow_reroll']='Autoriser � refaire le tirage de leur caract�ristiques';
		$lang['Adr_admin_general_character_allow_delete']='Autoriser les membres � recr�er leur personnage';
		$lang['Adr_admin_general_character_stats_max']='Valeur maximum des caract�ristiques';
		$lang['Adr_admin_general_character_stats_min']='Valeur minimum des caract�ristiques';
		$lang['Adr_character_general_update_error']='Erreur durant la mise � jour des param�tres g�n�raux';
		$lang['Adr_character_general_update_success']='Les param�tres g�n�raux ont �t� correctement mis � jour';

		$lang['Adr_admin_general_shop_settings']='Param�tres des Magasins';
		$lang['Adr_admin_general_item_base_price_settings']='Param�tres des objets - Prix de base';
		$lang['Adr_admin_general_item_modifier_price_settings']='Param�tres des objets - Modificateurs';
		$lang['Adr_admin_general_item_modifier_power_settings']='Modificateur par puissance de l\'objet';
		$lang['Adr_admin_general_item_modifier_power_settings_explain']='Vous pouvez d�finir un pourcentage de valeur ajout�e � l\'objet en fonction de sa puissance';
		$lang['Adr_admin_general_item_modifier_quality_settings']='Modificateurs par qualit� de l\'objet';
		$lang['Adr_admin_general_item_modifier_quality_settings_explain']='Vous pouvez d�finir un pourcentage de valeur ajout�e � l\'objet en fonction de sa qualit�';
		$lang['Adr_admin_general_item_modifier_type_settings']='Prix de base des objets';
		$lang['Adr_admin_general_item_modifier_type_settings_explain']='Vous pouvez d�finir un pourcentage de valeur ajout�e � l\'objet en fonction de son type';
		$lang['Adr_admin_general_item_modifier_power']='Pourcentage de la valeur initiale de l\'objet pour chaque niveau de puissance gagn�';
		$lang['Adr_admin_allow_steal']='Permettre aux joueurs de voler dans les magasins';
		$lang['Adr_admin_allow_steal_sell']='Permettre la revente d\'objets vol�s ?';
		$lang['Adr_admin_allow_steal_sell_ex']='D�sactiver cette option emp�chera les utilisateurs de revendre � la boutique du forum les objets vol�s � celle-ci. Ces objets ne pourront ainsi �tre vendus que via les boutiques des utilisateurs.';
		$lang['Adr_admin_allow_steal_lvl']='Niveau minimum requis pour utiliser la comp�tence \'voleur\'';
		$lang['Adr_admin_allow_steal_lvl_ex']='Les joueurs devront avoir atteint ce niveau pour �tre capables de voler.';
		$lang['Adr_admin_steal_show']='Afficher le niveau de difficult� du vol d\'un objet dans la boutique du forum';
		$lang['Adr_admin_steal_show_ex']='Cette option active l\'affichage du niveau de difficult� du vol de l\'objet concern� dans la boutique du forum';

		$lang['Adr_admin_cache_int']='Intervalle de mise � jour automatique du cache';
		$lang['Adr_admin_cache_int_ex']='Cette option permet au cache de se r�generer toutes les x minutes. Une v�rification des renouvellements de quota est aussi effectu�e.<br>La valeur recommand�e est de 15 minutes. Diminuez cette valeur si vous jugez que les quotas sont incorrectement rafra�chies. Si cette valeur est trop faible vous risquez d\'avoir des probl�mes de surcharge de votre serveur, il est recommand� de ne pas descendre en dessous de 5 minutes.';

		$lang['Adr_admin_new_shop_price']='Prix n�cessaire � l\'ouverture d\'un magasin';
		$lang['Adr_admin_character_age']='Age initial du personnage � la cr�ation';
		$lang['Adr_admin_experience_posting']='Exp�rience gagn�e en postant';
		$lang['Adr_admin_weight_enable_title']='Restriction de poids en combat';
		$lang['Adr_admin_weight_enable']='Activer la restriction de poids';
		$lang['Adr_admin_experience_posting_new']='Exp�rience gagn�e en cr�ant un sujet';
		$lang['Adr_admin_experience_posting_reply']='Exp�rience gagn�e en r�pondant � un sujet';
		$lang['Adr_admin_experience_posting_edit']='Exp�rience gagn�e en �ditant un message';
		$lang['Adr_skill_trading_power']='Pourcentage de modification du prix pour chaque niveau de comp�tence';
		$lang['Adr_skill_thief_failure_amend']='Prix de l\'amende pour les voleurs (si le vol �choue)';
		$lang['Adr_skill_thief_failure_amend_explain']='Valeur minimum de l\'amende, si le prix de l\'objet est sup�rieur alors ce sera la valeur de l\'amende, vous pouvez mettre ce champ � 0 si vous ne souhaitez pas donner d\'amende';
		$lang['Adr_fail_steal_punishment']='Que faire si le joueur ne peut pas payer l\'amende ?';
		$lang['Adr_fail_steal_punishment0']='Ne pas donner l\'amende';
		$lang['Adr_fail_steal_punishment1']='Faire payer tout l\'argent disponible';
		$lang['Adr_fail_steal_punishment2']='Emprisonnement';
		$lang['Adr_fail_steal_type']='Type d\'emprisonnement dans ce cas';
		$lang['Adr_fail_steal_type0']='Refuser l\'acc�s au forum';
		$lang['Adr_fail_steal_type1']='Refuser le droit de poster';
		$lang['Adr_fail_steal_type2']='Refuser la lecture des messages';
		$lang['Adr_fail_steal_time']='Nombre d\'heures d\'emprisonnement';

		$lang['Adr_battle_item_power_level']='Limiter l\'utilisation des objets en combat';
		$lang['Adr_battle_item_power_level_explain']='Si vous cochez cette option, les joueurs ne pourront utiliser que des objets de puissance inf�rieure ou �gale � leur niveau';
		$lang['Adr_town_training_grounds_admin']='Entra�nement';
		$lang['Adr_town_training_grounds_admin_change_allow']='Autoriser le changement de classe';
		$lang['Adr_town_training_grounds_admin_change_cost']='Prix du changement de classe';
		$lang['Adr_town_training_grounds_admin_skill_cost']='Prix pour l\'entra�nement d\'une comp�tence par niveau';
		$lang['Adr_town_training_grounds_admin_charac_cost']='Prix pour l\'entra�nement d\'une caract�ristique par niveau';
		$lang['Adr_town_training_grounds_admin_upgrade_cost']='Prix d\'une am�lioration';

		$lang['Adr_use_cache']='Utiliser le syst�me de cache';
		$lang['Adr_use_cache_explain']='Le syst�me de cache permet de r�duire le nombre de requ�tes SQL, si vous souhaitez l\'activer, veillez � mettre le CHMOD � 666 sur les fichiers suivants :';
		$lang['Adr_display_profile']='Affichage dans le profil';
		$lang['Adr_display_profile_allow']='Activer l\'affichage de la feuille de personnage dans le profil';
		$lang['Adr_display_topics']='Affichage dans les r�pliques';
		$lang['Adr_display_topics_level']='Afficher le niveau';
		$lang['Adr_display_topics_text']='En tant que texte';
		$lang['Adr_display_topics_pic']='En tant qu\'image';
		$lang['Adr_display_topics_class']='Afficher la classe';
		$lang['Adr_display_topics_race']='Afficher la race';
		$lang['Adr_display_topics_element']='Afficher l\'�l�ment';
		$lang['Adr_display_topics_alignment']='Afficher l\'alignement';
		$lang['Adr_display_topics_pvp']='Afficher le lien de d�fi en duel';
		$lang['Adr_display_topics_rank']='Afficher le rang ADR actuel';
		$lang['Adr_display_topics_battle_stats']='Afficher les statistiques de combat actuelles';
		$lang['Adr_next_level_penalty']='P�nalit� pour le gain de niveau';
		$lang['Adr_next_level_penalty_explain']='Pourcentage d\'exp�rience ajout�e � chaque gain de niveau � l\'exp�rience ';
		$lang['Adr_admin_regen_period_title']='Limites de combats et d\'usage des comp�tences';
		$lang['Adr_admin_regen_enable']='Activer la limite de combats et de comp�tences';
		$lang['Adr_admin_regen_period']='P�riode pour la remise � z�ro des limites (en jours)';
		$lang['Adr_admin_battle_limit']='Nombre de combats autoris�s par jour';
		$lang['Adr_admin_skill_limit']='Nombre d\'entra�nements des comp�tences r�ussis par jour';
		$lang['Adr_admin_trading_limit']='Nombre maximum de ventes r�ussies par jour';
		$lang['Adr_admin_thief_limit']='Nombre maximum de vols r�ussis par jour';
		$lang['Adr_admin_enable_rpg_title']='Activer/D�sactiver le mod RPG';
		$lang['Adr_admin_enable_rpg']='Activer ou d�sactiver la totalit� du mod RPG';
		$lang['Adr_admin_posts']='Activer le nombre minimum de r�pliques pour cr�er un personnage :';
		$lang['Adr_admin_posts_min']='Nombre minimum de r�pliques requises :';
		$lang['Adr_admin_character_tax']='Taxes de Magasin et d\'entrep�t';
		$lang['Adr_admin_character_shop_tax']='Taxe sur l\'ouverture d\'un magasin :';
		$lang['Adr_admin_character_shop_dura']='Dur�e entre les charges du magasin :';
		$lang['Adr_admin_character_wh_tax']='Taxe sur l\'ouverture de l\'entrep�t :';
		$lang['Adr_admin_character_wh_dura']='Dur�e entre les charges de l\'entrep�t :';
		$lang['Adr_admin_days']='jours';
      	$lang['Adr_admin_hours']='heures';
      	$lang['Adr_admin_mins']='minutes';

		$lang['Adr_pvp']='Duels entre joueurs';
		$lang['Adr_display_topics_link']='Afficher le lien vers le personnage';
		$lang['Adr_pvp_enable_pvp']='Activer les duels';
		$lang['Adr_pvp_defies_max']='Nombre maximum de d�fis en duel autoris�s';
		$lang['Adr_pvp_stats_exp_modifier_explain']='D�finit un pourcentage de diff�rence d\'exp�rience gagn�e pour chaque niveau de diff�rence entre les deux joueurs';
		$lang['Adr_pvp_stats_reward_modifier_explain']='D�finit un pourcentage de diff�rence d\'argent gagn� pour chaque niveau de diff�rence entre les deux joueurs';
	}

	if ( defined ('IN_ADR_SHOPS'))
	{
		$lang['Adr_shops_item_title']='Gestion des objets dans le magasin du forum';
		$lang['Adr_shops_item_title_explain']='Ici vous pouvez g�rer le magasin du forum';
		$lang['Adr_shops_item_add']='Ajouter un objet';
		$lang['Adr_shops_item_add_title']='Ajout ou �dition d\'objets';
		$lang['Adr_shops_item_add_title_explain']='Ici vous pouvez ajouter ou �diter des objets du magasin du forum';
		$lang['Adr_items_image_explain']='L\'image doit �tre dans le r�pertoire /adr/images/items/';
		$lang['Adr_shops_items_successful_edited']='Objet correctement modifi�';
		$lang['Adr_shops_items_successful_added']='Objet correctement ajout�';
		$lang['Adr_shops_items_successful_deleted']='Objet correctement supprim�';
		$lang['Adr_items_duration_max']='Durabilit� maximum';
		$lang['Adr_item_max_skill']='Puissance maximum obtenue � la forge :';
		$lang['Adr_item_sell_back']='Pourcentage de p�nalit� � la revente :';
		$lang['Adr_item_sell_back_explain']='C\'est le pourcentage de p�nalit� appliqu� au prix standard du magasin du forum lors de la revente au magasin. Le calcul est fait sur base de la comp�tence � marchander, la qualit� et durabilit� de l\'objet.';
		$lang['Adr_item_sell_back_title']='Revendre';
		$lang['Adr_items_price_explain']='Si vous laissez ce champ vide le prix sera calcul� automatiquement (recommand�)';
		$lang['Adr_shops_item_element']='Type d\'�l�ment (Armes et sorts uniquement) :';
		$lang['Adr_shops_item_element_str']='Pourcentage donn� contre un �l�ment oppos� plus faible :';
		$lang['Adr_shops_item_element_same']='Pourcentage donn� contre le m�me �l�ment :';
		$lang['Adr_shops_item_element_weak']='Pourcentage donn� contre un �l�ment oppos� plus fort :';

		$lang['Adr_items_store']='Ajouter au type de magasin :';
		$lang['Adr_items_element_none']='Aucun �l�ment';
		$lang['Adr_items_dex_explain']='Quand le joueur �quipe cet objet pour le combat cette valeur sera rajout�e � sa puissance (Ne fonctionne pas avec les anneaux et amulettes).';
		$lang['Adr_items_mp_use_explain']='Si elle est d�termin�e cette valeur pr�l�vera des MP suppl�mentaires lors de l\'utilisation d\'une arme ou d\'un sort.';

		$lang['Adr_store_title']='Cat�gories de magasins du forum';
		$lang['Adr_store_title_explain']='Cr�er et ajouter des cat�gories de magasins :';
		$lang['Adr_store_name']='Nom du magasin :';
		$lang['Adr_store_desc']='Description :';
		$lang['Adr_store_status']='Statut :<br />(depuis v0.40)';
		$lang['Adr_store_sales']='Statut des ventes :<br />(depuis v0.40)';
		$lang['Adr_store_auth']='En faire un objet propre aux administrateurs :';
		$lang['Adr_store_view']='Rendre les objets du magasin non achetables (voir uniquement)';
		$lang['Adr_store_view_title']='Voir :';
		$lang['Adr_store_cat_add']='Ajouter une nouvelle cat�gorie';
		$lang['Adr_store_status_closed']='Ferm�';
		$lang['Adr_store_status_open']='Ouvert';
		$lang['Adr_store_sales_on']='Ventes autoris�es';
		$lang['Adr_store_sales_off']='Ventes non autoris�es';
		$lang['Adr_store_auth_all']='Tous';
		$lang['Adr_store_auth_admin']='Administrateurs uniquement';
		$lang['Adr_store_open']='Ouvert';
		$lang['Adr_store_closed']='Ferm�';
		$lang['Adr_store_normal']='Normal';
		$lang['Adr_store_sale']='Vente';
		$lang['Adr_store_all']='Tous les utilisateurs';
		$lang['Adr_store_admin']='Administrateurs uniquement';
		$lang['Adr_store_image_explain']='L\'image doit �tre dans le r�pertoire /adr/images/store/';
		$lang['Adr_store_cats_successful_deleted']='Magasin correctement supprim�';
		$lang['Adr_store_cats_successful_edit']='Magasin correctement �dit�';
		$lang['Adr_store_cats_successful_new']='Magasin correctement cr��';
		$lang['Adr_items_steal_explain']='Choisissez le niveau de difficult� du vol de cet objet dans le magasin. La valeur entre parenth�ses est la classe de difficult� (DC), elle devrait �tre doubl�e pour savoir quel niveau est n�cessaire au joueur pour r�ussir son vol. Cette valeur est invisible pour le joueur et devrait le rester.';

		// Item Restriction keys
        $lang['Adr_admin_item_restrict_title']='Restrictions d\'utilisation de l\'objet';
        $lang['Adr_admin_item_restrict_class_enable']='Activer la restriction de classe';
        $lang['Adr_admin_item_restrict_class_enable_explain']='Activer cette option permet de restreindre cet objet � une ou plusieurs classes.<br>Si elle est d�sactiv�e alors l\'objet sera accessible � tous ind�pendamment de la classe.';
        $lang['Adr_admin_item_restrict_class']='S�lection de classe';
        $lang['Adr_admin_item_restrict_alignment_enable']='Activer la restriction d\'�l�ment';
        $lang['Adr_admin_item_restrict_alignment_enable_explain']='Activer cette option permet de restreindre cet objet � un ou plusieurs alignements.<br>Si elle est d�sactiv�e alors l\'objet sera accessible � tous ind�pendamment de l\'alignement.';
        $lang['Adr_admin_item_restrict_alignment']='S�lection d\'alignement';
        $lang['Adr_admin_item_restrict_race_enable']='Activer la restriction de race';
        $lang['Adr_admin_item_restrict_race_enable_explain']='Activer cette option permet de restreindre cet objet � une ou plusieurs races.<br>Si elle est d�sactiv�e alors l\'objet sera accessible � tous ind�pendamment de la race';
        $lang['Adr_admin_item_restrict_race']='S�lection de race';
        $lang['Adr_admin_item_restrict_element_enable']='Activer la restriction d\'�lement';
        $lang['Adr_admin_item_restrict_element_enable_explain']='Activer cette option permet de restreindre cet objet � un ou plusieurs �l�ments.<br>Si elle est d�sactiv�e alors l\'objet sera accessible � tous ind�pendamment de l\'�l�ment.';
        $lang['Adr_admin_item_restrict_element']='S�lection d\'�l�ment';
		$lang['Adr_admin_item_restrict_level']='Restriction de niveau';
		$lang['Adr_admin_item_restrict_level_explain']='Niveau minimum requis pour utiliser cet objet.';
		$lang['Adr_admin_item_restrict_chars']='Restrictions de caract�ristiques';
		$lang['Adr_admin_item_restrict_chars_explain']='Vous pouvez d�finir ici les caract�ristiques minimums n�cessaires pour pouvoir utiliser cet objet.';
		$lang['Adr_admin_item_mass_delete']='Suppresion massive de cet objet des inventaires des utilisateurs';
		$lang['Adr_admin_item_mass_delete_ex']='Selectioner cette option supprimera toutes les occurences de cet objet dans les inventaires des utilisateurs.<br>La recherche dans la base de donn�es se fait par nom d\'objet uniquement, vous devriez donc selectionner cette option AVANT de renommer un objet si vous souhaitez supprimer massivement cet objet.<br>Cette option ne supprimera pas l\'objet des boutiques du forum, vous continuerez donc de le voir dans la liste d\'objets de l\'ACP.';

		$lang['Adr_items_price_sp']='Co�t en Points de Spiritualit� (SP)';
		$lang['Adr_items_price_sp_explain']='Vous pouvez rajouter un co�t additionnel en points de spiritualit� � cet objet (SP). Ils se gagnent en gagnant des combats contre des monstres.<br>Si la valeur est � z�ro alors ce ne sera pas affich� dans la boutique du forum.';
		$lang['Adr_items_price_fp']='Co�t en Points de Faction (FP)';
		$lang['Adr_items_price_fp_explain']='Vous pouvez rajouter un co�t additionnel en points de faction � cet objet (FP). Ils se gagnent en gagnat des duels.<br>Si la valeur est � z�ro alors ce ne sera pas affich� dans la boutique du forum.';
	}

	if ( defined ('IN_ADR_VAULT'))
	{
		$lang['Adr_vault_update_error']='Une erreur est survenue pendant la mise � jour des donn�es de la banque';
		$lang['Adr_vault_updated_return_settings']='La configuration de la banque s\'est correctement d�roul�e. <br /><br />Cliquez %sICI%s pour retourner � l\'�cran de configuration de la banque';
		$lang['Adr_vault_settings']='Configuration de la banque';
		$lang['Adr_vault_settings_explain']='Vous pouvez ici changer la configuration de la banque';
		$lang['Adr_vault_use']='Activer la banque';
		$lang['Adr_vault_settings_name']='Nom de la banque';
		$lang['Adr_vault_interests_rate']='Taux d\'int�r�ts';
		$lang['Adr_vault_interests_rate_explain']='Pourcentage de la somme totale poss�d�e qui sera donn�e lors du prochain versement des int�r�ts';
		$lang['Adr_vault_interests_time']='Temps d\'attente des int�r�ts';
		$lang['Adr_vault_interests_time_explain']='Dur�e entre chaque versement d\'int�r�ts (en secondes).';
		$lang['Adr_vault_loan_use']='Activer le syst�me de pr�ts';
		$lang['Adr_vault_loan_interests']='Taux d\'int�r�t des pr�ts';
		$lang['Adr_vault_loan_interests_explain']='Pourcentage de la somme emprunt�e que l\'utilisateur devra rendre en plus';
		$lang['Adr_vault_loan_interests_time']='Dur�e du pr�t';
		$lang['Adr_vault_loan_interests_time_explain']='Temps au bout duquel le pr�t devra �tre rembours� (en secondes).';
		$lang['Adr_vault_max_sum']='Montant maximal';
		$lang['Adr_vault_max_sum_explain']='Montant maximal que le joueur peut emprunter';
		$lang['Adr_vault_requirements']='Pr� requis';
		$lang['Adr_vault_requirements_explain']='Nombre minimum de r�pliques pour pouvoir effectuer un pr�t';
		$lang['Adr_vault_attack_use']='Activer le syst�me d\'attaque de la tr�sorerie';
		$lang['Adr_vault_time_explain']='Correspond � ';
		$lang['Adr_vault_exchange_settings']='Configuration de la bourse';
		$lang['Adr_vault_exchange_settings_explain']='Vous pouvez configurer ici la bourse';
		$lang['Adr_vault_exchange_use']='Activer la bourse';
		$lang['Adr_vault_exchange_min']='Pourcentage minimum des variations';
		$lang['Adr_vault_exchange_min_explain']='C\'est la variation minimale du cours des actions';
		$lang['Adr_vault_exchange_max']='Pourcentage maximum des variations';
		$lang['Adr_vault_exchange_max_explain']='C\'est la variation maximale du cours des actions';
		$lang['Adr_vault_exchange_time']='Temps entre les variations';
		$lang['Adr_vault_exchange_time_explain']='C\'est le temps entre le changement des valeurs des actions (en secondes) ';
		$lang['Adr_vault_exchange_updated_return_settings']='La configuration de la bourse a �t� correctement modifi�e. <br /><br />Cliquez %sICI%s pour retourner � la configuration de la bourse';
		$lang['Adr_vault_exchange_actions_name']='Nom';
		$lang['Adr_vault_exchange_actions_desc']='Description';
		$lang['Adr_vault_exchange_actions_amount']='Prix';
		$lang['Adr_vault_exchange_action']='Action';
		$lang['Adr_vault_exchange_edit']='Editer';
		$lang['Adr_vault_exchange_delete']='Supprimer';
		$lang['Adr_vault_exchange_actions_add']='Ajouter une action';
		$lang['Adr_vault_exchange_settings_add']='Ajouter une action';
		$lang['Adr_vault_exchange_settings_explain_add']='Ce formulaire vous permet d\'ajouter une action';
		$lang['Adr_vault_exchange_actions_add']='Ajouter une action';
		$lang['Adr_vault_exchange_settings_edit']='Editer une action';
		$lang['Adr_vault_exchange_settings_explain_edit']='Ce formulaire vous permet d\'�diter une action';
		$lang['Adr_vault_exchange_actions_edit']='Editer une action';
		$lang['Adr_vault_exchange_added_return_settings']='L\'action a �t� correctement ajout�e. <br /><br />Cliquez %sICI%s pour retourner � la configuration de la bourse';
		$lang['Adr_vault_exchange_edited_return_settings']='L\'action a �t� correctement modifi�e. <br /><br />Cliquez %sICI%s pour retourner � la configuration de la bourse';
		$lang['Adr_vault_exchange_deleted_return_settings']='L\'action a �t� correctement supprim�e. <br /><br />Cliquez %sICI%s pour retourner � la configuration de la bourse';
		$lang['Adr_vault_users_title']='Gestion des clients';
		$lang['Adr_vault_users_title_explain']='Vous pouvez modifier ici les informations relatives aux clients';
		$lang['Adr_vault_user_select']='Choisir un utilisateur';
		$lang['Adr_vault_user_select_list']='De la liste';
		$lang['Adr_vault_user_select_input']='En tapant son pseudo';
		$lang['Adr_vault_user']='Utilisateur';
		$lang['Adr_vault_user_account']='Compte';
		$lang['Adr_vault_user_on_account']='Sur le compte';
		$lang['Adr_vault_no_loan']='Pas d\'emprunt';
		$lang['Adr_vault_user_loan']='Somme emprunt�e';
		$lang['Adr_vault_user_pay_off']='Rembourser le pr�t de ce membre';
		$lang['Adr_vault_user_preferences']='Pr�f�rences';
		$lang['Adr_vault_user_protect_account']='Compte prot�g�';
		$lang['Adr_vault_user_protect_loan']='Pr�t prot�g�';
		$lang['Adr_vault_users_updated_return_settings']='Compte correctement modifi�. <br /><br /> Cliquez %sICI%s pour retourner � l\'�cran de gestion des comptes';
	}

	if ( defined ('IN_ADR_BATTLE'))
	{
		$lang['Adr_battle_settings']='Configuration des combats';
		$lang['Adr_battle_settings_explain']='Vous pouvez configurer ici le syst�me de combat';
		$lang['Adr_battle_use']='Activer le syst�me de combat';
		$lang['Adr_battle_monsters']='Combats contre des monstres';
		$lang['Adr_battle_monsters_stats_modifier']='Modification des caract�ristiques en fonction de la diff�rence de niveau';
		$lang['Adr_battle_monsters_stats_modifier_explain']='D�finit un pourcentage de diff�rence des caract�ristiques en fonction de l\'�cart de niveau entre les deux adversaires';
		$lang['Adr_battle_monsters_modifier_type']='Type d\'�quation utilis�e :';
		$lang['Adr_battle_monsters_modifier_type_explain']='L\'ancienne �quation �tait utilis�e dans toutes les versions pr�c�dant la v0.3.4<br />La nouvelle �quation est celle post�e par Xanathis sur le forum ADR (recommand�e)';
		$lang['Adr_battle_monsters_modifier_type_1']='Ancienne';
		$lang['Adr_battle_monsters_modifier_type_2']='Nouvelle';
		$lang['Adr_battle_monster_stats_exp_min']='Gain minimum d\'exp�rience en cas de victoire';
		$lang['Adr_battle_monster_stats_exp_max']='Gain maximum d\'exp�rience en cas de victoire';
		$lang['Adr_battle_monster_stats_exp_modifier']='Gain d\'exp�rience en fonction de la diff�rence de niveau';
		$lang['Adr_battle_monster_stats_exp_modifier_explain']='D�finit le pourcentage d\'exp�rience gagn�e en fonction de l\'�cart de niveau avec le monstre';
		$lang['Adr_battle_monster_stats_sp_modifier']='Gain de SP en fonction de la diff�rence de niveau';
		$lang['Adr_battle_monster_stats_sp_modifier_explain']='D�finit le pourcentage de SP gagn�s en fonction de l\'�cart de niveau avec le monstre';
		$lang['Adr_battle_monster_stats_reward_min']='Minimum de points gagn�s en cas de victoire';
		$lang['Adr_battle_monster_stats_reward_max']='Minimum de points gagn�s en cas de victoire';
		$lang['Adr_battle_monster_stats_reward_modifier']='Gain de points en fonction de la diff�rence de niveau';
		$lang['Adr_battle_monster_stats_reward_modifier_explain']='D�finit le pourcentage de points gagn�s en fonction de l\'�cart de niveau avec le monstre';
		$lang['Adr_admin_monsters']='Monstres';
		$lang['Adr_admin_monsters_explain']='Ici vous pouvez ajouter, �diter ou modifier les monstres';
		$lang['Adr_monsters_name']='Nom du monstre';
		$lang['Adr_monsters_image']='Image';
		$lang['Adr_monsters_level']='Niveau';
		$lang['Adr_admin_monsters_base_hp']='Points de vie';
		$lang['Adr_admin_monsters_base_def']='D�fense';
		$lang['Adr_admin_monsters_att']='Attaque';
		$lang['Adr_admin_monsters_element']='El�ment';
		$lang['Adr_admin_monsters_ma']='Attaque magique';
		$lang['Adr_admin_monsters_md']='D�fense magique';
		$lang['Adr_admin_monsters_base_mp']='Points de mana';
		$lang['Adr_admin_monsters_base_mp_power']='Puissance du sort';
		$lang['Adr_admin_monsters_base_sp']='Points de spiritualit� (SP)';
		$lang['Adr_admin_monsters_custom_spell']='Nom du sort';
		$lang['Adr_admin_monsters_custom_spell_explain']='Entrez le nom du sort qui sera utilis� par le monstre, si vous laissez ce champ vide, le nom par d�faut sera utilis�.';
		$lang['Adr_admin_monsters_thief_skill']='Capacit� � voler';
		$lang['Adr_monsters_add']='Ajouter un monstre';
		$lang['Adr_monsters_add_edit']='Ajout ou �dition de monstres';
		$lang['Adr_monsters_add_edit_explain']='Vous pouvez ajouter ou �diter ici des monstres';
		$lang['Adr_monsters_image_explain']='L\'image doit �tre dans le r�pertoire /adr/images/monsters/';
		$lang['Adr_monster_successful_added']='Monstre correctement ajout�';
		$lang['Adr_monster_successful_deleted']='Monstre correctement supprim�';
		$lang['Adr_monster_successful_edited']='Monstre correctement �dit�';
		$lang['Adr_battle_thief']='Configuration de la capacit� � voler du monstre';
		$lang['Adr_battle_thief_enable']='Activer/D�sactiver la facult� de voler pour les monstres';
		$lang['Adr_battle_thief_points']='Pourcentage de points � voler au joueur';
	}

	if ( defined ('IN_ADR_TOOLS'))
	{
		$lang['Adr_admin_tools_cache_settings']='Gestion du cache';
		$lang['Adr_admin_tools_cache_settings_explain']='Resynchronisez le cache si vous voyez des d�calages entre vos param�tres et le forum';
		$lang['Adr_admin_tools_update_cache']='Resynchroniser le cache';
		$lang['Adr_admin_tools_cache_updated']='Cache correctement resynchronis�';
		$lang['Adr_admin_tools_convertors_settings']='Convertisseurs';
		$lang['Adr_admin_tools_convertors_settings_explain']='En utilisant ce formulaire vous pouvez convertir les donn�es d\'autres mod RPG vers ADR';
		$lang['Adr_admin_tools_convertors_update']='Mettre � jour';
		$lang['Adr_admin_tools_convertors_update_items']='Convertir les objets du SHOP mod de Zarath';
		$lang['Adr_admin_tools_convertors_update_bank']='Convertir les comptes du BANK mod de Zarath';
		$lang['Adr_admin_tools_convertors_delete']='Supprimer';
		$lang['Adr_admin_tools_convertors_delete_item']='Supprimer les entr�es de la base de donn�es du SHOP mod de Zarath';
		$lang['Adr_admin_tools_convertors_delete_vault']='Supprimer les entr�es de la base de donn�es du VAULT mod de Dr DLP';
		$lang['Adr_admin_tools_convertors_delete_bank']='Supprimer les entr�es de la base de donn�es du BANK mod de Zarath';
		$lang['Adr_admin_tools_convertors_bank_updated']='BANK mod correctement mis � jour';
		$lang['Adr_admin_tools_convertors_bank_deleted']='BANK mod correctement supprim�';
		$lang['Adr_admin_users_updated']='RPG STATS mod correctement converti';
		$lang['Adr_admin_tools_convertors_update_users']='Convertir les personnage du RPG STATS mod par Moogie';
		$lang['Adr_admin_tools_convertors_delete_rpg_stats']='Supprimer les entr�es de la base de donn�es du RPG STATS mod par Moogie';
		$lang['Adr_admin_tools_convertors_update_vault']='Convertir les comptes du VAULT mod de Dr DLP';
		$lang['Adr_admin_tools_convertors_vault_deleted']='VAULT mod correctement supprim�';
		$lang['Adr_admin_tools_convertors_rpg_stats_deleted']='RPG STATS mod correctement supprim�';
		$lang['Adr_admin_tools_convertors_shop_deleted']='SHOP mod correctement supprim�';
		$lang['Adr_admin_tools_convertors_vault_updated']='VAULT mod correctement converti';
		$lang['Adr_admin_tools_convertors_shop_updated']='SHOP mod correctement converti';
		$lang['Adr_admin_tools_convertors_jail_updated']='JAIL mod correctement converti';
		$lang['Adr_admin_tools_convertors_update_jail']='Convertir les personnages du JAIL mod par Dr DLP';
		$lang['Adr_admin_tools_convertors_jail_deleted']='JAIL mod correctement supprim�';
		$lang['Adr_admin_tools_convertors_delete_jail']='Supprimer les entr�es de la base de donn�es du JAIL mod par Dr DLP';
		$lang['Adr_admin_tools_convertors_warnings']='ATTENTION !!.<br /><br /> Toutes ces op�rations sont irr�versibles, veillez � sauvegarder votre base de donn�es au pr�alable.<br /><br />L\'auteur de ce mod n\'est pas responsable si des erreurs surviennent suite � l\'utilisation de ces fonctions.';
		$lang['Adr_admin_tools_resync_items']='Resynchroniser les prix des objets';
		$lang['Adr_admin_tools_resync_items_explain']='Cela vous permet de remettre � jour les prix des objets de la boutique du forum si vous les avez modifi�s.';
		$lang['Adr_admin_tools_resync_items_action']='Resynchroniser les prix des objets ';
		$lang['Adr_admin_tools_items_updated']='Prix correctement recalcul�s';
		$lang['Adr_admin_tools_armaggedon']='Supprimer tous les magasins, objets et personnages';
		$lang['Adr_admin_tools_armaggedon_explain']='Si vous cliquez sur ce bouton, toutes les donn�es concernant les magasins, objets et personnages seront supprim�es. <br /><b>Irr�versible !</b> ';
		$lang['Adr_admin_tools_armaggedon_characters']='Supprimer tous les personnages uniquement';
		$lang['Adr_admin_tools_armaggedon_zero_dura']='Vider les tables de tous les objets ayant 0 de durabilit�';
        $lang['Adr_admin_tools_armaggedon_battle_list']='Supprimer tous les rapports de combats';
		$lang['Adr_admin_tools_armaggedon_optimise']='Optimiser les tables';
		$lang['Adr_admin_tools_armaggedon_shops']='Supprimer tous les magasins des joueurs';
		$lang['Adr_admin_tools_armaggedon_user_items']='Supprimer tous les objets des joueurs';
		$lang['Adr_admin_tools_armaggedon_shops_items']='Supprimer tous les objets du magasin du forum';
		$lang['Adr_admin_tools_armaggedon_done']='Suppression r�ussie';
		$lang['Adr_admin_tools_armaggedon_dura']='Objets � durabilit� �gale � 0 supprim�s';
		$lang['Adr_admin_tools_armaggedon_shops_yes']='Tous les objets des boutiques ont �t� supprim�s';
		$lang['Adr_admin_tools_armaggedon_shops_done']='Suppression de tous les objets du magasin r�ussie.';
		$lang['Adr_admin_tools_user_items']='Suppression de tous les objets des utilisateurs r�ussie.';
	}

	if ( defined ('IN_ADR_USERS'))
	{
		$lang['Adr_admin_character_inventory']='Choisissez l\'inventaire d\'un utilisateur';
		$lang['Adr_admin_character_delete']='Supprimer ce personnage (Irr�versible)';
		$lang['Adr_admin_character_edit']='Valider les changements';
		$lang['Adr_admin_character_charac']='Caract�ristiques';
		$lang['Adr_admin_character_edited']='Personnage correctement modifi�';
		$lang['Adr_admin_character_deleted']='Personnage correctement supprim�';
		$lang['Adr_admin_character_lack']='Cet utilisateur n\'a pas cr�� de personnage';
		$lang['Adr_user_admin']='Gestion des personnages';
		$lang['Adr_user_admin_explain']='Ici vous pouvez �diter ou supprimer les personnages';
		$lang['Adr_user_battle_skills']='Limites de combats et comp�tences';
		$lang['Adr_user_battle_limit']='Nombre de combats restants :';
		$lang['Adr_user_skill_limit']='Nombre d\'utilisations des comp�tences restantes :';
		$lang['Adr_user_trading_limit']='Nombre d\'utilisations de la comp�tence de marchandage restantes :';
		$lang['Adr_user_thief_limit']='Nombre d\'utilisations de la comp�tence de voleur restantes :';
	}

	if ( defined ('IN_ADR_TRACKER'))
	{
		$lang['Adr_tracker_title']='Voir les objets';
		$lang['Adr_tracker_text']='Ici vous pouvez voir les achats, ventes, donations et vols';
		$lang['Adr_tracker_name']='Utilisateur :';
		$lang['Adr_tracker_item']='Objet :';
		$lang['Adr_tracker_from']='De l\'utilisateur :';
		$lang['Adr_tracker_shop']='Nom du magasin :';
		$lang['Adr_tracker_action']='Action :';
		$lang['Adr_tracker_date']='Date :';
		$lang['Adr_tracker_clear']='Vider la liste';
	}
}
?>
