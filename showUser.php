<h2>User</h2>
<form action="indexx.php" method="post">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Anrede</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Adresse</th>
            <th>PLZ</th>
            <th>Ort</th>
            <th>Username</th>
            <th>Passwort</th>
            <th>Email</th>
            <th>Update</th>
            <th>Löschen</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $results = $db->getUserList(); //collects all users from the list 
        foreach ($results as $data) { //each result is displayed as $data variable 
            echo "<tr>"; 
            foreach ($data as $item => $value) { 
                if ($item !== "id") { //if the item doesnt each the id, the $value, id numbner is displayed 
                    echo "<td>$value</td>";
                }
                if ($item === "Email") { 
                    $id = $data["id"]; 
                    echo "<td><button type='submit' class='btn btn-primary' name='update' value='$id'>Update</button></td>";
                    echo "<td><button type='submit' class='btn btn-primary' name='delete' value='$id'>Löschen</button></td>";
                }
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</form>
