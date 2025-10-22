<?php
class Redirect {
    public function __construct(string $url) {
        return header('Location:'. $url);
    }
}
?>