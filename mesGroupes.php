
        <table class="groupe-projet-affiche">
            <tr>
                <th> Groupes du projet : <?php echo $row['nom'] ;?> </th> 
                
                <?php
                if ($_SESSION['id']== projet_responsable($_GET['id']))
                {
                    echo '<th>'.'<a href="creerGroupe.php?id='.$_GET['id'].'"><input type="button" value="Ajouter un groupe"></a>'.'</th>';
                }
                
                ?>
              
            </tr> 
           
        <?php
       
            $res = search_all_group_per_projet($_GET['id']);
        
        while ($row = $res->fetch_assoc()) {
            ?>
            
            <?php
            echo '<tr>';
                echo '<td>'.'Sujet :'.'</td>';
                echo '<td>'.'<a href="groupeAfficheInfos.php?id='.$row['id_groupe'].'">'.$row['sujet'].'</td>'; 
                echo '<td>';
                if($row['id_responsable']==$_SESSION['id'])
                {
                    echo '<a href="groupeSupprime.php?id='.$row['id_groupe'].'&projet_id='.$_GET['id'].'"><input type="button" value="Supprimer le groupe"></a>';
                }
                echo '</td>';
                echo '<td>'.'<a href="formulaireRejoindreGroupe.php?id='.$row['id_groupe'].'&projet_id='.$_GET['id'].'"><input type="button" value="Rejoindre ce groupe"></a>'.'</td>';
            echo '</tr>';
                
            }
            
        ?>
        </table>     