# Project Cleanup List

This document lists all unused files that can be safely removed from the project.

## ⚠️ IMPORTANT: Review before deletion!

Some files might be referenced in ways not easily detected. Please review each section before deleting.

---

## 📁 MODELS (app/Models/)

### ✅ KEEP (Currently Used):
- Cases.php
- Court.php
- Judge.php
- PS.php
- Subcat.php
- User.php
- Role.php (Spatie Permission)
- Permission.php (Spatie Permission)

### ❌ REMOVE (Unused or Questionable):
- **Product.php** - Check if products feature is needed (has routes but might be demo)
- **Type.php** - Used in welcome.php, but check if welcome.php is actually used

---

## 📁 MIGRATIONS (database/migrations/)

### ✅ KEEP (Currently Used):
- 2019_07_20_034721_create_permission_tables.php (Spatie Permission)
- 2020_11_09_180848_create_courts_table.php
- 2020_11_10_041018_create_cases_table.php
- 2024_12_28_185006_create_districts_table.php
- 2024_12_28_185728_create_users_table.php (Current users table)
- 2024_12_29_092418_create_roles_table.php
- Cache, jobs, password_resets, failed_jobs (Laravel defaults)

### ❌ REMOVE (Unused or Old):
- **2014_10_12_000000_create_users_table.php** - Old users table, replaced by 2024 version
- **2019_07_20_034826_create_products_table.php** - If Product model is removed
- **2020_11_10_141511_create_types_table.php** - If Type model is removed

---

## 📁 CONTROLLERS (app/Http/Controllers/)

### ✅ KEEP (Currently Used):
- Auth/* (All authentication controllers)
- CaseController.php
- CourtController.php
- DashboardController.php
- JudgeController.php
- PSController.php
- SubcatController.php
- UserController.php
- RoleController.php
- SettingsController.php
- welcome.php (Used for finalprint)
- DistrictController.php
- TehsilController.php
- PoliceStationController.php
- ChallanController.php
- FirController.php
- AutocompleteController.php
- PrintController.php

### ❌ REMOVE (Unused or Demo):
- **HomeControllerold.php** - Old version, replaced by DashboardController
- **extra.php** - Appears to be unused
- **Controllers.rar** - Compressed file, should not be in codebase
- **AiapplicationController.php** - Demo/template code
- **AuthenticationController.php** - Check if used (might be duplicate of Auth/*)
- **ChartController.php** - Demo/template code
- **ComponentpageController.php** - Demo/template code
- **FormsController.php** - Demo/template code
- **InvoiceController.php** - Demo/template code
- **TableController.php** - Demo/template code
- **UsersController.php** - Check if duplicate of UserController
- **ProductController.php** - If products feature not needed
- **ProductAjaxController.php** - If products feature not needed
- **StatusController.php** - Check if used

---

## 📁 VIEWS (resources/views/)

### ✅ KEEP (Currently Used):
- layout/* (All layout files)
- components/* (All component files)
- cases/index.blade.php
- cases/create.blade.php
- cases/edit.blade.php
- cases/show.blade.php
- cases/excases.blade.php
- cases/search.blade.php
- courts/index.blade.php
- judges/index.blade.php
- ps/index.blade.php
- subcats/index.blade.php
- users/* (If user management is used)
- roles/* (If role management is used)
- settings/company.blade.php
- districts/*, tehsils/*, police_stations/* (If used)
- challan/*, fir/* (If used)
- auth/* (All authentication views)
- home.blade.php
- finalprint.blade.php
- welcome.blade.php (If used)

### ❌ REMOVE (Unused/Demo/Extra):

#### Cases Views:
- cases/index1.blade.php
- cases/index2.blade.php
- cases/index3.blade.php
- cases/indx.blade.php
- cases/extra.blade.php
- cases/extra1.blade.php
- cases/extra2.blade.php
- cases/extra5.blade.php

#### Courts Views:
- courts/extra.blade.php
- courts/extra1.blade.php
- courts/extra2.blade.php
- courts/create.blade.php (If not using create route)
- courts/edit.blade.php (If not using edit route)
- courts/show.blade.php (If not using show route)

#### Judges Views:
- judges/extra.blade.php
- judges/extra1.blade.php
- judges/extra2.blade.php
- judges/create.blade.php (If not using create route)
- judges/edit.blade.php (If not using edit route)
- judges/show.blade.php (If not using show route)

#### PS Views:
- ps/extra.blade.php
- ps/extra1.blade.php
- ps/extra2.blade.php
- ps/create.blade.php (If not using create route)
- ps/edit.blade.php (If not using edit route)
- ps/show.blade.php (If not using show route)

#### Demo/Template Views (Remove if not needed):
- **aiapplication/** (Entire folder - AI demo)
- **componentspage/** (Entire folder - Component demos)
- **forms/** (Entire folder - Form demos)
- **invoice/** (Entire folder - Invoice demos)
- **table/** (Entire folder - Table demos)
- **chart/** (Entire folder - Chart demos)
- **dashboard/index2.blade.php, index3.blade.php, index4.blade.php, index5.blade.php** (Demo dashboards)
- **dashboard/wallet.blade.php** (If not used)

#### Standalone Unused Views:
- cases.blade.php
- chatEmpty.blade.php
- chatMessage.blade.php
- chatProfile.blade.php
- email.blade.php
- error.blade.php
- extra.blade.php
- faq.blade.php
- gallery.blade.php
- homeold.blade.php
- import.blade.php
- index.blade.php
- kanban.blade.php
- my.blade.php
- pricing.blade.php
- printstudent.blade.php
- productAjax.blade.php
- products/** (If products feature not needed)
- qr.blade.php
- students.blade.php
- tehsils.blade.php
- termsCondition.blade.php
- veiwDetails.blade.php
- webcam.blade.php
- widgets.blade.php

---

## 📁 ROUTES (routes/web.php)

### ❌ REMOVE/COMMENT OUT (Demo Routes):
- AI Application routes (lines ~232-262)
- Component page routes (lines ~263-296)
- Forms routes (lines ~301-309)
- Invoice routes (lines ~311-319)
- Table routes (lines ~336-340)
- Dashboard index2, index3 routes (if not used)
- Products routes (if products feature not needed)

---

## 🗑️ QUICK CLEANUP COMMANDS

### Create a backup first:
```bash
# Create backup directory
mkdir -p backup_$(date +%Y%m%d)
```

### Remove unused case views:
```bash
rm resources/views/cases/index1.blade.php
rm resources/views/cases/index2.blade.php
rm resources/views/cases/index3.blade.php
rm resources/views/cases/indx.blade.php
rm resources/views/cases/extra.blade.php
rm resources/views/cases/extra1.blade.php
rm resources/views/cases/extra2.blade.php
rm resources/views/cases/extra5.blade.php
```

### Remove unused extra views:
```bash
rm resources/views/courts/extra*.blade.php
rm resources/views/judges/extra*.blade.php
rm resources/views/ps/extra*.blade.php
```

### Remove demo folders:
```bash
rm -rf resources/views/aiapplication
rm -rf resources/views/componentspage
rm -rf resources/views/forms
rm -rf resources/views/invoice
rm -rf resources/views/table
rm -rf resources/views/chart
```

### Remove unused controllers:
```bash
rm app/Http/Controllers/HomeControllerold.php
rm app/Http/Controllers/extra.php
rm app/Http/Controllers/Controllers.rar
```

### Remove old migration:
```bash
rm database/migrations/2014_10_12_000000_create_users_table.php
```

---

## 📝 NOTES

1. **Test thoroughly** after removing files
2. **Keep a backup** before deletion
3. **Review routes** to ensure no broken links
4. **Check for hardcoded paths** in code that might reference deleted files
5. **Update .gitignore** if needed after cleanup

---

## ✅ VERIFICATION CHECKLIST

After cleanup, verify:
- [ ] Application still runs
- [ ] All routes work
- [ ] No broken links in views
- [ ] Database migrations still work
- [ ] No missing model errors
- [ ] Authentication still works
- [ ] Main features (Cases, Courts, Judges, PS) still work

---

**Last Updated:** $(date)
**Review Status:** Pending User Approval

