<?php

class Game
{
    private $turns = 50; // temporary for initial commit

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
            $this->ui->display($this->narration->orderus_attacks());
            $this->orderus->attack($this->beast);
        } else {
            $this->ui->display($this->narration->beast_attacks());
            $this->beast->attack($this->orderus);
        }
        $this->orderus_attacks = !$this->orderus_attacks;

        // temporary for initial commit
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
