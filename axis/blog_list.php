<?php
require("head.php");
require("../core/config.php");
?>

    <title>blog</title>
</head>
<body>

<?php
require("nav.php");
?>

<div class="container">

<?php
$sql="select * from post";
$stmt=$dbh->query($sql);
$result=$stmt->fetchAll(PDO::FETCH_BOTH);

foreach($result as $row):
$code=str_pad($row['code'],'7','0',STR_PAD_LEFT);

?>

<div class="border-bottom pb-3">
<div class="row">
<div class="col-md-8">
<div><?=$row['title']?></div>
<small><?=$row['date']?></small>
</div>
<div class="col-md-4">
<a class="btn btn-primary" href="blog_form.php?code=<?=$code?>">編集</a>
</div>
</div>
</div>

<?php
endforeach;
?>

</div>

<?php
require("foot.php");
?>