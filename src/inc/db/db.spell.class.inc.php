<?php

class Spell
{

    public $_id;
    public $index;
    public $name;
    public $desc;
    public $range;
    public $components;
    public $material;
    public $ritual;
    public $duration;
    public $concentration;
    public $casting_time;
    public $level;
    public $attac_type;
    public $school;
    public $area_of_effect;
    public $prepared;
    public $uid;
    public $cid;


    function __construct()
    {
        
    }
    public function __toString()
    {
        return $this->_id;
    }
}