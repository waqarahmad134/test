# Model Usage Report

## ✅ **IN USE** - Active Models

### 1. **User** (`app/Models/User.php`)
- **Status**: ✅ **ACTIVELY USED**
- **Usage Locations**:
  - `UserController.php` - User management (CRUD operations)
  - `DashboardController.php` - Dashboard data
  - `CaseController.php` - Case assignments
  - `SettingsController.php` - Profile settings
  - `HomeController.php` - Home page data
  - `PrintController.php` - Print functionality
  - `Auth/RegisterController.php` - User registration
- **Relationships**: HasMany Cases
- **Special Features**: Uses Spatie Permission (HasRoles trait)

### 2. **Cases** (`app/Models/Cases.php`)
- **Status**: ✅ **ACTIVELY USED** (Core Model)
- **Usage Locations**:
  - `CaseController.php` - Main case management (extensively used)
  - `DashboardController.php` - Dashboard statistics
  - `HomeController.php` - Home page data
  - `welcome.php` - Case listing and search
  - `AutocompleteController.php` - Autocomplete functionality
  - `PSController.php` - Check if PS has cases before delete
  - `JudgeController.php` - Check if Judge has cases before delete
  - `SubcatController.php` - Check if Subcat has cases before delete
  - `CourtController.php` - Check if Court has cases before delete
- **Relationships**: 
  - belongsTo User
  - belongsTo Court
  - Helper methods: cname(), sname(), jname(), psname()

### 3. **Court** (`app/Models/Court.php`)
- **Status**: ✅ **ACTIVELY USED**
- **Usage Locations**:
  - `CourtController.php` - Court management (CRUD)
  - `CaseController.php` - Case form dropdowns (multiple methods)
  - `SubcatController.php` - Subcategory management
  - `DashboardController.php` - Dashboard count
  - `welcome.php` - Welcome page
- **Relationships**: HasMany Cases

### 4. **Judge** (`app/Models/Judge.php`)
- **Status**: ✅ **ACTIVELY USED**
- **Usage Locations**:
  - `JudgeController.php` - Judge management (CRUD)
  - `CaseController.php` - Case form dropdowns (multiple methods)
  - `DashboardController.php` - Dashboard count
- **Relationships**: HasMany Cases

### 5. **PS** (Police Station) (`app/Models/PS.php`)
- **Status**: ✅ **ACTIVELY USED**
- **Usage Locations**:
  - `PSController.php` - Police Station management (CRUD)
  - `CaseController.php` - Case form dropdowns (multiple methods)
  - `DashboardController.php` - Dashboard count
- **Relationships**: HasMany Cases

### 6. **Subcat** (`app/Models/Subcat.php`)
- **Status**: ✅ **ACTIVELY USED**
- **Usage Locations**:
  - `SubcatController.php` - Subcategory management (CRUD)
  - `CaseController.php` - Case form dropdowns (multiple methods)
  - `CourtController.php` - Check if Court has subcats before delete
- **Relationships**: HasMany Cases

### 7. **Role** (`app/Models/Role.php`)
- **Status**: ✅ **ACTIVELY USED** (via Spatie Permission)
- **Usage Locations**:
  - `UserController.php` - User role assignment
  - `RoleController.php` - Role management
  - `Auth/RegisterController.php` - Default role assignment
- **Note**: This is a custom Role model, but the app primarily uses `Spatie\Permission\Models\Role`
- **Recommendation**: ⚠️ Check if this custom model is needed or if Spatie's Role should be used exclusively

### 8. **Permission** (`app/Models/Permission.php`)
- **Status**: ✅ **ACTIVELY USED** (via Spatie Permission)
- **Usage Locations**:
  - `RoleController.php` - Permission management
- **Note**: This is a custom Permission model, but the app primarily uses `Spatie\Permission\Models\Permission`
- **Recommendation**: ⚠️ Check if this custom model is needed or if Spatie's Permission should be used exclusively

---

## ❌ **NOT IN USE** - Unused/Questionable Models

### 1. **Type** (`app/Models/Type.php`)
- **Status**: ❌ **NOT ACTIVELY USED**
- **Usage Found**:
  - `welcome.php` - Line 8: `use App\Models\Type;`
  - `welcome.php` - Line 22: `$types = Type::all();`
  - `CaseController.php` - Line 13: `use App\Models\Type;` (imported but never used)
- **Issue**: 
  - `$types` variable is created but **never passed to view or used**
  - No views reference `$types` variable
  - Model has no fillable fields, no table definition, no relationships
- **Recommendation**: 🗑️ **CAN BE REMOVED** - Appears to be leftover code

### 2. **Product** (`app/Models/Product.php`)
- **Status**: ❌ **DEMO/TEST CODE** (Not part of core application)
- **Usage Found**:
  - `ProductController.php` - Full CRUD controller
  - `ProductAjaxController.php` - AJAX CRUD controller
  - Routes: `Route::resource('products', ProductController::class)`
  - Routes: `Route::resource('ajaxproducts', ProductAjaxController::class)`
  - Imported in: `PSController.php`, `JudgeController.php`, `SubcatController.php`, `CourtController.php` (but never actually used - leftover imports)
- **Issue**:
  - This appears to be demo/test code from a template
  - Not related to the Case Management System (CTS) functionality
  - Controllers use "Product" terminology but manage Courts/Judges/PS/Subcats
- **Recommendation**: 🗑️ **CAN BE REMOVED** - Demo code, not part of actual application

---

## 📊 Summary

| Model | Status | Action Required |
|-------|--------|----------------|
| User | ✅ In Use | Keep |
| Cases | ✅ In Use | Keep |
| Court | ✅ In Use | Keep |
| Judge | ✅ In Use | Keep |
| PS | ✅ In Use | Keep |
| Subcat | ✅ In Use | Keep |
| Role | ⚠️ Check | Verify if custom model needed vs Spatie |
| Permission | ⚠️ Check | Verify if custom model needed vs Spatie |
| Type | ❌ Unused | **Remove** |
| Product | ❌ Demo Code | **Remove** |

---

## 🔧 Recommended Actions

1. **Remove Unused Models**:
   - Delete `app/Models/Type.php`
   - Delete `app/Models/Product.php`

2. **Clean Up Imports**:
   - Remove `use App\Models\Type;` from `CaseController.php` and `welcome.php`
   - Remove `use App\Models\Product;` from `PSController.php`, `JudgeController.php`, `SubcatController.php`, `CourtController.php`
   - Remove `$types = Type::all();` from `welcome.php`

3. **Verify Role/Permission Models**:
   - Check if custom `Role` and `Permission` models are needed
   - If Spatie Permission is used exclusively, consider removing custom models

4. **Remove Product Routes** (if Product is removed):
   - Remove `Route::resource('products', ProductController::class)`
   - Remove `Route::resource('ajaxproducts', ProductAjaxController::class)`
   - Remove `ProductController.php` and `ProductAjaxController.php`

