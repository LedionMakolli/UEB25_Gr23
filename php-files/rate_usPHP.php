<?php
$name = $review = '';
$rating = '';
$errors = [];
$success = false;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['user_id'])) {
    $name = trim($_POST['name'] ?? '');
    $rating = $_POST['rating'] ?? '';
    $review = trim($_POST['review'] ?? '');

    if (!preg_match("/^[a-zA-Z\x{00C0}-\x{024F}\s]{3,50}$/u", $name)) {
        $errors['name'] = "Emri duhet të përmbajë vetëm shkronja (3-50 karaktere).";
    }

    if (!in_array($rating, ['1', '2', '3', '4', '5'])) {
        $errors['rating'] = "Ju lutemi zgjedhni një vlerësim nga 1 deri në 5.";
    }

    if (!empty($review) && !preg_match("/^[\w\s.,!?()\-]{1,500}$/u", $review)) {
        $errors['review'] = "Komenti përmban karaktere të palejuara ose është shumë i gjatë (maks 500 karaktere).";
    }

    if (empty($errors)) {
        $success = true;

        $words = explode(' ', strtolower($name));
        foreach ($words as &$word) {
            $word = ucfirst($word);
        }
        $name = implode(' ', $words);

        $sentences = preg_split('/(?<=[.!?])\s+/', strtolower($review), -1, PREG_SPLIT_NO_EMPTY);
        foreach ($sentences as &$sentence) {
            $sentence = ucfirst(trim($sentence));
        }
        $review = implode(' ', $sentences);
    }
}
?>
