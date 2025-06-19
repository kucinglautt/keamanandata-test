<!doctype html>
<html>
<head><title>CSRF Test</title></head>
<body>
    <h1>Form dengan CSRF</h1>
    <form method="post" action="/csrf-submit">
        <?= csrf_field() ?> <!-- Token CSRF dari CI4 -->
        <input type="text" name="nama" placeholder="Nama"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
