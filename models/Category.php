<?php


class Category
{
    public static function getCategoriesList() {
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT id_category,name FROM category'.
                                        ' where status > 0 ORDER BY sort_order ASC');
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id_category'] = $row['id_category'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }
    public static function getCategoriesListAdmin() {
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT * FROM category');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id_category'] = $row['id_category'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }
    public static function getCategoryById($id_category) {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM category WHERE id_category='.$id_category);
        return $result->fetch();
    }
    public static function deleteCategoryById($id_category) {
        $db = Db::getConnection();
        $sql = 'DELETE FROM category WHERE id_category = :id_category';
        $result = $db->prepare($sql);
        $result->bindParam(':id_category',$id_category, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function createCategory($option) {
        $db = Db::getConnection();
        $sql = 'INSERT INTO category '
            .'(name,status) VALUES (:name,:status)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        return $result->execute();
    }
    public static function updateCategory($option) {
        $db = Db::getConnection();
        $sql = 'UPDATE category SET'
            .' name=:name,status=:status WHERE id_category=:id_category';
        $result = $db->prepare($sql);
        $result->bindParam(':id_category', $option['id_category'], PDO::PARAM_INT);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        return $result->execute();
    }



}