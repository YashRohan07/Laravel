# 01.Basic — Laravel Setup, Routing, Controller, Blade

## Topics Covered:
- Laravel Installation
- Routing (`web.php`)
- Basic Controller (`EmployeeController`)
- Blade Views (`layouts/app.blade.php`, `employees/index.blade.php`)

## How to run:
1. Run `composer install` (only if `vendor/` does not exist).
2. Run `php artisan serve` to start the dev server.
3. Open http://127.0.0.1:8000/employees to test.

##
<img width="976" height="548" alt="1" src="https://github.com/user-attachments/assets/dd193935-458a-42ef-a1c9-2e2bb2cb95b2" />

##
<img width="1362" height="614" alt="2" src="https://github.com/user-attachments/assets/31a244c1-01b1-46fe-8fe7-d2be6e893f39" />

##
<img width="402" height="619" alt="3" src="https://github.com/user-attachments/assets/37022d6c-995a-4183-acac-bc9c1bbe00ab" />

##
<img width="1022" height="623" alt="4" src="https://github.com/user-attachments/assets/df9b2c01-c631-4feb-94f0-77185ea47c34" />

##
<img width="1001" height="498" alt="5" src="https://github.com/user-attachments/assets/0edc11a1-6ac6-48e4-96ae-f94c146f42e2" />

##
<img width="1235" height="576" alt="11" src="https://github.com/user-attachments/assets/516ba041-663e-46f4-be14-8cf84f6d8c28" />

##
<img width="1229" height="602" alt="12" src="https://github.com/user-attachments/assets/28be02a6-1237-407b-bb00-4edc48aafe04" />

- When you visit `/employees`:
  - Laravel matches the route in `web.php`
  - It calls the `index` method in the `EmployeeController` class
  - The `index` method returns the `employees.index` Blade view

##
<img width="1128" height="577" alt="13" src="https://github.com/user-attachments/assets/1bc062d7-c488-46e3-9f43-2b346a6c8b88" />

##
<img width="1175" height="582" alt="14" src="https://github.com/user-attachments/assets/7e22d20c-007d-47d2-a20c-06ef99b55622" />

## How Blade Works

When using **Blade**, Laravel’s template engine, you usually have:

- **A layout file:**  
  Example — `resources/views/layouts/app.blade.php`

- **One or more view files:**  
  Example — `resources/views/employees/index.blade.php`

---

### What does the layout do?

- The layout is like a **master template** or **wrapper**.
- It holds the **common HTML structure** for your whole site:
  `<html>`, `<head>`, `<body>`, `<header>`, `<footer>`, etc.
- You **reuse it** for every page.
- It defines **sections** (for example, `@yield('content')`) that child views fill in.
- This keeps your code **DRY** (*Don’t Repeat Yourself*) — so you don’t rewrite `<head>` and `<body>` for every page.

---

### What does the view file do?

- A **view file** is the **specific content** for **one page**.
- It tells Blade which layout to use:

### What happens when you open `/employees`?

- Laravel looks for `employees/index.blade.php`.
- That view says: *“Use `layouts/app.blade.php` as my layout.”*
- The view **sends its page content** into the `@yield('content')` spot.
- The result is a **complete HTML page** with your **layout + page content combined**.
  
##
<img width="1000" height="459" alt="6" src="https://github.com/user-attachments/assets/6f6a6956-17e4-4b39-93c4-118f9fbd3621" />
