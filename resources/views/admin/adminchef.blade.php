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

        <div class="container-fluid" style="margin: auto;">
            <h2 class="text-center">Enter Chef's Information</h2><br>
            @if (session('msg'))
                <div class="alert alert-success w-75 m-auto">
                    {{ session('msg') }}
                </div><br>
            @endif
            <form style="width: 70%; margin: auto" action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                  @error('name')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              <div class="mb-3">
                  <label class="form-label">Speciality</label>
                  <input class="form-control @error('speciality') is-invalid @enderror" value="{{ old('speciality') }}" type="text" name="speciality" placeholder="Enter the speciality">
                  @error('speciality')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              <div class="mb-3">
                  <label class="form-label">Image</label>
                  <input class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="file" name="image">
                  @error('image')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror  
              </div>
              <div class="mb-3">
                  <input class="btn btn-success" type="submit" value="Save" style="color: black">
              </div>
            </form>

            <br><br><br>

            <div style="margin-bottom: 20px;">
              <h2 class="text-center">All Chef's Details</h2><br>
              <table class="table table-bordered text-center mb-3 w-75 m-auto">
                <tr>
                  <th style="padding: 30px;">Name</th>
                  <th style="padding: 30px;">Speciality</th>
                  <th>Images</th>
                  <th style="padding: 30px;">Actions</th>
                </tr>

                @foreach ($data as $data)
                  <tr align="center">
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->speciality }}</td>
                    <td>
                      <img style="height: 65px; width:65px;" src="chefimage/{{ $data->image }}" alt="No image">
                    </td>
                    <td>
                      <a href="{{ url('/updatechef',$data->id) }}" class="btn btn-success">Update</a>
                      <a href="{{ url('/deletechef',$data->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>  
                @endforeach
                
              </table>        
            </div>
        </div>
        


    </div>
    


    @includeIf('admin.adminscript')
  </body>
</html>