<?php
        require 'include/_dbconnect.php';

        $sql2 = "SELECT * FROM `employee`";
        $val2 = mysqli_query($conn, $sql2);
        $serial = 0;

        while ($row = mysqli_fetch_assoc($val2)) {
          $serial =  $serial + 1;
          echo     '<tr>
        <th scope="row">' . $serial . '</th>
        <td>' . $row['id'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['salary'] . '</td>
        <td>' . $row['DOJ'] . '</td>
        <td>
        <button class="edits btn btn-outline-primary btn-sm" data-bs-toggle="modal" id="edidtmodalbtn' . $row['id'] . '">Edit</button>
        <button class="delete btn btn-outline-primary btn-sm" data-bs-toggle="modal" id="' . $row['id'] . '">Delete</button>
        </td>
        </tr>';
        }
?>