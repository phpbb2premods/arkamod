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
		$lang['Adr_races_explain']='Vous pouvez configurer ici les races. Les ajouter, éditer et supprimer.'; 
		$lang['Adr_races_add']='Ajouter une race';
		$lang['Adr_races_add_edit']='Ajout ou édition d\'une race';
		$lang['Adr_races_add_edit_explain']='Ici vous pouvez ajouter ou éditer une race.'; 
		$lang['Adr_races_name_explain']='Vous pouvez utiliser un alias du fichier de langues';
		$lang['Adr_races_image_explain']='L\'image doit être dans le répertoire /adr/images/races/';
		$lang['Adr_races_level']='Niveau d\'utilisateur';
		$lang['Adr_races_level_explain']='Vous pouvez restreindre l\'accès à certaines races en fonction du type d\'utilisateur';
		$lang['Adr_races_level_all']='Tous';
		$lang['Adr_races_level_admin']='Administrateur';
		$lang['Adr_races_level_mod']='Modérateur';
		$lang['Adr_race_successful_added']='Nouvelle race correctement ajoutée';
		$lang['Adr_race_successful_edited']='Race correctement éditée';
		$lang['Adr_race_default']='Vous ne pouvez pas supprimer la race par défaut';
		$lang['Adr_race_successful_deleted']='Race correctement supprimée';
		$lang['Adr_races_weight']='Poids maximum initial';
		$lang['Adr_races_weight_per_level']='Pourcentage de poids supplémentaire par niveau gagné';

		// Classes
		$lang['Adr_classes_explain']='Vous pouvez configurer ici les classes. Les ajouter, éditer et supprimer.'; 
		$lang['Adr_classes_add']='Ajouter une classe';
		$lang['Adr_classes_add_edit']='Ajout ou édition d\'une classe';
		$lang['Adr_classes_add_edit_explain']='Ici vous pouvez ajouter ou éditer une classe.'; 
		$lang['Adr_classes_image_explain']='L\'image doit être dans le répertoire /adr/images/classes/';
		$lang['Adr_classes_level_explain']='Vous pouvez restreindre l\'accès à certaines classes en fonction du type d\'utilisateur';
		$lang['Adr_classes_req_might']='Valeur minimum de la caractéristique Puissance';
		$lang['Adr_classes_req_dext']='Valeur minimum de la caractéristique Agilité';
		$lang['Adr_classes_req_const']='Valeur minimum de la caractéristique Endurance';
		$lang['Adr_classes_req_int']='Valeur minimum de la caractéristique Intelligence';
		$lang['Adr_classes_req_wis']='Valeur minimum de la caractéristique Sagesse';
		$lang['Adr_classes_req_cha']='Valeur minimum de la caractéristique Charme';
		$lang['Adr_classes_req_ma']='Valeur minimum de la caractéristique Attaque magique';
		$lang['Adr_classes_req_md']='Valeur minimum de la caractéristique Défense magique';
		$lang['Adr_class_successful_added']='Nouvelle classe correctement ajoutée';
		$lang['Adr_class_successful_edited']='Classe correctement éditée';
		$lang['Adr_class_default']='Vous ne pouvez pas supprimer la classe par défaut';
		$lang['Adr_class_successful_deleted']='Classe correctement supprimée';
		$lang['Adr_classes_update_xp_req']='Points d\'expérience nécessaires pour gagner un niveau';
		$lang['Adr_classes_update_of']='Est une évolution de';
		$lang['Adr_classes_update_of_req']='Niveau requis pour évoluer en cette classe';
		$lang['Adr_classes_selectable']='Peut-être choisi à la création du personnage';
		$lang['Adr_classes_evolution_none']='N\'est pas une évolution';

		// Elements
		$lang['Adr_elements_add']='Ajouter un élément';
		$lang['Adr_elements_explain']='Vous pouvez configurer ici les éléments. Les ajouter, éditer et supprimer.'; 
		$lang['Adr_elements_add_edit']='Ajout et édition d\'éléments';
		$lang['Adr_elements_add_edit_explain']='Ici vous pouvez ajouter ou supprimer un élement';
		$lang['Adr_elements_colour']='Couleur de l\'élément';
		$lang['Adr_elements_colour_ex']='Ici vous pouvez choisir une couleur à appliquer aux noms des objets durant les combats.<br>Vous pouvez choisir un alias (par exemple : red) tant que celui-ci est défini dans votre fichier css, ou sinon utiliser le <a href="http://www.w3schools.com/html/html_colornames.asp" target="_blank">code hexadécimal</a> qui correspond à la couleur souhaitée.';
		$lang['Adr_elements_image_explain']='L\'image doit être dans le répertoire /adr/images/elements/';
		$lang['Adr_elements_level_explain']='Vous pouvez restreindre l\'accès à certains éléments en fonction du type d\'utilisateur';
		$lang['Adr_element_successful_added']='Nouvel élément correctement ajouté';
		$lang['Adr_element_successful_edited']='Elément correctement édité';
		$lang['Adr_element_successful_deleted']='Elément correctement supprimé';
		$lang['Adr_element_default']='Vous ne pouvez pas supprimer l\'élément par défaut';

		$lang['Adr_element_oppose_str']='Choisissez un élément opposé contre lequel cet élément sera plus fort';
		$lang['Adr_element_oppose_weak']='Choisissez un élément opposé contre lequel cet élément sera moins fort';
		$lang['Adr_element_oppose_str_dmg']='Choisissez un pourcentage pour l\'élément le plus fort';
		$lang['Adr_element_oppose_same_dmg']='Choisissez un pourcentage pour le même élément';
		$lang['Adr_element_oppose_weak_dmg']='Choisissez un pourcentage pour l\'élément le plus faible';

		// Alignments
		$lang['Adr_alignments_add']='Ajouter un alignement';
		$lang['Adr_alignments_explain']='Vous pouvez configurer ici les alignements. Les ajouter, éditer et supprimer.'; 
		$lang['Adr_alignments_add_edit']='Ajout ou édition d\'un alignement';
		$lang['Adr_alignments_add_edit_explain']='Ici vous pouvez éditer ou ajouter un alignement';
		$lang['Adr_alignments_image_explain']='L\'image doit être dans le répertoire /adr/images/alignments/';
		$lang['Adr_alignments_level_explain']='Vous pouvez restreindre l\'accès à certains alignements en fonction du type d\'utilisateur';
		$lang['Adr_alignment_successful_added']='Nouvel alignement correctement ajouté';
		$lang['Adr_alignment_successful_edited']='Alignement correctement édité';
		$lang['Adr_alignment_successful_deleted']='Alignement correctement supprimé';
		$lang['Adr_alignment_default']='Vous ne pouvez pas supprimer l\'alignement par défaut';

		//Skills
		$lang['Adr_skills_explain']='Ici vous pouvez éditer les compétences';
		$lang['Adr_skills_req']='Utilisations';
		$lang['Adr_skills_add_edit']='Edition des compétences';
		$lang['Adr_skills_req_explain']='Nombre d\'utilisations réussies avant l\'amélioration de la compétence';
		$lang['Adr_skills_successful_edited']='Compétence correctement mise à jour';
		$lang['Adr_skills_chance']='Chances';
		$lang['Adr_skills_chance_explain']='Pourcentage d\'utilisation réussie de la compétence à chaque niveau';

		// Inventory
		$lang['Adr_character_admin_inventory']='Voir l\'inventaire du personnage';
		$lang['Adr_delete_inventory']='Supprimer l\'inventaire';
		$lang['Adr_character_inventory_title']=' Contenu de l\'inventaire et de l\'entrepôt';
		$lang['Adr_admin_delete_entire_inventory']='Totalité de l\'inventaire supprimé';
		$lang['Adr_admin_item_deleted']='Objets supprimés de l\'inventaire';
	}

	if ( defined ('IN_ADR_SETTINGS'))
	{
		// General settings	
		$lang['Adr_admin_general_settings']='Paramètres généraux';
		$lang['Adr_admin_general_settings_explain']='Ici vous pouvez éditer les options liées à l\'ADR';
		$lang['Adr_admin_general_character_creation']='Création de personnage';
		$lang['Adr_admin_general_character_page_name']='Nom de la page de création du personnage';
		$lang['Adr_admin_general_character_allow_reroll']='Autoriser à refaire le tirage de leur caractéristiques';
		$lang['Adr_admin_general_character_allow_delete']='Autoriser les membres à recréer leur personnage';
		$lang['Adr_admin_general_character_stats_max']='Valeur maximum des caractéristiques';
		$lang['Adr_admin_general_character_stats_min']='Valeur minimum des caractéristiques';
		$lang['Adr_character_general_update_error']='Erreur durant la mise à jour des paramètres généraux';
		$lang['Adr_character_general_update_success']='Les paramètres généraux ont été correctement mis à jour';

		$lang['Adr_admin_general_shop_settings']='Paramètres des Magasins';
		$lang['Adr_admin_general_item_base_price_settings']='Paramètres des objets - Prix de base';
		$lang['Adr_admin_general_item_modifier_price_settings']='Paramètres des objets - Modificateurs';
		$lang['Adr_admin_general_item_modifier_power_settings']='Modificateur par puissance de l\'objet';
		$lang['Adr_admin_general_item_modifier_power_settings_explain']='Vous pouvez définir un pourcentage de valeur ajoutée à l\'objet en fonction de sa puissance';
		$lang['Adr_admin_general_item_modifier_quality_settings']='Modificateurs par qualité de l\'objet';
		$lang['Adr_admin_general_item_modifier_quality_settings_explain']='Vous pouvez définir un pourcentage de valeur ajoutée à l\'objet en fonction de sa qualité';
		$lang['Adr_admin_general_item_modifier_type_settings']='Prix de base des objets';
		$lang['Adr_admin_general_item_modifier_type_settings_explain']='Vous pouvez définir un pourcentage de valeur ajoutée à l\'objet en fonction de son type';
		$lang['Adr_admin_general_item_modifier_power']='Pourcentage de la valeur initiale de l\'objet pour chaque niveau de puissance gagné';
		$lang['Adr_admin_allow_steal']='Permettre aux joueurs de voler dans les magasins';
		$lang['Adr_admin_allow_steal_sell']='Permettre la revente d\'objets volés ?';
		$lang['Adr_admin_allow_steal_sell_ex']='Désactiver cette option empêchera les utilisateurs de revendre à la boutique du forum les objets volés à celle-ci. Ces objets ne pourront ainsi être vendus que via les boutiques des utilisateurs.';
		$lang['Adr_admin_allow_steal_lvl']='Niveau minimum requis pour utiliser la compétence \'voleur\'';
		$lang['Adr_admin_allow_steal_lvl_ex']='Les joueurs devront avoir atteint ce niveau pour être capables de voler.';
		$lang['Adr_admin_steal_show']='Afficher le niveau de difficulté du vol d\'un objet dans la boutique du forum';
		$lang['Adr_admin_steal_show_ex']='Cette option active l\'affichage du niveau de difficulté du vol de l\'objet concerné dans la boutique du forum';

		$lang['Adr_admin_cache_int']='Intervalle de mise à jour automatique du cache';
		$lang['Adr_admin_cache_int_ex']='Cette option permet au cache de se régenerer toutes les x minutes. Une vérification des renouvellements de quota est aussi effectuée.<br>La valeur recommandée est de 15 minutes. Diminuez cette valeur si vous jugez que les quotas sont incorrectement rafraîchies. Si cette valeur est trop faible vous risquez d\'avoir des problèmes de surcharge de votre serveur, il est recommandé de ne pas descendre en dessous de 5 minutes.';

		$lang['Adr_admin_new_shop_price']='Prix nécessaire à l\'ouverture d\'un magasin';
		$lang['Adr_admin_character_age']='Age initial du personnage à la création';
		$lang['Adr_admin_experience_posting']='Expérience gagnée en postant';
		$lang['Adr_admin_weight_enable_title']='Restriction de poids en combat';
		$lang['Adr_admin_weight_enable']='Activer la restriction de poids';
		$lang['Adr_admin_experience_posting_new']='Expérience gagnée en créant un sujet';
		$lang['Adr_admin_experience_posting_reply']='Expérience gagnée en répondant à un sujet';
		$lang['Adr_admin_experience_posting_edit']='Expérience gagnée en éditant un message';
		$lang['Adr_skill_trading_power']='Pourcentage de modification du prix pour chaque niveau de compétence';
		$lang['Adr_skill_thief_failure_amend']='Prix de l\'amende pour les voleurs (si le vol échoue)';
		$lang['Adr_skill_thief_failure_amend_explain']='Valeur minimum de l\'amende, si le prix de l\'objet est supérieur alors ce sera la valeur de l\'amende, vous pouvez mettre ce champ à 0 si vous ne souhaitez pas donner d\'amende';
		$lang['Adr_fail_steal_punishment']='Que faire si le joueur ne peut pas payer l\'amende ?';
		$lang['Adr_fail_steal_punishment0']='Ne pas donner l\'amende';
		$lang['Adr_fail_steal_punishment1']='Faire payer tout l\'argent disponible';
		$lang['Adr_fail_steal_punishment2']='Emprisonnement';
		$lang['Adr_fail_steal_type']='Type d\'emprisonnement dans ce cas';
		$lang['Adr_fail_steal_type0']='Refuser l\'accès au forum';
		$lang['Adr_fail_steal_type1']='Refuser le droit de poster';
		$lang['Adr_fail_steal_type2']='Refuser la lecture des messages';
		$lang['Adr_fail_steal_time']='Nombre d\'heures d\'emprisonnement';

		$lang['Adr_battle_item_power_level']='Limiter l\'utilisation des objets en combat';
		$lang['Adr_battle_item_power_level_explain']='Si vous cochez cette option, les joueurs ne pourront utiliser que des objets de puissance inférieure ou égale à leur niveau';
		$lang['Adr_town_training_grounds_admin']='Entraînement';
		$lang['Adr_town_training_grounds_admin_change_allow']='Autoriser le changement de classe';
		$lang['Adr_town_training_grounds_admin_change_cost']='Prix du changement de classe';
		$lang['Adr_town_training_grounds_admin_skill_cost']='Prix pour l\'entraînement d\'une compétence par niveau';
		$lang['Adr_town_training_grounds_admin_charac_cost']='Prix pour l\'entraînement d\'une caractéristique par niveau';
		$lang['Adr_town_training_grounds_admin_upgrade_cost']='Prix d\'une amélioration';

		$lang['Adr_use_cache']='Utiliser le système de cache';
		$lang['Adr_use_cache_explain']='Le système de cache permet de réduire le nombre de requêtes SQL, si vous souhaitez l\'activer, veillez à mettre le CHMOD à 666 sur les fichiers suivants :';
		$lang['Adr_display_profile']='Affichage dans le profil';
		$lang['Adr_display_profile_allow']='Activer l\'affichage de la feuille de personnage dans le profil';
		$lang['Adr_display_topics']='Affichage dans les répliques';
		$lang['Adr_display_topics_level']='Afficher le niveau';
		$lang['Adr_display_topics_text']='En tant que texte';
		$lang['Adr_display_topics_pic']='En tant qu\'image';
		$lang['Adr_display_topics_class']='Afficher la classe';
		$lang['Adr_display_topics_race']='Afficher la race';
		$lang['Adr_display_topics_element']='Afficher l\'élément';
		$lang['Adr_display_topics_alignment']='Afficher l\'alignement';
		$lang['Adr_display_topics_pvp']='Afficher le lien de défi en duel';
		$lang['Adr_display_topics_rank']='Afficher le rang ADR actuel';
		$lang['Adr_display_topics_battle_stats']='Afficher les statistiques de combat actuelles';
		$lang['Adr_next_level_penalty']='Pénalité pour le gain de niveau';
		$lang['Adr_next_level_penalty_explain']='Pourcentage d\'expérience ajoutée à chaque gain de niveau à l\'expérience ';
		$lang['Adr_admin_regen_period_title']='Limites de combats et d\'usage des compétences';
		$lang['Adr_admin_regen_enable']='Activer la limite de combats et de compétences';
		$lang['Adr_admin_regen_period']='Période pour la remise à zéro des limites (en jours)';
		$lang['Adr_admin_battle_limit']='Nombre de combats autorisés par jour';
		$lang['Adr_admin_skill_limit']='Nombre d\'entraînements des compétences réussis par jour';
		$lang['Adr_admin_trading_limit']='Nombre maximum de ventes réussies par jour';
		$lang['Adr_admin_thief_limit']='Nombre maximum de vols réussis par jour';
		$lang['Adr_admin_enable_rpg_title']='Activer/Désactiver le mod RPG';
		$lang['Adr_admin_enable_rpg']='Activer ou désactiver la totalité du mod RPG';
		$lang['Adr_admin_posts']='Activer le nombre minimum de répliques pour créer un personnage :';
		$lang['Adr_admin_posts_min']='Nombre minimum de répliques requises :';
		$lang['Adr_admin_character_tax']='Taxes de Magasin et d\'entrepôt';
		$lang['Adr_admin_character_shop_tax']='Taxe sur l\'ouverture d\'un magasin :';
		$lang['Adr_admin_character_shop_dura']='Durée entre les charges du magasin :';
		$lang['Adr_admin_character_wh_tax']='Taxe sur l\'ouverture de l\'entrepôt :';
		$lang['Adr_admin_character_wh_dura']='Durée entre les charges de l\'entrepôt :';
		$lang['Adr_admin_days']='jours';
      	$lang['Adr_admin_hours']='heures';
      	$lang['Adr_admin_mins']='minutes';

		$lang['Adr_pvp']='Duels entre joueurs';
		$lang['Adr_display_topics_link']='Afficher le lien vers le personnage';
		$lang['Adr_pvp_enable_pvp']='Activer les duels';
		$lang['Adr_pvp_defies_max']='Nombre maximum de défis en duel autorisés';
		$lang['Adr_pvp_stats_exp_modifier_explain']='Définit un pourcentage de différence d\'expérience gagnée pour chaque niveau de différence entre les deux joueurs';
		$lang['Adr_pvp_stats_reward_modifier_explain']='Définit un pourcentage de différence d\'argent gagné pour chaque niveau de différence entre les deux joueurs';
	}

	if ( defined ('IN_ADR_SHOPS'))
	{
		$lang['Adr_shops_item_title']='Gestion des objets dans le magasin du forum';
		$lang['Adr_shops_item_title_explain']='Ici vous pouvez gérer le magasin du forum';
		$lang['Adr_shops_item_add']='Ajouter un objet';
		$lang['Adr_shops_item_add_title']='Ajout ou édition d\'objets';
		$lang['Adr_shops_item_add_title_explain']='Ici vous pouvez ajouter ou éditer des objets du magasin du forum';
		$lang['Adr_items_image_explain']='L\'image doit être dans le répertoire /adr/images/items/';
		$lang['Adr_shops_items_successful_edited']='Objet correctement modifié';
		$lang['Adr_shops_items_successful_added']='Objet correctement ajouté';
		$lang['Adr_shops_items_successful_deleted']='Objet correctement supprimé';
		$lang['Adr_items_duration_max']='Durabilité maximum';
		$lang['Adr_item_max_skill']='Puissance maximum obtenue à la forge :';
		$lang['Adr_item_sell_back']='Pourcentage de pénalité à la revente :';
		$lang['Adr_item_sell_back_explain']='C\'est le pourcentage de pénalité appliqué au prix standard du magasin du forum lors de la revente au magasin. Le calcul est fait sur base de la compétence à marchander, la qualité et durabilité de l\'objet.';
		$lang['Adr_item_sell_back_title']='Revendre';
		$lang['Adr_items_price_explain']='Si vous laissez ce champ vide le prix sera calculé automatiquement (recommandé)';
		$lang['Adr_shops_item_element']='Type d\'élément (Armes et sorts uniquement) :';
		$lang['Adr_shops_item_element_str']='Pourcentage donné contre un élément opposé plus faible :';
		$lang['Adr_shops_item_element_same']='Pourcentage donné contre le même élément :';
		$lang['Adr_shops_item_element_weak']='Pourcentage donné contre un élément opposé plus fort :';

		$lang['Adr_items_store']='Ajouter au type de magasin :';
		$lang['Adr_items_element_none']='Aucun élément';
		$lang['Adr_items_dex_explain']='Quand le joueur équipe cet objet pour le combat cette valeur sera rajoutée à sa puissance (Ne fonctionne pas avec les anneaux et amulettes).';
		$lang['Adr_items_mp_use_explain']='Si elle est déterminée cette valeur prélèvera des MP supplémentaires lors de l\'utilisation d\'une arme ou d\'un sort.';

		$lang['Adr_store_title']='Catégories de magasins du forum';
		$lang['Adr_store_title_explain']='Créer et ajouter des catégories de magasins :';
		$lang['Adr_store_name']='Nom du magasin :';
		$lang['Adr_store_desc']='Description :';
		$lang['Adr_store_status']='Statut :<br />(depuis v0.40)';
		$lang['Adr_store_sales']='Statut des ventes :<br />(depuis v0.40)';
		$lang['Adr_store_auth']='En faire un objet propre aux administrateurs :';
		$lang['Adr_store_view']='Rendre les objets du magasin non achetables (voir uniquement)';
		$lang['Adr_store_view_title']='Voir :';
		$lang['Adr_store_cat_add']='Ajouter une nouvelle catégorie';
		$lang['Adr_store_status_closed']='Fermé';
		$lang['Adr_store_status_open']='Ouvert';
		$lang['Adr_store_sales_on']='Ventes autorisées';
		$lang['Adr_store_sales_off']='Ventes non autorisées';
		$lang['Adr_store_auth_all']='Tous';
		$lang['Adr_store_auth_admin']='Administrateurs uniquement';
		$lang['Adr_store_open']='Ouvert';
		$lang['Adr_store_closed']='Fermé';
		$lang['Adr_store_normal']='Normal';
		$lang['Adr_store_sale']='Vente';
		$lang['Adr_store_all']='Tous les utilisateurs';
		$lang['Adr_store_admin']='Administrateurs uniquement';
		$lang['Adr_store_image_explain']='L\'image doit être dans le répertoire /adr/images/store/';
		$lang['Adr_store_cats_successful_deleted']='Magasin correctement supprimé';
		$lang['Adr_store_cats_successful_edit']='Magasin correctement édité';
		$lang['Adr_store_cats_successful_new']='Magasin correctement créé';
		$lang['Adr_items_steal_explain']='Choisissez le niveau de difficulté du vol de cet objet dans le magasin. La valeur entre parenthèses est la classe de difficulté (DC), elle devrait être doublée pour savoir quel niveau est nécessaire au joueur pour réussir son vol. Cette valeur est invisible pour le joueur et devrait le rester.';

		// Item Restriction keys
        $lang['Adr_admin_item_restrict_title']='Restrictions d\'utilisation de l\'objet';
        $lang['Adr_admin_item_restrict_class_enable']='Activer la restriction de classe';
        $lang['Adr_admin_item_restrict_class_enable_explain']='Activer cette option permet de restreindre cet objet à une ou plusieurs classes.<br>Si elle est désactivée alors l\'objet sera accessible à tous indépendamment de la classe.';
        $lang['Adr_admin_item_restrict_class']='Sélection de classe';
        $lang['Adr_admin_item_restrict_alignment_enable']='Activer la restriction d\'élément';
        $lang['Adr_admin_item_restrict_alignment_enable_explain']='Activer cette option permet de restreindre cet objet à un ou plusieurs alignements.<br>Si elle est désactivée alors l\'objet sera accessible à tous indépendamment de l\'alignement.';
        $lang['Adr_admin_item_restrict_alignment']='Sélection d\'alignement';
        $lang['Adr_admin_item_restrict_race_enable']='Activer la restriction de race';
        $lang['Adr_admin_item_restrict_race_enable_explain']='Activer cette option permet de restreindre cet objet à une ou plusieurs races.<br>Si elle est désactivée alors l\'objet sera accessible à tous indépendamment de la race';
        $lang['Adr_admin_item_restrict_race']='Sélection de race';
        $lang['Adr_admin_item_restrict_element_enable']='Activer la restriction d\'élement';
        $lang['Adr_admin_item_restrict_element_enable_explain']='Activer cette option permet de restreindre cet objet à un ou plusieurs éléments.<br>Si elle est désactivée alors l\'objet sera accessible à tous indépendamment de l\'élément.';
        $lang['Adr_admin_item_restrict_element']='Sélection d\'élément';
		$lang['Adr_admin_item_restrict_level']='Restriction de niveau';
		$lang['Adr_admin_item_restrict_level_explain']='Niveau minimum requis pour utiliser cet objet.';
		$lang['Adr_admin_item_restrict_chars']='Restrictions de caractéristiques';
		$lang['Adr_admin_item_restrict_chars_explain']='Vous pouvez définir ici les caractéristiques minimums nécessaires pour pouvoir utiliser cet objet.';
		$lang['Adr_admin_item_mass_delete']='Suppresion massive de cet objet des inventaires des utilisateurs';
		$lang['Adr_admin_item_mass_delete_ex']='Selectioner cette option supprimera toutes les occurences de cet objet dans les inventaires des utilisateurs.<br>La recherche dans la base de données se fait par nom d\'objet uniquement, vous devriez donc selectionner cette option AVANT de renommer un objet si vous souhaitez supprimer massivement cet objet.<br>Cette option ne supprimera pas l\'objet des boutiques du forum, vous continuerez donc de le voir dans la liste d\'objets de l\'ACP.';

		$lang['Adr_items_price_sp']='Coût en Points de Spiritualité (SP)';
		$lang['Adr_items_price_sp_explain']='Vous pouvez rajouter un coût additionnel en points de spiritualité à cet objet (SP). Ils se gagnent en gagnant des combats contre des monstres.<br>Si la valeur est à zéro alors ce ne sera pas affiché dans la boutique du forum.';
		$lang['Adr_items_price_fp']='Coût en Points de Faction (FP)';
		$lang['Adr_items_price_fp_explain']='Vous pouvez rajouter un coût additionnel en points de faction à cet objet (FP). Ils se gagnent en gagnat des duels.<br>Si la valeur est à zéro alors ce ne sera pas affiché dans la boutique du forum.';
	}

	if ( defined ('IN_ADR_VAULT'))
	{
		$lang['Adr_vault_update_error']='Une erreur est survenue pendant la mise à jour des données de la banque';
		$lang['Adr_vault_updated_return_settings']='La configuration de la banque s\'est correctement déroulée. <br /><br />Cliquez %sICI%s pour retourner à l\'écran de configuration de la banque';
		$lang['Adr_vault_settings']='Configuration de la banque';
		$lang['Adr_vault_settings_explain']='Vous pouvez ici changer la configuration de la banque';
		$lang['Adr_vault_use']='Activer la banque';
		$lang['Adr_vault_settings_name']='Nom de la banque';
		$lang['Adr_vault_interests_rate']='Taux d\'intérêts';
		$lang['Adr_vault_interests_rate_explain']='Pourcentage de la somme totale possédée qui sera donnée lors du prochain versement des intérêts';
		$lang['Adr_vault_interests_time']='Temps d\'attente des intérêts';
		$lang['Adr_vault_interests_time_explain']='Durée entre chaque versement d\'intérêts (en secondes).';
		$lang['Adr_vault_loan_use']='Activer le système de prêts';
		$lang['Adr_vault_loan_interests']='Taux d\'intérêt des prêts';
		$lang['Adr_vault_loan_interests_explain']='Pourcentage de la somme empruntée que l\'utilisateur devra rendre en plus';
		$lang['Adr_vault_loan_interests_time']='Durée du prêt';
		$lang['Adr_vault_loan_interests_time_explain']='Temps au bout duquel le prêt devra être remboursé (en secondes).';
		$lang['Adr_vault_max_sum']='Montant maximal';
		$lang['Adr_vault_max_sum_explain']='Montant maximal que le joueur peut emprunter';
		$lang['Adr_vault_requirements']='Pré requis';
		$lang['Adr_vault_requirements_explain']='Nombre minimum de répliques pour pouvoir effectuer un prêt';
		$lang['Adr_vault_attack_use']='Activer le système d\'attaque de la trésorerie';
		$lang['Adr_vault_time_explain']='Correspond à ';
		$lang['Adr_vault_exchange_settings']='Configuration de la bourse';
		$lang['Adr_vault_exchange_settings_explain']='Vous pouvez configurer ici la bourse';
		$lang['Adr_vault_exchange_use']='Activer la bourse';
		$lang['Adr_vault_exchange_min']='Pourcentage minimum des variations';
		$lang['Adr_vault_exchange_min_explain']='C\'est la variation minimale du cours des actions';
		$lang['Adr_vault_exchange_max']='Pourcentage maximum des variations';
		$lang['Adr_vault_exchange_max_explain']='C\'est la variation maximale du cours des actions';
		$lang['Adr_vault_exchange_time']='Temps entre les variations';
		$lang['Adr_vault_exchange_time_explain']='C\'est le temps entre le changement des valeurs des actions (en secondes) ';
		$lang['Adr_vault_exchange_updated_return_settings']='La configuration de la bourse a été correctement modifiée. <br /><br />Cliquez %sICI%s pour retourner à la configuration de la bourse';
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
		$lang['Adr_vault_exchange_settings_explain_edit']='Ce formulaire vous permet d\'éditer une action';
		$lang['Adr_vault_exchange_actions_edit']='Editer une action';
		$lang['Adr_vault_exchange_added_return_settings']='L\'action a été correctement ajoutée. <br /><br />Cliquez %sICI%s pour retourner à la configuration de la bourse';
		$lang['Adr_vault_exchange_edited_return_settings']='L\'action a été correctement modifiée. <br /><br />Cliquez %sICI%s pour retourner à la configuration de la bourse';
		$lang['Adr_vault_exchange_deleted_return_settings']='L\'action a été correctement supprimée. <br /><br />Cliquez %sICI%s pour retourner à la configuration de la bourse';
		$lang['Adr_vault_users_title']='Gestion des clients';
		$lang['Adr_vault_users_title_explain']='Vous pouvez modifier ici les informations relatives aux clients';
		$lang['Adr_vault_user_select']='Choisir un utilisateur';
		$lang['Adr_vault_user_select_list']='De la liste';
		$lang['Adr_vault_user_select_input']='En tapant son pseudo';
		$lang['Adr_vault_user']='Utilisateur';
		$lang['Adr_vault_user_account']='Compte';
		$lang['Adr_vault_user_on_account']='Sur le compte';
		$lang['Adr_vault_no_loan']='Pas d\'emprunt';
		$lang['Adr_vault_user_loan']='Somme empruntée';
		$lang['Adr_vault_user_pay_off']='Rembourser le prêt de ce membre';
		$lang['Adr_vault_user_preferences']='Préférences';
		$lang['Adr_vault_user_protect_account']='Compte protégé';
		$lang['Adr_vault_user_protect_loan']='Prêt protégé';
		$lang['Adr_vault_users_updated_return_settings']='Compte correctement modifié. <br /><br /> Cliquez %sICI%s pour retourner à l\'écran de gestion des comptes';
	}

	if ( defined ('IN_ADR_BATTLE'))
	{
		$lang['Adr_battle_settings']='Configuration des combats';
		$lang['Adr_battle_settings_explain']='Vous pouvez configurer ici le système de combat';
		$lang['Adr_battle_use']='Activer le système de combat';
		$lang['Adr_battle_monsters']='Combats contre des monstres';
		$lang['Adr_battle_monsters_stats_modifier']='Modification des caractéristiques en fonction de la différence de niveau';
		$lang['Adr_battle_monsters_stats_modifier_explain']='Définit un pourcentage de différence des caractéristiques en fonction de l\'écart de niveau entre les deux adversaires';
		$lang['Adr_battle_monsters_modifier_type']='Type d\'équation utilisée :';
		$lang['Adr_battle_monsters_modifier_type_explain']='L\'ancienne équation était utilisée dans toutes les versions précédant la v0.3.4<br />La nouvelle équation est celle postée par Xanathis sur le forum ADR (recommandée)';
		$lang['Adr_battle_monsters_modifier_type_1']='Ancienne';
		$lang['Adr_battle_monsters_modifier_type_2']='Nouvelle';
		$lang['Adr_battle_monster_stats_exp_min']='Gain minimum d\'expérience en cas de victoire';
		$lang['Adr_battle_monster_stats_exp_max']='Gain maximum d\'expérience en cas de victoire';
		$lang['Adr_battle_monster_stats_exp_modifier']='Gain d\'expérience en fonction de la différence de niveau';
		$lang['Adr_battle_monster_stats_exp_modifier_explain']='Définit le pourcentage d\'expérience gagnée en fonction de l\'écart de niveau avec le monstre';
		$lang['Adr_battle_monster_stats_sp_modifier']='Gain de SP en fonction de la différence de niveau';
		$lang['Adr_battle_monster_stats_sp_modifier_explain']='Définit le pourcentage de SP gagnés en fonction de l\'écart de niveau avec le monstre';
		$lang['Adr_battle_monster_stats_reward_min']='Minimum de points gagnés en cas de victoire';
		$lang['Adr_battle_monster_stats_reward_max']='Minimum de points gagnés en cas de victoire';
		$lang['Adr_battle_monster_stats_reward_modifier']='Gain de points en fonction de la différence de niveau';
		$lang['Adr_battle_monster_stats_reward_modifier_explain']='Définit le pourcentage de points gagnés en fonction de l\'écart de niveau avec le monstre';
		$lang['Adr_admin_monsters']='Monstres';
		$lang['Adr_admin_monsters_explain']='Ici vous pouvez ajouter, éditer ou modifier les monstres';
		$lang['Adr_monsters_name']='Nom du monstre';
		$lang['Adr_monsters_image']='Image';
		$lang['Adr_monsters_level']='Niveau';
		$lang['Adr_admin_monsters_base_hp']='Points de vie';
		$lang['Adr_admin_monsters_base_def']='Défense';
		$lang['Adr_admin_monsters_att']='Attaque';
		$lang['Adr_admin_monsters_element']='Elément';
		$lang['Adr_admin_monsters_ma']='Attaque magique';
		$lang['Adr_admin_monsters_md']='Défense magique';
		$lang['Adr_admin_monsters_base_mp']='Points de mana';
		$lang['Adr_admin_monsters_base_mp_power']='Puissance du sort';
		$lang['Adr_admin_monsters_base_sp']='Points de spiritualité (SP)';
		$lang['Adr_admin_monsters_custom_spell']='Nom du sort';
		$lang['Adr_admin_monsters_custom_spell_explain']='Entrez le nom du sort qui sera utilisé par le monstre, si vous laissez ce champ vide, le nom par défaut sera utilisé.';
		$lang['Adr_admin_monsters_thief_skill']='Capacité à voler';
		$lang['Adr_monsters_add']='Ajouter un monstre';
		$lang['Adr_monsters_add_edit']='Ajout ou édition de monstres';
		$lang['Adr_monsters_add_edit_explain']='Vous pouvez ajouter ou éditer ici des monstres';
		$lang['Adr_monsters_image_explain']='L\'image doit être dans le répertoire /adr/images/monsters/';
		$lang['Adr_monster_successful_added']='Monstre correctement ajouté';
		$lang['Adr_monster_successful_deleted']='Monstre correctement supprimé';
		$lang['Adr_monster_successful_edited']='Monstre correctement édité';
		$lang['Adr_battle_thief']='Configuration de la capacité à voler du monstre';
		$lang['Adr_battle_thief_enable']='Activer/Désactiver la faculté de voler pour les monstres';
		$lang['Adr_battle_thief_points']='Pourcentage de points à voler au joueur';
	}

	if ( defined ('IN_ADR_TOOLS'))
	{
		$lang['Adr_admin_tools_cache_settings']='Gestion du cache';
		$lang['Adr_admin_tools_cache_settings_explain']='Resynchronisez le cache si vous voyez des décalages entre vos paramètres et le forum';
		$lang['Adr_admin_tools_update_cache']='Resynchroniser le cache';
		$lang['Adr_admin_tools_cache_updated']='Cache correctement resynchronisé';
		$lang['Adr_admin_tools_convertors_settings']='Convertisseurs';
		$lang['Adr_admin_tools_convertors_settings_explain']='En utilisant ce formulaire vous pouvez convertir les données d\'autres mod RPG vers ADR';
		$lang['Adr_admin_tools_convertors_update']='Mettre à jour';
		$lang['Adr_admin_tools_convertors_update_items']='Convertir les objets du SHOP mod de Zarath';
		$lang['Adr_admin_tools_convertors_update_bank']='Convertir les comptes du BANK mod de Zarath';
		$lang['Adr_admin_tools_convertors_delete']='Supprimer';
		$lang['Adr_admin_tools_convertors_delete_item']='Supprimer les entrées de la base de données du SHOP mod de Zarath';
		$lang['Adr_admin_tools_convertors_delete_vault']='Supprimer les entrées de la base de données du VAULT mod de Dr DLP';
		$lang['Adr_admin_tools_convertors_delete_bank']='Supprimer les entrées de la base de données du BANK mod de Zarath';
		$lang['Adr_admin_tools_convertors_bank_updated']='BANK mod correctement mis à jour';
		$lang['Adr_admin_tools_convertors_bank_deleted']='BANK mod correctement supprimé';
		$lang['Adr_admin_users_updated']='RPG STATS mod correctement converti';
		$lang['Adr_admin_tools_convertors_update_users']='Convertir les personnage du RPG STATS mod par Moogie';
		$lang['Adr_admin_tools_convertors_delete_rpg_stats']='Supprimer les entrées de la base de données du RPG STATS mod par Moogie';
		$lang['Adr_admin_tools_convertors_update_vault']='Convertir les comptes du VAULT mod de Dr DLP';
		$lang['Adr_admin_tools_convertors_vault_deleted']='VAULT mod correctement supprimé';
		$lang['Adr_admin_tools_convertors_rpg_stats_deleted']='RPG STATS mod correctement supprimé';
		$lang['Adr_admin_tools_convertors_shop_deleted']='SHOP mod correctement supprimé';
		$lang['Adr_admin_tools_convertors_vault_updated']='VAULT mod correctement converti';
		$lang['Adr_admin_tools_convertors_shop_updated']='SHOP mod correctement converti';
		$lang['Adr_admin_tools_convertors_jail_updated']='JAIL mod correctement converti';
		$lang['Adr_admin_tools_convertors_update_jail']='Convertir les personnages du JAIL mod par Dr DLP';
		$lang['Adr_admin_tools_convertors_jail_deleted']='JAIL mod correctement supprimé';
		$lang['Adr_admin_tools_convertors_delete_jail']='Supprimer les entrées de la base de données du JAIL mod par Dr DLP';
		$lang['Adr_admin_tools_convertors_warnings']='ATTENTION !!.<br /><br /> Toutes ces opérations sont irréversibles, veillez à sauvegarder votre base de données au préalable.<br /><br />L\'auteur de ce mod n\'est pas responsable si des erreurs surviennent suite à l\'utilisation de ces fonctions.';
		$lang['Adr_admin_tools_resync_items']='Resynchroniser les prix des objets';
		$lang['Adr_admin_tools_resync_items_explain']='Cela vous permet de remettre à jour les prix des objets de la boutique du forum si vous les avez modifiés.';
		$lang['Adr_admin_tools_resync_items_action']='Resynchroniser les prix des objets ';
		$lang['Adr_admin_tools_items_updated']='Prix correctement recalculés';
		$lang['Adr_admin_tools_armaggedon']='Supprimer tous les magasins, objets et personnages';
		$lang['Adr_admin_tools_armaggedon_explain']='Si vous cliquez sur ce bouton, toutes les données concernant les magasins, objets et personnages seront supprimées. <br /><b>Irréversible !</b> ';
		$lang['Adr_admin_tools_armaggedon_characters']='Supprimer tous les personnages uniquement';
		$lang['Adr_admin_tools_armaggedon_zero_dura']='Vider les tables de tous les objets ayant 0 de durabilité';
        $lang['Adr_admin_tools_armaggedon_battle_list']='Supprimer tous les rapports de combats';
		$lang['Adr_admin_tools_armaggedon_optimise']='Optimiser les tables';
		$lang['Adr_admin_tools_armaggedon_shops']='Supprimer tous les magasins des joueurs';
		$lang['Adr_admin_tools_armaggedon_user_items']='Supprimer tous les objets des joueurs';
		$lang['Adr_admin_tools_armaggedon_shops_items']='Supprimer tous les objets du magasin du forum';
		$lang['Adr_admin_tools_armaggedon_done']='Suppression réussie';
		$lang['Adr_admin_tools_armaggedon_dura']='Objets à durabilité égale à 0 supprimés';
		$lang['Adr_admin_tools_armaggedon_shops_yes']='Tous les objets des boutiques ont été supprimés';
		$lang['Adr_admin_tools_armaggedon_shops_done']='Suppression de tous les objets du magasin réussie.';
		$lang['Adr_admin_tools_user_items']='Suppression de tous les objets des utilisateurs réussie.';
	}

	if ( defined ('IN_ADR_USERS'))
	{
		$lang['Adr_admin_character_inventory']='Choisissez l\'inventaire d\'un utilisateur';
		$lang['Adr_admin_character_delete']='Supprimer ce personnage (Irréversible)';
		$lang['Adr_admin_character_edit']='Valider les changements';
		$lang['Adr_admin_character_charac']='Caractéristiques';
		$lang['Adr_admin_character_edited']='Personnage correctement modifié';
		$lang['Adr_admin_character_deleted']='Personnage correctement supprimé';
		$lang['Adr_admin_character_lack']='Cet utilisateur n\'a pas créé de personnage';
		$lang['Adr_user_admin']='Gestion des personnages';
		$lang['Adr_user_admin_explain']='Ici vous pouvez éditer ou supprimer les personnages';
		$lang['Adr_user_battle_skills']='Limites de combats et compétences';
		$lang['Adr_user_battle_limit']='Nombre de combats restants :';
		$lang['Adr_user_skill_limit']='Nombre d\'utilisations des compétences restantes :';
		$lang['Adr_user_trading_limit']='Nombre d\'utilisations de la compétence de marchandage restantes :';
		$lang['Adr_user_thief_limit']='Nombre d\'utilisations de la compétence de voleur restantes :';
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
