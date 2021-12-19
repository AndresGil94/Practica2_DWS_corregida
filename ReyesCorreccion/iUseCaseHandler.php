<?php

interface iUseCaseHandler {
    
    public static function create($value);
    public static function readBy($value);
    public static function readAll();
    public static function update($int, $value);
    public static function delete($int);
    
}