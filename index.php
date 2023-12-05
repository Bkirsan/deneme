<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Örnek Web Sitesi</title>
</head>
<body>
    <h1>Hoş Geldiniz!</h1>
    
    <?php
    // Form gönderildi mi kontrolü
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Formdan gelen ad ve e-posta
        $name = $_POST["name"];
        $email = $_POST["email"];

        // Bilgileri dosyaya kaydetme
        $file = fopen("kullanicilar.txt", "a");
        fwrite($file, "Ad: $name - E-posta: $email\n");
        fclose($file);

        echo "<p>Teşekkür ederiz, bilgileriniz kaydedildi!</p>";
    }
    ?>

    <h2>Bilgilerinizi Paylaşın</h2>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Adınız:</label>
        <input type="text" name="name" required><br>

        <label for="email">E-posta Adresiniz:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Gönder">
    </form>
</body>
</html>
