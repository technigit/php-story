<?php

class Game
{
    private $turns = 20; // prevent endless battles

    public $is_running = true;
    private $first_attack = true;
    private $orderus_attacks;

    public function __construct($ui, $narration)
    {
        $this->ui = $ui;
        $this->narration = $narration;
        $this->winner = new stdClass();
        $this->winner->is_orderus = false;
        $this->winner->is_beast = false;
        $this->orderus = new Orderus();
        $this->beast = new Beast();
    }

    public function display_stats()
    {
        $this->display_individual_stats($this->orderus);
        $this->display_individual_stats($this->beast);
    }

    private function display_individual_stats($player)
    {
        $changes = $player->stat_changes();
        if (count($changes) > 0) {
            $this->ui->display("| $player->name:");
            foreach ($changes as $change) {
                $this->ui->display("|   " . $change->type . ": " . $change->value);
            }
        }
        $player->save_stats();
    }

    public function play_round()
    {
        if ($this->first_attack) {
            if ($this->orderus->speed() > $this->beast->speed()) {
                $this->ui->display($this->narration->orderus_first_attack_speed());
                $this->orderus_attacks = true;
            } else if ($this->orderus->speed() < $this->beast->speed()) {
                $this->ui->display($this->narration->beast_first_attack_speed());
                $this->orderus_attacks = false;
            } else if ($this->orderus->luck() > $this->beast->luck()) {
                $this->ui->display($this->narration->orderus_first_attack_luck());
                $this->orderus_attacks = true;
            } else {
                $this->ui->display($this->narration->beast_first_attack_luck());
                $this->orderus_attacks = false;
            }
            $this->first_attack = false;
            $this->ui->display_blank();
        }

        if ($this->orderus_attacks) {
            $attacks = $this->orderus->rapid_strike();
            if ($attacks > 1) {
                $this->ui->display($this->narration->orderus_rapid_strike());
                $this->ui->display_blank();
            }
            while ($attacks > 0) {
                $this->ui->display($this->narration->orderus_attacks());
                if ($this->orderus->attack($this->beast)) {
                    $this->ui->display($this->narration->orderus_hits());
                } else {
                    $this->ui->display($this->narration->orderus_misses());
                }
                $attacks--;
                if ($attacks > 0) {
                    $this->display_stats();
                    $this->ui->display_blank();
                }
            }
        } else {
            $this->ui->display($this->narration->beast_attacks());
            $damage_divider = $this->orderus->magic_shield();
            if ($damage_divider > 1) {
                $this->ui->display_blank();
                $this->ui->display($this->narration->orderus_magic_shield());
                $this->ui->display_blank();
            }
            if ($this->beast->attack($this->orderus, $damage_divider)) {
                $this->ui->display($this->narration->beast_hits());
            } else {
                $this->ui->display($this->narration->beast_misses());
            }
        }
        $this->orderus_attacks = !$this->orderus_attacks;

        // prevent endless battles
        $this->turns--;
        $this->is_running = ($this->turns > 0);

        if (($this->orderus->health() <= 0) || ($this->beast->health() <= 0)) {
            $this->is_running = false;
        }

        if ($this->orderus->health() <= 0) {
            $this->winner->is_beast = true;
        }

        if ($this->beast->health() <= 0) {
            $this->winner->is_orderus = true;
        }
    }
}
