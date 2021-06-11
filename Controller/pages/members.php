<?php

require_once(__DIR__ . '/../getMembers.php');

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);

if (empty($page) || $page < 1) {
    $page = 1;
}

$twigRenderTemplate = $twig->load('template.html');

// Paramètres des variables

$queryNbRows = $dbh->query("SELECT COUNT(*) FROM player");
$nbRows = $queryNbRows->fetch()[0];

$printLimitFrom = 20*$page-20;
$printLimitTo = 20*$page;
$index = $printLimitFrom + 1;

$queryDatasPlayers = $dbh->query("SELECT username, createdAccount, isAdmin, lastActivity
    FROM player ORDER BY lastActivity
    DESC LIMIT $printLimitFrom, $printLimitTo");

// Paramètres du template

$template = [
    'title' => 'Membres',
    'metaScript' => [],
    'metaLink' => [
        0 => [
            'members.css'
        ]
    ],
    'printLimitFrom' => $printLimitFrom,
    'printLimitTo'   => $printLimitTo,
    'index'          => $index,
    'nbRows'         => $nbRows,
    'members'        => request($twig, $index, $queryDatasPlayers)
];

// Paramètre barre de navigation

$navbar = [
    'path' => '/members',
    'session' => $_SESSION,
    'isConnected' => $isConnected
];

// Affichage du rendu

echo $twigRenderTemplate->render([
    'pagePath' => 'members.html',
    'template' => $template,
    'navbar' => $navbar
]);
