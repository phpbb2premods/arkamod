<?php
/***************************************************************************
 *                            lang_rabbitoshi.php [Dutch]
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
// 2006-07-03  Ganondorf - Dutch Translation
//

//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

$lang['Day']='Dag';
$lang['Days']='Dagen';
$lang['Hour']='Uur';
$lang['Hours']='Uuren';
$lang['Minute']='Minuut';
$lang['Minutes']='Minuten';
$lang['Rabbitoshi_seconds']='Seconden';

// Als je een language key wil toevoegen zodat je voorwerpen in meerdere talen voorkomen, gebruik het volgende.
// Verander x in de naam van het voorwerp (géén hoofdletters), en verander 'item name' in hoe het item op 
// jouw site moet komen te staan. Doe hetzelfde voor de beschrijving. Als je meerdere wil toevoegen, kopier deze
// twee regels en herhaal de vorige stappen voor deze voorwerpen. Als je de language keys wil gebruiken, ga naar
// het Dierenwinkel ACP en vul bij voorwerp naam 'Rabbitoshi_items_x' in, en doe hetzelfde voor de beschrijving 
// maar dan wel met Rabbitoshi_items_x_desc Onthoud wel dat je x voor elk voorwerp moet veranderen.
$lang['Rabbitoshi_items_x']='iten name';
$lang['Rabbitoshi_items_x_desc']='item description';


/***************************************************************************
 *   Rabbitoshi Page(s) Language Keys
 ***************************************************************************/

//
// General Messages
//
$lang['Rabbitoshi_title']='Rabbitoshi';
$lang['Rabbitoshi_previous']='Klik %shier%s om naar de vorige pagina te gaan';
$lang['Rabbitoshi_disable']='Het huisdier systeem is uitgeschakeld.';
$lang['Rabbitoshi_owner_pet_lack']='Deze gebruiker heeft geen huisdier';
$lang['Rabbitoshi_default_points_name']='Punten';

//
// Index Page
//
$lang['Rabbitoshi_nopet_choose']='Je moet een dier kiezen om door te gaan';
$lang['Rabbitoshi_nopet_title']='Huisdier Kopen';
$lang['Rabbitoshi_nopet_lack']='Je hebt niet genoeg geld om dit dier te kopen.';
$lang['Rabbitoshi_name_select']='Vul een naam voor je huisdier in';
$lang['Rabbitoshi_buypet_success'] ='Gefeliciteerd! Je hebt nu een huisdier.';
$lang['Rabbitoshi_pet_of']='Dit huisdier is van ';
$lang['Rabbitoshi_pet_prize']='Prijs';
$lang['Rabbitoshi_pet_buy']='Koop dit dier';
$lang['Rabbitoshi_pet_choose']='Kies een dier ';
$lang['Rabbitoshi_pet_hunger']='Resistance in the famine';
$lang['Rabbitoshi_pet_thirst']='Resistance in the thirst';
$lang['Rabbitoshi_pet_hygiene']='Resistance in the dirt';
$lang['Rabbitoshi_pet_call_vet']='Bel de dierenarts';
$lang['Rabbitoshi_pet_feed']='Voed';
$lang['Rabbitoshi_pet_drink']='Geef Drinken';
$lang['Rabbitoshi_pet_clean']='Maak schoon';
$lang['Rabbitoshi_pet_caracs']='Karakter Eigenshappen';
$lang['Rabbitoshi_pet_characteristics']='Gevecht Stats';
$lang['Rabbitoshi_pet_attacks']='Gevecht Verhouding';
$lang['Rabbitoshi_pet_level']='Level';
$lang['Rabbitoshi_pet_experience']='Totale EXP';
$lang['Rabbitoshi_pet_curxp']='EXP';
$lang['Rabbitoshi_pet_age']='Leeftijd';
$lang['Rabbitoshi_health']='Conditie';
$lang['Rabbitoshi_health_explain']='Let Op! Je huisdier verliest ook HP als zijn honger, dorst en hygiene status laag is';
$lang['Rabbitoshi_ability_title']='Vaardigheden Geleerd';
$lang['Rabbitoshi_topic']='Bekijk zijn/haar huidier';
$lang['Rabbitoshi_owner_last_visit']='Eigenaar\'s laatste bezoek';
$lang['Rabbitoshi_pet_favorite_food']='Favoriete Eten';
$lang['Rabbitoshi_pet_vet']='Je huisdier is weer gezond.';
$lang['Rabbitoshi_pet_vet_full']='Waarom zou je naar die dierenarts gaan als je huisdier gezond is?';
$lang['Rabbitoshi_pet_vet_lack']='Je hebt niet genoeg geld om deze actie te volbrengen!';
$lang['Rabbitoshi_vet_holidays']='De dierenarts is nu niet beschikbaar, kom later maar terug.';
$lang['Rabbitoshi_services']='Acties';
$lang['Rabbitoshi_pet_call_vet_explain']='Wil je de dierenarts bezoeken om je huisdier weer gezond te maken voor ';
$lang['Rabbitoshi_owner_list']='Bekijk de huisdier eigenaar lijst.';
$lang['Rabbitoshi_owner_list_explain']='Huidier Eigenaar Lijst';
$lang['Rabbitoshi_food_no_need']='Je huisdier hoeft op dit moment niet te eten';
$lang['Rabbitoshi_water_no_need']='Je huisdier hoeft op dit moment niet te drinken';
$lang['Rabbitoshi_clean_no_need']='Je huisdiers plek hoeft nu niet schoongemaakt te worden.';
$lang['Rabbitoshi_lack_food']='Je hebt het favoriete eten van je huisdier niet';
$lang['Rabbitoshi_lack_water']='Je hebt geen water voor je huisdier';
$lang['Rabbitoshi_lack_cleaner']='Je hebt geen schoonmaakmiddelen voor de plaats van je huisdier';
$lang['Rabbitoshi_hidden']='Sorry , deze gebruiker wil niet dat anderen de karakter eigenschappen van zijn huisdier zien.<br /><br /> Klik <a href="'.append_sid("index.$phpEx").'">hier</a> om terug naar de Forum Index te gaan.';

// Hotel
$lang['Rabbitoshi_hotel']='Hotel';
$lang['Rabbitoshi_hotel_explain']='Laat je huisdier verzorgen tijdens je vakantie';
$lang['Rabbitoshi_hotel_no_actions']='Je kan deze actie niet volbrengen als je huisdier in het hotel zit';
$lang['Rabbitoshi_pet_into_hotel']='Je huisdier is nu in het hotel<br />Hij komt terug op';
$lang['Rabbitoshi_is_in_hotel']='Je huisdier is in het hotel tot ';
$lang['Rabbitoshi_hotel_welcome']='Welkom in het Huisdier Hotel';
$lang['Rabbitoshi_out_of_hotel']='Klik hier om terug naar je huisdier te gaan.';
$lang['Rabbitoshi_hotel_out_success']='Je hebt je huisdier succesvol teruggekregen';
$lang['Rabbitoshi_hotel_welcome_services']='We kunnen je huisdier verzorgen als jij dat wilt';
$lang['Rabbitoshi_hotel_welcome_services_select']='Selecteer een aantal dagen';
$lang['Rabbitoshi_hotel_get_in']='Laat je huisdier in het Hotel';
$lang['Rabbitoshi_hotel_in_success']='Je huisdier is nu in het hotel';
$lang['Rabbitoshi_hotel_lack_money']='Je hebt niet genoeg geld om je huisdier zo lang in het hotel te laten';
$lang['Rabbitoshi_hotel_disable']='Het Hotel is op dit moment gesloten.';

// Evolution
$lang['Rabbitoshi_evolution']='Evolutie';
$lang['Rabbitoshi_evolution_explain']='Misschien kan je huisdier evolueren...';
$lang['Rabbitoshi_no_evolution']='Jouw huisdier type kan niet evolueren.';
$lang['Rabbitoshi_no_evolution_time']='Je huisdier is veel te jong om te evolueren, probeer het over een paar dagen nog eens.';
$lang['Rabbitoshi_evolution']='Evolutie';
$lang['Rabbitoshi_evolution_welcome']='Selecteer een evolutie voor je huisdier';
$lang['Rabbitoshi_evolution_exec']='Evolutie!!';
$lang['Rabbitoshi_evolution_lack']='Je kan de evolutie niet betalen';
$lang['Rabbitoshi_evolution_success']='Je huisdier is succesvol geevolueerd!!';
$lang['Rabbitoshi_evolution_enable']='Evolutie is uitgeschakeld.';

// Owners
$lang['Rabbitoshi_pet_name']='Huisdier Naam';
$lang['Rabbitoshi_pet_time']='Huisdier Leeftijd';
$lang['Rabbitoshi_pet_type']='Huisdier Type';

// Preferences
$lang['Rabbitoshi_preferences']='Instellingen';
$lang['Rabbitoshi_preferences_explain']='Aanpassen van je instellingen';
$lang['Rabbitoshi_preferences_notify']='Stuur me een Privé bericht als mijn huisdier iets nodig heeft';
$lang['Rabbitoshi_preferences_hide']='Verberg mijn huisdier voor andere gebruikers';
$lang['Rabbitoshi_preferences_feed_full']='Geef mijn huisdier voedsel als hij/zij wat nodig heeft';
$lang['Rabbitoshi_preferences_feed_full_explain']='Als je deze optie aanvinkt, gebruik je al het beschikbare voedsel om ervoor te zorgen dat je huisdier geen honger meer heeft. Als je deze optie niet aanvinkt, moet je je huisdier elke keer een klein beetje voedsel geven';
$lang['Rabbitoshi_preferences_drink_full']='Geef mijn huisdier water als hij/zij wat nodig heeft';
$lang['Rabbitoshi_preferences_drink_full_explain']='Als je deze optie aanvinkt, gebruik je al het beschikbare water om ervoor te zorgen dat je huisdier geen honger meer heeft. Als je deze optie niet aanvinkt, moet je je huisdier elke keer een klein beetje water geven';
$lang['Rabbitoshi_preferences_clean_full']='Maak altijd schoon totdat de omgeving helemaal schoon is';
$lang['Rabbitoshi_preferences_clean_full_explain']='Als je deze optie aanvinkt, gebruik je al het beschikbare schoonmaakmiddel om ervoor te zorgen dat je huisdier geen honger meer heeft. Als je deze optie niet aanvinkt, moet je je huisdier elke keer een klein beetje schoon maken';
$lang['Rabbitoshi_preferences_updated']='Je instellingen zijn succesvol aangepast';

// Notification
$lang['Rabbitoshi_pm_news']='Nieuws over je Huisdier';
$lang['Rabbitoshi_pm_news_hotel']='Je huisdier is nu in het Hotel';
$lang['Rabbitoshi_APM_pm']='De statistieken van je huisdier zijn geupdate. Je zou het even moeten bekijken.';

// Selling Your Pet
$lang['Rabbitoshi_owner_sell']='Verkoop je huisdier';
$lang['Rabbitoshi_owner_pet_value']='Waarde van je huisdier';
$lang['Rabbitoshi_pet_sell']='Verkoop van je huisdier';
$lang['Rabbitoshi_pet_sell_for']='Wil je je huisdier verkopen voor ';
$lang['Rabbitoshi_pet_sell_confirm']='Weet je zeker dat je je huisdier wilt verkopen ?';
$lang['Rabbitoshi_pet_sold']='Je huisdier is verkocht voor '.$pet_value.'';
$lang['Rabbitoshi_return']='<br /><br /> Klik <a href="'.append_sid("rabbitoshi.$phpEx").'">hier</a> om een ander huisdier te kopen<br /><br /> Klik <a href="'.append_sid("index.$phpEx").'">hier</a> om terug te gaan naar de index';

// Death of a Pet
$lang['Rabbitoshi_confirm']='Bevestiging';
$lang['Rabbitoshi_pet_is_dead']='Je huisdier is overleden';
$lang['Rabbitoshi_pet_has_died']='Je huisdier is overleden, je laatste beslissing wacht.';
$lang['Rabbitoshi_pet_is_dead_cost']='Kosten om je huisdier weer tot leven te wekken: ';
$lang['Rabbitoshi_pet_is_dead_cost_explain']='Wil je betalen om je huisdier tot leven te wekken?<br />Als je het niet zeker weet, kom dan later terug om je beslissing te maken.';
$lang['Rabbitoshi_pet_dead_rebirth_no']='Je huisdier is op weg naar een betere wereld.';
$lang['Rabbitoshi_pet_dead_rebirth_ok']='Je huisdier is weer tot leven gewekt.';
$lang['Rabbitoshi_pet_dead_lack']='Je hebt niet genoeg geld om je huisdier tot leven te wekken.';
$lang['Rabbitoshi_pet_dead']='Je huisdier is heengegaan. Tijd om een nieuwe te zoeken.';

//
// Progression Page
//
$lang['Rabbitoshi_pet_progress']='Vooruitgang van je huisdier';
$lang['Rabbitoshi_progress']='Hier kan je de status en level van je huisdier verbeteren.';
$lang['Rabbitoshi_progress_experiencelimit_lack']='Je huisdier heeft het level limiet nog niet behaald om een level omhoog te gaan.<br /><br />Klik <a href="'.append_sid("rabbitoshi.$phpEx").'">hier</a> om naar de huisdier pagina te gaan.';
$lang['Rabbitoshi_experience_name']='Punten';
$lang['Rabbitoshi_progress_name']='Status';
$lang['Rabbitoshi_progress_explain']='Uitleg';
$lang['Rabbitoshi_progress_number']='Vooruitgaings punten';
$lang['Rabbitoshi_progress_price']='Prijs';
$lang['Rabbitoshi_progress_submit']='Verbeter';
$lang['Rabbitoshi_progress_submit_title']='Vooruitgang';
$lang['Rabbitoshi_owner_pet_health_explain']='Verhoog maximum HP';
$lang['Rabbitoshi_owner_pet_hunger_explain']='Verhoog maximum Honger';
$lang['Rabbitoshi_owner_pet_thirst_explain']='Verhoog maximum Dorst';
$lang['Rabbitoshi_owner_pet_hygiene_explain']='Verhoog maximum Hygiene';
$lang['Rabbitoshi_owner_pet_level_explain']='Verhoog je Huisdier Level';
$lang['Rabbitoshi_owner_pet_power_explain']='Verhoog Kracht';
$lang['Rabbitoshi_owner_pet_magicpower_explain']='Verhoog Mentale Kracht';
$lang['Rabbitoshi_owner_pet_armor_explain']='Verhoog Pantser';
$lang['Rabbitoshi_owner_pet_mpmax_explain']='Verhoog maximum MP';
$lang['Rabbitoshi_owner_pet_attack_explain']='Verhoog Aanval Limiet';
$lang['Rabbitoshi_owner_pet_magicattack_explain']='Verhoog Magie Limiet';
$lang['Rabbitoshi_progress_ok']='Vooruitgang succesvol gemaakt.';
$lang['Rabbitoshi_progress_experience_lack']='Je huisdier heeft niet genoeg ervaring om deze status te verhogen.';

// Reload
$lang['Rabbitoshi_progress_reload']='Herlaad';
$lang['Rabbitoshi_owner_pet_attack_reload']='Volledig herladen van Aanval Limiet';
$lang['Rabbitoshi_owner_pet_magic_reload']='Volledig herladen van Magie Limiet';

// Abilities
$lang['Rabbitoshi_ability_submit']='Leer';
$lang['Rabbitoshi_ability_name']='Vaardigheid';
$lang['Rabbitoshi_ability_lack']='Geen Vaardigheden';
$lang['Rabbitoshi_ability_explain']='Effect van Vaardigheid';
$lang['Rabbitoshi_ability_price']='Vaardigheid Kosten';
$lang['Rabbitoshi_ability_submit_title']='Leren';
$lang['Rabbitoshi_ability_regeneration']='Herstel';
$lang['Rabbitoshi_ability_regeneration_explain']='Herstel geeft je huisdier een paar HP na elke beurt dat hij MP gebruikt.';
$lang['Rabbitoshi_ability_health']='HP Transfer';
$lang['Rabbitoshi_ability_health_explain']='HP Transfer geeft HP van je huisdier aan je character';
$lang['Rabbitoshi_ability_mana']='MP Transfer';
$lang['Rabbitoshi_ability_mana_explain']='MP Transfer geeft MP van je huisdier aan je character.';
$lang['Rabbitoshi_ability_sacrifice']='Opoffering';
$lang['Rabbitoshi_ability_sacrifice_explain']='Je huisdier verliest al zijn levenspunten en richt een hoop schade aan bij je tegenstander.';
$lang['Rabbitoshi_ability_price_lack']='Je huisdier heeft niet genoeg ervaring om deze vaardigheid te leren.<br /><br />Klik <a href="'.append_sid("rabbitoshi_progress.$phpEx").'">hier</a> om naar de Vooruitgang pagina te gaan.';
$lang['Rabbitoshi_ability_stats_lack']='De status van je huisdier is niet goed genoeg om deze vaardigheid te leren.<br /><br />Klik <a href="'.append_sid("rabbitoshi_progress.$phpEx").'">hier</a> om naar de Vooruitgang pagina te gaan.';

//
// Shop Page
//
$lang['Rabbitoshi_Shop']='Dieren Winkel';
$lang['Rabbitoshi_shop_name']='Naam';
$lang['Rabbitoshi_shop_img']='Afbeelding';
$lang['Rabbitoshi_item_desc']='Beschrijving';
$lang['Rabbitoshi_shop_prize']='Prijs';
$lang['Rabbitoshi_item_type']='Type';
$lang['Rabbitoshi_item_sum']='In Bezit';
$lang['Rabbitoshi_owner_points']='Jouw Geld';
$lang['Rabbitoshi_shop_action']='Koop spullen';
$lang['Rabbitoshi_shop_buy']='Koop';
$lang['Rabbitoshi_shop_sell']='Verkoop';
$lang['Rabbitoshi_lack_items']='Je kan geen voorwerpen verkopen die je niet hebt.';
$lang['Rabbitoshi_lack']='Je hebt niet genoeg geld om dit voorwerp te kopen.';
$lang['Rabbitoshi_pet_shop']='Koop en verkoop voorwerpen voor je huisdier.';
$lang['Rabbitoshi_general_return'] ='<br /><br /> Klik <a href="'.append_sid("rabbitoshi.$phpEx").'">hier</a> om naar de Huisdier pagina te gaan<br /><br /> Klik <a href="'.append_sid("rabbitoshi_shop.$phpEx").'">hier</a> om spullen voor je huisdier te kopen.<br /><br /> Klik <a href="'.append_sid("index.$phpEx").'">hier</a> om naar de index te gaan.';
$lang['Rabbitoshi_shop_action_plus']='Deze spullen zijn gekocht voor ';
$lang['Rabbitoshi_shop_action_less']='Deze spullen zijn verkocht voor ';
$lang['Rabbitoshi_shop_lack_items']='Je kan geen voorwerpen verkopen die je niet hebt.';

//
// Pet Inventory
//
$lang['Rabbitoshi_inventory']='Vertroetel de Inventaris';
$lang['Rabbitoshi_inventory_value']='De waarde';
$lang['Rabbitoshi_inventory_quanity']='Quanity';
$lang['Rabbitoshi_inventory_action']='Verkoop spullen';


/***************************************************************************
 *   Rabbitoshi Pet Messages
 ***************************************************************************/

//
// Alerts
//
$lang['Rabbitoshi_message']='Belangrijke Berichten';
$lang['Rabbitoshi_message_hungry']='Voer me alsjeblieft!';
$lang['Rabbitoshi_message_very_hungry']='Ik word een skelet!';
$lang['Rabbitoshi_message_thirst']='Geef me alsjeblieft iets te drinken ';
$lang['Rabbitoshi_message_very_thirst']='Water ... Ik heb nu echt water nodig...';
$lang['Rabbitoshi_message_health']='Verzorg me alsjeblieft !';
$lang['Rabbitoshi_message_very_health']='Argh ... Ik zterf hier ... alleen ... ';
$lang['Rabbitoshi_message_hygiene']='Ik kan niet leven in deze stronthoop!';
$lang['Rabbitoshi_message_very_hygiene']='Ik denk dat ik ziek ben. Deze plek is ook zo vies!';

//
// Thoughts
//
$lang['Rabbitoshi_general_message']='Gedachten';
$lang['Rabbitoshi_general_message_very_bad']='Waarom?...Waarom ik?... Ik ga dood ... Geen kans meer voor mij ... Alsjeblieft.. beindig mijn pijn ...';
$lang['Rabbitoshi_general_message_bad']='Zal mijn baasje komen ? Hij interesseert zich niet voor mij. Het zou verboden moeten worden om dat soort mensen dieren te laten houden!';
$lang['Rabbitoshi_general_message_neutral']='Hoe saai is mijn leven?!';
$lang['Rabbitoshi_general_message_good']='*zingt*';
$lang['Rabbitoshi_general_message_very_good']='Ik had niet kunnen dromen van een beter baasje ! Hij is nog steeds hier voor mij. Ik ben een gelukkig huisdier!';

//
// Pet Conditions
//
$lang['Rabbitoshi_creature_statut_0']='In Goede Gezondheid';
$lang['Rabbitoshi_creature_statut_1']='Voelt Ongelukkig';
$lang['Rabbitoshi_creature_statut_2']='Ziek';
$lang['Rabbitoshi_creature_statut_3']='Is Vergiftigd';
$lang['Rabbitoshi_creature_statut_4']='Is Furieus';


/***************************************************************************
 *   Administration Page Language Keys
 ***************************************************************************/

//
// Admin
//
$lang['rRabbitoshi_title']='Aanpassen en verwijderen van huisdieren';
$lang['rRabbitoshi_config_edit']='Een huisdier aanpassen';
$lang['rRabbitoshi_desc']='Hier kan je een huisdier toevoegen of aanpassen';

//
// Abilities
//
$lang['Rabbitoshi_abilities_settings']='Vaardigheden Instellingen';
$lang['Rabbitoshi_abilities_settings_explain']='Hier kan je alle speciale vaardigheden instellen.';
$lang['Rabbitoshi_regeneration_level']='Minimum Level om de Herstel vaardigheid te kunnen leren';
$lang['Rabbitoshi_regeneration_magicpower']='Minimum Mentale Kracht om de Herstel vaardigheid te leren';
$lang['Rabbitoshi_regeneration_mp']='Minimum MP om de Herstel vaardigheid te kunnen leren';
$lang['Rabbitoshi_regeneration_mp_need']='MP bij elke beurt gebruikd';
$lang['Rabbitoshi_regeneration_hp_give']='HP bij elke beurt hersteld';
$lang['Rabbitoshi_regeneration_price']='Herstel Vaardigheid Prijs';
$lang['Rabbitoshi_health_level']='Minimum Level om de HP Transfer vaardigheid te kunnen leren.';
$lang['Rabbitoshi_health_magicpower']='Minimum Mentale Kracht om de HP Transfer vaardigheid te leren';
$lang['Rabbitoshi_health_health']='Minimum HP om de HP Transfer vaardigheid te kunnen leren';
$lang['Rabbitoshi_health_percent']='HP precentage om aan de gebruiker te geven';
$lang['Rabbitoshi_healthtransfert_price']='HP Transfer Prijs';
$lang['Rabbitoshi_mana_level']='Minimum Level om de MP Transfer vaardigheid te kunnen leren.';
$lang['Rabbitoshi_mana_magicpower']='Minimum Mentale Kracht om de MP Transfer vaardigheid te leren';
$lang['Rabbitoshi_mana_mp']='Minimum MP om de MP Transfer vaardigheid te kunnen leren';
$lang['Rabbitoshi_mana_percent']='MP precentage om aan de gebruiker te geven';
$lang['Rabbitoshi_mana_price']='MP Transfer Prijs';
$lang['Rabbitoshi_sacrifice_level']='Minimum Level om Opoffering te leren';
$lang['Rabbitoshi_sacrifice_power']='Minimum Kracht om Opoffering te leren';
$lang['Rabbitoshi_sacrifice_armor']='Minimum Pantser om Opoffering te leren';
$lang['Rabbitoshi_sacrifice_mp']='Minimum MP om Opoffering te leren';
$lang['Rabbitoshi_sacrifice_price']='Opoffering Prijs';

//
// Level Up
//
$lang['Rabbitoshi_levelup_settings']='Level Up Instellingen';
$lang['Rabbitoshi_levelup_settings_explain']='Hier kan je de bonus punten instellen die een huisdier krijgt als hij een level omhoog gaat';
$lang['Rabbitoshi_levelup_earned']='Maximum Punt(en) Gekregen';
$lang['Rabbitoshi_health_levelup']='HP';
$lang['Rabbitoshi_hunger_levelup']='Honger';
$lang['Rabbitoshi_thirst_levelup']='Dorst';
$lang['Rabbitoshi_hygiene_levelup']='Hygiene';
$lang['Rabbitoshi_power_levelup']='Kracht';
$lang['Rabbitoshi_magicpower_levelup']='Mentale Kracht';
$lang['Rabbitoshi_armor_levelup']='Pantser';
$lang['Rabbitoshi_mp_levelup']='MP';
$lang['Rabbitoshi_attack_levelup']='Aanvallen';
$lang['Rabbitoshi_magicattack_levelup']='Magische Aanvallen';

//
// Pet Management
//
//$lang['Rabbitoshi_Pets_Management']='Pets Management';
$lang['Rabbitoshi_manage_title']='Huisdier Beheer';
$lang['Rabbitoshi_desc']='Hier kan je huisdieren beheren, aanpassen of verwijderen.';
$lang['Rabbitoshi_add']='Maak een nieuw Huisdier';
$lang['Rabbitoshi_config']='Het toevoegen van een nieuw huisdier';
$lang['Rabbitoshi_name']='Naam';
$lang['Rabbitoshi_img']='Afbeelding';
$lang['Rabbitoshi_img_explain']='De bestandsnaam en extensie van de afbeelding voor het huisdier.(de afbeelding moet in de map /rabbitoshi/images/pets/ staan.';
$lang['Rabbitoshi_pet_health']='HP';
$lang['Rabbitoshi_pet_hunger']='Honger';
$lang['Rabbitoshi_pet_thirst']='Dorst';
$lang['Rabbitoshi_pet_hygiene']='Hygiene';
$lang['Rabbitoshi_pet_armor']='Pantser';
$lang['Rabbitoshi_pet_mp']='MP';
$lang['Rabbitoshi_pet_power']='Kracht';
$lang['Rabbitoshi_pet_magicpower']='Mentale Kracht';
$lang['Rabbitoshi_pet_ratioattack']='Aanvallen';
$lang['Rabbitoshi_pet_ratiomagic']='Magie';
$lang['Rabbitoshi_pet_xp']='EXP Limiet';
$lang['Rabbitoshi_pet_experience_limit']='EXP Limiet';
$lang['Rabbitoshi_food_type']='Voedsel Type';
$lang['Rabbitoshi_is_evolution_of']='Evolutie Vorm';
$lang['Rabbitoshi_is_evolution_of_explain']='Je kan een huisdier kiezen waarvan deze evolueert.';
$lang['Rabbitoshi_is_evolution_of_none']='Geen';
$lang['Rabbitoshi_buyable']='Te Koop';
$lang['Rabbitoshi_buyable_explain']='Als je dit aanvinkt kunnen gebruikers dit huisdier kopen.';
$lang['Rabbitoshi_del_success']='Dit huisdier is succesvol verwijderd';
$lang['Rabbitoshi_add_success']='Dit huisdier is succesvol toegevoegd';
$lang['Rabbitoshi_edit_success']='Dit huisdier is succesvol aangepast';
$lang['Click_return_rabbitoshiadmin']='Klik %shier%s om terug te keren naar de Huisdier Administratie';

//
// Pet Shop
//
$lang['Rabbitoshi_shop_title']='Dierenwinkel Beheer';
$lang['Rabbitoshi_shop_desc']='Hier kan je de dierenwinkel beheren';
$lang['Rabbitoshi_shop_edit_success']='Het voorwerp is succesvol geupdate';
$lang['Rabbitoshi_shop_name']='Naam';
$lang['Rabbitoshi_shop_prize']='Prijs';
$lang['Rabbitoshi_shop_type']='Type';
$lang['Rabbitoshi_shop_img']='Afbeelding';
$lang['Rabbitoshi_shop_power']='Kracht';
$lang['Rabbitoshi_shop_power_explain']='Status punten verkregen bij het gebruiken van dit voorwerp';
$lang['Rabbitoshi_item_type_food']='Eten';
$lang['Rabbitoshi_item_type_water']='Water';
$lang['Rabbitoshi_item_type_misc']='Misc';
$lang['Rabbitoshi_item_type_food']='Eten';
$lang['Rabbitoshi_item_type_food_none']='Geen';
$lang['Rabbitoshi_item_type_misc']='Miscellanous';
$lang['Rabbitoshi_item_desc']='Beschrijving';
$lang['Rabbitoshi_shop_add']='Maak een nieuw voorwerp';
$lang['Rabbitoshi_shop_power_explain']='Dit is het aantal punten verkregen als een gebruiker dit voorwerp gebruikt';
$lang['Rabbitoshi_item_type_misc']='Schoonmaken';
$lang['Rabbitoshi_shop_title_add']='Maak een nieuw voorwerp';
$lang['Rabbitoshi_shop_config_add']='Hiermee kan je een voorwerp toevoegen aan de dierenwinkel';
$lang['Rabbitoshi_language_key']='Je kan een language key gebruiken, meer informatie in het bestand language/lang_xxxx/lang_rabbitoshi.php';
$lang['Rabbitoshi_img_item_explain']='De bestandsnaam en extensie van de afbeelding voor het huisdier.(de afbeelding moet in de map /rabbitoshi/images/items/ staan.';
$lang['Rabbitoshi_shop_added_success']='Dit nieuwe voorwerp is succesvol toegevoegd';
$lang['Rabbitoshi_shop_del_success']='Dit voorwerp is succesvol verwijderd';
$lang['Click_return_rabbitoshi_shopadmin']='Klik %shier%s om terug te gaan naar het Dierenwinkel Beheer';

//
// Pet Owners
//
$lang['Rabbitoshi_owner_admin_title']='Huisdier Eigenaar Beheer';
$lang['Rabbitoshi_owner_admin_title_explain']='Hier kan je de karaktereigenschappen van de huisdieren van de gebruikers aanpassen';
$lang['Rabbitoshi_owner_admin_submit']='Voer de veranderingen uit';
$lang['Rabbitoshi_owner_admin_select']='Selecteer een eigenaar om aan te passen:';
$lang['Rabbitoshi_owner_admin_select_submit']='Bekijk deze eigenaar';
$lang['Rabbitoshi_owner']='Eigenaar naam';
$lang['Rabbitoshi_owner_pet']='Naam van zijn Huisdier';
$lang['Rabbitoshi_owner_pet_type']='Soort Huisdier';
$lang['Rabbitoshi_owner_pet_health']='HP Max';
$lang['Rabbitoshi_owner_pet_hunger']='Honger Max';
$lang['Rabbitoshi_owner_pet_thirst']='Dorst Max';
$lang['Rabbitoshi_owner_pet_hygiene']='Hygiene Max';
$lang['Rabbitoshi_owner_pet_mpmax']='MP Max';
$lang['Rabbitoshi_owner_pet_level']='Level';
$lang['Rabbitoshi_owner_pet_power']='Kracht';
$lang['Rabbitoshi_owner_pet_magicpower']='Mentale Kracht';
$lang['Rabbitoshi_owner_pet_armor']='Pantser';
$lang['Rabbitoshi_owner_pet_experience']='EXP';
$lang['Rabbitoshi_owner_pet_mp']='MP';
$lang['Rabbitoshi_owner_pet_attack']='Aanval(len)';
$lang['Rabbitoshi_owner_pet_magicattack']='Magische Aanval(len)';
//$lang['Rabbitoshi_owner_pet_health']='Health';
//$lang['Rabbitoshi_owner_pet_hunger']='Hunger';
//$lang['Rabbitoshi_owner_pet_thirst']='Thirst';
//$lang['Rabbitoshi_owner_pet_hygiene']='Hygiene';
$lang['Rabbitoshi_owner_admin_ok']='Huisdier karaktereigenschappen succesvol aangepast';
$lang['Rabbitoshi_admin_general_return']='<br /><br /> Klik <a href="'.append_sid("admin_rabbitoshi_owners.$phpEx").'">hier</a> om terug te keren naar de vorige pagina<br /><br />';
$lang['Rabbitoshi_cron_admin_update']='Handmatige Update';
$lang['Rabbitoshi_cron_admin_update_explain']='Omdat de huisdier statistieken alleen worden geupdate als de eigenaar zijn/haar huisdier bezoekt of tijdens de automatische updates, zou de informatie die je hier ziet fout kunnen zijn. Klik op de handmatige update knop als je alle statistieken wil updaten';
$lang['Rabbitoshi_owner_admin_cron_ok']='Handmatige update succesvol uitgevoerd';

//
// General Settings
//
//$lang['Rabbitoshi_settings']='General settings for the pet system';
//$lang['Rabbitoshi_settings_explanations']='For the values listed below , time is the period after the value you set in the second field will be substracted';
$lang['Rabbitoshi_settings_explain']='Hier kan je het huisdier systeem activeren/deactiveren, verander de naam, bepaal de periode voor het voeren van huisdieren en meer.';
$lang['Rabbitoshi_use']='Gebruik het Huisdier Systeem';
$lang['Rabbitoshi_settings_name']='Naam van het huisdier systeem';
$lang['Rabbitoshi_cron_use']='Gebruik het automatisch updaten van huisdier statistieken';
$lang['Rabbitoshi_cron_explain']='Dit systeem update de huisdier statistiekn automatisch. Omdat het veel CPU gebruik kost, kan dit niet elk moment gedaan worden. Als je veel gebruikers hebt moet je dit niet meer dan 1 keer per dag doen.';
$lang['Rabbitoshi_cron_time']='Tijd tussen twee automatische updates';
$lang['Rabbitoshi_rebirth_enable']='Laat tot leven wekken toe';
$lang['Rabbitoshi_rebirth_enable_explain']='Als je dit aan zet, kunnen gebruikers geld betalen om hun dode huisdier weer tot leven te wekken. Zet je dit uit, dan moeten ze een nieuwe kopen.';
$lang['Rabbitoshi_rebirth_price']='Kosten om een huisdier tot leven te wekken';
$lang['Rabbitoshi_vet_enable']='Zet Dierenarts aan/uit';
$lang['Rabbitoshi_rebirth_vet_explain']='Als gebruikers naar de dierenarts gaan, kunnen ze hun huisdier weer helemaal gezond maken';
$lang['Rabbitoshi_vet_price']='Prijs om naar de Dierenarts te gaan.';
$lang['Rabbitoshi_hotel_use']='Zet het Hotel aan/uit';
$lang['Rabbitoshi_hotel_use_explain']='Als een huisdier in het hotel is, verandert zijn status niet';
$lang['Rabbitoshi_hotel_price']='Hotel prijs';
$lang['Rabbitoshi_hotel_price_explain'] ='Kosten voor elke dag in het hotel';
$lang['Rabbitoshi_hotel_exp']='Verlies aan EXP';
$lang['Rabbitoshi_hotel_exp_explain']='EXP punten verloren per dag in het hotel';
$lang['Rabbitoshi_evolution_use']='Zet Evolutie aan/uit';
$lang['Rabbitoshi_evolution_use_explain']='Als je dit aanzet, kunnen huisdieren evolueren ( kijk ook even naar het Huisdier Beheer)';
$lang['Rabbitoshi_evolution_price']='Evolutie prijs';
$lang['Rabbitoshi_evolution_price_explain']='Prijs om je huisdier te laten evolueren ( als je dit op 0 zet, is deze functie gratis )';
$lang['Rabbitoshi_evolution_time']='Benodigde tijd voor Evolutie';
$lang['Rabbitoshi_evolution_time_explain']='Minimaal aamtal dagen dat een eigenaar zijn huisdier heeft om een evolutie te kiezen.';
$lang['Rabbitoshi_hunger_time']='Tijd voordat de <b>honger</b> status vermindert (in seconden)';
$lang['Rabbitoshi_hunger_value']='Aantal dat het vermindert';
$lang['Rabbitoshi_thirst_time']='Tijd voordat de <b>dorst</b> status vermindert (in seconden)';
$lang['Rabbitoshi_thirst_value']='Aantal dat het vermindert';
$lang['Rabbitoshi_health_time']='Tijd voordat de <b>HP</b> status vermindert (in seconden)';
$lang['Rabbitoshi_health_value']='Aantal dat het vermindert';
$lang['Rabbitoshi_hygiene_time']='Tijd voordat de <b>hygiene</b> status vermindert (in seconden)';
$lang['Rabbitoshi_hygiene_value']='Aantal dat het vermindert';
$lang['Rabbitoshi_level_price']='EXP nodig om te verbeteren: Level';
$lang['Rabbitoshi_attack_reload_price']='EXP nodig om 1 aanvals punt te herladen';
$lang['Rabbitoshi_magic_reload_price']='EXP nodig om 1 magie punt te herladen';
$lang['Rabbitoshi_health_price']='EXP nodig om te verbeteren: HP Max';
$lang['Rabbitoshi_hunger_price']='EXP nodig om te verbeteren: Honger Max';
$lang['Rabbitoshi_thirst_price']='EXP nodig om te verbeteren: Dorst Max';
$lang['Rabbitoshi_hygiene_price']='EXP nodig om te verbeteren: Hygiene Max';
$lang['Rabbitoshi_power_price']='EXP nodig om te verbeteren: Kracht';
$lang['Rabbitoshi_magicpower_price']='EXP nodig om te verbeteren: Mentale Kracht';
$lang['Rabbitoshi_armor_price']='EXP nodig om te verbeteren: Pantser';
$lang['Rabbitoshi_attack_price']='EXP nodig om te verbeteren:: Aanval Max';
$lang['Rabbitoshi_magicattack_price']='EXP nodig om te verbeteren: Magie Max';
$lang['Rabbitoshi_mp_price']='EXP nodig om te verbeteren: MP Max';
$lang['Rabbitoshi_health_raise']='Aantal punten erbij tijdens het verbetere van: HP Max';
$lang['Rabbitoshi_hunger_raise']='Aantal punten erbij tijdens het verbetere van: Honger Max';
$lang['Rabbitoshi_thirst_raise']='Aantal punten erbij tijdens het verbetere van: Dorst Max';
$lang['Rabbitoshi_hygiene_raise']='Aantal punten erbij tijdens het verbetere van: Hygiene Max';
$lang['Rabbitoshi_power_raise']='Aantal punten erbij tijdens het verbetere van: Kracht';
$lang['Rabbitoshi_magicpower_raise']='Aantal punten erbij tijdens het verbetere van: Mentale Kracht';
$lang['Rabbitoshi_armor_raise']='Aantal punten erbij tijdens het verbetere van: Pantser';
$lang['Rabbitoshi_attack_raise']='Aantal punten erbij tijdens het verbetere van: Aanval Max';
$lang['Rabbitoshi_magicattack_raise']='Aantal punten erbij tijdens het verbetere van: Magie Max';
$lang['Rabbitoshi_mp_raise']='Aantal punten erbij tijdens het verbetere van: MP Max';
$lang['Rabbitoshi_experience_min']='Minimum EXP die een huisdier krijgt na een gevecht';
$lang['Rabbitoshi_experience_max']='Maximum EXP die een huisdier krijgt na een gevecht';
$lang['Rabbitoshi_mp_min']='<b>Minimum</b> MP nodig om een magische aanval te doen';
$lang['Rabbitoshi_mp_max']='<b>Maximum</b> MP nodig om een magische aanval te doen';
$lang['Rabbitoshi_updated_return_settings']='Algemene Configuratie succesvol geupdate<br /><br /> Klik %shier%s om terug te keren naar de vorige pagina';
$lang['Rabbitoshi_update_error']='Eenn fout is opgetreden tijdens het updaten';


/***************************************************************************
 *   ADR Battle Language Keys
 ***************************************************************************/

$lang['Adr_Rabbitoshi_invoc_succes']='Je hebt je huisdier opgeroepen om je te helpen bij het gevecht.';
$lang['Rabbitoshi_battle_pet_title']='Je huisdier is op dit moment in gevecht';
$lang['Rabbitoshi_battle_pet_health']='HP';
$lang['Rabbitoshi_battle_pet_mp']='MP';
$lang['Rabbitoshi_battle_pet_attack']='Aanval';
$lang['Rabbitoshi_battle_pet_magicattack']='Magie';
$lang['Rabbitoshi_battle_pet_action_attack']='Val aan';
$lang['Rabbitoshi_battle_pet_action_magicattack']='Magische Aanval';
$lang['Rabbitoshi_battle_pet_action_invoc']='Roep ';

// Battle Text
$lang['Adr_battle_monster_success_critical']='Your opponent inflicts a critical hit of %s damage point(s) to your pet.';
$lang['Adr_battle_monster_success']='Your opponent deals %s damage point(s) to your pet.';
$lang['Adr_battle_pet_success']='Your pet deals %s damage point(s) to your opponent.';
$lang['Adr_battle_pet_success_critical']='Your pet inflicted a critical hit of %s point(s) to your opponent.';
$lang['Adr_battle_pet_poison']='Poison deal %s damage point(s) to your pet.';
$lang['Adr_battle_pet_dead_or_limitattack']='You cannot make this attack with your pet because it is already dead or his attack limit is reached.';
$lang['Adr_battle_pet_dead_or_limitmagicattack']='You cannot make this attack with your pet because it is already dead or his magic attack limit is reached.';
$lang['Adr_battle_pet_mp_lack']='You don\'t have enouht mana to make this attack';
$lang['Adr_battle_pet_regeneration_mess']='Regeneration ability is automatic. You don\'t need to active it';
$lang['Adr_battle_pet_noability']='You don\'t have any Special Ability';
$lang['Rabbitoshi_Adr_battle_regen']='Your pet gets %s health point(s) due to its regeneration ability.';
$lang['Rabbitoshi_Adr_battle_pet_sacrifice']='Your pet sacrifices itself and inflicts %s damage point(s) to the opponent.';
$lang['Rabbitoshi_Adr_battle_pet_mana_transfert']='Your pet give you %s mana points.';
$lang['Rabbitoshi_Adr_battle_pet_health_transfert']='Your pet give you %s health points.';
$lang['Adr_battle_pet_win']='Your pet earns %s experience point(s) for having battled.';

// Condition
$lang['Adr_battle_pet_newstatut_1']='Je Huisdier is Verdrietig';
$lang['Adr_battle_pet_newstatut_2']='Je Huisdier is Ziek';
$lang['Adr_battle_pet_newstatut_3']='Je Huisdier is Vergiftigd';
$lang['Adr_battle_pet_newstatut_4']='Je Huisdier is Furieus';

//
// That's all Folks!
// -------------------------------------------------

?>