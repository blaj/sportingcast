<?php
try
{
    require_once './lib/index.php';    // biblioteka frameworka

    _Controller::$config = include './lib/config.php';    // wczytanie konfiguracji aplikacji
    _View::$dir = './lib/view/';    // ustawienie katalogu bazowego dla plikow z szablonami widoku
    _Model::setCredentials(_Controller::$config['_db']);    // konfiguracja bazy danych dla modelu
    unset(_Controller::$config['_db']);    // dla bezpieczenstwa

    if (empty($_GET['c'])) $_GET['c'] = 'Index';    // przypisanie domyslnego kontrolera
    if (empty($_GET['a'])) $_GET['a'] = 'index';    // przypisanie domyslnej akcji

    $controller = 'controller_' . $_GET['c'];
    $controller = new $controller;
    echo $controller->{$_GET['a']}();    // wyswietlenie kodu zrodlowego HTML
}
catch (Exception $e)
{
    echo 'ERROR: [' . $e->getCode() . '] ' . $e->getMessage();    // NIE POKAZUJEMY STOSU WYWOLAN, ABY W MOMENCIE AWARII POLACZENIA, NIE WYSWIETLIC PRZYPADKOWO HASLA DO BAZY DANYCH!
}
?>