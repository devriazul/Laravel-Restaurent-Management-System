<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @includeIf('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @includeIf('admin.navbar')
    </div>
    
    @includeIf('admin.adminscript')
  </body>
</html>