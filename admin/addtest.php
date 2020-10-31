<?php
include 'config.php';
include 'header.php';

$msg='';
if(isset($_POST['submit']))
{
    $topic=$_POST['topic'];
    $sql="SELECT * FROM tests WHERE topic='$topic'";
    $res=$conn->query($sql);
    if($res->num_rows>0)
    {
        $msg="Topic already present";
    }
    else
    {
        $sql="INSERT INTO `tests`(`topic`) VALUES ('$topic')";
        $res=$conn->query($sql);
        $msg="Test Created";
    }
}
?>
    <div class="content">
        <form method="post">
            Topic Name:
            <input type="text" name="topic" >   
            <input type="submit" name="submit" value="Add" >   
        </form>
        <div class='msg'><?php echo $msg;?> </div>
        <div>
            <a href="addques.php?topic=<?php echo $topic;?>" class="btn">Add Questions </a>
        </div>
    </div>
</div>

</body>
</html>