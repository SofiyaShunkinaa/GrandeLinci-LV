<?php

$db->run("SELECT * FROM kittens");
$kittens = array();
$db->row();
$kittens[] = $db->data;
while ($row = $db->fetch()) {
    $kittens[] = $row;
}

$kittenPhoto = isset($_GET['id']) ? $kittens[$_GET['id']]['img_path'] : $kittens[1]['img_path'];
$kittenId = isset($_GET['id']) ? $_GET['id'] : 1;

?>

<div class="popup-container" id="popup1">
    <div class="form-container container">
    <div class="form-header">
        <div class="form-header--left">
            <?php echo title($Lang['Form']['title'])?>
            <p class="error none"></p>
        </div>
        <div class="form-header--right"><a href="javascript:PopUpHide()"><img src="/assets/images/cross.png"></a></div>
    </div>
    <div class="form-body">
        <form class="kitten-form">
            <div class="form-grid">
                <div>
                    <label><?php echo $Lang['Form']['field']['name'] ?>
                        <input type="text" name="name" required>
                    </label>
                </div>
                <div>
                    <label><?php echo $Lang['Form']['field']['email'] ?>
                        <input type="email" name="email" required>
                    </label>
                </div>
                <div>
                    <label><?php echo $Lang['Form']['field']['phone'] ?>
                        <input type="text" name="phone" required>
                    </label>
                </div>
                <div>
                    <div class="form-kitten-photo" id="catImage" ></div>
                </div>
                <div>
                    <label><?php echo $Lang['Form']['field']['extra_pets'] ?>
                        <input type="text" name="q1" required>
                    </label>
                </div>
                <div>
                    <label><?php echo $Lang['Form']['field']['food'] ?>
                        <input type="text" name="q2" required>
                    </label>
                </div>
                <div>
                    <label><?php echo $Lang['Form']['field']['children'] ?>
                        <input type="text" name="q3">
                    </label>
                </div>
                <div>
                    <label><?php echo $Lang['Form']['field']['your_q'] ?>
                        <input type="text" name="q4">
                    </label>
                </div>
                <div>
                    <label><?php echo $Lang['Form']['field']['chosen_pet'] ?>
                        <?php
                                $data = json_encode($kittens);
                                $opt = "<select id='catSelect' data-kittens='$data'  onchange='getKitId()'>";
                                foreach ($kittens as $kitten){
                                   $opt .= "<option value='{$kitten['id']}'>{$Lang['Kittens'][$kitten['id']]['name']}</option>";
                                }
                                echo $opt;
                            ?>
                        </select>
                    </label>
                </div>
            </div>
            <div class="form-checkboxes">
                <label><input type="checkbox" name="policy" id="policyCheckbox"><?php echo $Lang['Form']['check']['confidence']; ?></label>
            </div>
            <div class="form-buttons">
                <button class="btn btn-white btn-clear btn-md" id="clear-btn"><a><?php echo $Lang['Buttons']['clear']; ?></a></button>
                <button class="btn btn-blue btn-md" id="submit-btn" type="submit"><a><?php echo $Lang['Buttons']['send']; ?></a></button>
            </div>
        </form>
    </div>
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

