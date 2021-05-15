<?php

class SiteController
{
   public function actionIndex() {
       $title = "Азбука.Бай - Главная Страница";
       $categoryList = array();
       $categoryList = Category::getCategoriesList();
       $latestProduct = array();
       $latestProduct = Product::getLatestProduct();
       $recomendedProduct = array();
       $recomendedProduct = Product::getRecommendedBooks();
       $slider = Slider::getSliderList();
       require_once(ROOT . '/views/site/index.php');
       return true;
   }
   public function actionContact() {
       $title = "Азбука.Бай - Связаться с нами";
       $categoryList = array();
       $categoryList = Category::getCategoriesList();
       $userName = '';
       $userEmail = '';
       $subject = '';
       $userMessage = '';
       $result = false;
       if(isset($_POST['submit'])) {
           $userEmail = $_POST['email'];
           $userName = $_POST['name'];
           $subject = $_POST['subject'];
           $userMessage = $_POST['message'];
           $errors = false;
           if(!User::checkEmail($userEmail)) {
               $errors[] = 'Неправильная электронная почта';
           }
           if(!User::checkName($userName)) {
               $errors[] = 'Имя должно быть более 3-х символов';
           }
           if(strlen($subject) < 5) {
               $errors[] = 'Тема письма должна быть длиннее 5-ти символов';
           }
           if(strlen($userMessage) < 10) {
               $errors[] = 'Слишком короткое сообщение';
           }
           if($errors == false) {
               $adminEmail = 'pavlin.tarasenko@mail.ru';
               $message = 'Текст письма:' . $userMessage . '<br>От: ' . $userEmail;
               $subject = $subject;
               $result = mail($adminEmail, $subject, $message);
               $result = true;
           }
       }

       require_once(ROOT . '/views/site/contact.php');
       return true;
   }
   public function actionInfo() {
       $title = "Азбука.Бай - Справочная информация";
       $categoryList = array();
       $categoryList = Category::getCategoriesList();
       require_once(ROOT . '/views/site/help.php');
       return true;
   }
   public function action404() {
       header("Location: /");
   }

}