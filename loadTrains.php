<?php
include_once ('dbclass.php');
$_dbhandler = new PDO(PDO_DSN, USER, PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));

// I will create a table for Trains

$q="
create table if not exists trains(
id int(11) not null auto_increment primary key ,
leaving varchar(20) COLLATE utf8_bin not null,
arrival varchar(20) COLLATE utf8_bin not null,
duration varchar(20) COLLATE utf8_bin not null,
velocity varchar(20) COLLATE utf8_bin not null,
class varchar(20) COLLATE utf8_bin not null
)ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
";
$db->Execute($q);

$q="
insert into trains(id,leaving,arrival,duration,velocity,class) values
 ('',
'12:05 ص',
'05:20 ص',
'05:15',
'105 كم/س',
'نوم مكيف')
,
('',
'12:28 ص',
'05:45 ص',
'05:17',
'120 كم/س',
'اولى وثانية مكيفة')
,
('',
'12:47 ص',
'06:00 ص',
'05:15',
'100 كم/س',
'ركاب')
,
('',
'1:05 ص',
'05:39 ص',
'04:00',
'135 كم/س',
'VIP')
,
('',
'1:05 ص',
'05:39 ص',
'04:00',
'135 كم/س',
'اولى وثانية مكيفة')
,
('',
'1:35 ص',
'06:20 ص',
'05:15',
'105 كم/س',
'مميز')
";
$q=$db->Execute($q);
if(!$q)
    die("Insertion Error in trains");

// Now, I'm gonna create a table for stations

$q="
create table if not exists stations(
id int(11) not null auto_increment primary key,
name varchar(20) COLLATE utf8_bin not null 
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
";
$db->Execute($q);

$q="insert into stations (id,name) values 
(
''
,
'الاسكندرية'
)
,
(
''
,
'الاسماعيلية'
)
,
(
''
,
'اسوان'
)
,
(
''
,
'اسيوط'
)
,
(
''
,
'الاقصر'
)
,
(
''
,
'البحر الاحمر'
)
,
(
''
,
'البحيرة'
)
,
(
''
,
'بني سويف'
)
,
(
''
,
'بورسعيد'
)
,
(
''
,
'جنوب سيناء'
)
,
(
''
,
'الجيزة'
)
,
(
''
,
'الدقهلية'
)
,
(
''
,
'سوهاج'
)
,
(
''
,
'السويس'
)
,
(
''
,
'الشرقية'
)
,
(
''
,
'شمال سيناء'
)
,
(
''
,
'الغربية'
)
,
(
''
,
'الفيوم'
)
,
(
''
,
'القاهرة'
)
,
(
''
,
'القليوبية'
)
,
(
''
,
'قنا'
)
,
(
''
,
'كفر الشيخ'
)
,
(
''
,
'مطروح'
)
,
(
''
,
'المنوفية'
)
,
(
''
,
'المنيا'
)
,
(
''
,
'الوادي الجديد'
)

";
$q=$db->Execute($q);
if(!$q)
    die("Insertion Error in stations");


// Now table stops which contact trains and stations

$q="
create table if not exists stops(
train_id int(11) not null,
start_id int(11) not null ,
end_id int(11) not null,
stop_time int(11)not null,
line int(11) not null
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
";
$db->Execute($q);


$q="
insert into stops (train_id,start_id,end_id,stop_time,line) values
(
'10'
,
'1'
,
'12'
,
'08:16 ص'
,
'1'
)
,
(
'20'
,
'3'
,
'17'
,
'08:45 ص'
,
'1'
)
,
(
'30'
,
'5'
,
'27'
,
'08:45 ص'
,
'1'
)
,
(
'40'
,
'27'
,
'1'
,
'08:16 م'
,
'2'
)
,
(
'50'
,
'26'
,
'1'
,
'10:11 م'
,
'2'
)
";
$q=$db->Execute($q);
if(!$q)
    die("Insertion Error in stops");

?>
