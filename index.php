<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="index.js"></script>
        <title>Card Shuffling</title>
    </head>
    <body>
        <label for="players">No. of Players</label>
        <input type="number" name="players" id="players" min="1" step="1" 
                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        <button id="shuffle">Shuffle Cards</button>
        <h3>Player Hands</h3>
        <div id="player_hands"></div>
    </body>
</html>