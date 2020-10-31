<?php
include 'config.php';
include 'header.php';
if(isset($_GET['topic']))
{
    $topic=$_GET['topic'];
}
if(isset($_POST['submit']))
{
   /*echo "<pre>";
    print_r ($_POST);
    echo "</pre>";*/
    if(isset($_POST['ques'])&&isset($_POST['op1'])&&isset($_POST['op2'])&&isset($_POST['op3'])&&isset($_POST['op4'])&&isset($_POST['ans']))
    {
        $ques=$_POST['ques'];
        $op1=$_POST['op1'];
        $op2=$_POST['op2'];
        $op3=$_POST['op3'];
        $op4=$_POST['op4'];
        $ans=$_POST['ans'];
        for($i=0;$i<10;$i++)
        {
            $sql="INSERT INTO `questions`(`ques`, `sub`) VALUES ('$ques[$i]','$topic')";
            $res=$conn->query($sql);
            $qid=$conn -> insert_id;
            $sql="INSERT INTO `options`(`opts`, `ques_id`) VALUES ('$op1[$i]','$qid')";
            $res=$conn->query($sql);
            $sql="INSERT INTO `options`(`opts`, `ques_id`) VALUES ('$op2[$i]','$qid')";
            $res=$conn->query($sql);
            $sql="INSERT INTO `options`(`opts`, `ques_id`) VALUES ('$op3[$i]','$qid')";
            $res=$conn->query($sql);
            $sql="INSERT INTO `options`(`opts`, `ques_id`) VALUES ('$op4[$i]','$qid')";
            $res=$conn->query($sql);
            $aql="SELECT o_id FROM options WHERE ques_id='$qid' AND opts='$ans[$i]'";
            $res=$conn->query($aql);
            $row=$res->fetch_assoc();
            $aid=$row['o_id'];
            $sql="UPDATE `questions` SET `ans`='$aid' WHERE q_id='$qid'";
            $res=$conn->query($sql);
        }
    }
}
?>
<div class="container">
    <div>
        <form method="post" action="addques.php?topic=<?php echo $topic;?>">
            <?php 
            for($i=0;$i<10;$i++)
            {  ?>
            <div class="quesdiv">
                <textarea  name="ques[]" cols="79" rows="3" placeholder="Enter Question <?php echo $i+1;?>"></textarea>
                <input type="text" name="op1[]" placeholder="option 1" size="50" required>
                <input type="text" name="op2[]" placeholder="option 2" size="50" required>
                <input type="text" name="op3[]" placeholder="option 3" size="50" required>
                <input type="text" name="op4[]" placeholder="option 4" size="50" required>
                <input type="text" name="ans[]" placeholder="Enter Answer" size="50" required>
            </div>
            <?php 
            }  ?>
            <input type="submit" value="ADD" name="submit" class="btn">
        </form>
    </div>
</div>
</body>
</html>