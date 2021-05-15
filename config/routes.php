<?php
return array(

    //[0-9]+ - это регулярные выражения, с помощью которых происходит поиск любых комбинаций цифр от 0 до 9

    'admin/blog/create' => 'adminBlog/create',
    'admin/blog/update/([0-9]+)' => 'adminBlog/update/$1',
    'admin/blog/delete/([0-9]+)' => 'adminBlog/delete/$1',
    'admin/blog' => 'adminBlog/index',

    'product/([0-9]+)' => 'product/view/$1',
    'product' => 'product/index',
    'catalog/search' => 'catalog/search',
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    'contacts' => 'site/contact',
    'cart/plus/([0-9]+)' => 'cart/plus/$1',
    'cart/minus/([0-9]+)' => 'cart/minus/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'checkout/delete/([0-9]+)' => 'cart/delete/$1',
    'checkout' => 'cart/checkout',
    'cart' => 'cart/index',
    'blog/page-([0-9]+)' => 'blog/index/$1',
    'blog/([0-9]+)' => 'blog/view/$1',
    'blog' => 'blog/index',
    'info' => 'site/info',

    'admin/order/update/([0-9]+)/deleteProduct/([0-9]+)' => 'adminOrder/deleteProduct/$1/$2',
    'admin/order/update/([0-9]+)/updateProduct/([0-9]+)' => 'adminOrder/updateProduct/$1/$2',
    'admin/order/update/([0-9]+)/createProduct' => 'adminOrder/createProduct/$1',
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order' => 'adminOrder/index',

    'admin/slider/create' => 'adminSlider/create',
    'admin/slider/update/([0-9]+)' => 'adminSlider/update/$1',
    'admin/slider/delete/([0-9]+)' => 'adminSlider/delete/$1',
    'admin/slider' => 'adminSlider/index',

    'admin/review-in-book/unvisible/([0-9]+)' => 'adminReview/reviewUnVisibleBook/$1',
    'admin/review-in-book/visible/([0-9]+)' => 'adminReview/reviewVisibleBook/$1',
    'admin/review-in-book' => 'adminReview/reviewBook',

    'admin/review-in-post/unvisible/([0-9]+)' => 'adminReview/reviewUnVisiblePost/$1',
    'admin/review-in-post/visible/([0-9]+)' => 'adminReview/reviewVisiblePost/$1',
    'admin/review-in-post' => 'adminReview/reviewPost',

    'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
    'admin/user' => 'adminUser/index',



    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin/book/create' => 'adminProduct/create',
    'admin/book/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/book/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/book' => 'adminProduct/index',

    'admin' => 'admin/index',

    '.+' => 'site/index',
    '' => 'site/index',
);