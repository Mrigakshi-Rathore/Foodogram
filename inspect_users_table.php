<?php
require_once 'db_connect.php';
try {
    $stmt = $conn->query("DESCRIBE users");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h2>users table columns</h2>\n<table border=1 cellpadding=6 cellspacing=0>\n<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>\n";
    foreach ($rows as $r) {
        echo "<tr>";
        echo "<td>".htmlspecialchars($r['Field'])."</td>";
        echo "<td>".htmlspecialchars($r['Type'])."</td>";
        echo "<td>".htmlspecialchars($r['Null'])."</td>";
        echo "<td>".htmlspecialchars($r['Key'])."</td>";
        echo "<td>".htmlspecialchars($r['Default'])."</td>";
        echo "<td>".htmlspecialchars($r['Extra'])."</td>";
        echo "</tr>\n";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error inspecting users table: " . htmlspecialchars($e->getMessage());
}
?>