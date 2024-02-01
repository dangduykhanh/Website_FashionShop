<?php
function pagination($file, $total, $currentPage, $variable, $MaDM)
{
    //$total Tổng số trang
    //$currentPage Trang hiện tại, thay thế bằng biến thực tế của bạn
    if ($total > 5) {
        if ($currentPage <= 5) {
            for ($i = 1; $i <= 5; $i++) {
                echo '<a href="'.$file.'?page=' . $i . ''.$variable.''.$MaDM.'">' . $i . '</a>';
            }
            if ($total >= 6) {
                echo '<a href="'.$file.'?page=6'.$variable.''.$MaDM.'"><i class="fa-solid fa-arrow-right"></i></a>';
            }
        } else {
            echo '<a href="'.$file.'?page=' . ($currentPage - 1) . ''.$variable.''.$MaDM.'"><i class="fa-solid fa-arrow-left"></i></a>';
            for ($i = $currentPage - 4; $i <= $currentPage; $i++) {
                if ($i <= $total) {
                    echo '<a href="'.$file.'?page=' . $i . '&MaDM='.$MaDM.'">' . $i . '</a>';
                }
            }
            if ($currentPage < $total) {
                echo '<a href="'.$file.'?page=' . ($currentPage + 1) . ''.$variable.''.$MaDM.'"><i class="fa-solid fa-arrow-right"></i></a>';
            }
        }
    } else {
        for ($i = 1; $i <= $total; $i++) {
            echo '<a href="'.$file.'?page=' . $i . ''.$variable.''.$MaDM.'">' . $i . '</a>';
        }
    }
}

function paginationFilterBar($total, $currentPage,$vacategory, $category, $vagender, $gender, $varprice, $price)
{
    // category='.$category.'&gender='.$gender.'&price=100
    //$total Tổng số trang
    //$currentPage Trang hiện tại, thay thế bằng biến thực tế của bạn
    if ($total > 5) {
        if ($currentPage <= 5) {
            for ($i = 1; $i <= 5; $i++) {
                echo '<a href="shop.php?page=' . $i . ''.$vacategory.''.$category.''.$vagender.''.$gender.''.$varprice.''.$price.'">' . $i . '</a>';
            }
            if ($total >= 6) {
                echo '<a href="shop.php?page=6'.$vacategory.''.$category.''.$vagender.''.$gender.''.$varprice.''.$price.'"><i class="fa-solid fa-arrow-right"></i></a>';
            }
        } else {
            echo '<a href="shop.php?page=' . ($currentPage - 1) . ''.$vacategory.''.$category.''.$vagender.''.$gender.''.$varprice.''.$price.'"><i class="fa-solid fa-arrow-left"></i></a>';
            for ($i = $currentPage - 4; $i <= $currentPage; $i++) {
                if ($i <= $total) {
                    echo '<a href="shop.php?page=' . $i . ''.$vacategory.''.$category.''.$vagender.''.$gender.''.$varprice.''.$price.'">' . $i . '</a>';
                }
            }
            if ($currentPage < $total) {
                echo '<a href="shop.php?page=' . ($currentPage + 1) . ''.$vacategory.''.$category.''.$vagender.''.$gender.''.$price.''.$price.'"><i class="fa-solid fa-arrow-right"></i></a>';
            }
        }
    } 
    else {
        for ($i = 1; $i <= $total; $i++) {
            echo '<a href="shop.php?page=' . $i . ''.$vacategory.''.$category.''.$vagender.''.$gender.''.$price.''.$price.'">' . $i . '</a>';
        }
    }
}