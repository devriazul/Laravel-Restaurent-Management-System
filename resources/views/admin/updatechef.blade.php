<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    @includeIf('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
        @includeIf('admin.navbar')
        <div class="container">
            <h2 class="text-center">Update Chef Information</h2><br>
            <form style="width: 70%; margin: auto;" action="{{ url('/updatefoodchef',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Speciality</label>
                    <input class="form-control" type="text" name="speciality" value="{{ $data->speciality }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Old Image</label>
                    <img style="height:60px;" src="chefimage/{{ $data->image }}" alt="No image">
                </div>
                <div class="mb-3">
                    <label class="form-label">New Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" value="Save">
                </div>
            </form>

        </div>
        
    </div>
    
    @includeIf('admin.adminscript')
  </body>
</html>