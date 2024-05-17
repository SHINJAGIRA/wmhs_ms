<?php

$con= new mysqli('localhost','root','','world_mission');
if(!$con){
    echo 'there is no connection';
}