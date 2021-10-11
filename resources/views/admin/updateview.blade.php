<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            width: 70%;
            margin:auto;
        }
    </style>
</head>
<body>
    
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

            <div class="container-fluid" style="">
                <h2 class="text-center">Update Food Information</h2>
                <form action="{{ url('/update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control" type="text" name="title" value="{{ $data->title }}">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input class="form-control" type="number" name="price" value="{{ $data->price }}">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input class="form-control" type="text" name="description" value="{{ $data->description }}">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Old Image</label>
                        <img src="/foodimage/{{$data->image}}" style="height: 100px; weight: 100px;" alt="No Image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Image</label><br>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-success" type="submit" value="Save" style="color: black">
                    </div>
                </form>
            </div>
        </div>
        
        @includeIf('admin.adminscript')
      </body>
    </html>


</body>
</html>
