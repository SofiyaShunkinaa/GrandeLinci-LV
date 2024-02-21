<?php

$db->run("SELECT * FROM kittens");
$kittens = array();
$db->row();
$kittens[] = $db->data;
while ($row = $db->fetch()) {
    $kittens[] = $row;
}

$kittenPhoto = isset($_GET['id']) ? $kittens[$_GET['id']]['img_path'] : $kittens[$_GET['id']]['img_path'];
$kittenId = isset($_GET['id']) ? $_GET['id'] : 1;

?>

<div class="container popup-form-container" id="popup1">
    <div class="form-header">
        <div class="form-header--left">
            <?php echo title($Lang['Form']['title'])?>
        </div>
        <div class="form-header--right"><div class="item-cross"></div><div class="item-cross"></div></div>
    </div>
    <div class="form-body">
        <form action="form.php" method="post">
            <div>
                <label><?php $Lang['Form']['name'] ?>
                    <input type="text" name="quest_name" required>
                </label>
            </div>
            <div>
                <label><?php $Lang['Form']['email'] ?>
                    <input type="email" name="quest_email" required>
                </label>
            </div>
            <div>
                <label><?php $Lang['Form']['phone'] ?>
                    <input type="number" name="quest_photo" required>
                </label>
            </div>
            <div>
                <div class="form-kitten-photo" id="catImage" style="style='background-image: url(<?php echo $kittenPhoto ?>)'"></div>
            </div>
            <div>
                <label><?php $Lang['Form']['extra_pets'] ?>
                    <input type="text" name="q1" required>
                </label>
            </div>
            <div>
                <label><?php $Lang['Form']['food'] ?>
                    <input type="text" name="q2" required>
                </label>
            </div>
            <div>
                <label><?php $Lang['Form']['children'] ?>
                    <input type="text" name="q3">
                </label>
            </div>
            <div>
                <label><?php $Lang['Form']['your_q'] ?>
                    <input type="text" name="q4">
                </label>
            </div>
            <div>
                <label><?php $Lang['Form']['chosen_pet'] ?>
                    <select id="catSelect" onchange="changeImage()">
                        <?php
                            $opt = '';
                            foreach ($kittens as $kitten){
                               $opt .= "<option value='{$kitten['id']}'>{$Lang['Kittens'][$kitten['id']]['name']}</option>";
                            }
                            echo $opt;
                        ?>
                    </select>
                </label>
            </div>
        </form>
    </div>
</div>
<script>
    function changeImage() {
        var catId = document.getElementById('catSelect').value;
        var catImage = document.getElementById('catImage');

        // Находим информацию о выбранном котенке
        var selectedCat = <?php echo json_encode($kittens); ?>.find(cat => cat.id == catId);

        // Устанавливаем путь к изображению выбранного котенка
        catImage.backgroundImage = selectedCat.img_path;
    }
</script>

