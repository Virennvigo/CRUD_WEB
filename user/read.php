<?php

include '../koneksi.php';

$query = "SELECT * FROM tb_login";
$result = mysqli_query($koneksi, $query);
$no = 1;
while ($data = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $no++. "</td>";
    echo "<td>" . $data['username'] . "</td>";
    echo "<td>" . $data['password'] . "</td>";
    echo "<td>
        <button data-id=" . $data['user_id'] . " class='btn btn-warning btn-sm editBtn'>Edit</button>
        <button data-id=" . $data['user_id'] . " class='btn btn-danger btn-sm deleteBtn'>Delete</button>
      </td>";
    echo "</tr>";
}