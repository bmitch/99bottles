<?php


class Bottles
{
    public function verse($numberOfBottles)
    {
        $this->init($numberOfBottles);

        $firstLine = $this->getFirstLine();
        $this->takeOneDown();
        $secondLine = $this->getSecondLine();

        return $firstLine . "\n" . $secondLine;
    }

    public function verses($startingBottles, $endingBottles)
    {
        $song = '';
        for ($index=$startingBottles; $index >= $endingBottles; $index--) { 
            $song .= $this->verse($index) . "\n\n";
        }
        return rtrim($song, "\n\n");
    }

    public function song()
    {
        return $this->verses(99, 0);
    }

    protected function init($numberOfBottles)
    {
        $this->numberOfBottles = $numberOfBottles;
        $this->nextNumberOfBottles = $numberOfBottles - 1;
        $this->object = "bottles";
        if ($this->numberOfBottles == 1) {
            $this->object = 'bottle';
        }
    }

    protected function getFirstLine()
    {
        if ($this->numberOfBottles == 0) {
        return "No more {$this->object} of beer on the wall, no more {$this->object} of beer.";
        }
        return "{$this->numberOfBottles} {$this->object} of beer on the wall, {$this->numberOfBottles} {$this->object} of beer.";
    }

    protected function takeOneDown()
    {
        $this->numberOfBottles--;
        if ($this->numberOfBottles == 1) {
            $this->object = 'bottle';
        }
    }

    protected function getSecondLine()
    {
        if ($this->numberOfBottles >= 1) {
            return "Take one down and pass it around, {$this->numberOfBottles} {$this->object} of beer on the wall.";
        }

        if ($this->numberOfBottles == -1) {
            return "Go to the store and buy some more, 99 bottles of beer on the wall.";
        }
        return "Take it down and pass it around, no more bottles of beer on the wall.";
    }
}
