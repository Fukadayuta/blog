<?php
ini_set('display_errors', "On");
require("head.php");
require("../core/config.php");

if(!empty($_GET['code'])){
$sql="select*from post where code='$_GET[code]'";
$stmt=$dbh->query($sql);
$row=$stmt->fetch(PDO::FETCH_BOTH);

$code=str_pad($row['code'],'7','0',STR_PAD_LEFT);
$title=$row['title'];
$contributor=$row['contributor'];
$article=$row['article'];

}else{
    $code="";
    $title="";
    $contributor="";
    $article="";
}

?>

    <title>blog</title>
</head>
<body>

<?php
require("nav.php");
?>

<div class="container">

<form action="blog_regi.php" method="POST">

<div class="mb-3">
<label for="title" class="form-label">タイトル</label>
<input type="text" name="title" class="form-control" value="<?=$title?>">
</div>

<div class="mb-3">
<label for="title" class="form-label">投稿者</label>
<select name="contributor">
<option value="">選択してください</option>
<option value="yokoyama" <?php if($contributor=="yokoyama"){print "selected";} ?>>よこやま</option>
<option value="okada" <?php if($contributor=="okada"){print "selected";} ?>>おかだ</option>
<option value="yamada" <?php if($contributor=="yamada"){print "selected";} ?>>やまだ</option>
</select>
</div>

<div class="mb-3">
<label for="title" class="form-label">内容</label>
<textarea name="article" class="form-control" cols="30"><?=$article?></textarea>
</div>

<div class="mb-3">
<input type="submit" class="btn-primary" value="投稿する" rows="20">
</div>

<input type="hidden" name="code" value="<?=$code?>">

</form>

</div>

<?php
require("foot.php");
?>