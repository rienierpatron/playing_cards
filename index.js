function shuffle_cards(players) {

    if ((players.match(/[a-z]/i)) || (players%1 > 0) || (players < 0)) {
        alert('Player value invalid');
        return false;
    }

    let url = "process_playing_cards.php?players="+players;
    $.get(url, function(response) {
        $('#player_hands').empty();
        let result = JSON.parse(response);
        $.each(result.player_hands, function(key, hand) {
            let hand_list = hand.join(', ');
			$('#player_hands').append(hand_list + "<br/>");
		});
	}).fail(function() {
		alert('Something went wrong. Please try again.');
	});
}


$(document).ready(function() {
    $(document).on('click', '#shuffle', function() {
        shuffle_cards($('#players').val());
    });
});