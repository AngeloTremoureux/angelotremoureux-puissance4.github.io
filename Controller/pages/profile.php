<?php
if (!$isConnected) {
    require_once(__DIR__ . '/../error.php');
} else {
    $listeAmis = $_SESSION['sess']->getListeAmis($dbh, $_SESSION['playerId']);
    $twigRenderTemplate = $twig->load('template.html');
    
    // Paramètres du template

    $data = [
        'head' => [
            'title' => 'Mon profil',
            'scripts' => null,
            'links' => ['profile.css'],
        ],
        'content' => [
            'uriTemplate' => 'profile.html',
            'friends' => $listeAmis
        ]
    ];

    // Affichage du rendu

    echo $twigRenderTemplate->render([
        'data' => $data
    ]);

    
    // $createdAccount = $_SESSION['sess']->getCreatedAccount($dbh, $_SESSION['playerId']);
    // $path = '/account/me';
    // $title = 'Mon profile - Puissance4';
    // require_once(__DIR__ . '/../../View/v_profile_header.php');
    // require_once(__DIR__ . '/../../View/v_nav.php');
    // require_once(__DIR__ . '/../../View/v_profile.php');
}
