# 🛒 فروشگاه اینترنتی با لاراول

یک فروشگاه اینترنتی کامل با لاراول ۱۲ که شامل مدیریت محصولات، سبد خرید، احراز هویت، سیستم سفارشات، نظرات، تخفیف‌ها و گالری تصاویر است.

---

## ✨ امکانات

- ✅ **مدیریت محصولات** (افزودن، ویرایش، حذف، نمایش)
- ✅ **دسته‌بندی محصولات** (سلسله‌مراتبی)
- ✅ **جستجوی پیشرفته** و **صفحه‌بندی**
- ✅ **سبد خرید کامل** (افزودن، حذف، افزایش/کاهش تعداد)
- ✅ **سیستم احراز هویت** (ثبت‌نام، ورود، فراموشی رمز) با Laravel Breeze
- ✅ **مدیریت سفارشات** (نمایش، تغییر وضعیت)
- ✅ **سیستم نظرات و امتیازات** برای محصولات
- ✅ **سیستم تخفیف و کوپن** (درصدی و مبلغ ثابت)
- ✅ **گالری تصاویر** برای محصولات (چندین عکس)
- ✅ **داشبورد ادمین** با آمار فروش
- ✅ **پرداخت آزمایشی** (بدون درگاه)
- ✅ **اسلایدر** در صفحه اصلی
- ✅ **تاریخ شمسی** (با پکیج jalali)
- ✅ **رابط کاربری زیبا** با بوت‌استرپ

---

## 🛠️ تکنولوژی‌ها

- **Laravel 12**
- **PHP 8.2**
- **SQLite** (قابل تغییر به MySQL)
- **Bootstrap 5**
- **Swiper** (اسلایدر)
- **Laravel Breeze** (احراز هویت)
- **morilog/jalali** (تاریخ شمسی)

---

## 📥 نحوه نصب

### ۱. کپی کردن پروژه در سرور محلی

پروژه را در مسیر `htdocs` (در XAMPP) یا `www` (در WAMP) کپی کنید.

### ۲. نصب وابستگی‌ها

```bash
composer install
npm install
```

### ۳. تنظیم فایل `.env`

```bash
cp .env.example .env
php artisan key:generate
```

### ۴. تنظیم دیتابیس (SQLite)

```bash
touch database/database.sqlite
```

### ۵. اجرای مایگریشن‌ها

```bash
php artisan migrate
```

### ۶. اجرای پروژه

```bash
php artisan serve
```

---

## 🔑 حساب کاربری ادمین

برای ورود به پنل مدیریت، از اطلاعات زیر استفاده کنید:

- **ایمیل:** `admin@shop.com`
- **رمز عبور:** `12345678`

---

## 📸 تصاویر

### صفحه اصلی با اسلایدر
![صفحه اصلی](https://via.placeholder.com/800x400?text=صفحه+اصلی+با+اسلایدر)

### مدیریت محصولات
![مدیریت محصولات](https://via.placeholder.com/800x400?text=مدیریت+محصولات)

### سبد خرید
![سبد خرید](https://via.placeholder.com/800x400?text=سبد+خرید)

### داشبورد ادمین
![داشبورد ادمین](https://via.placeholder.com/800x400?text=داشبورد+ادمین)

---

## 🗂️ ساختار پروژه

```
laravel-shop/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── OrderController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   └── ReviewController.php
│   │   │   ├── CartController.php
│   │   │   ├── OrderController.php
│   │   │   ├── PaymentController.php
│   │   │   ├── ProductController.php
│   │   │   ├── ReviewController.php
│   │   │   └── UserOrderController.php
│   │   └── Models/
│   │       ├── Category.php
│   │       ├── Coupon.php
│   │       ├── Order.php
│   │       ├── OrderItem.php
│   │       ├── Product.php
│   │       ├── ProductImage.php
│   │       ├── Review.php
│   │       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── orders/
│       │   ├── products/
│       │   └── reviews/
│       ├── layouts/
│       │   └── layout.blade.php
│       ├── products/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       ├── cart.blade.php
│       ├── checkout.blade.php
│       └── user/
│           └── orders.blade.php
├── public/
│   └── images/
├── routes/
│   └── web.php
├── .env
├── composer.json
├── package.json
└── README.md
```

---

## 📞 ارتباط

- **گیت‌هاب:** [https://github.com/13Alireza83](https://github.com/13Alireza83)
- **پروژه:** [https://github.com/13Alireza83/laravel-shop](https://github.com/13Alireza83/laravel-shop)

---

## 🤝 مشارکت

اگر می‌خواهید در بهبود این پروژه مشارکت کنید، خوشحال می‌شویم!

1. Fork کنید
2. Branch جدید بسازید (`git checkout -b feature/AmazingFeature`)
3. Commit کنید (`git commit -m 'Add some AmazingFeature'`)
4. Push کنید (`git push origin feature/AmazingFeature`)
5. Pull Request ارسال کنید

---

## 📄 مجوز

این پروژه تحت مجوز MIT منتشر شده است.

---

## 🌟 تشکر

از همه‌ی کسانی که در این مسیر همراه من بودند، مخصوصاً تیم لاراول و جامعه‌ی برنامه‌نویسی ایران.

---

**ساخته شده با ❤️ توسط علی‌رضا**
