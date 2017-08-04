<?php

class UI
{
    public function display($content)
    {
        if (is_array($content)) { // multiple lines
            foreach ($content as $line) {
                echo "$line\n";
            }
        } else { // single line
            echo "$content\n";
        }
    }
}
