<?php
$name = $email = $message = $music = '';
$termsAccepted = false;
$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = str_replace(' ', '', trim($_POST['email'] ?? ""));
    $message = trim($_POST['message'] ?? "");
    $music = $_POST['music'] ?? null;
    $termsAccepted = isset($_POST['terms']);

    if (!preg_match("/^[a-zA-ZëËçÇ\s]{6,50}$/", $name)) {
        $errors['name'] = "Emri duhet të përmbajë vetëm shkronja (6-50 karaktere)";
    }

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors['email'] = "Email adresa nuk është valide";
    }

    if (!preg_match("/^[\w\s.,!?()-]{1,500}$/", $message)) {
        $errors['message'] = "Mesazhi përmban karaktere të palejuara ose është më i gjatë se 500 karaktere";
    }

    if (empty($music)) {
        $errors['music'] = "Ju lutemi zgjidhni një zhanër";
    }

    if (!$termsAccepted) {
        $errors['terms'] = "Ju duhet të pranoni kushtet dhe termat";
    }

    if (empty($errors)) {
        $success = true;
        $name = preg_replace_callback(
            '/\b\w/',
            function ($matches) {
                return strtoupper($matches[0]);
            },
            strtolower($name)
        );
    }
}
?>
