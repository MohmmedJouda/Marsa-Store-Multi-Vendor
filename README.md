````markdown
# 🌟 Marsa Store Multi-Vendor

**Marsa Store Multi-Vendor** is a fully-featured multi-vendor e-commerce platform built with **Laravel 12** and **Vue.js**, providing a seamless shopping and store management experience. This project is designed to offer robust e-commerce solutions with full support for sales, shipping, and payments within a country.

---

## 🚀 Features

### 🏪 Multi-Vendor System
- ✅ Register multiple vendors with individual stores.
- ✅ Verify vendors with official documents for security and credibility.
- ✅ Dedicated dashboard for each vendor to manage products, orders, and sales.

### 📦 Advanced Product Management
- ✅ Support for **Attributes** and **Product Variants**.
- ✅ Add products with images, multiple features, and different prices per variant.
- ✅ Multiple product options like color and size with separate stock management.

### 🛒 Smooth User Experience
- ✅ Modern and fast interface using **Vue.js** and **Blade Templates**.
- ✅ Fully responsive design for mobile and tablet devices.
- ✅ Advanced search and product filtering by price, category, or attributes.

### 💳 Shipping & Payment
- ✅ Support for local shipping only with flexible cost options.
- ✅ Cash on Delivery (COD) and local payment gateways supported.
- ✅ Detailed order tracking for customers and vendors.

### 🔔 Notifications & Internal Chat
- ✅ Real-time notifications for orders and promotions.
- ✅ Internal messaging system between customers and vendors.

### 👥 User Roles & Management
- ✅ Role-based access: Super Admin, Admin, Vendor, Customer.
- ✅ Redirect users after login based on role.
- ✅ Secure routes and functions based on user role.

### 🎯 Additional Professional Features
- ✅ Support tickets system for customers and vendors.
- ✅ Full activity log for all operations.
- ✅ Global settings and coupon management.

---

## ⚙️ Technology Stack
- **Backend:** Laravel 12  
- **Frontend:** Vue.js, Blade Templates, Bootstrap  
- **Database:** MySQL  
- **Realtime Features:** Laravel Echo / Pusher (optional)  
- **Authentication & Roles:** Laravel Jetstream (Livewire)  
- **Payment:** COD + local gateways  

---

## 🛠 Installation & Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/MohmmedJouda/Marsa-Store-Multi-Vendor.git
cd Marsa-Store-Multi-Vendor
````

### 2️⃣ Install dependencies

```bash
composer install
npm install
npm run dev
```

### 3️⃣ Environment setup

* Create a `.env` file and configure database and payment gateways.

### 4️⃣ Run migrations & seeders

```bash
php artisan migrate --seed
```

### 5️⃣ Start local development server

```bash
php artisan serve
```

---

## 📂 Project Structure

* `/app` – Core backend logic.
* `/resources/views` – Blade templates for frontend.
* `/resources/js` – Vue.js components for interactive UI.
* `/routes` – Web and API routes.
* `/database/migrations` – Database tables and schema.

---

## 🎯 Project Purpose

**Marsa Store Multi-Vendor** is built to provide a ready-to-use, advanced e-commerce platform that serves:

* Vendors who want an easy way to manage their stores.
* Customers looking for a fast and secure shopping experience.
* Organizations needing multi-role support and professional features.

---

## 🌐 Important Links

* **GitHub Repository:** [Marsa Store Multi-Vendor](https://github.com/MohmmedJouda/Marsa-Store-Multi-Vendor)
* **Developer CV:** [Mohammed Jouda](https://www.linkedin.com/in/mohammed-joudaa)

---

## 📜 License

This project is developed for personal and educational purposes and can be customized for real projects as needed.
