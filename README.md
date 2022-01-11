<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 系統名稱:食譜分享平台

## 系統功能

-瀏覽平台首頁	
-搜尋食譜	
-會員新增食譜	
-修改食譜	
-會員刪除食譜	
-會員評論食譜
-會員回覆食譜留言	
-把食譜加入我的最愛	

## 主控台

<img src=""C:\Users\Shu-Ting Chen\Downloads\主控台.png"">

## 食譜管理

<img src="https://imgur.com/gallery/qJAk4wN">

## 新增食譜

<img src="https://imgur.com/gallery/20Q3FyR">

## 修改食譜

<img src="https://imgur.com/gallery/bB2DOds">

## 刪除食譜

<img src="https://imgur.com/gallery/sXM6iTW">

##ERD

<img src="https://imgur.com/gallery/cm70KGy">

##資料庫綱要圖

<img src="https://imgur.com/gallery/lKQkc51">

資料庫欄位設計

會員資料表

<img src="https://imgur.com/gallery/RJA7omn">

食譜資料表

<img src="https://imgur.com/gallery/nKuOy5b">

留言資料表

<img src="https://imgur.com/gallery/N67R9Xf">

回覆資料表

<img src="https://imgur.com/gallery/qvN2y7e">

我的最愛資料表

<img src="https://imgur.com/gallery/5xxeCWP">


## 工作分配

## 前台:<a href="https://github.com/3A832097">3A832097鄧欣如</a>



## 管理後台:<a href="https://github.com/3A832077">3A832077陳舒婷</a>

主控台:Route::get('/', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('manage.dashboard.index');

儲存食譜:Route::post('recipes', [\App\Http\Controllers\RecipemanageController::class,'store'])->name('manage.recipes.store');

管理後台:Route::get('recipes', [\App\Http\Controllers\RecipemanageController::class, 'index'])->name('manage.recipes.index');

新增食譜頁面:Route::get('recipes/create', [\App\Http\Controllers\RecipemanageController::class, 'create'])->name('manage.recipes.create');

編輯食譜頁面:Route::get('recipes/{id}/edit', [\App\Http\Controllers\RecipemanageController::class, 'edit'])->name('manage.recipes.edit');

編輯食譜:Route::patch('recipes/{id}', [\App\Http\Controllers\RecipemanageController::class, 'update'])->name('manage.recipes.update');

刪除食譜:Route::get('recipes/{id}', [\App\Http\Controllers\RecipemanageController::class, 'destroy'])->name('manage.recipes.destroy');


## 初始專案與DB負責的同學

###初始專案:<a href="https://github.com/3A832097">3A832097鄧欣如</a>

###資料庫建置:<a href="https://github.com/3A832097">3A832097鄧欣如</a>

##網站安裝(系統復原步驟)
複製 https://github.com/WISD-2021/final01.git本系統在GitHub的專案
打開 Source tree，點選 Clone 後，輸入以下資料Source Path:https://github.com/WISD-2021/final01.git Destination Path:C:\wagon\uwamp\www\final01 打開cmder，切換至專案所在資料夾，cd final01
在cmder輸入以下命令，以復原此系統：
composer install
composer run‐script post‐root‐package‐install
composer run‐script post‐create‐project‐cmd
將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：：
DB_HOST=127.0.0.1
DB_PORT=33060
DB_DATABASE=final01
DB_USERNAME=root
DB_PASSWORD=root
復原完，建立資料庫
先進Adminer建立final01的資料庫
建立好之後開啟cmder輸入以下指令： artisan migrate(成功執行後會復原所有資料表)
artisan db:seed(建立假資料)
進入adminer
資料庫系統:MYSQL
伺服器:localhost:33060
帳號:root
密碼:root
在UwAmp下，點選Apache config，選擇port8000，並在Document Root 輸入{DOCUMENTPATH}/final02/public

##系統使用者測試帳號
