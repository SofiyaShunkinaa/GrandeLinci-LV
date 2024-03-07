<?php

//$db->add_mainmenu_item("testing", "#", 27, '', "тест-2", 'test2', 'test2', $_SESSION['NowLang']);

//$db->add_cat('test_adding', '2024-02-02', 1, 1, 1, '/assets/cats/cat1.png', "тестирование", "..", "..", "..", "test adding", "..", "..", "..", "test adding", "..", "..", "..", $_SESSION['NowLang']);

//$db->add_kitten("test", 500, 1, 1, 1, 1, 1, 1, "/assets/images/kittens/kit.png", "тестовый", '..', "..", "testing", "..", "..", "testing", "..", "..", $_SESSION['NowLang']);

include("lang/lang_ru.php");
$Lang['Form']['errors']['name'] = "Неверное имя";
$Lang['Form']['errors']['name'] = "Неверный email";
$Lang['Form']['errors']['name'] = "Неверный номер телефона";
$Lang['Form']['errors']['name'] = "Пустое поле о других животных";
$Lang['Form']['errors']['name'] = "Пустое поле о питании";
$serializedArray = serialize($Lang);
file_put_contents('lang/lang_ru.txt', $serializedArray);

include("lang/lang_en.php");
$Lang['Form']['errors']['name'] = "Incorrect name";
$Lang['Form']['errors']['name'] = "Incorrect email";
$Lang['Form']['errors']['name'] = "Incorrct phone";
$Lang['Form']['errors']['name'] = "Empty field about other pets";
$Lang['Form']['errors']['name'] = "Empty field about food";
$serializedArray = serialize($Lang);
file_put_contents('lang/lang_en.txt', $serializedArray);

include("lang/lang_lv.php");
$Lang['Form']['errors']['name'] = "Nepareizs vārds";
$Lang['Form']['errors']['email'] = "Nepareizs e-pasts";
$Lang['Form']['errors']['phone'] = "Nepareizs tālrunis";
$Lang['Form']['errors']['other_pets'] = "Tukšs lauks par citiem mājdzīvniekiem";
$Lang['Form']['errors']['food'] = "Tukšs lauks par ēdienu";

$serializedArray = serialize($Lang);
file_put_contents('lang/lang_lv.txt', $serializedArray);

include("lang/lang_ru.php");