<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 08/01/2016
 * Time: 10:58
 */

// On fait le lien vers notre classe
require 'class/simple_html_dom.php';

// Chaque page a un numero qu'on enregistre dans $i, avec une boucle for pour r�p�ter l'instruction 74 fois (74 pages)
for ($i = 1; $i < 75; $i++) {

    // On cr�e un DOM avec l'URL de la page en fonction de la valeur de $i
    $html = file_get_html('https://vimeo.com/openclassrooms/videos/page:' . $i);

    // On cherche tous les liens et on les enregistres dans un fichier txt pr�c�d� de la commande wget -c pour t�l�charger et "\n" pour retour � la ligne
    foreach($html->find('a') as $element) {
        $fichier = fopen('fichier.txt', 'a+');

        fputs($fichier, 'wget -c ' . $element->href . "\n");

        fclose($fichier);
    }
}