function shuffle_cards(players) {
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