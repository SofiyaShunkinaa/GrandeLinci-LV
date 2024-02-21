<?php

function title($title)
{
    return "<div class='title-container'><h2>{$title}</h2><div class='title-rect'></div></div>";
}

function title_h3($title, $href)
{
    return "<div class='title-container' id='{$href}'><h3>{$title}</h3><div class='title-rect title-rect-h3'></div></div>";
}

function create_card($icon_path, $title, $text){
    return "<div class='card-container col-3'><img src='{$icon_path}' alt='icon'><h4>{$title}</h4><p>{$text}</p></div>";
}

function create_linkedcard($icon_path, $title, $text, $link){
    return "<div class='card-container col-3'><img src='{$icon_path}' alt='icon'><h4>{$title}</h4><p><a href='{$link}'>{$text}</a></p></div>";
}

function create_pagination($pagesCount, $CurrentPage, $filter){
    $prevPageNum = $CurrentPage<$pagesCount ? $CurrentPage+1 : $CurrentPage;
    $nextPageNum = $CurrentPage>1 ? $CurrentPage-1 : $CurrentPage;
    $pagination = "<div class='pages-pagination'><a class=' btn btn-arrow arrow-left' href='/?option=our_cats&filter={$filter}&page={$nextPageNum}'>&#60</a>";
        for ($pageNum = 1; $pageNum <= $pagesCount; $pageNum++){
            $pagination .= "<a class='btn ";
            if($CurrentPage == $pageNum) {
                $pagination .= "current ";
            }
            $pagination .= "btn-page' href='/?option=our_cats&filter={$filter}&page={$pageNum}'>{$pageNum}</a>";
        }
    return $pagination."<a class='btn btn-arrow arrow-left' href='/?option=our_cats&filter={$filter}&page={$prevPageNum}'>&#62</a></div>";
}