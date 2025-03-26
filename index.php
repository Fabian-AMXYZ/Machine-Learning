<?php
session_start();

if (!isset($_SESSION['reviews'])) {
    $_SESSION['reviews'] = [];
}

// Handle review submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review'])) {
    $_SESSION['reviews'][] = htmlspecialchars($_POST['review']);
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to prevent resubmission
    exit();
}

// Handle clearing reviews
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
    $_SESSION['reviews'] = []; // Clear session reviews
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to refresh
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Review Clone</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #000; color: white; text-align: center; }
        .container { max-width: 500px; margin: 50px auto; background: #121212; padding: 20px; border-radius: 8px; }
        textarea { width: 95%; padding: 10px; margin-top: 10px; resize: none; }
        button { width: 100%; padding: 10px; margin-top: 10px; }
        .review-box { background: #1db954; padding: 10px; border-radius: 5px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Spotify Review Clone</h1>
        <form method="POST">
            <textarea name="review" placeholder="Write your review" required></textarea>
            <button type="submit">Submit Review</button>
        </form>
        <form method="POST">
            <button type="submit" name="clear">Clear Reviews</button>
        </form>
        <button onclick="showResults()">Show Result</button>
        <div class="reviews">
            <?php foreach ($_SESSION['reviews'] as $review): ?>
                <div class="review-box"> <?= $review ?> </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        function showResults() {

        }
    </script>
</body>
</html>