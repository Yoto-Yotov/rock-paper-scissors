<?php
set_include_path ( "./classes" );
spl_autoload_register ();

$game = new Game();


$game->play_rounds(3);

print_r($game->get_hands());
echo "<br>";
print_r($game->get_hands_wins());
echo "<br>";

$game->add_hand("water", array("paper"));

print_r($game->get_hands());
echo "<br>";
print_r($game->get_hands_wins());


$game->play();
?>