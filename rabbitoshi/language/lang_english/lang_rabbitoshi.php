<?php
/***************************************************************************
 *                            lang_rabbitoshi.php [English]
 *                              -------------------
 *     begin                : Thurs June 9 2006
 *     copyright            : (C) 2006 The ADR Dev Crew
 *     site                 : http://www.adr-support.com
 *
 *     $Id: lang_rabbitoshi.php,v 4.00.0.00 2006/06/09 02:32:18 Ethalic Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

//
// CONTRIBUTORS:
//	 Add your details here if wanted, e.g. Name, username, email address, website
// 200x-0x-xx  Malicious Rabbit - Original creation
// 200x-0x-xx  One Piece - Beta Development
// 200x-0x-xx  Seteo-Bloke & Narc0sis- English Translations
// 200x-06-09  Ethalic - New Release
//

//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

$lang['Day']='Day';
$lang['Days']='Days';
$lang['Hour']='Hour';
$lang['Hours']='Hours';
$lang['Minute']='Minute';
$lang['Minutes']='Minutes';
$lang['Rabbitoshi_seconds']='Seconds';

// If you would like add a language key so that your items can be multi-languaged, then use the following.
// Replace x with the item name in lowercase of the item, then replace item name with the item name how you
// want it to appear on your site. Do the same for description. If you wish to add more, copy these two
// instances and repeat the same steps for each item.
// When you want to use the keys, goto your item management and input Rabbitoshi_items_x by itself as the item
// name and vice-verca with Rabbitoshi_items_x_desc for the description field. Remember to rename x for each
// individual item.
$lang['Rabbitoshi_items_x']='iten name';
$lang['Rabbitoshi_items_x_desc']='item description';


/***************************************************************************
 *   Rabbitoshi Page(s) Language Keys
 ***************************************************************************/

//
// General Messages
//
$lang['Rabbitoshi_title']='Rabbitoshi';
$lang['Rabbitoshi_previous']='Click %shere%s to return to the previous page';
$lang['Rabbitoshi_disable']='The pet system is currently disabled.';
$lang['Rabbitoshi_owner_pet_lack']='This user does not own a pet';
$lang['Rabbitoshi_default_points_name']='Points';

//
// Index Page
//
$lang['Rabbitoshi_nopet_choose']='You must choose a creature before continuing';
$lang['Rabbitoshi_nopet_title']='Purchacing a pet';
$lang['Rabbitoshi_nopet_lack']='You have not enough money to buy this creature.';
$lang['Rabbitoshi_name_select']='Please enter a name for your pet';
$lang['Rabbitoshi_buypet_success'] ='Congratulations! You have sucessfully purchaced yourself a pet.';
$lang['Rabbitoshi_pet_of']='This pet is owned by';
$lang['Rabbitoshi_pet_prize']='Price';
$lang['Rabbitoshi_pet_buy']='Buy this creature';
$lang['Rabbitoshi_pet_choose']='Choose a creature ';
$lang['Rabbitoshi_pet_hunger']='Resistance in the famine';
$lang['Rabbitoshi_pet_thirst']='Resistance in the thirst';
$lang['Rabbitoshi_pet_hygiene']='Resistance in the dirt';
$lang['Rabbitoshi_pet_call_vet']='Call the vet';
$lang['Rabbitoshi_pet_feed']='Feed';
$lang['Rabbitoshi_pet_drink']='Refreshment';
$lang['Rabbitoshi_pet_clean']='Bathe';
$lang['Rabbitoshi_pet_caracs']='Characteristics';
$lang['Rabbitoshi_pet_characteristics']='Battle Stats';
$lang['Rabbitoshi_pet_attacks']='Battle Ratio';
$lang['Rabbitoshi_pet_level']='Level';
$lang['Rabbitoshi_pet_experience']='Ability Points';
$lang['Rabbitoshi_pet_curxp']='Current EXP';
$lang['Rabbitoshi_pet_age']='Age';
$lang['Rabbitoshi_health']='Condition';
$lang['Rabbitoshi_health_explain']='Please note that the pet will loose health points if he is hungry, thirsty, or their hygiene status is critically low.';
$lang['Rabbitoshi_ability_title']='Ability Learned';
$lang['Rabbitoshi_topic']='See this user\'s pet';
$lang['Rabbitoshi_owner_last_visit']='Owner\'s Last Visit';
$lang['Rabbitoshi_pet_favorite_food']='Favorite Food';
$lang['Rabbitoshi_pet_vet']='Your pet is now fully healed.';
$lang['Rabbitoshi_pet_vet_full']='Why waste a trip when your pets health is ok?';
$lang['Rabbitoshi_pet_vet_lack']='You don\'t have enough money to pay for the services of the vet';
$lang['Rabbitoshi_vet_holidays']='The vet is not available at the moment, please come back later';
$lang['Rabbitoshi_services']='Services';
$lang['Rabbitoshi_pet_call_vet_explain']='Would you like to visit the vet to fully heal your pet for';
$lang['Rabbitoshi_owner_list']='See the pet owners list';
$lang['Rabbitoshi_owner_list_explain']='Pet owners list';
$lang['Rabbitoshi_food_no_need']='Your pet doesn\'t need to be fed at the moment';
$lang['Rabbitoshi_water_no_need']='Your pet doesn\'t need to drink at the moment';
$lang['Rabbitoshi_clean_no_need']='You do not need to clean your pets area at the moment';
$lang['Rabbitoshi_lack_food']='You don\'t have the favorite food of your pet';
$lang['Rabbitoshi_lack_water']='You don\'t have water to give to your pet';
$lang['Rabbitoshi_lack_cleaner']='You don\'t have a cleaner to clean your pet place';
$lang['Rabbitoshi_hidden']='Sorry , this user doesn\'t want others to see his pet\'s characteristics<br /><br /> Click <a href="'.append_sid("index.$phpEx").'">here</a> to return to the forums index';

// Hotel
$lang['Rabbitoshi_hotel']='Hotel';
$lang['Rabbitoshi_hotel_explain']='Confide your pet during your holidays';
$lang['Rabbitoshi_hotel_no_actions']='You can\'t perform this action while your pet is in the hotel';
$lang['Rabbitoshi_pet_into_hotel']='This pet is currently staying at the hotel<br />It will return on';
$lang['Rabbitoshi_is_in_hotel']='Your pet is currently in the hotel until';
$lang['Rabbitoshi_hotel_welcome']='Welcome to the pet hotel';
$lang['Rabbitoshi_out_of_hotel']='Click here to get back your pet';
$lang['Rabbitoshi_hotel_out_success']='You have gotten back your pet successfully';
$lang['Rabbitoshi_hotel_welcome_services']='We can keep your pet if you wish';
$lang['Rabbitoshi_hotel_welcome_services_select']='Select the number of days';
$lang['Rabbitoshi_hotel_get_in']='Let your pet in the hotel';
$lang['Rabbitoshi_hotel_in_success']='Your pet is now in the hotel';
$lang['Rabbitoshi_hotel_lack_money']='You don\'t have enough money to let your pet stay so long in the hotel';
$lang['Rabbitoshi_hotel_disable']='Hotel is currently disabled.';

// Evolution
$lang['Rabbitoshi_evolution']='Evolution';
$lang['Rabbitoshi_evolution_explain']='Maybe your pet can evolve...';
$lang['Rabbitoshi_no_evolution']='Your pet type is incapable of evolving.';
$lang['Rabbitoshi_no_evolution_time']='Your pet is far too young to evolve, try again on a later date.';
$lang['Rabbitoshi_evolution']='Evolution';
$lang['Rabbitoshi_evolution_welcome']='Please select an evolution for your creature';
$lang['Rabbitoshi_evolution_exec']='Evolution !';
$lang['Rabbitoshi_evolution_lack']='You can\'t afford this evolution';
$lang['Rabbitoshi_evolution_success']='Your pet has successfully evolved !!';
$lang['Rabbitoshi_evolution_enable']='Evolution is currently disabled.';

// Owners
$lang['Rabbitoshi_pet_name']='Pet Name';
$lang['Rabbitoshi_pet_time']='Pet Age';
$lang['Rabbitoshi_pet_type']='Pet Type';

// Preferences
$lang['Rabbitoshi_preferences']='Preferences';
$lang['Rabbitoshi_preferences_explain']='Management of your preferences';
$lang['Rabbitoshi_preferences_notify']='Notify me by PM of the needs of my pet';
$lang['Rabbitoshi_preferences_hide']='Hide my pet to the others users';
$lang['Rabbitoshi_preferences_feed_full']='Always give to my creature all the food which she/he needs';
$lang['Rabbitoshi_preferences_feed_full_explain']='By marking this option, you will use all the available food so that your creature is no more hungry. Should the opposite occur, you will give her/him only a little food each time';
$lang['Rabbitoshi_preferences_drink_full']='Always give to my creature all the water which she/he needs';
$lang['Rabbitoshi_preferences_drink_full_explain']='By marking this option, you will use all the available water so that your creature is no more thirsty. Should the opposite occur, you will give her/him only a little water each time';
$lang['Rabbitoshi_preferences_clean_full']='Always clean the environment of my creature until it is completely clean';
$lang['Rabbitoshi_preferences_clean_full_explain']='By marking this option, you will use all the item of cleaning until the environment of your creature is completely clean. Should the opposite occur, you will clean only little every time';
$lang['Rabbitoshi_preferences_updated']='Your preferences have been edited successfully';

// Notification
$lang['Rabbitoshi_pm_news']='Some news of your pet';
$lang['Rabbitoshi_pm_news_hotel']='Your creature is installed comfortably in the hotel';
$lang['Rabbitoshi_APM_pm']='The statistics of your creature have been updated . You should go and see it.';

// Selling Your Pet
$lang['Rabbitoshi_owner_sell']='Sell your pet';
$lang['Rabbitoshi_owner_pet_value']='Value of your pet';
$lang['Rabbitoshi_pet_sell']='Sale of your creature';
$lang['Rabbitoshi_pet_sell_for']='Are you sure that you want to sell your pet for';
$lang['Rabbitoshi_pet_sell_confirm']='Are you sure you want to sell your pet ?';
$lang['Rabbitoshi_pet_sold']='You have sold your pet for '.$pet_value.'';
$lang['Rabbitoshi_return']='<br /><br /> Click <a href="'.append_sid("rabbitoshi.$phpEx").'">here</a> to buy another one<br /><br /> Click <a href="'.append_sid("index.$phpEx").'">here</a> to return to the forums';

// Death of a Pet
$lang['Rabbitoshi_confirm']='Confirmation';
$lang['Rabbitoshi_pet_is_dead']='Your pet has died';
$lang['Rabbitoshi_pet_has_died']='Your pet has died, your final decision awaits.';
$lang['Rabbitoshi_pet_is_dead_cost']='To revive your pet, it will cost';
$lang['Rabbitoshi_pet_is_dead_cost_explain']='Do you want to pay to revive your pet?<br />If you are not ready to decide now, come back whenever you want to make your final decision.';
$lang['Rabbitoshi_pet_dead_rebirth_no']='Your pet has moved onto a better world.';
$lang['Rabbitoshi_pet_dead_rebirth_ok']='Your pet has been revived.';
$lang['Rabbitoshi_pet_dead_lack']='You do not have sufficent amount of money to revive your pet.';
$lang['Rabbitoshi_pet_dead']='Your pet has passed on. Time to find another pet.';

//
// Progression Page
//
$lang['Rabbitoshi_pet_progress']='Progress of the Pet';
$lang['Rabbitoshi_progress']='Here you can raise your pet\'s stats and his level.';
$lang['Rabbitoshi_progress_experiencelimit_lack']='Your pet has not reached the level limit to increase his level.<br /><br />Click <a href="'.append_sid("rabbitoshi.$phpEx").'">here</a> to go to your pet page.';
$lang['Rabbitoshi_experience_name']='Points';
$lang['Rabbitoshi_progress_name']='Stats';
$lang['Rabbitoshi_progress_explain']='Explain';
$lang['Rabbitoshi_progress_number']='Raise By';
$lang['Rabbitoshi_progress_price']='Price';
$lang['Rabbitoshi_progress_submit']='Raise';
$lang['Rabbitoshi_progress_submit_title']='Progress';
$lang['Rabbitoshi_owner_pet_health_explain']='Increase Health Max';
$lang['Rabbitoshi_owner_pet_hunger_explain']='Increase Hunger Max';
$lang['Rabbitoshi_owner_pet_thirst_explain']='Increase Thirst Max';
$lang['Rabbitoshi_owner_pet_hygiene_explain']='Increase Hygiene Max';
$lang['Rabbitoshi_owner_pet_level_explain']='Your current EXP must be maxed out.<br>Currently you are at';
$lang['Rabbitoshi_owner_pet_power_explain']='Increase Strength';
$lang['Rabbitoshi_owner_pet_magicpower_explain']='Increase Mental Strength';
$lang['Rabbitoshi_owner_pet_armor_explain']='Increase Armor';
$lang['Rabbitoshi_owner_pet_mpmax_explain']='Increase Mana Max';
$lang['Rabbitoshi_owner_pet_attack_explain']='Increase Attack Limit';
$lang['Rabbitoshi_owner_pet_magicattack_explain']='Increase Magic Limit';
$lang['Rabbitoshi_progress_ok']='Progress made successfuly.';
$lang['Rabbitoshi_progress_experience_lack']='Your pet don\'t have enough experience to raise this stat.';

// Reload
$lang['Rabbitoshi_progress_reload']='Reload';
$lang['Rabbitoshi_owner_pet_attack_reload']='Full reload of attack limit';
$lang['Rabbitoshi_owner_pet_magic_reload']='Full reload of magic limit';

// Abilities
$lang['Rabbitoshi_ability_submit']='Learn';
$lang['Rabbitoshi_ability_name']='Abilities';
$lang['Rabbitoshi_ability_lack']='No Abilites';
$lang['Rabbitoshi_ability_explain']='Effect of the Ability';
$lang['Rabbitoshi_ability_price']='Ability Cost';
$lang['Rabbitoshi_ability_submit_title']='Learning';
$lang['Rabbitoshi_ability_regeneration']='Regeneration';
$lang['Rabbitoshi_ability_regeneration_explain']='Regeneration gives some health points to your pet after each turn using his own mana points';
$lang['Rabbitoshi_ability_health']='Life Transfer';
$lang['Rabbitoshi_ability_health_explain']='Life Transfer gives some health points to your character from your pet';
$lang['Rabbitoshi_ability_mana']='Mana Transfer';
$lang['Rabbitoshi_ability_mana_explain']='Mana Transfer gives some mana points to your character from your pet';
$lang['Rabbitoshi_ability_sacrifice']='Sacrifice';
$lang['Rabbitoshi_ability_sacrifice_explain']='Your pet lose all his health points and inflict a lot of damage to your opponent.';
$lang['Rabbitoshi_ability_price_lack']='Your pet does not have enough experience to learn this ability<br /><br />Click <a href="'.append_sid("rabbitoshi_progress.$phpEx").'">here</a> to go to the progress page.';
$lang['Rabbitoshi_ability_stats_lack']='Your pet stats are not good enough to learn this ability.<br /><br />Click <a href="'.append_sid("rabbitoshi_progress.$phpEx").'">here</a> to go to the progress page.';

//
// Shop Page
//
$lang['Rabbitoshi_Shop']='Pet Shop';
$lang['Rabbitoshi_shop_name']='Name';
$lang['Rabbitoshi_shop_img']='Image';
$lang['Rabbitoshi_item_desc']='Description';
$lang['Rabbitoshi_shop_prize']='Price';
$lang['Rabbitoshi_item_type']='Type';
$lang['Rabbitoshi_item_sum']='Owned';
$lang['Rabbitoshi_owner_points']='Your money';
$lang['Rabbitoshi_shop_action']='Purchace Items';
$lang['Rabbitoshi_shop_buy']='Buy';
$lang['Rabbitoshi_shop_sell']='Sell';
$lang['Rabbitoshi_lack_items']='You can\'t sell an item you don\'t own';
$lang['Rabbitoshi_lack']='You do not have enough money to purchase this item';
$lang['Rabbitoshi_pet_shop']='Buy and sell items for your pet';
$lang['Rabbitoshi_general_return'] ='<br /><br /> Click <a href="'.append_sid("rabbitoshi.$phpEx").'">here</a> to see your pet<br /><br /> Click <a href="'.append_sid("rabbitoshi_shop.$phpEx").'">here</a> to buy items for your pet<br /><br /> Click <a href="'.append_sid("index.$phpEx").'">here</a> to return to the forums';
$lang['Rabbitoshi_shop_action_plus']='These items were bought for ';
$lang['Rabbitoshi_shop_action_less']='Your items were sold for ';
$lang['Rabbitoshi_shop_lack_items']='You can not sell items you don\'t own.';

//
// Pet Inventory
//
$lang['Rabbitoshi_inventory']='Pet Inventory';
$lang['Rabbitoshi_inventory_value']='Value';
$lang['Rabbitoshi_inventory_quanity']='Quanity';
$lang['Rabbitoshi_inventory_action']='Sell Items';


/***************************************************************************
 *   Rabbitoshi Pet Messages
 ***************************************************************************/

//
// Alerts
//
$lang['Rabbitoshi_message']='Important Notices';
$lang['Rabbitoshi_message_hungry']='Please feed me!';
$lang['Rabbitoshi_message_very_hungry']='I am going to become a skeleton!';
$lang['Rabbitoshi_message_thirst']='Give me a drink please ';
$lang['Rabbitoshi_message_very_thirst']='Water ... I really need water now ...';
$lang['Rabbitoshi_message_health']='Please heal me !';
$lang['Rabbitoshi_message_very_health']='Argh ... I\'m dying ... alone ... ';
$lang['Rabbitoshi_message_hygiene']='I can\'t live in this crap heap !';
$lang['Rabbitoshi_message_very_hygiene']='I think I am sick. This place is so dirty.';

//
// Thoughts
//
$lang['Rabbitoshi_general_message']='Recent Thoughts';
$lang['Rabbitoshi_general_message_very_bad']='Why?...Why me?... I am dying ... No chance left for me ... Please someone, end my pain ...';
$lang['Rabbitoshi_general_message_bad']='Will my master come ? He doesn\'t care about me . This kind of human souldn\'t be allowed to have pets!';
$lang['Rabbitoshi_general_message_neutral']='How boring is my life?!';
$lang['Rabbitoshi_general_message_good']='*singing*';
$lang['Rabbitoshi_general_message_very_good']='I really couldn\'t have dreamt of a better master ! He is still here for me, I am a lucky pet!';

//
// Pet Conditions
//
$lang['Rabbitoshi_creature_statut_0']='In Good Health';
$lang['Rabbitoshi_creature_statut_1']='Feeling Sad';
$lang['Rabbitoshi_creature_statut_2']='Ill';
$lang['Rabbitoshi_creature_statut_3']='Is Poisoned';
$lang['Rabbitoshi_creature_statut_4']='Is Furious';


/***************************************************************************
 *   Administration Page Language Keys
 ***************************************************************************/

//
// Admin
//
$lang['rRabbitoshi_title']='Edition and deletion of the pets';
$lang['rRabbitoshi_config_edit']='Edition of a pet';
$lang['rRabbitoshi_desc']='Here you can edit or add a pet';

//
// Abilities
//
$lang['Rabbitoshi_abilities_settings']='Special Abilities Settings';
$lang['Rabbitoshi_abilities_settings_explain']='Here your can set all special abilities for pets.';
$lang['Rabbitoshi_regeneration_level']='Minimum Level you have to exceed to learn Regeneration Ability';
$lang['Rabbitoshi_regeneration_magicpower']='Minimum Mental Strength you have to exceed to learn Regeneration Ability';
$lang['Rabbitoshi_regeneration_mp']='Minimum Mana you have to exceed to learn Regeneration Ability';
$lang['Rabbitoshi_regeneration_mp_need']='Mana consumed each turn';
$lang['Rabbitoshi_regeneration_hp_give']='Health points recovered each turn';
$lang['Rabbitoshi_regeneration_price']='Regeneration Ability Cost';
$lang['Rabbitoshi_health_level']='Minimum Level you have to exceed to learn Life Transfer Ability';
$lang['Rabbitoshi_health_magicpower']='Minimum Mental Strength you have to exceed to learn Life Transfer Ability';
$lang['Rabbitoshi_health_health']='Minimum Health Points you have to exceed to learn Life Transfer Ability';
$lang['Rabbitoshi_health_percent']='Health percent given to the character';
$lang['Rabbitoshi_healthtransfert_price']='Life Transfer Ability Cost';
$lang['Rabbitoshi_mana_level']='Minimum Level you have to exceed to learn Mana Transfer Ability';
$lang['Rabbitoshi_mana_magicpower']='Minimum Mental Strength you have to exceed to learn Mana Transfer Ability';
$lang['Rabbitoshi_mana_mp']='Minimum Mana you have to exceed to learn Mana Transfer Ability';
$lang['Rabbitoshi_mana_percent']='Mana percent given to the character';
$lang['Rabbitoshi_mana_price']='Mana Transfer Ability Cost';
$lang['Rabbitoshi_sacrifice_level']='Minimum Level you have to exceed to learn Sacrifice Ability';
$lang['Rabbitoshi_sacrifice_power']='Minimum Strength you have to exceed to learn Sacrifice Ability';
$lang['Rabbitoshi_sacrifice_armor']='Minimum Armor you have to exceed to learn Sacrifice Ability';
$lang['Rabbitoshi_sacrifice_mp']='Minimum Mana you have to exceed to learn Sacrifice Ability';
$lang['Rabbitoshi_sacrifice_price']='Sacrifice Ability Cost';

//
// Level Up
//
$lang['Rabbitoshi_levelup_settings']='Level Up Settings';
$lang['Rabbitoshi_levelup_settings_explain']='Here you can set all bonus points a pet earns when it levels up';
$lang['Rabbitoshi_levelup_earned']='Max Point(s) Earned';
$lang['Rabbitoshi_health_levelup']='Health';
$lang['Rabbitoshi_hunger_levelup']='Hunger';
$lang['Rabbitoshi_thirst_levelup']='Thirst';
$lang['Rabbitoshi_hygiene_levelup']='Hygiene';
$lang['Rabbitoshi_power_levelup']='Strength';
$lang['Rabbitoshi_magicpower_levelup']='Mental Strength';
$lang['Rabbitoshi_armor_levelup']='Armor';
$lang['Rabbitoshi_mp_levelup']='Mana';
$lang['Rabbitoshi_attack_levelup']='Attacks';
$lang['Rabbitoshi_magicattack_levelup']='Magic Attacks';

//
// Pet Management
//
//$lang['Rabbitoshi_Pets_Management']='Pets Management';
$lang['Rabbitoshi_manage_title']='Management of the pets';
$lang['Rabbitoshi_desc']='Here you can manage the pets, add values into, edit, or delete them.';
$lang['Rabbitoshi_add']='Add a pet';
$lang['Rabbitoshi_config']='Addition of a new pet';
$lang['Rabbitoshi_name']='Name';
$lang['Rabbitoshi_img']='Image';
$lang['Rabbitoshi_img_explain']='The file name & extention of the image that is stored locally.';
$lang['Rabbitoshi_pet_health']='Health';
$lang['Rabbitoshi_pet_hunger']='Hunger';
$lang['Rabbitoshi_pet_thirst']='Thirst';
$lang['Rabbitoshi_pet_hygiene']='Hygiene';
$lang['Rabbitoshi_pet_armor']='Defense';
$lang['Rabbitoshi_pet_mp']='Mana';
$lang['Rabbitoshi_pet_power']='Strength';
$lang['Rabbitoshi_pet_magicpower']='Mental Strength';
$lang['Rabbitoshi_pet_ratioattack']='Attack';
$lang['Rabbitoshi_pet_ratiomagic']='Magic';
$lang['Rabbitoshi_pet_xp']='Experience Limit';
$lang['Rabbitoshi_pet_experience_limit']='Experience Limit';
$lang['Rabbitoshi_food_type']='Dietary';
$lang['Rabbitoshi_is_evolution_of']='Evolves From';
$lang['Rabbitoshi_is_evolution_of_explain']='You can select a pet that this one evolves from.';
$lang['Rabbitoshi_is_evolution_of_none']='None';
$lang['Rabbitoshi_buyable']='Purchasable';
$lang['Rabbitoshi_buyable_explain']='This will allow users to buy this pet.';
$lang['Rabbitoshi_del_success']='The pet has been deleted successfully';
$lang['Rabbitoshi_add_success']='The pet has been added successfully';
$lang['Rabbitoshi_edit_success']='The pet has been edited successfully';
$lang['Click_return_rabbitoshiadmin']='Click %shere%s to return to the pets administration';

//
// Pet Shop
//
$lang['Rabbitoshi_shop_title']='Pet Shop Management';
$lang['Rabbitoshi_shop_desc']='Here you can manage the items for your forum\'s pets';
$lang['Rabbitoshi_shop_edit_success']='The item has been updated successfully';
$lang['Rabbitoshi_shop_name']='Name';
$lang['Rabbitoshi_shop_prize']='Price';
$lang['Rabbitoshi_shop_type']='Type';
$lang['Rabbitoshi_shop_img']='Image';
$lang['Rabbitoshi_shop_power']='Power';
$lang['Rabbitoshi_shop_power_explain']='Status points regained while using the item';
$lang['Rabbitoshi_item_type_food']='Food';
$lang['Rabbitoshi_item_type_water']='Water';
$lang['Rabbitoshi_item_type_misc']='Misc';
$lang['Rabbitoshi_item_type_food']='Food';
$lang['Rabbitoshi_item_type_food_none']='None';
$lang['Rabbitoshi_item_type_misc']='Miscellanous';
$lang['Rabbitoshi_item_desc']='Description';
$lang['Rabbitoshi_shop_add']='Add an item';
$lang['Rabbitoshi_shop_power_explain']='This is the number of points earned when an user uses this item';
$lang['Rabbitoshi_item_type_misc']='Cleaning';
$lang['Rabbitoshi_shop_title_add']='Add an item';
$lang['Rabbitoshi_shop_config_add']='This form allows you to add an item into the pet shop';
$lang['Rabbitoshi_language_key']='You may use a language key, please refer to language/lang_xxxx/lang_rabbitoshi.php';
$lang['Rabbitoshi_img_item_explain']='The file name & extention of the image that is stored locally.';
$lang['Rabbitoshi_shop_added_success']='This new item has been added successfully';
$lang['Rabbitoshi_shop_del_success']='This item has been deleted successfully';
$lang['Click_return_rabbitoshi_shopadmin']='Click %shere%s to return to the pet shop management';

//
// Pet Owners
//
$lang['Rabbitoshi_owner_admin_title']='Pet Owners Management';
$lang['Rabbitoshi_owner_admin_title_explain']='Here you can edit the characteristics of the pets for your users';
$lang['Rabbitoshi_owner_admin_submit']='Validate the modifications';
$lang['Rabbitoshi_owner_admin_select']='Select an owner to edit :';
$lang['Rabbitoshi_owner_admin_select_submit']='See this owner';
$lang['Rabbitoshi_owner']='Owner name';
$lang['Rabbitoshi_owner_pet']='Name of his pet';
$lang['Rabbitoshi_owner_pet_type']='Kind of pet';
$lang['Rabbitoshi_owner_pet_health']='Health Max';
$lang['Rabbitoshi_owner_pet_hunger']='Hunger Max';
$lang['Rabbitoshi_owner_pet_thirst']='Thirst Max';
$lang['Rabbitoshi_owner_pet_hygiene']='Hygiene Max';
$lang['Rabbitoshi_owner_pet_mpmax']='Mana Max';
$lang['Rabbitoshi_owner_pet_level']='Level';
$lang['Rabbitoshi_owner_pet_power']='Strength';
$lang['Rabbitoshi_owner_pet_magicpower']='Mental Strength';
$lang['Rabbitoshi_owner_pet_armor']='Armor';
$lang['Rabbitoshi_owner_pet_experience']='Experience';
$lang['Rabbitoshi_owner_pet_mp']='Mana';
$lang['Rabbitoshi_owner_pet_attack']='Attack(s)';
$lang['Rabbitoshi_owner_pet_magicattack']='Magic Attack(s)';
//$lang['Rabbitoshi_owner_pet_health']='Health';
//$lang['Rabbitoshi_owner_pet_hunger']='Hunger';
//$lang['Rabbitoshi_owner_pet_thirst']='Thirst';
//$lang['Rabbitoshi_owner_pet_hygiene']='Hygiene';
$lang['Rabbitoshi_owner_admin_ok']='Pet characteristics successfully edited';
$lang['Rabbitoshi_admin_general_return']='<br /><br /> Click <a href="'.append_sid("admin_rabbitoshi_owners.$phpEx").'">here</a> to return to the previous page<br /><br />';
$lang['Rabbitoshi_cron_admin_update']='Manual update';
$lang['Rabbitoshi_cron_admin_update_explain']='Because the pet statistics are only updated while the owner is looking at him or during the automatic updates , the informations about the owners you can see on this page could be wrong . Click on the Manual update button if you want to update all the pets statistics';
$lang['Rabbitoshi_owner_admin_cron_ok']='Manual update successfully done';

//
// General Settings
//
//$lang['Rabbitoshi_settings']='General settings for the pet system';
//$lang['Rabbitoshi_settings_explanations']='For the values listed below , time is the period after the value you set in the second field will be substracted';
$lang['Rabbitoshi_settings_explain']='Here you can activate/deactivate the pet system, change the name of it, define the period for feeding pets, and more.';
$lang['Rabbitoshi_use']='Use the pet system';
$lang['Rabbitoshi_settings_name']='Name of the pet system';
$lang['Rabbitoshi_cron_use']='Use the automatic update of the creatures statistics';
$lang['Rabbitoshi_cron_explain']='This system allows to automatically update the pet statistics . Because it uses much of the CPU ressources , this can\'t be done all the time . If you own many users , you shouldn\'t use this feature more than once a day';
$lang['Rabbitoshi_cron_time']='Time beetween the automatic update';
$lang['Rabbitoshi_rebirth_enable']='Enable rebirth';
$lang['Rabbitoshi_rebirth_enable_explain']='If you check yes, users can pay to revive their pet when dead. If not, they will have to buy another one.';
$lang['Rabbitoshi_rebirth_price']='Cost to raise a dead pet';
$lang['Rabbitoshi_vet_enable']='Enable the vet';
$lang['Rabbitoshi_rebirth_vet_explain']='Using the vet, pet owners can fully heal their pet';
$lang['Rabbitoshi_vet_price']='Cost to visit the vet';
$lang['Rabbitoshi_hotel_use']='Enable the hotel';
$lang['Rabbitoshi_hotel_use_explain']='When a pet is in the hotel, his status bars don\'t decrease';
$lang['Rabbitoshi_hotel_price']='Hotel price';
$lang['Rabbitoshi_hotel_price_explain'] ='Cost for each day in the hotel';
$lang['Rabbitoshi_hotel_exp']='Lost of experience';
$lang['Rabbitoshi_hotel_exp_explain']='Experience points lost per day in the hotel';
$lang['Rabbitoshi_evolution_use']='Enable evolution';
$lang['Rabbitoshi_evolution_use_explain']='If you check this, some creatures will be able to evolve ( have a look to the pets management too )';
$lang['Rabbitoshi_evolution_price']='Evolution price';
$lang['Rabbitoshi_evolution_price_explain']='Percent of the evolved pet cost ( set this value to 0 if you want this feature to be free )';
$lang['Rabbitoshi_evolution_time']='Evolution required time';
$lang['Rabbitoshi_evolution_time_explain']='Minimal days the owner has his pet before he can look for an evolution';
$lang['Rabbitoshi_hunger_time']='Time before the <b>hunger</b> status decreases (in seconds)';
$lang['Rabbitoshi_hunger_value']='Value of the decrease';
$lang['Rabbitoshi_thirst_time']='Time before the <b>thirst</b> status decreases (in seconds)';
$lang['Rabbitoshi_thirst_value']='Value of the decrease';
$lang['Rabbitoshi_health_time']='Time before the <b>health</b> status decreases (in seconds)';
$lang['Rabbitoshi_health_value']='Value of the decrease';
$lang['Rabbitoshi_hygiene_time']='Time before the <b>hygiene</b> status decreases (in seconds)';
$lang['Rabbitoshi_hygiene_value']='Value of the decrease';
$lang['Rabbitoshi_level_price']='Experience points needed to increase: Level';
$lang['Rabbitoshi_attack_reload_price']='Experience points needed for 1 attack point reloaded';
$lang['Rabbitoshi_magic_reload_price']='Experience points needed for 1 magic point reloaded';
$lang['Rabbitoshi_health_price']='Experience points needed to increase: Health Max';
$lang['Rabbitoshi_hunger_price']='Experience points needed to increase: Hunger Max';
$lang['Rabbitoshi_thirst_price']='Experience points needed to increase: Thirst Max';
$lang['Rabbitoshi_hygiene_price']='Experience points needed to increase: Hygiene Max';
$lang['Rabbitoshi_power_price']='Experience points needed to increase: Strength';
$lang['Rabbitoshi_magicpower_price']='Experience points needed to increase: Mental Strength';
$lang['Rabbitoshi_armor_price']='Experience points needed to increase: Armor';
$lang['Rabbitoshi_attack_price']='Experience points needed to increase: Attack Max';
$lang['Rabbitoshi_magicattack_price']='Experience points needed to increase: Magic Max';
$lang['Rabbitoshi_mp_price']='Experience points needed to increase: Mana Max';
$lang['Rabbitoshi_health_raise']='Number of points raised during the progress for: Health Max';
$lang['Rabbitoshi_hunger_raise']='Number of points raised during the progress for: Hunger Max';
$lang['Rabbitoshi_thirst_raise']='Number of points raised during the progress for: Thirst Max';
$lang['Rabbitoshi_hygiene_raise']='Number of points raised during the progress for: Hygiene Max';
$lang['Rabbitoshi_power_raise']='Number of points raised during the progress for: Strength';
$lang['Rabbitoshi_magicpower_raise']='Number of points raised during the progress for: Mental Strength';
$lang['Rabbitoshi_armor_raise']='Number of points raised during the progress for: Armor';
$lang['Rabbitoshi_attack_raise']='Number of points raised during the progress for: Attack Max';
$lang['Rabbitoshi_magicattack_raise']='Number of points raised during the progress for: Magic Max';
$lang['Rabbitoshi_mp_raise']='Number of points raised during the progress for: Mana Max';
$lang['Rabbitoshi_experience_min']='Minimum experience points a pet earn after battle';
$lang['Rabbitoshi_experience_max']='Maximum experience points a pet earn after battle';
$lang['Rabbitoshi_mp_min']='<b>Minimum</b> mana needed to make a magic attack is chosen between 2 valors';
$lang['Rabbitoshi_mp_max']='<b>Maximum</b> mana needed to make a magic attack is chosen between 2 valors';
$lang['Rabbitoshi_updated_return_settings']='General Settings were successfully updated<br /><br /> Click %shere%s to return to the general settings';
$lang['Rabbitoshi_update_error']='An error has occurred in the settings update';


/***************************************************************************
 *   ADR Battle Language Keys
 ***************************************************************************/

$lang['Adr_Rabbitoshi_invoc_succes']='You have summoned your pet to help you in battle.';
$lang['Rabbitoshi_battle_pet_title']='Your pet is currently in battle';
$lang['Rabbitoshi_battle_pet_health']='Health';
$lang['Rabbitoshi_battle_pet_mp']='Mana';
$lang['Rabbitoshi_battle_pet_attack']='Attack';
$lang['Rabbitoshi_battle_pet_magicattack']='Magic';
$lang['Rabbitoshi_battle_pet_action_attack']='Attack';
$lang['Rabbitoshi_battle_pet_action_magicattack']='Magic Attack';
$lang['Rabbitoshi_battle_pet_action_invoc']='Call ';

// Battle Text
$lang['Adr_battle_monster_success_critical']='Your opponent inflicts a critical hit of %s damage point(s) to your pet.';
$lang['Adr_battle_monster_success']='Your opponent deals %s damage point(s) to your pet.';
$lang['Adr_battle_pet_success']='Your pet deals %s damage point(s) to your opponent.';
$lang['Adr_battle_pet_success_critical']='Your pet inflicted a critical hit of %s point(s) to your opponent.';
$lang['Adr_battle_pet_poison']='Poison deal %s damage point(s) to your pet.';
$lang['Adr_battle_pet_dead_or_limitattack']='You cannot make this attack with your pet because it is already dead or his attack limit is reached.';
$lang['Adr_battle_pet_dead_or_limitmagicattack']='You cannot make this attack with your pet because it is already dead or his magic attack limit is reached.';
$lang['Adr_battle_pet_mp_lack']='You don\'t have enough mana to make this attack';
$lang['Adr_battle_pet_regeneration_mess']='Regeneration ability is automatic. You don\'t need to active it';
$lang['Adr_battle_pet_noability']='You don\'t have any Special Ability';
$lang['Rabbitoshi_Adr_battle_regen']='Your pet gets %s health point(s) due to its regeneration ability.';
$lang['Rabbitoshi_Adr_battle_pet_sacrifice']='Your pet sacrifices itself and inflicts %s damage point(s) to the opponent.';
$lang['Rabbitoshi_Adr_battle_pet_mana_transfert']='Your pet give you %s mana points.';
$lang['Rabbitoshi_Adr_battle_pet_health_transfert']='Your pet give you %s health points.';
$lang['Adr_battle_pet_win']='Your pet earns %s experience point(s) for having battled.';

// Condition
$lang['Adr_battle_pet_newstatut_1']='Your pet became Sad';
$lang['Adr_battle_pet_newstatut_2']='Your pet is now Ill';
$lang['Adr_battle_pet_newstatut_3']='Your pet is now Poisoned';
$lang['Adr_battle_pet_newstatut_4']='Your pet became Furious';

//
// That's all Folks!
// -------------------------------------------------

?>