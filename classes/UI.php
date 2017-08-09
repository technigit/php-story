<?php

class UI
{
    private $html_mode;

    public function __construct()
    {
        $cli = (substr(php_sapi_name(), 0, 3) == 'cli');
        if ($cli) {
            $this->html_mode = false;
        } else {
            $this->html_mode = true;
        }
    }

    public function display($content)
    {
        if (is_array($content)) { // multiple lines
            foreach ($content as $line) {
                $this->displayLine($line);
            }
        } else { // single line
            $this->displayLine($content);
        }
    }

    public function displayLine($line) {
        if (($line == "") && $this->html_mode) {
            echo "<br>";
        } else {
            if ($this->html_mode) {
                echo "<pre>";
            }
            echo $line;
            if ($this->html_mode) {
                echo "</pre>";
            }
        }
        echo "\n";
    }

    public function displayBlank()
    {
        $this->display("");
    }

    public function open() {
        if ($this->html_mode) {
            include('includes/header.html');
        }
    }

    public function close() {
        if ($this->html_mode) {
            include('includes/footer.html');
        }
    }
}
