<?php

class CatalogController
{
    public function actionIndex() {
        $title = "Азбука.Бай - Каталог";
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(6);
        $recomendedProduct = array();
        $recomendedProduct = Product::getRecommendedBooks();
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }
    public function actionCategory($id_category, $page = 1) {

        $id_category = intval($id_category);
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $categoryById = Category::getCategoryById($id_category);
        $title = "Азбука.Бай - Каталог - Категории";
        $productsByCategory = array();
        $productsByCategory = Product::getProductsListByCategory($id_category,$page);
        $recomendedProduct = array();
        $recomendedProduct = Product::getRecommendedBooks();
        $total = Product::getTotalProductsInCategory($id_category);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
    public function actionSearch() {
        $title = "Азбука.Бай - Поиск по каталогу";
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $productsBySearch = array();
        $productsBySearch = Product::getProductBySearch();
        $recomendedProduct = array();
        $recomendedProduct = Product::getRecommendedBooks();
        require_once(ROOT . '/views/catalog/search.php');
        return true;
    }
}