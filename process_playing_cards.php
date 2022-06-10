<?php
    function shuffle_cards(){
        $card_num = ['A','2','3','4','5','6','7','8','9','10','J','Q','K'];
        $card_suit = ['H','D','S','C'];
        
        foreach ($card_suit as $suit) {
            foreach ($card_num as $num) {
                $deck[] = $suit . "-" . $num; // setting card value
            }
        }
        shuffle($deck); //shuffle the cards in random order
        return $deck;
    }

    $players = filter_var($_GET['players'], FILTER_SANITIZE_NUMBER_INT); //ensure that value is int
    $on_hand = array();
    $shuffled_cards = shuffle_cards(); //initialize card shuffling

    if ($players > 0) {
        $card_number = 52;
        $excess_cards = $card_number%$players; //getting excess cards
        $per_player = ($card_number-$excess_cards)/$players; //getting exact cards per player
    
        //initial assignment of cards
        for ($index = 0; $index < $players; $index++) {
            $on_hand[$index] = array();
            for ($cardIndex = 0; $cardIndex < $per_player; $cardIndex++) {
                array_push($on_hand[$index], current($shuffled_cards));
                next($shuffled_cards);
            }
        }
    
        //adding excess cards
        for ($index = 0; $index < $players; $index++) {
            if (current($shuffled_cards)) {
                array_push($on_hand[$index], current($shuffled_cards));
                next($shuffled_cards);
            }
        }
    }

    echo json_encode(array('player_hands' => $on_hand));

?>