<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='about_breed' LIMIT 1";
$db->run($query);
$db->row();

// COMPONENT VARIABLES
$id = $db->data['page_id'];
$alias = $db->data['page_alias'];

// IF PAGE NOT EXISTS
if (!$id) {
    header("HTTP/1.1 404 Not Found");
    $component = "ОШИБКА 404! Данной страницы не существует";
}
$db->stop();
?>

<div class="container">

    <div class="section section-preview">
        <?php echo title($Lang['Pages'][$alias]['content']['title']);
        $list = "<ul>";
        foreach ($Lang['Pages'][$alias]['content']['list'] as $item){
            $list .= "<li><a href='#{$item['href']}'>{$item['name']}</a></li>";
        }
        echo $list."</ul>";


        $img = "<div class='images-container'>";
        foreach ($Photos[$alias] as $image) {
            $img .= "<img src='{$image}.png'>";
        }
        echo $img."</div>";

        ?>

    </div>


        <?php
            $div = "";
            $order = 0;
            foreach ($Lang['Pages'][$alias]['content']['articles'] as $article) {
                $div .= "<div class='section section-article'>";
                if($order % 2 == 0){
                    $div .= title_h3($article['title'], $article['href'])."<div class='article-container'><div class='col-6'><p>{$article['content']}</p></div>";
                    $div .= "<div class='col-6'><img src='{$article['img_path']}' alt='cat'></div></div></div>";
                }
                else{
                    $div .= title_h3($article['title'], $article['href'])."<div class='article-container'><div class='col-6'><img src='{$article['img_path']}' alt='cat'></div>";
                    $div .= "<div class='col-6'><p>{$article['content']}</p></div></div></div>";
                }
                $order++;
            }
            echo $div;
        ?>


</div>

<div class="bg-1"><img src="/assets/images/bg-right-1.png"></div>
<div class="bg-2"><img src="/assets/images/bg-left.png"></div>
<div class="bg-3"><img src="/assets/images/trace-bg-3.png"></div>
<div class="bg-4"><img src="/assets/images/trace-bg-2.png"></div>
<div class="bg-6"><img src="/assets/images/trace-bg-2.png"></div>
<div class="bg-8"><img src="/assets/images/trace-bg-2.png"></div>
<div class="bg-5"><img src="/assets/images/trace-bg-1.png"></div>
<div class="bg-7"><img src="/assets/images/trace-bg-1.png"></div>


