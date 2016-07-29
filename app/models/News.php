<?php

class News extends Eloquent{
    protected $table = 'news';
    public $primaryKey = 'id';

    public static function foo() {}
}