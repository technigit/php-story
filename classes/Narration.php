<?php

class Narration
{
    public function pick_narration($narrations)
    {
        if (count($narrations) == 1) {
            return $narrations[0];
        } else if (count($narrations) > 1) {
            return $narrations[rand(0, count($narrations) - 1)];
        } else {
            return "ERROR";
        }
    }

    public function start()
    {
        return $this->pick_narration($this->start_narrations);
    }

    public function round()
    {
        if (!$this->round_narrated) {
            $this->round_narrated = true;
            return $this->pick_narration($this->round_narration_start);
        }
        return $this->pick_narration($this->round_narrations);
    }

    public function won()
    {
        return $this->pick_narration($this->won_narrations);
    }

    public function lost()
    {
        return $this->pick_narration($this->lost_narrations);
    }

    public function draw()
    {
        return $this->pick_narration($this->draw_narrations);
    }

    // gameplay utterances are inscribed below.

    private $start_narrations = array(
        "Our great hero, Orderus, enters into battle with a wild beast....",
        [
         "Once upon a time, there was a great hero named Orderus.",
         "After more than a hundred years of battles with all kinds of monsters,",
         "he encountered a wild beast while walking the evergreen forests of Emagia.",
        ],
    );

    private $round_narrated = false;
    private $round_narration_start = array(
        "Orderus is encountered by a wild beast!",
        [
         "As Orderus stands in uffish thought, the Jabberwocky--",
         "Oh, wait; it's just a generic wild beast.",
         "Anyway, the wild beast, with eyes of flame,",
         "comes whiffling through the tulgey wood,",
         "and burbles as it comes!",
        ],
    );
    private $round_narrations = array(
        "Another skirmish ensues.",
        "They go at it again.",
        "Once again, they fight!",
        "The battle continues.",
        "They clash...",
    );

    private $won_narrations = array(
        "The game hath ended, but it is not the end, for Orderus hath once again emerged as victor.",
        "Huzzah!  Orderus has vanquished the foe yet again!",
        "And once again, the battle is done, and Orderus lives to face the next glorious battle.",
        "And the winner is...Orderus!  But, of course.",
        "Orderus won; the wild beast is toast.",
    );

    private $lost_narrations = array(
        "Alas, Orderus is no more, for he has finally met his tragic demise.  The game is thus over.",
        "'Tis a sad day.  Orderus was no match for this particular wild beat--or perhaps he was tired.",
        "Against all expectations, Orderus is in fact done for.",
        "Orderus lost, but the wild beast is at least reasonably battered.",
        "Orderus, by the treacherous paw of the wild beast, has been rendered out of order.",
    );

    private $draw_narrations = array(
        "'Tis strange, but the battle appeareth to be a draw.",
    );
}
