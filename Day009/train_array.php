<?php
    $list_1D = [
        "RealMadrid",
        "Sevilla",
        "FCBarcelona"
    ];

    $list_1D_assoc = [
        'ESP' => 'LaLiga',
        'FRA' => 'Ligue1',
        'ITA' => 'SerieA',
        'ING' => 'PremierLeague',
        'GER' => 'Bundesliga'
    ];


    $list_2D = [
        ['RealMadrid', 'SevillaFC', 'FCBarcelona'],
        ['AtleticoMadrid', 'RealBetis', 'RealSociedad'],
        ['VillarrealCF', 'AthleticClub', 'ValenciaCF']
    ];


    $list_2D_assoc = [
        ['team' => 'RealMadrid', 'Headcoach' => 'CarloAncelotti', 'ground' => 'SantiagoBernabéu'],
        ['team' => 'Sevilla', 'Headcoach' => 'JulenLopetegui', 'ground' => 'RamónSánchezPizjuán'],
        ['team' => 'FCBarcelona', 'Headcoach' => 'Xavi', 'ground' => 'CampNou']
    ];

    foreach($list_2D_assoc as $i => $row){
        echo $i.$row['team'].'<br>';
    }
    echo '<hr>';

    foreach($list_2D_assoc as $i => $row){
        echo $i.'<br>';
        foreach($row as $key => $value){
            echo "$key, $value <br>";
        }
    }
    echo '<hr>';

    $list_2D_assoc = [];
    $list_2D_assoc['RealMadrid'] = ['Headcoach' => 'CarloAncelotti', 'ground' => 'SantiagoBernabéu'];
    $list_2D_assoc['Sevilla'] = ['Headcoach' => 'JulenLopetegui', 'ground' => 'RamónSánchezPizjuán'];
    $list_2D_assoc['FCBarcelona'] = ['Headcoach' => 'Xavi', 'ground' => 'CampNou'];
    

    // print_r($list_1D);echo '<br>';
    // print_r($list_1D_assoc);echo '<br>';
    // print_r($list_2D);echo '<br>';
    // print_r($list_2D_assoc);echo '<br>';

    foreach($list_1D as $team){
        echo $team . '<br>';
    }

    echo '<br>';

    foreach($list_1D_assoc as $country => $ligue){
        echo "$country => $ligue<br>";
    }

    echo '<br>';
    foreach($list_2D as $teams){
        foreach($teams as $team){
            echo "$team<br>";
        }
    }
    // echo '<br>';
    // $i = 1;
    // foreach($list_2D as $teams){
    //     foreach($teams as $team){
    //         echo "$i $team<br>";
    //         $i++;
    //     }
    // }

    echo '<br>';

    foreach($list_2D_assoc as $teams => $values){
        echo $teams . '<br>';
        foreach($values as $key => $value){
            echo "$key => $value<br>";
        }
    }

    // foreach($list_2D_assoc as $teams => $values){
    //     echo $teams . '<br>';
    //     foreach($values as $key => $value){
    //         echo "$key => $value<br>";
    //     }
    // }
    
