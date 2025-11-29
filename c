[1mdiff --git a/app/Http/Controllers/admin/ContactController.php b/app/Http/Controllers/admin/ContactController.php[m
[1mindex 414f80e..33b1a9a 100644[m
[1m--- a/app/Http/Controllers/admin/ContactController.php[m
[1m+++ b/app/Http/Controllers/admin/ContactController.php[m
[36m@@ -8,6 +8,6 @@[m
 class ContactController extends Controller[m
 {[m
     public function index(){[m
[31m-        return json_encode('hello');[m
[32m+[m[32m        return view('admin.dashboard');[m
     }[m
 }[m
[1mdiff --git a/git status b/git status[m
[1mnew file mode 100644[m
[1mindex 0000000..e02b2a4[m
[1m--- /dev/null[m
[1m+++ b/git status[m	
[36m@@ -0,0 +1,13 @@[m
[32m+[m[32m[1mdiff --git a/app/Http/Controllers/admin/ContactController.php b/app/Http/Controllers/admin/ContactController.php[m[m
[32m+[m[32m[1mindex 4e627ae..4811387 100644[m[m
[32m+[m[32m[1m--- a/app/Http/Controllers/admin/ContactController.php[m[m
[32m+[m[32m[1m+++ b/app/Http/Controllers/admin/ContactController.php[m[m
[32m+[m[32m[36m@@ -7,5 +7,7 @@[m[m
[32m+[m[32m [m[m
[32m+[m[32m class ContactController extends Controller[m[m
[32m+[m[32m {[m[m
[32m+[m[32m[31m-    //[m[m
[32m+[m[32m[32m+[m[32m    public function index(){[m[m
[32m+[m[32m[32m+[m[m
[32m+[m[32m[32m+[m[32m    }[m[m
[32m+[m[32m }[m[m
