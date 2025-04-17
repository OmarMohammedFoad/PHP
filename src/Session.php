<?php
class Session{
    private $file;
    public function __construct($f) {
        $this->file = $f;
    }

    function count(){
        if (!isset($_SESSION['counted'])) {
            $count = file_get_contents($this->file);
            $count++;
            file_put_contents($this->file, $count);
            $_SESSION['counted'] = true;
        }
        echo "Session count: " . $_SESSION['counted'];
        return $count;
    }
}
