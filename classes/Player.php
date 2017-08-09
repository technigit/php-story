<?

Class Player
{
    public $name;

    private $health_min;
    private $health_max;

    private $strength_min;
    private $strength_max;

    private $defense_min;
    private $defense_max;

    private $speed_min;
    private $speed_max;

    private $luck_min;
    private $luck_max;

    private $health_last = 0;
    private $strength_last = 0;
    private $defense_last = 0;
    private $speed_last = 0;
    private $luck_last = 0;

    public function stat_changes()
    {
        $stat_changes = array();
        if ($this->health != $this->health_last) {
            $change = new StdClass();
            $change->type = "Health";
            $change->value = $this->health;
            array_push($stat_changes, $change);
        }
        if ($this->strength != $this->strength_last) {
            $change = new StdClass();
            $change->type = "Strength";
            $change->value = $this->strength;
            array_push($stat_changes, $change);
        }
        if ($this->defense != $this->defense_last) {
            $change = new StdClass();
            $change->type = "Defense";
            $change->value = $this->defense;
            array_push($stat_changes, $change);
        }
        if ($this->speed != $this->speed_last) {
            $change = new StdClass();
            $change->type = "Speed";
            $change->value = $this->speed;
            array_push($stat_changes, $change);
        }
        if ($this->luck != $this->luck_last) {
            $change = new StdClass();
            $change->type = "Luck";
            $change->value = $this->luck;
            array_push($stat_changes, $change);
        }
        return $stat_changes;
    }

    public function save_stats()
    {
        $this->health_last = $this->health;
        $this->strength_last = $this->strength;
        $this->defense_last = $this->defense;
        $this->speed_last = $this->speed;
        $this->luck_last = $this->luck;
    }
}
