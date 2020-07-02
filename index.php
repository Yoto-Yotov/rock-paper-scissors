<?php
set_include_path ( "./classes" );
spl_autoload_register();

$game = new Game();

$game->play_rounds(1);

// Uncomment to see hands and what hand do they win against
// print_r($game->get_hands());
// echo "<br>";
// print_r($game->get_hands_wins());
// echo "<br>";

$game->add_hand("water", array("paper"));

// Uncomment to see hands and what hand do they win against
// print_r($game->get_hands());
// echo "<br>";
// print_r($game->get_hands_wins());
// echo "<br>";

$game->play();
?>