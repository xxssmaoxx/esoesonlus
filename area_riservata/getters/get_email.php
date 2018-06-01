				<?php
$conn = connectDb();
$stmt = $conn->prepare("SELECT mail FROM clown WHERE user=?");
$stmt->bind_param("s", $_SESSION['user']);
$stmt->execute();
$stmt->bind_result($mail);
$stmt->fetch();
echo $mail;
?>