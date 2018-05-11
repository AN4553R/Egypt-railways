<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <div style="float: left;margin-top: 0.8%;">
        <div class="menue"></div>
        <div class="menue"></div>
        <div class="menue"></div>
    </div>
    <h3 style="margin-left: 5%;">Egypt Trinas - قطارات مصر</h3>
</div>
<?php
include_once('dbclass.php');

if(isset($_GET['submit']))
{
    echo "<h2 class='header' style='text-align: center'>"."من ".$_GET['From']." ";
    echo "لـ ".$_GET['To'];
    echo " يوجد ";
    $from=$_GET['From'];
    $to=$_GET['To'];
    $from_id=$db->getRow("select * from stations where name='$from'");

    $to_id=$db->getRow("select * from stations where name='$to'");

    $FID=$from_id['id'];
    $TID=$to_id['id'];
    $rows=$db->getRows("select * from stops where start_id <= $FID AND $TID <= end_id");
    if(!$rows)
        die("Lack of Data, insert more in the 'stops' table");
    $sum=0;
    foreach ($rows as $row)
    {
        $sum++;
    }
    echo $sum." قطار "."<br>";
    echo "</h2>";
}
else
    die("Error in the form");
?>
<br clear="both">
<div class="body" dir="rtl">
    <div class="square" style="margin-top: 20px">

    </div>
<?php
    foreach ($rows as $row)
    {
        echo $row['train_id'].str_repeat('&nbsp;', 20).$row['start_id'].str_repeat('&nbsp;', 20);
        echo $row['end_id'].str_repeat('&nbsp;', 20).$row['stop_time'].str_repeat('&nbsp;', 20);
        echo $row['line']."<br>";

    }
?>
</div>
</body>
</html>
