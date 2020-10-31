<?php
include 'config.php';
include 'header.php';
$sql="SELECT * FROM tests";
$res=$conn->query($sql);


?>
<div class="content">
    <table>
        <th>Test Id</th>
            <th>Topic</th>
            <?php
            while($row = $res->fetch_assoc())
            {?>
                <tr>
                    <td><?php echo $row['test_id'];?></td>
                    <td><?php echo $row['topic'];?></td>
                </tr>
            <?php
            }?>
    </table>
        <a class="btn"href="addtest.php">Create Test</a>
</div>
</div>
    </body>
</html>