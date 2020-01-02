<?php
   require_once 'config.php';
   global $pdo;
   connect();
   if(isset($_SESSION['logged']) && $_SESSION['active'] != 0) {
	   try {
		   $stmt = $pdo->query('SELECT * FROM events');
		   echo '<table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Typ</th>
                            <th>Data Początkowa</th>
                            <th>Data końcowa</th>
                            <th>Tekst</th>
                            <th>Dodane przez</th>
                            <th>Akcja</th>
                        </tr>
                        </thead>
                        <tbody>';
		   foreach ($stmt as $row) {
			   echo '<tr>
                  <td>' . $row["ID"] . '</td>
                  <td>' . $row["Typ"] . '</td>
                  <td>' . $row["Data_start"] . '</td>
                  <td>' . $row["Data_koniec"] . '</td>
                  <td>' . $row["Tekst"] . '</td>
                  <td>' . $row["User"] . '</td>
                  <td><a href="manager.php?task=edit&id=' . $row['ID'] . '">Edytuj</a>|<a href="manager.php?task=usun&&id=' . $row['ID'] . '">Usuń</a></td>
                  </tr>';
		   }
		   echo '</tbody>
                        </table>';
		   $stmt->closeCursor();
	   } catch (PDOException $e) {
		   echo 'Wystąpił błąd ' . $e->getMessage();
	   }
   }
   else
   {
   	include('users/noAccess.html');
   }


