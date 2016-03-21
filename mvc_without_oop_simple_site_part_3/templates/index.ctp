<html>
<head>
    <meta charset="UTF-8" />
    <title><?=$data['page_title']?></title>
    <link rel="stylesheet" type="text/css" href="/mvc_without_oop_simple_site_part_3/css/style.css" />
</head>
<body>

<div id="container">

    <?=$data['menu']?>

    <div class="content">
        <?=$data['content']?>
    </div>


    <div style="margin-top: 30px; background-color: #dedede;padding:10px;padding-top:20px;height:30px;">
        &copy; 2014 My Site.
    </div>


</div>

</body>
</html>