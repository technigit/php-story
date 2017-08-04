<?php

include_once('classes/UI.php');
include_once('classes/Game.php');
include_once('classes/Narration.php');
include_once('classes/Orderus.php');
include_once('classes/Beast.php');

$ui = new UI();
$narration = new Narration();
$game = new Game($ui);

$ui->display($narration->start());
$game->display_stats();

while ($game->is_running) {
    $ui->display($narration->round());
    $game->play_round();
    $game->display_stats();
}

if ($game->winner->is_orderus) {
    $ui->display($narration->won());
} else if ($game->winner->is_beast) {
    $ui->display($narration->lost());
} else {
    $ui->display($narration->draw());
}
