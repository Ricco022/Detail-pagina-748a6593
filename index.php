<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Netland!</title>
</head>
<body>

    <h1>Welkom op het netland beheerderspaneel</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "HywtGBNiwu823@";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=netland", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $sql = 'SELECT *
            FROM series
            ORDER BY id';

    $q = $conn->query($sql);

    $q->setFetchMode(PDO::FETCH_ASSOC);
    ?>

    <h2>Series</h2>

    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
            <th>Titel</th>
            <th>Rating</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($r = $q->fetch()): ?>
        <tr>
            <td><?php echo $r['title']; ?></td>
            <td><?php echo $r['rating']; ?></td>
            <?php endwhile; ?>
        </tbody>
    </table>


<?php
    $sql = 'SELECT *
    FROM films
    ORDER BY id';

    $q = $conn->query($sql);

    $q->setFetchMode(PDO::FETCH_ASSOC);
    ?>

    <h2>Films</h2>

    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
            <th>Titel</th>
            <th>Duur</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($r = $q->fetch()): ?>
            <tr>
                <td><?php echo $r['title']; ?></td>
                <td><?php echo $r['duration']; ?></td>
        <?php endwhile; ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>
