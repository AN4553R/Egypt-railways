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

<div class="res_head">
    <?php
    include("dbclass.php");
    echo "<p style='margin-left: 5px;text-align: center;font-size: xx-large'>";
    echo "من ".$_GET['From']." لـ ".$_GET['To']." يوجد ";
    $rows=$db->getRows("select * from stops");
    $cnt=0;
    foreach ($rows as $r)$cnt++;
    echo $cnt." قطار ";
    echo "</p>";
    $names="";
    ?>
</div>

</div>

    <div style="margin-left: 5%">
        <?php
        $sentence=array('قطار','قيام','وصول','المدة','السرعة', 'الدرجة', 'يقف في');
        for($i=6;$i>=0;$i--)
            echo "<div class='square'><p style='color: white;font-size: xx-large;text-align: center'>$sentence[$i]</p></div>";
        ?>
    </div>
    <br clear="both">
    <div class="note" dir="rtl">
        <p style="font-size: xx-large;text-align: center;padding-top: 2.5%"><span style="color: red;font-size:xx-large;font-weight: bold">ملاحظة : </span> يمكنك معرفة محطات الوقوف التي ستمر عليها في القطار عن طريق اللمس على الزر</p>
    </div>
    <div style="margin-left: 10%" dir="rtl">
        <?php
            foreach ($rows as $row){
                $id=$row['train_id'];
                echo "<div class='square2'>".$id."</div>";
                $sel=$db->getRow("select * from trains where id = $id");
                $leaving=$sel['leaving'];
                echo "<div class='square2' style='float: right;margin-top: -12.5%;margin-right: 20.4%'>".$leaving."</div>";
                $arrival=$sel['arrival'];
                echo "<div class='square2' style='float: right;margin-top: -12.5%;margin-right: .8%'>".$arrival."</div>";
                $duration=$sel['duration'];
                echo "<div class='square2' style='float: right;margin-top: -12.5%;margin-right: .8%'>".$duration."</div>";
                $velocity=$sel['velocity'];
                echo "<div class='square2' style='float: right;margin-top: -12.5%;margin-right: 1.4%'>".$velocity."</div>";
                $class=$sel['class'];
                echo "<div class='square2' style='float: right;margin-top: -12.5%;margin-right: 1.4%'>".$class."</div>";

                $q=$db->getRow("select * from stops where train_id = $id");
                $start=$q['start_id'];
                $end=$q['end_id'];
                $stops=$db->getRows("select * from stations where id >= $start and id <= $end");
                $send=array();
                $item="";
                foreach ($stops as $push){array_push($send,$push['name']);$item.=$push["name"]."<br>";}
                $item.="*";
                $names.=$item;
                echo "<div class='square2' style='float: left;margin-top: -12.5%;margin-left:-6%'>"."<button id='number' class='btn' onclick='gotem($id)'>".count($send)."</button></div>";
            }
        ?>
    </div>
    <script  type="text/javascript">
        function gotem(x) {
            var str = "<?php echo ($names)?>".split("*");
            var station=str[x/10-1].split("<br>").join("\n");
            if(station.length==0)
                alert("لا يمر هذا القطار بأي من المحطات المرغوبة")
             else alert(station);
        }
    </script>

</body>
</html>
