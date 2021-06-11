<?php

function request($twig, $index, $request)
{
    $return = '';

    while ($data = $request->fetch()) {
        $return .= getTable($twig, $index, $data);
    }
    return $return;
}

function getTable($twig, $index, $data)
{
    
    $twigRenderComponent = $twig->load('members_users.html');
    return $twigRenderComponent->render([
        'data' => $data,
        'index' => $index
    ]);
}
