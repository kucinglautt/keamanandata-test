<!doctype html>
<html>
<head><title>XSS Test</title></head>
<body>
    <h1>Hasil Input:</h1>
    <p><?= $q ?></p> <!-- Ini TANPA esc(), jadi rawan XSS -->
</body>
</html>
