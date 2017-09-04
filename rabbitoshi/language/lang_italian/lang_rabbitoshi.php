<?php
/***************************************************************************
 *                            lang_rabbitoshi.php [Italian]
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
// 2006-07-03  Nico - Italian Translation
//

//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

$lang['Day']='Giorno';
$lang['Days']='Giorni';
$lang['Hour']='Ora';
$lang['Hours']='Ore';
$lang['Minute']='Minuto';
$lang['Minutes']='Minuti';
$lang['Rabbitoshi_seconds']='Secondi';

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
$lang['Rabbitoshi_previous']='Clicca %squi%s per tornare alla pagina precedente';
$lang['Rabbitoshi_disable']='La gestione pet è momentaneamente disabilitata.';
$lang['Rabbitoshi_owner_pet_lack']='L\'utente non possiede un pet';
$lang['Rabbitoshi_default_points_name']='Punti';

//
// Index Page
//
$lang['Rabbitoshi_nopet_choose']='Devi scegliere una creatura prima di continuare';
$lang['Rabbitoshi_nopet_title']='Comprare un pet';
$lang['Rabbitoshi_nopet_lack']='Non hai abbastanza soldi per comprare questa creatura.';
$lang['Rabbitoshi_name_select']='Please enter a name for your pet';
$lang['Rabbitoshi_buypet_success'] ='Congratulazioni! Ti sei appena comprato un pet.';
$lang['Rabbitoshi_pet_of']='Questo pet è proprietà di';
$lang['Rabbitoshi_pet_prize']='Prezzo';
$lang['Rabbitoshi_pet_buy']='Compra questa creatura';
$lang['Rabbitoshi_pet_choose']='Scegli una creatura';
$lang['Rabbitoshi_pet_hunger']='Resistenza alla fame';
$lang['Rabbitoshi_pet_thirst']='Resistenza alla sete';
$lang['Rabbitoshi_pet_hygiene']='Resistenza allo sporco';
$lang['Rabbitoshi_pet_call_vet']='Chiama il veterinario';
$lang['Rabbitoshi_pet_feed']='Dai da mangiare';
$lang['Rabbitoshi_pet_drink']='Dai da bere';
$lang['Rabbitoshi_pet_clean']='Lava';
$lang['Rabbitoshi_pet_caracs']='Caratteristiche';
$lang['Rabbitoshi_pet_characteristics']='Statistiche di battaglia';
$lang['Rabbitoshi_pet_attacks']='Media di battaglia';
$lang['Rabbitoshi_pet_level']='Livello';
$lang['Rabbitoshi_pet_experience']='Totale EXP';
$lang['Rabbitoshi_pet_curxp']='Attuale EXP';
$lang['Rabbitoshi_pet_age']='Età';
$lang['Rabbitoshi_health']='Condizione';
$lang['Rabbitoshi_health_explain']='Fai attenzione perchè il pet perde punti salute se ha fame, sete o le condizioni igieniche sono scarse';
$lang['Rabbitoshi_ability_title']='Abilità imparata';
$lang['Rabbitoshi_topic']='Guarda il pet di questo utente';
$lang['Rabbitoshi_owner_last_visit']='Ultima visita del proprietario';
$lang['Rabbitoshi_pet_favorite_food']='Cibo preferito';
$lang['Rabbitoshi_pet_vet']='Il tuo pet è completamente guarito.';
$lang['Rabbitoshi_pet_vet_full']='Perchè sprecare un viaggio quando il tuo pet sta in salute?';
$lang['Rabbitoshi_pet_vet_lack']='Non hai abbastanza soldi per pagare i servizi veterinari';
$lang['Rabbitoshi_vet_holidays']='Il veterinario non è disponibile al momento, torna più tardi';
$lang['Rabbitoshi_services']='Servizi';
$lang['Rabbitoshi_pet_call_vet_explain']='Vuoi far visita al veterinario per guarire completamente il tuo pet per';
$lang['Rabbitoshi_owner_list']='Guarda la lista di possessori di pet';
$lang['Rabbitoshi_owner_list_explain']='Lista di possessori di pet';
$lang['Rabbitoshi_food_no_need']='Il tuo pet non ha necessità di essere nutrito al momento';
$lang['Rabbitoshi_water_no_need']='Il tuo pet non ha bisogno di bere al momento';
$lang['Rabbitoshi_clean_no_need']='Non è necessario ripulire l\'area del pet al momento';
$lang['Rabbitoshi_lack_food']='Non hai il cibo preferito del tuo pet';
$lang['Rabbitoshi_lack_water']='Non hai acqua da dare al tuo pet';
$lang['Rabbitoshi_lack_cleaner']='Non hai un inserviente per pulire l\'area del tuo pet';
$lang['Rabbitoshi_hidden']='Spiacente, questo utente non wuole che altri vedano le caratteristiche del suo pet<br /><br /> Clicca <a href="'.append_sid("index.$phpEx").'">qui</a> per tornare all\'indice del forum';

// Hotel
$lang['Rabbitoshi_hotel']='Hotel';
$lang['Rabbitoshi_hotel_explain']='Affida il tuo pet durante le vacanze';
$lang['Rabbitoshi_hotel_no_actions']='Non puoi eseguire questa azione mentre il tuo pet è in hotel';
$lang['Rabbitoshi_pet_into_hotel']='Questo pet è attualmente nel suo hotel. <br /> Tornerà il';
$lang['Rabbitoshi_is_in_hotel']='Il tuo pet è in hotel fino al';
$lang['Rabbitoshi_hotel_welcome']='Benvenuto nell\'hotel dei pet';
$lang['Rabbitoshi_out_of_hotel']='Clicca qui per riprendere il tuo pet';
$lang['Rabbitoshi_hotel_out_success']='Hai ripreso il tuo pet';
$lang['Rabbitoshi_hotel_welcome_services']='Possiamo tenere il tuo pet se desideri';
$lang['Rabbitoshi_hotel_welcome_services_select']='Scegli il numero di giorni';
$lang['Rabbitoshi_hotel_get_in']='Lascia il tuo pet nell\'hotel';
$lang['Rabbitoshi_hotel_in_success']='Il Tuo pet si trova in hotel ora';
$lang['Rabbitoshi_hotel_lack_money']='Non hai abbastanza punti per lasciare il tuo pet così a lungo in hotel';
$lang['Rabbitoshi_hotel_disable']='L\'hotel è momentaneamente disabilitato.';

// Evolution
$lang['Rabbitoshi_evolution']='Evoluzione';
$lang['Rabbitoshi_evolution_explain']='Forse il tuo pet può evolversi...';
$lang['Rabbitoshi_no_evolution']='Il tuo pet non può evolvere.';
$lang['Rabbitoshi_no_evolution_time']='Il tuo pet è troppo giovane per evolvere. Devi possederlo da almeno';
$lang['Rabbitoshi_evolution']='Evoluzione';
$lang['Rabbitoshi_evolution_welcome']='Scegli un\'evoluzione per il tuo pet';
$lang['Rabbitoshi_evolution_exec']='Evoluzione !';
$lang['Rabbitoshi_evolution_lack']='Non puoi permetterti quest\'evoluzione';
$lang['Rabbitoshi_evolution_success']='Il tuo pet si è evoluto!!';
$lang['Rabbitoshi_evolution_enable']='L\'evoluzione è momentaneamente disabilitata.';

// Owners
$lang['Rabbitoshi_pet_name']='Nome del pet';
$lang['Rabbitoshi_pet_time']='Età del pet';
$lang['Rabbitoshi_pet_type']='Tipo di pet';

// Preferences
$lang['Rabbitoshi_preferences']='Preferenze';
$lang['Rabbitoshi_preferences_explain']='Controllo delle tue preferenze';
$lang['Rabbitoshi_preferences_notify']='Avvertimi via MP dei bisogni del mio pet';
$lang['Rabbitoshi_preferences_hide']='Nascondi il mio pet agli altri utenti';
$lang['Rabbitoshi_preferences_feed_full']='Dai sempre al mio pet tutto il cibo di cui ha bisogno';
$lang['Rabbitoshi_preferences_feed_full_explain']='Scegliendo questa opzione, userai tutto il cibo disponibile in modo che il tuo pet non abbia più fame. Se non la scegli darai al tuo pet il cibo un po\' per volta';
$lang['Rabbitoshi_preferences_drink_full']='Dai sempre al mio pet tutta l\'acqua di cui ha bisogno';
$lang['Rabbitoshi_preferences_drink_full_explain']='Scegliendo questa opzione, userai tutta l\'acqua disponibile in modo che il tuo pet non abbia più sete. Se non la scegli darai al tuo pet l\'acqua un po\' per volta';
$lang['Rabbitoshi_preferences_clean_full']='Pulisci sempre la cuccia del mio pet finchè non è completamente pulita';
$lang['Rabbitoshi_preferences_clean_full_explain']='Scegliendo questa opzione, userai il pulitore fino a quando la cuccia del tuo pet non sarà completamente pulita. Se non la scegli la pulirai quando serve';
$lang['Rabbitoshi_preferences_updated']='Le tue preferenze sono state modificate con successo';

// Notification
$lang['Rabbitoshi_pm_news']='Alcune notizie del tuo pet';
$lang['Rabbitoshi_pm_news_hotel']='Il tuo pet si è installato comodamente nell\'hotel';
$lang['Rabbitoshi_APM_pm']='Le statistiche del tuo pet sono state aggiornate. Vai a vederlo';

// Selling Your Pet
$lang['Rabbitoshi_owner_sell']='Vendi il tuo pet';
$lang['Rabbitoshi_owner_pet_value']='Valore del tuo pet';
$lang['Rabbitoshi_pet_sell']='Vendita della vostra creatura';
$lang['Rabbitoshi_pet_sell_for']='Sei sicuro di voler vendere il tuo pet per';
$lang['Rabbitoshi_pet_sell_confirm']='Sei sicuro di voler vendere il tuo pet?';
$lang['Rabbitoshi_pet_sold']='Hai venduto il tuo pet per '.$pet_value.'';
$lang['Rabbitoshi_return']='<br /><br /> Clicca <a href="'.append_sid("rabbitoshi.$phpEx").'">qui</a> per comprarne un altro <br /><br /> Clicca <a href="'.append_sid("index.$phpEx").'">qui</a> per tornare al forum';

// Death of a Pet
$lang['Rabbitoshi_confirm']='Conferma';
$lang['Rabbitoshi_pet_is_dead']='Il tuo pet è morto';
$lang['Rabbitoshi_pet_has_died']='Il tuo pet è morto, attende la tua decisione finale.';
$lang['Rabbitoshi_pet_is_dead_cost']='Vuoi pagare per resuscitare il tuo pet';
$lang['Rabbitoshi_pet_is_dead_cost_explain']='Desideri pagare per far rivivere il tuo pet?<br />Se non vuoi decidere ora, ritorna quando hai fatto la tua scelta.';
$lang['Rabbitoshi_pet_dead_rebirth_no']='Il vostro pet è passato a miglior vita.';
$lang['Rabbitoshi_pet_dead_rebirth_ok']='il tuo pet è di nuovo vivo!';
$lang['Rabbitoshi_pet_dead_lack']='Non hai abbastanza punti per far rivivere il tuo pet.';
$lang['Rabbitoshi_pet_dead']='Il tuo pet è morto. Dovevi avere più cura di lui. Devi comprarne un altro';

//
// Progression Page
//
$lang['Rabbitoshi_pet_progress']='Progressi del pet';
$lang['Rabbitoshi_progress']='Qui puoi alzare le statistiche e il livello del tuo pet.';
$lang['Rabbitoshi_progress_experiencelimit_lack']='Il tuo pet non ha raggiunto il limite di esperienza per salire di livello.<br /><br />Clicca <a href="'.append_sid("rabbitoshi.$phpEx").'">qui</a> per andare alla pagina del tuo pet.';
$lang['Rabbitoshi_experience_name']='Punti';
$lang['Rabbitoshi_progress_name']='Statistiche';
$lang['Rabbitoshi_progress_explain']='Spiega';
$lang['Rabbitoshi_progress_number']='Punti Progresso';
$lang['Rabbitoshi_progress_price']='Prezzo';
$lang['Rabbitoshi_progress_submit']='Aumenta';
$lang['Rabbitoshi_progress_submit_title']='Progresso';
$lang['Rabbitoshi_owner_pet_health_explain']='Aumenta Salute Massima';
$lang['Rabbitoshi_owner_pet_hunger_explain']='Aumenta Fame Massima';
$lang['Rabbitoshi_owner_pet_thirst_explain']='Aumenta Sete Massima';
$lang['Rabbitoshi_owner_pet_hygiene_explain']='Aumenta Igiene Massima';
$lang['Rabbitoshi_owner_pet_level_explain']='Aumenta il livello';
$lang['Rabbitoshi_owner_pet_power_explain']='Aumenta Forza';
$lang['Rabbitoshi_owner_pet_magicpower_explain']='Aumenta Forza Mentale';
$lang['Rabbitoshi_owner_pet_armor_explain']='Aumenta Difesa';
$lang['Rabbitoshi_owner_pet_mpmax_explain']='Aumenta Magia Massima';
$lang['Rabbitoshi_owner_pet_attack_explain']='Aumenta il limite d\'Attacco';
$lang['Rabbitoshi_owner_pet_magicattack_explain']='Aumenta il limite d\'Attacco Magico';
$lang['Rabbitoshi_progress_ok']='Progresso fatto con successo.';
$lang['Rabbitoshi_progress_experience_lack']='Il tuo pet non ha abbastanza esperienza per aumentare questa statistica.';

// Reload
$lang['Rabbitoshi_progress_reload']='Ricarica';
$lang['Rabbitoshi_owner_pet_attack_reload']='Ricarica completa del limite d\'attacco';
$lang['Rabbitoshi_owner_pet_magic_reload']='Ricarica completa del limite di magia';

// Abilities
$lang['Rabbitoshi_ability_submit']='Impara';
$lang['Rabbitoshi_ability_name']='Abilità';
$lang['Rabbitoshi_ability_lack']='No Abilità';
$lang['Rabbitoshi_ability_explain']='Effetto dell\'abilità';
$lang['Rabbitoshi_ability_price']='Costo Abilità';
$lang['Rabbitoshi_ability_submit_title']='Imparare';
$lang['Rabbitoshi_ability_regeneration']='Rigenerazione';
$lang['Rabbitoshi_ability_regeneration_explain']='La rigenerazione dà alcuni punti salute al tuo pet ogni volta che utilizza i propri punti magia';
$lang['Rabbitoshi_ability_health']='Trasferimento Salute';
$lang['Rabbitoshi_ability_health_explain']='Il Trasferimenti Salute dà alcuni punti salute al tuo personaggio dal tuo pet';
$lang['Rabbitoshi_ability_mana']='Trasferimento Magia';
$lang['Rabbitoshi_ability_mana_explain']='Il Trasferimento di Magia dà alcuni punti magia al tuo personaggio da tuo pet';
$lang['Rabbitoshi_ability_sacrifice']='Sacrificio';
$lang['Rabbitoshi_ability_sacrifice_explain']='Il tuo pet perde tutti i suoi punti salute e infligge molti punti danno all\'avversario.';
$lang['Rabbitoshi_ability_price_lack']='Il tuo pet non ha abbastanza esperienza per imparare questa abilità<br /><br />Clicca <a href="'.append_sid("rabbitoshi_progress.$phpEx").'">qui</a> per tornare alla pagina di progresso.';
$lang['Rabbitoshi_ability_stats_lack']='Le statistiche del tuo pet non sono abbastanza buone per imparare questa abilità.<br /><br />Clicca <a href="'.append_sid("rabbitoshi_progress.$phpEx").'">qui</a> per tornare alla pagina di progresso.';

//
// Shop Page
//
$lang['Rabbitoshi_Shop']='Pet Shop';
$lang['Rabbitoshi_shop_name']='Nome';
$lang['Rabbitoshi_shop_img']='Immagine';
$lang['Rabbitoshi_item_desc']='Descrizione';
$lang['Rabbitoshi_shop_prize']='Prezzo';
$lang['Rabbitoshi_item_type']='Tipo';
$lang['Rabbitoshi_item_sum']='Posseduto';
$lang['Rabbitoshi_owner_points']='I tuoi punti';
$lang['Rabbitoshi_shop_action']='Effettua questi acquisti';
$lang['Rabbitoshi_shop_buy']='Compra';
$lang['Rabbitoshi_shop_sell']='Vendita';
$lang['Rabbitoshi_lack_items']='Non puoi vendere un articolo che non possiedi';
$lang['Rabbitoshi_lack']='Non hai abbastanza soldi per comprare questo articolo';
$lang['Rabbitoshi_pet_shop']='Comprare e vendere gli articoli per il vostro pet';
$lang['Rabbitoshi_general_return'] ='<br /><br /> Clicca <a href="'.append_sid("rabbitoshi.$phpEx").'">qui</a> per guardare il tuo pet<br /><br /> Clicca <a href="'.append_sid("rabbitoshi_shop.$phpEx").'">qui</a> per comprare oggetti per il tuo pet<br /><br /> Clicca <a href="'.append_sid("index.$phpEx").'">qui</a> per tornare al forum';
$lang['Rabbitoshi_shop_action_plus']='Questi articoli sono stati comprati per ';
$lang['Rabbitoshi_shop_action_less']='I tuoi articoli sono stati venduti per ';
$lang['Rabbitoshi_shop_lack_items']='Non puoi vendere gli articoli che non possiedi.';

//
// Pet Inventory
//
$lang['Rabbitoshi_inventory']='Coccolare l\'Inventario';
$lang['Rabbitoshi_inventory_value']='Valore';
$lang['Rabbitoshi_inventory_quanity']='Quanity';
$lang['Rabbitoshi_inventory_action']='Vendere gli Articoli';


/***************************************************************************
 *   Rabbitoshi Pet Messages
 ***************************************************************************/

//
// Alerts
//
$lang['Rabbitoshi_message']='ALLARMI DEL PET';
$lang['Rabbitoshi_message_hungry']='Per favore dammi da mangiare!';
$lang['Rabbitoshi_message_very_hungry']='Sto per diventare uno scheletro!';
$lang['Rabbitoshi_message_thirst']='Per favore dammi da bere!';
$lang['Rabbitoshi_message_very_thirst']='Acqua ... Ho veramente bisogno di acqua ...';
$lang['Rabbitoshi_message_health']='Per favore curami!';
$lang['Rabbitoshi_message_very_health']='Argh ... Sto morendo ... solo ... ';
$lang['Rabbitoshi_message_hygiene']='Non posso vivere in questa sporcizia!';
$lang['Rabbitoshi_message_very_hygiene']='Penso di essere malato. Questo posto è troppo sporco.';

//
// Thoughts
//
$lang['Rabbitoshi_general_message']='PENSIERI DEL PET';
$lang['Rabbitoshi_general_message_very_bad']='Perchè?...Perchè io?... Sto morendo ... Non ci sono chance di vita per me ... Per favore, poni fine alle mie sofferenze ...';
$lang['Rabbitoshi_general_message_bad']='Il mio padrone verrà? Non si preoccupa di me. A questa persona non dovrebbe essere permesso avere un pet!';
$lang['Rabbitoshi_general_message_neutral']='Come è noiosa la mia vita?!';
$lang['Rabbitoshi_general_message_good']='*canto*';
$lang['Rabbitoshi_general_message_very_good']='Non potrei desiderare un padrone migliore! E\' ancora qui per me, sono un pet fortunato!';

//
// Pet Conditions
//
$lang['Rabbitoshi_creature_statut_0']='Buona Salute';
$lang['Rabbitoshi_creature_statut_1']='Triste';
$lang['Rabbitoshi_creature_statut_2']='Malato';
$lang['Rabbitoshi_creature_statut_3']='Avvelenato';
$lang['Rabbitoshi_creature_statut_4']='Furioso';


/***************************************************************************
 *   Administration Page Language Keys
 ***************************************************************************/

//
// Admin
//
$lang['rRabbitoshi_title']='Modificazione e cancellazione dei pet';
$lang['rRabbitoshi_config_edit']='Modifica di un pet';
$lang['rRabbitoshi_desc']='Qui puoi modificare o aggiungere un pet';

//
// Abilities
//
$lang['Rabbitoshi_abilities_settings']='Opzioni Abilità Speciali';
$lang['Rabbitoshi_abilities_settings_explain']='Qui puoi settare tutte le abilità speciali per i pets.';
$lang['Rabbitoshi_regeneration_level']='Livello minimo per imparare l\'Abilità Rigenerazione';
$lang['Rabbitoshi_regeneration_magicpower']='Forza Mentale minima per imparare l\'Abilità Rigenerazione';
$lang['Rabbitoshi_regeneration_mp']='Magia minima per imparare l\'Abilità Rigenerazione';
$lang['Rabbitoshi_regeneration_mp_need']='Magia consumata ad ogni turno';
$lang['Rabbitoshi_regeneration_hp_give']='Punti salute recuperati ad ogni turno';
$lang['Rabbitoshi_regeneration_price']='Prezzo Abilità Rigenerazione';
$lang['Rabbitoshi_health_level']='Livello minimo per imparare l\'Abilità Trasferimento Salute';
$lang['Rabbitoshi_health_magicpower']='Forza Mentale minima per imparare l\'Abilità Trasferimento Salute';
$lang['Rabbitoshi_health_health']='Punti Salute minimi per imparare l\'Abilità Trasferimento Salute';
$lang['Rabbitoshi_health_percent']='Percentuale di salute data al personaggio';
$lang['Rabbitoshi_healthtransfert_price']='Prezzo Abilità Trasferimento Salute';
$lang['Rabbitoshi_mana_level']='Livello minimo per imparare l\'Abilità Trasferimento Magia';
$lang['Rabbitoshi_mana_magicpower']='Forza Mentale minima per imparare l\'Abilità Trasferimento Magia';
$lang['Rabbitoshi_mana_mp']='Magia minima per imparare l\'Abilità Trasferimento Magia';
$lang['Rabbitoshi_mana_percent']='Percentuale di magia data al personaggio';
$lang['Rabbitoshi_mana_price']='Prezzo Abilità Trasferimento Magia';
$lang['Rabbitoshi_sacrifice_level']='Livello minimo per imparare l\'Abilità Sacrificio';
$lang['Rabbitoshi_sacrifice_power']='Forza Mentale minima per imparare l\'Abilità Sacrificio';
$lang['Rabbitoshi_sacrifice_armor']='Difesa minima per imparare l\'Abilità Sacrificio';
$lang['Rabbitoshi_sacrifice_mp']='Magia minima per imparare l\'Abilità Sacrificio';
$lang['Rabbitoshi_sacrifice_price']='Prezzo Abilità Sacrificio';

//
// Level Up
//
$lang['Rabbitoshi_levelup_settings']='Opzioni Level Up';
$lang['Rabbitoshi_levelup_settings_explain']='Qui puoi settare tutti i punti bonus che un pet guadagna dopo l\'aumento di livello';
$lang['Rabbitoshi_levelup_earned']='Punti massimi guadagnati';
$lang['Rabbitoshi_health_levelup']='Punti Salute Massima guadagnati';
$lang['Rabbitoshi_hunger_levelup']='Punti Fame Massima guadagnati';
$lang['Rabbitoshi_thirst_levelup']='Punti Sete Massima guadagnati';
$lang['Rabbitoshi_hygiene_levelup']='Punti Igiene Massima guadagnati';
$lang['Rabbitoshi_power_levelup']='Strengh';
$lang['Rabbitoshi_magicpower_levelup']='Mental Strengh';
$lang['Rabbitoshi_armor_levelup']='Punti Difesa guadagnati';
$lang['Rabbitoshi_mp_levelup']='Punti Magia Massima guadagnati';
$lang['Rabbitoshi_attack_levelup']='Punti Attacco guadagnati';
$lang['Rabbitoshi_magicattack_levelup']='Punti Attacco Massimo guadagnati';

//
// Pet Management
//
//$lang['Rabbitoshi_Pets_Management']='Pets Management';
$lang['Rabbitoshi_manage_title']='Amministrazione dei pets';
$lang['Rabbitoshi_desc']='Qui puoi controllare i pet, aggiungergli valori, modificarli, o cancellarli.';
$lang['Rabbitoshi_add']='Aggiungi un pet';
$lang['Rabbitoshi_config']='Aggiungi un nuovo pet';
$lang['Rabbitoshi_name']='Nome';
$lang['Rabbitoshi_img']='Immagine';
$lang['Rabbitoshi_img_explain']='Il nome dell\'immagine nella directory <i>images/Rabbitoshi/</i> deve avere lo stesso nome del pet.';
$lang['Rabbitoshi_pet_health']='Salute';
$lang['Rabbitoshi_pet_hunger']='Fame';
$lang['Rabbitoshi_pet_thirst']='Sete';
$lang['Rabbitoshi_pet_hygiene']='Igiene';
$lang['Rabbitoshi_pet_armor']='Difesa';
$lang['Rabbitoshi_pet_mp']='Magia';
$lang['Rabbitoshi_pet_power']='Forza';
$lang['Rabbitoshi_pet_magicpower']='Forza mentale';
$lang['Rabbitoshi_pet_ratioattack']='Attacco';
$lang['Rabbitoshi_pet_ratiomagic']='Punti Magia';
$lang['Rabbitoshi_pet_xp']='Limite Esperienza';
$lang['Rabbitoshi_pet_experience_limit']='Il limite d\'esperienza che un pet deve raggiungere prima di salire di livello';
$lang['Rabbitoshi_food_type']='Tipo di Cibo';
$lang['Rabbitoshi_is_evolution_of']='Evoluzione di';
$lang['Rabbitoshi_is_evolution_of_explain']='Puoi scegliere un pet che può evolversi da.';
$lang['Rabbitoshi_is_evolution_of_none']='Non è un\'evoluzione';
$lang['Rabbitoshi_buyable']='Acquistabile';
$lang['Rabbitoshi_buyable_explain']='Se scegli questa opzione, gli utenti potranno comprarlo.';
$lang['Rabbitoshi_del_success']='Il pet è stato cancellato con successo';
$lang['Rabbitoshi_add_success']='Il pet è stato aggiunto con successo';
$lang['Rabbitoshi_edit_success']='Il pet è stato modificato con successo';
$lang['Click_return_rabbitoshiadmin']='Clicca %squi%s per tornare all\'amministrazione dei Pet';

//
// Pet Shop
//
$lang['Rabbitoshi_shop_title']='Amministrazione del negozio di pet';
$lang['Rabbitoshi_shop_desc']='Qui puoi controllare gli oggetti per i pet del tuo forum';
$lang['Rabbitoshi_shop_edit_success']='L\'oggetto è stato inserito con successo';
$lang['Rabbitoshi_shop_name']='Nome';
$lang['Rabbitoshi_shop_prize']='Prezzo';
$lang['Rabbitoshi_shop_type']='Tipo';
$lang['Rabbitoshi_shop_img']='Immagine';
$lang['Rabbitoshi_shop_power']='Potenza';
$lang['Rabbitoshi_shop_power_explain']='I Punti Status snon stati rigenerati usando questo oggetto';
$lang['Rabbitoshi_item_type_food']='Cibo';
$lang['Rabbitoshi_item_type_water']='Acqua';
$lang['Rabbitoshi_item_type_misc']='Varie';
$lang['Rabbitoshi_item_type_food']='Cibo';
$lang['Rabbitoshi_item_type_food_none']='Niente';
$lang['Rabbitoshi_item_type_misc']='Miscellanea';
$lang['Rabbitoshi_item_desc']='Descrizione';
$lang['Rabbitoshi_shop_add']='Aggiungi un oggetto';
$lang['Rabbitoshi_shop_power_explain']='Questo è il numero di punti guadagnati quando un utente usa questo oggetto';
$lang['Rabbitoshi_item_type_misc']='Pulizia';
$lang['Rabbitoshi_shop_title_add']='Aggiungi un oggetto';
$lang['Rabbitoshi_shop_config_add']='Questo form permette di aggiungere un oggetto al negozio di pet';
$lang['Rabbitoshi_language_key']='Potete usare un linguaggio chiave, per favore fate riferimento a language/lang_xxxx/lang_rabbitoshi.php';
$lang['Rabbitoshi_img_item_explain']='Nome dell\'immagine nell directory images/Rabbitoshi/ corrispondente a questo oggetto.';
$lang['Rabbitoshi_shop_added_success']='Il nuovo oggetto è stato aggiunto con successo';
$lang['Rabbitoshi_shop_del_success']='Questo oggetto è stato modificato con successo';
$lang['Click_return_rabbitoshi_shopadmin']='Clicca %shere%s per tornare all\'amministrazione del negozio di pet';

//
// Pet Owners
//
$lang['Rabbitoshi_owner_admin_title']='Controllo padroni Pet';
$lang['Rabbitoshi_owner_admin_title_explain']='Qui puoi modificare le caratteristiche dei pet per i tuoi utenti';
$lang['Rabbitoshi_owner_admin_submit']='Accetta le modifiche';
$lang['Rabbitoshi_owner_admin_select']='Seleziona un padrone da modificare :';
$lang['Rabbitoshi_owner_admin_select_submit']='Guarda questo padrone';
$lang['Rabbitoshi_owner']='Nome padrone';
$lang['Rabbitoshi_owner_pet']='Nome del suo pet';
$lang['Rabbitoshi_owner_pet_type']='Tipo di pet';
$lang['Rabbitoshi_owner_pet_health']='Salute Max';
$lang['Rabbitoshi_owner_pet_hunger']='Fame Max';
$lang['Rabbitoshi_owner_pet_thirst']='Sete Max';
$lang['Rabbitoshi_owner_pet_hygiene']='Igiene Max';
$lang['Rabbitoshi_owner_pet_mpmax']='Magia Max';
$lang['Rabbitoshi_owner_pet_level']='Levello';
$lang['Rabbitoshi_owner_pet_power']='Forza';
$lang['Rabbitoshi_owner_pet_magicpower']='Forza mentale';
$lang['Rabbitoshi_owner_pet_armor']='Difesa';
$lang['Rabbitoshi_owner_pet_experience']='Esperienza';
$lang['Rabbitoshi_owner_pet_mp']='Magia';
$lang['Rabbitoshi_owner_pet_attack']='Attacchi';
$lang['Rabbitoshi_owner_pet_magicattack']='Attacchi magici';
//$lang['Rabbitoshi_owner_pet_health']='Health';
//$lang['Rabbitoshi_owner_pet_hunger']='Hunger';
//$lang['Rabbitoshi_owner_pet_thirst']='Thirst';
//$lang['Rabbitoshi_owner_pet_hygiene']='Hygiene';
$lang['Rabbitoshi_owner_admin_ok']='Caratteristiche del padrone modificate con successo';
$lang['Rabbitoshi_admin_general_return']='<br /><br /> Clicca <a href="'.append_sid("admin_rabbitoshi_owners.$phpEx").'">qui</a> per tornare al controllo dei padroni<br /><br />';
$lang['Rabbitoshi_cron_admin_update']='Aggiornamento manuale';
$lang['Rabbitoshi_cron_admin_update_explain']='Poichè le caratteristiche del pet vengono aggiornate solo mentre il padrone lo sta osservando o durante gli aggiornamenti automatici, le informazioni sul padrone che vedete in questa pagina potrebbero essere errate. Clicca sull\'aggiornamento manuale se vuoi aggiornare tutte le caratteristiche dei pet';
$lang['Rabbitoshi_owner_admin_cron_ok']='Aggiornamento eseguito con successo';

//
// General Settings
//
//$lang['Rabbitoshi_settings']='General settings for the pet system';
//$lang['Rabbitoshi_settings_explanations']='For the values listed below , time is the period after the value you set in the second field will be substracted';
$lang['Rabbitoshi_settings_explain']='Qui puoi attivare/disattivare il sistema dei pet, cambiargli il nome, Scegli il periodo d\'alimentazione degi pet.';
$lang['Rabbitoshi_use']='Usa il sistema dei Pet';
$lang['Rabbitoshi_settings_name']='Nome del sistema dei pet';
$lang['Rabbitoshi_cron_use']='Usa l\'aggiornamento automatico per le caratteristiche del pet';
$lang['Rabbitoshi_cron_explain']='Questo sistema da la possibilità di aggiornare automaticamente le caratteristiche del pet. Poichè questo usa molte risorse del CPU, questo non può essere fatto sempre. Se possiedi molti utenti, non dovresti usare più di una volta al giorno questa caratteristica';
$lang['Rabbitoshi_cron_time']='Tempo tra due aggiornameti automatici';
$lang['Rabbitoshi_rebirth_enable']='Attiva resurrezione';
$lang['Rabbitoshi_rebirth_enable_explain']='Se tu scegli si, gli utenti possono pagare per resuscitare il loro pet quando muore. Altrimenti, dovranno comprarne un altro.';
$lang['Rabbitoshi_rebirth_price']='Prezzo per resuscitare un pet';
$lang['Rabbitoshi_vet_enable']='Attiva il veterinario';
$lang['Rabbitoshi_rebirth_vet_explain']='Usando il veterinario, i proprietari dei pet possono curare i loro pet';
$lang['Rabbitoshi_vet_price']='Prezzo per visitare il veterinario';
$lang['Rabbitoshi_hotel_use']='Attiva l\'hotel';
$lang['Rabbitoshi_hotel_use_explain']='Quando un pet è nell\'hotel, le su barre di stato non diminuiscono';
$lang['Rabbitoshi_hotel_price']='Prezzo Hotel';
$lang['Rabbitoshi_hotel_price_explain'] ='Prezzo per ogni giorno nell\'hotel';
$lang['Rabbitoshi_hotel_exp']='Perdita di esperienza';
$lang['Rabbitoshi_hotel_exp_explain']='Punti esperienza persi per giorno nell\'hotel';
$lang['Rabbitoshi_evolution_use']='Attiva Evoluzione';
$lang['Rabbitoshi_evolution_use_explain']='e scegli questo, alcuni pet potranno evolvere (dai uno sguardo al pannello dei pet)';
$lang['Rabbitoshi_evolution_price']='Prezzo Evoluzione';
$lang['Rabbitoshi_evolution_price_explain']='Percentuale costo evoluzione del pet( inserisci 0 se vuoi che sia gratis)';
$lang['Rabbitoshi_evolution_time']='Tempo richiesto per l\'evoluzione';
$lang['Rabbitoshi_evolution_time_explain']='Giorni minimi che il padrone ha prima di poter cercare un\'evoluzione';
$lang['Rabbitoshi_hunger_time']='Tempo prima della diminuzione della <b>fame</b> (in secondi)';
$lang['Rabbitoshi_hunger_value']='Valore di diminuzione';
$lang['Rabbitoshi_thirst_time']='Tempo prima della diminuzione della <b>sete</b> (in secondi)';
$lang['Rabbitoshi_thirst_value']='Valore di diminuzione';
$lang['Rabbitoshi_health_time']='Tempo prima della diminuzione della <b>salute</b> (in secondi)';
$lang['Rabbitoshi_health_value']='Valore di diminuzione';
$lang['Rabbitoshi_hygiene_time']='Tempo prima della diminuzione dell\'<b>igiene</b> (in secondi)';
$lang['Rabbitoshi_hygiene_value']='Valore di diminuzione';
$lang['Rabbitoshi_level_price']='Punti esperienza necessari per incrementare: Livello';
$lang['Rabbitoshi_attack_reload_price']='Punti esperienza richiesti per la ricarica di un punto attacco';
$lang['Rabbitoshi_magic_reload_price']='Punti esperienza richiesti per la ricarica di un punto magia';
$lang['Rabbitoshi_health_price']='Punti esperienza necessari per incrementare: Salute Massima';
$lang['Rabbitoshi_hunger_price']='Punti esperienza necessari per incrementare: Fame Massima';
$lang['Rabbitoshi_thirst_price']='Punti esperienza necessari per incrementare: Sete Massima';
$lang['Rabbitoshi_hygiene_price']='Punti esperienza necessari per incrementare: Igiene Massima';
$lang['Rabbitoshi_power_price']='Punti esperienza necessari per incrementare: Forza';
$lang['Rabbitoshi_magicpower_price']='Punti esperienza necessari per incrementare: Forza mentale';
$lang['Rabbitoshi_armor_price']='Punti esperienza necessari per incrementare: Difesa';
$lang['Rabbitoshi_attack_price']='Punti esperienza necessari per incrementare: Attacco massimo';
$lang['Rabbitoshi_magicattack_price']='Punti esperienza necessari per incrementare: Punti Magia massimi';
$lang['Rabbitoshi_mp_price']='Punti esperienza necessari per incrementare: Magia Massima';
$lang['Rabbitoshi_health_raise']='Il numero di punti si è alzato durante il progresso per: Salute Massima';
$lang['Rabbitoshi_hunger_raise']='Il numero di punti si è alzato durante il progresso per: Fame Massima';
$lang['Rabbitoshi_thirst_raise']='Il numero di punti si è alzato durante il progresso per: Sete Massima';
$lang['Rabbitoshi_hygiene_raise']='Il numero di punti si è alzato durante il progresso per: Igiene Massima';
$lang['Rabbitoshi_power_raise']='Il numero di punti si è alzato durante il progresso per: Forza';
$lang['Rabbitoshi_magicpower_raise']='Il numero di punti si è alzato durante il progresso per: Forza Mentale';
$lang['Rabbitoshi_armor_raise']='Il numero di punti si è alzato durante il progresso per: Difesa';
$lang['Rabbitoshi_attack_raise']='Il numero di punti si è alzato durante il progresso per: Attacco Massimo';
$lang['Rabbitoshi_magicattack_raise']='Il numero di punti si è alzato durante il progresso per: Punti Magia Massimi';
$lang['Rabbitoshi_mp_raise']='Il numero di punti si è alzato durante il progresso per: Magia Massima';
$lang['Rabbitoshi_experience_min']='Punti esperienza minimi guadagnati dopo la battaglia di un pet';
$lang['Rabbitoshi_experience_max']='Punti esperienza massimi guadagnati dopo la battaglia da un pet';
$lang['Rabbitoshi_mp_min']='Il <b>valore minimo</b> di magia necessario per fare un attacco magico è sceltro fra 2 valori';
$lang['Rabbitoshi_mp_max']='Il <b>valore massimo</b> di magia necessario per fare un attacco magico è sceltro fra 2 valori';
$lang['Rabbitoshi_updated_return_settings']='Le impostazioni generali sono stati modificati con successo<br /><br /> Clicca %qui%s per tornare alle impostazioni generali';
$lang['Rabbitoshi_update_error']='Errore durante la modifica del sistema dei pet';


/***************************************************************************
 *   ADR Battle Language Keys
 ***************************************************************************/

$lang['Adr_Rabbitoshi_invoc_succes']='Hai chiamato il tuo pet per aiutarti in battaglia!!!.';
$lang['Rabbitoshi_battle_pet_title']='Il tuo pet è in battaglia !!!';
$lang['Rabbitoshi_battle_pet_health']='Salute';
$lang['Rabbitoshi_battle_pet_mp']='Magia';
$lang['Rabbitoshi_battle_pet_attack']='Attacco';
$lang['Rabbitoshi_battle_pet_magicattack']='Magic';
$lang['Rabbitoshi_battle_pet_action_attack']='Attacca';
$lang['Rabbitoshi_battle_pet_action_magicattack']='Attacco Magico';
$lang['Rabbitoshi_battle_pet_action_invoc']='Chiama ';

// Battle Text
$lang['Adr_battle_monster_success_critical']='Il tuo avversario infligge un colpo critico di %s punti danno al tuo pet.';
$lang['Adr_battle_monster_success']='Il tuo avversario infligge %s punti danno al tuo pet.';
$lang['Adr_battle_pet_success']='Il tuo pet infligge %s punti danno al tuo avversario.';
$lang['Adr_battle_pet_success_critical']='Il tuo pet infligge un colpo di %s punti danno al tuo avversario.';
$lang['Adr_battle_pet_poison']='Il veleno toglie %s punti danno al tuo pet.';
$lang['Adr_battle_pet_dead_or_limitattack']='Non puoi far fare questo attacco al tuo pet perchè è morto o ha raggiuto il limite d\'Attacco.';
$lang['Adr_battle_pet_dead_or_limitmagicattack']='Non puoi far fare questo attacco al tuo pet perchè è morto o ha raggiunto il limite d\'Attacco Magico.';
$lang['Adr_battle_pet_mp_lack']='Non hai abbastanza Punti Magia per fare questo Attacco';
$lang['Adr_battle_pet_regeneration_mess']='L\'Abilità Rigenerazione è automatica. Non hai bisogno di attivarla';
$lang['Adr_battle_pet_noability']='Non hai alcuna Abilità Speciale';
$lang['Rabbitoshi_Adr_battle_regen']='Il tuo pet riceve %s punti salute grazie all\'Abilità Rigenerazione.';
$lang['Rabbitoshi_Adr_battle_pet_sacrifice']='Il tuo pet si sacrifica e infligge %s punti danno al tuo avversario.';
$lang['Rabbitoshi_Adr_battle_pet_mana_transfert']='Il tuo pet dà %s punti magia.';
$lang['Rabbitoshi_Adr_battle_pet_health_transfert']='Il tuo pet dà %s punti salute.';
$lang['Adr_battle_pet_win']='Il tuo pet guadagna %s punti esperienza per questa battaglia.';

// Condition
$lang['Adr_battle_pet_newstatut_1']='Il tuo pet è diventato triste';
$lang['Adr_battle_pet_newstatut_2']='Il tuo pet è ora malato';
$lang['Adr_battle_pet_newstatut_3']='Il tuo pet è ora avvelenato';
$lang['Adr_battle_pet_newstatut_4']='Il tuo pet è diventato furioso';

//
// That's all Folks!
// -------------------------------------------------

?>