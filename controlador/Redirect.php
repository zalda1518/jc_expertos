<?php
class Redirect {
    public function __construct(string $url) {
        header('Location:'. $url);
        exit();
    }
}
