<?php

function title($title)
{
    return "<div class='title-container'><h2>{$title}</h2><div class='title-rect'></div></div>";
}

function create_card($icon_path, $title, $text){
    return "<div class='card-container col-3'><img src='{$icon_path}' alt='icon'><h4>{$title}</h4><p>{$text}</p></div>";
}