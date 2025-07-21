## 03.CRUD — Employee Management

## STEP 1 — Make Routes
- List all employees
- Show form to create new employee
- Store new employee
- Show single employee
- Show form to edit employee
- Update employee
- Delete employee
- Restore soft deleted employee

<img width="1175" height="706" alt="1" src="https://github.com/user-attachments/assets/fe2d151e-5148-45f0-baaa-450f6f7b1373" />


## STEP 2 — Add Soft Deletes to Model & Migration
- In `create_employees_table migration` file, add: `$table->softDeletes();`
- Re-run migration: `php artisan migrate:fresh --seed`
- In Employee.php:
- 
- use Illuminate\Database\Eloquent\SoftDeletes;
- class Employee extends Model { use SoftDeletes; }


## STEP 3 — Build EmployeeController CRUD
- index() → List with search, filters, pagination
- create() → Show form for new employee
- store() → Validate and save employee with details
- show() → Display single employee with details
- edit() → Show form to edit employee + details
- update() → Validate and update employee (+ details)
- destroy() → Soft delete employee
- restore() → Bring back soft deleted employee



## STEP 4 — Make Views with Blade — Laravel’s template engine.
- employees/index.blade.php — Show list, search, filters, delete, restore buttons.
- employees/create.blade.php — Form for new employee add.
- employees/edit.blade.php — Form to edit.
- employees/show.blade.php — Detail view.

## STEP 5 — Test  All
Run: `php artisan serve` Then Visit `http://localhost:8000`
--
OR use XAMPP: Put your Laravel project in htdocs (XAMPP) -> Run Apache + MySQL -> Access http://localhost/your-folder/public
--
- List: /employees shows all with search/filter
- Create: /employees/create form works, validates, inserts
- Show: /employees/{id} shows single record
- Edit: /employees/{id}/edit updates properly
- Delete: Deletes employee (soft delete)
- Restore: Restores deleted employee
- Validation: Invalid form data shows error
- Pagination: Works for large data

<img width="1366" height="724" alt="11" src="https://github.com/user-attachments/assets/ca085162-02a4-47b4-af61-18450e5cf947" />

<img width="759" height="555" alt="12" src="https://github.com/user-attachments/assets/18c4316c-3bf0-4238-bb06-99b44cbccb5c" />

<img width="1004" height="535" alt="13" src="https://github.com/user-attachments/assets/73173d29-b6a0-4db1-9a43-776ba12ce4aa" />

<img width="847" height="504" alt="21" src="https://github.com/user-attachments/assets/168b6b4f-83c2-4e8b-a9cb-656462f8bb93" />

<img width="1366" height="364" alt="14" src="https://github.com/user-attachments/assets/96c6c5d4-7086-4df1-af9a-20a307da110f" />

<img width="1196" height="345" alt="15" src="https://github.com/user-attachments/assets/d619460a-8ecd-4e86-a1fa-de53c6d338c1" />

<img width="1203" height="438" alt="16" src="https://github.com/user-attachments/assets/1d649991-0de2-4231-95bb-21e5ea30cb7a" />

<img width="1366" height="324" alt="18" src="https://github.com/user-attachments/assets/2f1bc90f-86a4-47de-a46c-ef62512bbf0a" />

<img width="1366" height="357" alt="19" src="https://github.com/user-attachments/assets/eb6cf0a5-981c-459e-a2e2-fb445349a710" />

<img width="1366" height="355" alt="20" src="https://github.com/user-attachments/assets/9761840f-a676-4933-8147-a40978a05189" />





