<?php
require_once('modules/db.php');
require_once('models/search.model.php');

class SearchController
{
    private static searchModel $searchModel;
    private static function init():void
    {
        self::$searchModel = new searchModel(DB());
    }
    public static function Render()
    {
        self::init();

        if(!empty(isset($_GET['searchname'])))
        {
            $page = isset($_GET['page']) ? intval($_GET['page']):1;
            $So_SP_TREN_TRANG = 8;
            $from = ($page-1)*$So_SP_TREN_TRANG;
            $total = ceil(self::$searchModel->getTotalProductSearch($_GET['searchname'])/$So_SP_TREN_TRANG);
            $sanphamsearch = self::$searchModel->getNameandCategoryProduct($_GET['searchname'],$from,$So_SP_TREN_TRANG);
        }

        $title = 'Tìm Kiếm';
        $header = 'views/header.partial.php';
        $template= 'Views/search.tmpl.php';
        $footer = '';
        require_once('views/layout.php');
    }
}