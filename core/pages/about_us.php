<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='about_us' LIMIT 1";
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

<div class="section section-advantages">
    <div class="container">
        <?php
        echo title($Lang['Pages'][$alias]['content']['title']);

        $cards = "<div class='subsection-advantages'>";
        foreach ($Lang['Pages'][$alias]['content']['adv_cards'] as $card)
            $cards .= create_card($card['icon'], $card['title'], $card['text']);
        echo $cards."</div>";
        ?>
    </div>
</div>

<div class="section section-history">
    <div class="container">
        <div class="history-container">
            <div class="col-6">
                <?php echo title($Lang['Pages'][$alias]['section_info']['title']);?>
                <p><?php echo $Lang['Pages'][$alias]['section_info']['text'] ?></p>
            </div>
            <div class="col-6">
                <img src="<?php echo $Photos[$alias][0] ?>.png" alt="cats">
            </div>
        </div>
    </div>
</div>

<div class="section section-ads">
    <div class="container-fluid">
        <div class="container">
            <div class="ads-container">
                <h4><?php echo $Lang['Pages'][$alias]['ads'] ?></h4>
                <button class="btn">
                    <a href="/?option=available_kittens"></a>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="section section-photos">
    <div class="container">
            <?php
            $img = "<div class='images-container'>";
            foreach ($Photos[$alias]['sec'] as $image){
                $img .= "<img src='{$image}.png'>";
            }
            echo $img;
            ?>
        </div>
    </div>
</div>

<div class="bg"><img src="/assets/images/bg-left.webp"></div>