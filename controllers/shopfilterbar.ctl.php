<?php
$category = $_GET['danhmuc'];
$gender = $_GET['gioitinh'];
$price = $_GET['mucgia'];

if(isset($category) && isset($gender) && isset($price))
{
    if(intval($price)==100)
    {
        header('Location: /cuahangthoitrang/shop.php?category='.$category.'&gender='.$gender.'&price=100');
    }
    elseif (intval($price)==115)
    {
        header('Location: /cuahangthoitrang/shop.php?category='.$category.'&gender='.$gender.'&price=115');
    }
    else
    {
        header('Location: /cuahangthoitrang/shop.php?category='.$category.'&gender='.$gender.'&price=150');
    }

}
elseif(isset($category) && isset($gender))
{
    header('Location: /cuahangthoitrang/shop.php?category='.$category.'&gender='.$gender);
}
elseif(isset($category) && isset($price))
{
    if(intval($price)==100)
    {
        header('Location: /cuahangthoitrang/shop.php?category='.$category.'&price=100');
    }
    elseif (intval($price)==115)
    {
        header('Location: /cuahangthoitrang/shop.php?category='.$category.'&price=115');
    }
    else
    {
        header('Location: /cuahangthoitrang/shop.php?category='.$category.'&price=150');
    }
}
elseif(isset($gender) && isset($price))
{
    if(intval($price)==100)
    {
        header('Location: /cuahangthoitrang/shop.php?gender='.$gender.'&price=100');
    }
    elseif (intval($price)==115)
    {
        header('Location: /cuahangthoitrang/shop.php?gender='.$gender.'&price=115');
    }
    else
    {
        header('Location: /cuahangthoitrang/shop.php?gender='.$gender.'&price=150');
    }
}
elseif (isset($category)) {
    header('Location: /cuahangthoitrang/shop.php?category='.$category);
}
elseif(isset($gender))
{
    header('Location: /cuahangthoitrang/shop.php?gender='.$gender);
}
elseif(isset($price))
{
    if(intval($price)==100)
    {
        header('Location: /cuahangthoitrang/shop.php?price=100');
    }
    elseif (intval($price)==115)
    {
        header('Location: /cuahangthoitrang/shop.php?price=115');
    }
    else
    {
        header('Location: /cuahangthoitrang/shop.php?price=150');
    }
}
else
{
    header('Location: /cuahangthoitrang/shop.php?msg=filterbar-fail');
}