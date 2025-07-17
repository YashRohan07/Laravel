# Database — Migrations, Models, Factories & Seeders

## STEP 1 — Start XAMPP & Create Database
- Open XAMPP Control Panel.
- Start Apache & MySQL.
- Visit http://localhost/phpmyadmin.
- Click Databases → Create a new database named 'employee_tracker'.


## STEP 2 — Update .env
Open your project’s .env file and set:

- DB_CONNECTION=mysql  
- DB_HOST=127.0.0.1  
- DB_PORT=3306  
- DB_DATABASE=employee_tracker  
- DB_USERNAME=root  
- DB_PASSWORD=  

<img width="1001" height="661" alt="1" src="https://github.com/user-attachments/assets/8195066a-6f27-44d4-ae10-718545fd52f8" />

What we did:
- Set up the database connection for Laravel.
- Laravel needs these details to communicate with MySQL database.
  

## STEP 3 — Create Migrations

- Migration is a PHP file that defines your database structure. Like a blueprint for tables.
- Instead of manually creating tables in phpMyAdmin, you write PHP code once and run it anywhere!
  
Run:
- php artisan make:migration create_employees_table
- php artisan make:migration create_employee_details_table
- php artisan make:migration create_departments_table

<img width="1366" height="379" alt="2" src="https://github.com/user-attachments/assets/1fb958aa-ba38-439a-8384-11d1e1dfec3f" />

Then Run:
- php artisan migrate:fresh 

<img width="1360" height="604" alt="6" src="https://github.com/user-attachments/assets/826329d1-2b6e-40ad-b10b-96940a6c5ad0" />

<img width="997" height="492" alt="7" src="https://github.com/user-attachments/assets/b9a4d74a-2bb5-4956-8b33-785a5df80dca" />

What we did:
- Created tables via code (no manual SQL).
- Used migrate:fresh to reset and rebuild tables.
  

## STEP 4 — Create Eloquent Models
- Eloquent Model is a PHP class that represents a table in your database.
- Eloquent is what Laravel calls its built-in tool for working with your database.
- It’s an ORM (Object-Relational Mapper) — which just means you can talk to your tables using PHP code instead of writing raw SQL.
- With Eloquent, you use models to insert, read, update and delete data easily.
  
Run:
- php artisan make:model Employee
- php artisan make:model EmployeeDetail
- php artisan make:model Department

<img width="1201" height="360" alt="10" src="https://github.com/user-attachments/assets/5bbd2576-8048-4b9d-8822-5fe7ff024c62" />

What we did:
- Created models for employees, employee_details, and departments.
- Models enable easy database interactions without raw SQL.

  
## STEP 5 — Add Model Relationships
Relationships tell Laravel how tables are connected.
- An Employee belongsTo a Department
- A Department hasMany Employees
- An Employee hasOne EmployeeDetail

## Department.php
public function employees() {
  return $this->hasMany(Employee::class);
}

## Employee.php
public function detail() {
  return $this->hasOne(EmployeeDetail::class);
}

public function department() {
  return $this->belongsTo(Department::class);
}

## EmployeeDetail.php
public function employee() {
  return $this->belongsTo(Employee::class);
}

'Added foreign keys:'
- employees → department_id connects to departments.
- employee_details → employee_id connects to employees.
  
## STEP 6 — Create Factories
- Factory uses the Faker library to create fake but realistic data.
- It helps you fill tables with dummy data for testing, instead of typing everything manually.
  
Run:
- php artisan make:factory EmployeeFactory
- php artisan make:factory EmployeeDetailFactory
- php artisan make:factory DepartmentFactory

<img width="1366" height="666" alt="11" src="https://github.com/user-attachments/assets/6862093b-45a6-45b3-a526-f6c0870b6c52" />

## STEP 7 — Create Seeders
- A Seeder runs your factories to actually insert fake data into your database.
  
Run:
php artisan make:seeder DepartmentSeeder
php artisan make:seeder EmployeeSeeder

<img width="1366" height="472" alt="12" src="https://github.com/user-attachments/assets/6e5b6518-98ad-4ee6-b453-e1598a10766c" />


##  STEP 8 — Migrate & Seed
What this does:
- Deletes old tables
- Creates fresh tables using your migrations
- Fills them with fake data using factories & seeders
  
Run:
- php artisan migrate:fresh --seed

<img width="1366" height="556" alt="13" src="https://github.com/user-attachments/assets/9ab2b2c0-e3df-4ad3-84d4-d27148842424" />

Check phpMyAdmin → you should see:

## departments (10 rows)
<img width="1078" height="644" alt="14" src="https://github.com/user-attachments/assets/270a17c4-e070-4102-9b4f-78a2921fe57d" />

## employees (100k rows)
<img width="1348" height="649" alt="15" src="https://github.com/user-attachments/assets/0f981043-d8df-486b-8594-a0ef9c278bc5" />

## employee_details (100k rows)
<img width="1358" height="657" alt="16" src="https://github.com/user-attachments/assets/9cff8bc2-7fea-4dcc-baf9-66fe086d1b6e" />


## In Summary 
- Migrations → Database blueprints. Tell Laravel how to create your tables
- Models → Interact with tables without SQL.
- Relationships → Link tables like family.
- Factories → Generate fake data.
- Seeders → Bulk-insert test data.
- migrate:fresh --seed → Reset + Rebuild DB + Fill with fake data




