<?php

include_once('classes/UI.php');
include_once('classes/Game.php');
include_once('classes/Narration.php');
include_once('classes/Player.php');
include_once('classes/Orderus.php');
include_once('classes/Beast.php');

$ui = new UI();
$ui->open();

$narration = new Narration();

$game = new Game($ui, $narration);

$ui->display($narration->start());
$game->displayStats();
$ui->displayBlank();

while ($game->is_running) {
    $ui->display($narration->round());
    $ui->displayBlank();

    $game->playRound();
    $game->displayStats();
    $ui->displayBlank();
}

if ($game->winner->is_orderus) {
    $ui->display($narration->won());
} else if ($game->winner->is_beast) {
    $ui->display($narration->lost());
} else {
    $ui->display($narration->draw());
}

$ui->close();
