<?php
require_once 'db.php';

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
    $user_id = $_SESSION['user_id'];
    $profession = trim($_POST['profession'] ?? '');
    $profile_pic = 'default_profile.jpg';

    if (!preg_match("/^[a-zA-Z\x{00C0}-\x{024F}\s]{3,50}$/u", $name)) {
        $errors['name'] = "Emri duhet të përmbajë vetëm shkronja (3-50 karaktere).";
    }

    if (!in_array($rating, ['1', '2', '3', '4', '5'])) {
        $errors['rating'] = "Ju lutemi zgjedhni një vlerësim nga 1 deri në 5.";
    }

    if (!empty($review) && !preg_match("/^[\w\s.,!?()\-]{1,500}$/u", $review)) {
        $errors['review'] = "Komenti përmban karaktere të palejuara ose është shumë i gjatë (maks 500 karaktere).";
    }

    if (!empty($_FILES['profile_pic']['name'])) {
        $target_dir = "uploads/profiles/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        
        $file_extension = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        $check = getimagesize($_FILES['profile_pic']['tmp_name']);
        if ($check !== false && in_array(strtolower($file_extension), ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                $profile_pic = $new_filename;
            }
        }
    }

    $check_stmt = $conn->prepare("SELECT id FROM ratings WHERE user_id = ?");
    $check_stmt->bind_param("i", $user_id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $errors['rating'] = "Ju keni dhënë tashmë një vlerësim.";
    }
    $check_stmt->close();

    if (empty($errors)) {
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

        try {
            $stmt = $conn->prepare("INSERT INTO ratings (user_id, name, rating, review, profession, profile_pic) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isisss", $_SESSION['user_id'], $name, $rating, $review, $profession, $profile_pic);
    
            if ($stmt->execute()) {
                $success = true;
                $name = $review = '';
                $rating = '';
            } else {
                $errors['database'] = "Ndodhi një gabim gjatë ruajtjes së vlerësimit.";
            }
            $stmt->close();
        } catch (Exception $e) {
            $errors['database'] = "Gabim në databazë: " . $e->getMessage();
}
    }
}
?>
