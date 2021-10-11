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
        table{
            border:2px solid black;
            border-collapse: collapse;
            /* width:100%; */
        }

        th,td{
            border:2px solid black;
            padding:5px;
            text-align: center;
        }

        th{
            background-color: darkgreen;
            color: white;
            height:30px;
        }
    </style>
</head>
<body>
    
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

            <div class="container-fluid" style="">
                <h2 class="text-center">Enter Food Information</h2><br>
                @if (session('msg'))
                    <div class="alert alert-success w-75 m-auto">
                        {{ session('msg') }}
                    </div><br>
                @endif
                <form action="{{ url('/uploadfood') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" placeholder="Write a Title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input  value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" type="number" name="price">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input  value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror"  type="file" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input  value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" type="text" name="description" placeholder="Write a Description">
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-success" type="submit" value="Save" style="color: black">
                    </div>
                </form>


                <br><br><br>
                <div class="mb-3 ml-3">
                    <h2 class="text-center">All Food's List</h2>
                    <table class="m-auto">
                        <tr class="text-center">
                            <th>Food Name</th>
                            <th>Food Price</th>
                            <th>Food Description</th>
                            <th>Food Image</th>
                            <th>Action</th>
                            <th>Action2</th>
                        </tr>

                        @foreach ($data as $data)
                        <tr class="text-center">
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->description }}</td>
                            <td><img style="height: 60px; width: 60px" src="/foodimage/{{ $data->image }}" alt="No Image"></td>
                            <td><a href="{{ url('/deletemenu',$data->id) }}" style="btn btn-success">Delete</a></td>
                            <td><a href="{{ url('/updateview',$data->id) }}" style="btn btn-success">Update</a></td>
                        </tr>    
                        @endforeach
                        
                    </table>
                </div>


            </div>

        </div>
        
        @includeIf('admin.adminscript')
      </body>
    </html>

</body>
</html>