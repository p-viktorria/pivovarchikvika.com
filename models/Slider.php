<?php


class Slider
{
    public static function getSliderList() {
        $db = Db::getConnection();
        $sql = "SELECT * FROM slider";
        $result = $db->query($sql);
        $slider = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $slider[$i]['id_slider'] = $row['id_slider'];
            $slider[$i]['h1'] = $row['h1'];
            $slider[$i]['h2'] = $row['h2'];
            $slider[$i]['p'] = $row['p'];
            $slider[$i]['href'] = $row['href'];
            $i++;
        }
        return $slider;
    }
    public static function deleteSlide($id_slider) {
        $db = Db::getConnection();
        $sql = "DELETE FROM slider WHERE id_slider=$id_slider";
        $result = $db->query($sql);
        return $result->execute();
    }
    public static function createSlide($option) {
        $db = Db::getConnection();
        $sql = "INSERT INTO slider (h1,h2,p,href) VALUES ('{$option['h1']}','{$option['h2']}','{$option['p']}','{$option['href']}')";

        if($result = $db->query($sql)){

            return $db->lastInsertId();
        }
        return 0;
    }
    public static function updateSlide($option) {
        $db = Db::getConnection();
        $sql = "UPDATE slider SET h1='{$option['h1']}',h1='{$option['h2']}',p='{$option['p']}',href='{$option['href']}'";
        return $result = $db->query($sql);
    }
    public static function getSlideById($id) {
        $db = Db::getConnection();
        $sql = "SELECT * FROM slider WHERE id_slider=$id";
         $result= $db->query($sql);
        $row = $result->fetch();
        return $row;
    }
    public static function getImage($id) {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/slider/';
        $pathToProductsImage = $path. $id .'.jpg';
        if(file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductsImage)) {
            return $pathToProductsImage;
        }
        return $path. $noImage;
    }
}