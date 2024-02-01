<?php
$searchname = $_POST['search_box'];

if(!empty($searchname))
{
    header('Location: /cuahangthoitrang/search.php?searchname='.$searchname.'');
}
else
{
    header('Location: /cuahangthoitrang/search.php?msg=emptysearch');
}
