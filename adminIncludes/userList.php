<?php

// require_once '../serverFiles/dbconnect.php';

// Retrieve user data
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if there are any users
if (mysqli_num_rows($result) > 0) {
    // Output user data as a table
    echo '<table class="table">
            <thead>
            <tr>
            <th scope="col">userno</th>
            <th scope="col">firstname</th>
            <th scope="col">email</th>
            </tr>
        </thead>';
    while ($row = mysqli_fetch_assoc($result)) {
    echo '<tbody>';
    echo '<tr>
        <th scope="row">' . $row['userno'] . '</th>
        <td>' . $row['firstname'] . '</td>
        <td>' . $row['email'] . '</td>
        <td scope="row"><a href="adminIncludes/processPromoteUser.php" class="button">Promote User</a></td>
        <td scope="row"><a href="adminIncludes/processSuspension.php" class="button">Suspend User</a></td>
    </tr>';
    }
    echo '<tbody>';
    echo '</table>';
} else {
echo "No users found.";
}

// Close the database connection
mysqli_close($conn);

?>