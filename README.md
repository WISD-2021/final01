<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 系統名稱:食譜分享平台

## 系統功能

1.瀏覽平台首頁	
2.搜尋食譜	
3.會員新增食譜	
4.修改食譜	
5.會員刪除食譜	
6.會員評論食譜
7.會員回覆食譜留言	
8.把食譜加入我的最愛	

## 主頁

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/%E9%A6%96%E9%A0%81.png)

## 新增我的最愛

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/%E5%8A%A0%E5%85%A5%E6%88%91%E7%9A%84%E6%9C%80%E6%84%9B.png)

## 新增留言&回覆

![image](https://github.com/WISD-2021/final01/blob/35c877b5dff5acaaea849d306a62c76ff0e52486/public/img/%E7%95%99%E8%A8%80.png)


## 主控台

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/%E4%B8%BB%E6%8E%A7%E5%8F%B0.png)

## 食譜管理

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/%E9%A3%9F%E8%AD%9C%E7%AE%A1%E7%90%86.png)


## 新增食譜

![image](https://github.com/WISD-2021/final01/blob/3c3de371ea8898edea2a85933e4b94bf27cccf9e/public/img/%E6%96%B0%E5%A2%9E%E9%A3%9F%E8%AD%9C.png)


## 修改食譜

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/%E7%B7%A8%E8%BC%AF%E9%A3%9F%E8%AD%9C.png)


## 刪除食譜

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/%E5%88%AA%E9%99%A4%E9%A3%9F%E8%AD%9C.png)


## ERD

![image](https://github.com/WISD-2021/final01/blob/35c877b5dff5acaaea849d306a62c76ff0e52486/public/img/ERD.png)


## 資料庫綱要圖

![image](https://github.com/WISD-2021/final01/blob/35c877b5dff5acaaea849d306a62c76ff0e52486/public/img/%E7%B6%B1%E8%A6%81.png)


##資料庫欄位設計

會員資料表

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/user.png)


食譜資料表

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/%E8%B3%87%E6%96%99%E8%A1%A8-%E7%AC%AC5%E9%A0%81.drawio.png)


留言資料表

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/comment.png)

回覆資料表

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/reply.png)


我的最愛資料表

![image](https://github.com/WISD-2021/final01/blob/fa8f258f4b2298d077cb6fc0d4e98b0e05a1dfe3/public/img/love.png)



## 工作分配

## 前台:<a href="https://github.com/3A832097">3A832097鄧欣如</a>

首頁:Route::get('/',[\App\Http\Controllers\RecipeController::class, 'index'])->name('recipes.index');

新增留言:Route::post('comments', [\App\Http\Controllers\CommentController::class,'create'])->name('comments.create');

刪除留言:Route::get('comments/{id}', [\App\Http\Controllers\CommentController::class,'destroy'])->name('Comment.destroy');

刪除我的最愛:Route::get('favorites/{id}', [\App\Http\Controllers\FavoriteController::class,'destroy'])->name('Favorite.destroy');

新增回覆:Route::get('Reply', [\App\Http\Controllers\ReplyController::class,'create'])->name('reply.create');

搜尋:Route::get('recipessearch', [\App\Http\Controllers\RecipeController::class, 'search'])->name('recipes.search');

## 管理後台:<a href="https://github.com/3A832077">3A832077陳舒婷</a>

主控台:Route::get('/', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('manage.dashboard.index');

儲存食譜:Route::post('recipes', [\App\Http\Controllers\RecipemanageController::class,'store'])->name('manage.recipes.store');

管理後台:Route::get('recipes', [\App\Http\Controllers\RecipemanageController::class, 'index'])->name('manage.recipes.index');

新增食譜頁面:Route::get('recipes/create', [\App\Http\Controllers\RecipemanageController::class, 'create'])->name('manage.recipes.create');

編輯食譜頁面:Route::get('recipes/{id}/edit', [\App\Http\Controllers\RecipemanageController::class, 'edit'])->name('manage.recipes.edit');

編輯食譜:Route::patch('recipes/{id}', [\App\Http\Controllers\RecipemanageController::class, 'update'])->name('manage.recipes.update');

刪除食譜:Route::get('recipes/{id}', [\App\Http\Controllers\RecipemanageController::class, 'destroy'])->name('manage.recipes.destroy');


## 初始專案與DB負責的同學

### 初始專案:<a href="https://github.com/3A832097">3A832097鄧欣如</a>

### 資料庫建置:<a href="https://github.com/3A832097">3A832097鄧欣如</a>

### 資料庫資料:<a href="https://github.com/3A832097">3A832097鄧欣如</a>

## 網站安裝(系統復原步驟)
1.複製 https://github.com/WISD-2021/final01.git本系統在GitHub的專案
2.打開 Source tree，點選 Clone 後，輸入以下資料Source Path:https://github.com/WISD-2021/final01.git Destination Path:C:\wagon\uwamp\www\final01 打開cmder，切換至專案所在資料夾，cd final01
3.在cmder輸入以下命令，以復原此系統：
composer install
composer run‐script post‐root‐package‐install
composer run‐script post‐create‐project‐cmd
4.將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：：
DB_HOST=127.0.0.1
DB_PORT=33060
DB_DATABASE=final01
DB_USERNAME=root
DB_PASSWORD=root
5.復原完，建立資料庫
先進Adminer建立final01的資料庫
6.建立好之後開啟cmder輸入以下指令： artisan migrate(成功執行後會復原所有資料表)
7.tisan db:seed(建立假資料)
8.adminer
資料庫系統:MYSQL
伺服器:localhost:33060
帳號:root
密碼:root
9.wAmp下，點選Apache config，選擇port8000，並在Document Root 輸入{DOCUMENTPATH}/final02/public

## 系統使用者測試帳號
使用者帳號:sf123@gmail.com
密碼:12345678
