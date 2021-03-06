<?php

class Narration
{
    public function pickNarration($narrations)
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
        return $this->pickNarration($this->start_narrations);
    }

    public function round()
    {
        if (!$this->round_narrated) {
            $this->round_narrated = true;
            return $this->pickNarration($this->round_narration_start);
        }
        return $this->pickNarration($this->round_narrations);
    }

    public function orderusFirstAttackSpeed()
    {
        return $this->pickNarration($this->orderus_first_attack_speed_narrations);
    }

    public function orderusFirstAttackLuck()
    {
        return $this->pickNarration($this->orderus_first_attack_luck_narrations);
    }

    public function beastFirstAttackSpeed()
    {
        return $this->pickNarration($this->beast_first_attack_speed_narrations);
    }

    public function beastFirstAttackLuck()
    {
        return $this->pickNarration($this->beast_first_attack_luck_narrations);
    }

    public function orderusRapidStrike()
    {
        return $this->pickNarration($this->orderus_rapid_strike_narrations);
    }

    public function orderusMagicShield()
    {
        return $this->pickNarration($this->orderus_magic_shield_narrations);
    }

    public function orderusAttacks()
    {
        return $this->pickNarration($this->orderus_attacks_narrations);
    }

    public function beastAttacks()
    {
        return $this->pickNarration($this->beast_attacks_narrations);
    }

    public function orderusHits()
    {
        return $this->pickNarration($this->orderus_hits_narrations);
    }

    public function orderusMisses()
    {
        return $this->pickNarration($this->orderus_misses_narrations);
    }

    public function beastHits()
    {
        return $this->pickNarration($this->beast_hits_narrations);
    }

    public function beastMisses()
    {
        return $this->pickNarration($this->beast_misses_narrations);
    }

    public function won()
    {
        return $this->pickNarration($this->won_narrations);
    }

    public function lost()
    {
        return $this->pickNarration($this->lost_narrations);
    }

    public function draw()
    {
        return $this->pickNarration($this->draw_narrations);
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
        "With equal determination, hero and foe glare upon each other.",
        "The two circle each other, slowly stepping side to side, as they watch for an opening.",
        "The battle continues.",
        "They clash...",
    );

    private $orderus_first_attack_speed_narrations = array(
        "Orderus is faster.  He attacks first!"
    );

    private $beast_first_attack_speed_narrations = array(
        "Beast is faster.  It attacks first!"
    );

    private $orderus_first_attack_luck_narrations = array(
        "Orderus is luckier.  He attacks first!"
    );

    private $beast_first_attack_luck_narrations = array(
        "Beast is luckier.  It attacks first!"
    );

    private $orderus_rapid_strike_narrations = array(
        "RAPID STRIKE!"
    );

    private $orderus_magic_shield_narrations = array(
        "Orderus deflects the attack with his MAGIC SHIELD!"
    );

    private $orderus_attacks_narrations = array(
        "Orderus attacks...",
        "One, two!  One, two!  And through and through...",
        "Orderus' vorpal blade goes snicker-snack!",
        "Orderus takes a stance and foins with his sword!",
        "The mighty blade of Orderus swoops at the beast.",
        "With calm determination, Orderus lunges forward...",
        "With a spectacular mid-air flip, Orderus swooshes his blade upon the beast."
    );

    private $orderus_hits_narrations = array(
        "Orderus hits the wild beast!"
    );

    private $orderus_misses_narrations = array(
        "Orderus misses!"
    );

    private $beast_hits_narrations = array(
        "The wild beast hits Orderus!"
    );

    private $beast_misses_narrations = array(
        "The wild beast misses!"
    );

    private $beast_attacks_narrations = array(
        "The wild beast attacks...",
        "The wild beast snarls and leaps forward with gleaming claws.",
        "The wild beast bounds to and fro, before lunging forward with bared teeth.",
        "Growling menacingly, the wild beast stands on its hind feet and raises its paws...",
        "Preparing to prance, the wild beast rears down for the big win.",
        "The wild beast leaps into the air with a wide arc, landing with its sharp claws."
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
