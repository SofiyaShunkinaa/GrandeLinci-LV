<?php

try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
    $q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
    $kit_id = $_POST['kit_id'];

    $query = "INSERT INTO `booking_request` (`user_name`, `email`, `phone_number`, `id_kitten`, `question1`, `question2`, `question3`, `question4`) VALUES ('$name', '$email', '$phone', $kit_id, '$q1', '$q2', '$q3', '$q4')";
    $result = $db->run($query);

    if ($result) {
        $response = [
            "status" => true,
            "mes" => "cool"
        ];
    } else {
        $response = [
            "status" => false,
            "mes" => "not cool",
            "error" => $db->lastErrorMsg()  // Добавляем сообщение об ошибке SQLite (если используется SQLite)
        ];
    }

    echo json_encode($response);

} catch (Exception $e) {
    $response = [
        "status" => false,
        "mes" => "Exception: " . $e->getMessage()
    ];

    echo json_encode($response);
}
?>
