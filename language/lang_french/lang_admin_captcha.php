<?php
/***************************************************************************
 *							lang_admin_captcha.php (french)
 *                         ------------------------
 *   copyright            : (C) 2006 AmigaLink
 *   website              : www.amigalink.de
 *
 ***************************************************************************/ 

$lang['VC_Captcha_Config'] = 'Configuration CAPTCHA';
$lang['captcha_config_explain'] = 'Ici vous pouvez définir l\'apparence de la photo qui sert au code d\'enregistrement quand la confirmation visuelle est activée.';
$lang['VC_active'] = 'La confirmation visuelle est activée !';
$lang['VC_inactive'] = 'La confirmation visuelle est désactivée !';
$lang['background_configs'] = 'Fond';
$lang['Click_return_captcha_config'] = 'Cliquez %sici%s pour retourner à la configuration CAPTCHA';

$lang['example_code'] = 'Exemple de code';
$lang['example_code_explain'] = 'Jusqu\'à 10 caractères qui seront affichés ici dans le panneau d\'administration en tant que code<br />CAPTCHA en utilise de 4 à 6';
$lang['CAPTCHA_width'] = 'Largeur CAPTCHA';
$lang['CAPTCHA_height'] = 'Hauteur CAPTCHA';
$lang['background_color'] = 'Couleur de fond';
$lang['background_color_explain'] = 'Valeur hexadécimale (exemple : #0000FF pour bleu)';
$lang['pre_letters'] = 'Nombre de lettres ombrées';
$lang['pre_letters_explain'] = '';
$lang['great_pre_letters'] = 'Augmenter l\'ombrage de la lettre';
$lang['great_pre_letters_explain'] = '';
$lang['Random'] = 'Aléatoire';
$lang['random_font_per_letter'] = 'Police aléatoire par lettre';
$lang['random_font_per_letter_explain'] = 'Chaque lettre utilise une police aléatoire.';
$lang['trans_letters'] = 'Représentation de la transparence du caractère';
$lang['trans_letters_explain'] = 'Cette option n\'a d\'effet que si une image de fond est utilisée.';

$lang['back_image'] = 'Image de fond';
$lang['back_image_explain'] = 'Image utilisée en tant que fond. Formats supportés: %s';
$lang['bg_transition'] = 'Transparence';
$lang['bg_transition_explain'] = 'Indication en pourcentage de la trasparence de l\'image de fond, si une est utilisée';
$lang['back_chess'] = 'Echantillon d\'échiquier';
$lang['back_chess_explain'] = 'Remplir le fond complet avec 16 rectangles';
$lang['back_ellipses'] = 'Ellipses';
$lang['back_arcs'] = 'Lignes courbes';
$lang['back_lines'] = 'Lignes';

$lang['foreground_lattice'] = 'Grille du premier plan';
$lang['foreground_lattice_explain'] = '(largeur x hauteur)<br />Génère une grille blanche sur la CAPTCHA';
$lang['foreground_lattice_color'] = 'Couleur de la grille';
$lang['foreground_lattice_color_explain'] = $lang['background_color_explain'];
$lang['gammacorrect'] = 'Correction du contraste';
$lang['gammacorrect_explain'] = '(0 = off)<br />Attention : le changement de la valeur a un effet direct sur la lisibilité de la CAPTCHA!';
$lang['generate_jpeg'] = 'Type d\'image';
$lang['generate_jpeg_explain'] = 'Le format JPEG a une compression plus importante que le PNG et a, par sa haute qualité (max 95%), une influence directe sur la lisibilité du CAPTCHA.';
$lang['generate_jpeg_quality'] = 'Qualité';

$lang['no_one'] = 'aucune.';

?>
