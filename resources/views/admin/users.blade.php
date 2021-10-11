<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border:2px solid black;
            border-collapse: collapse;
            width:70%;
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
            
            <div class="container">
                <h1 class="mt-3 text-center">All Users List</h1><br>
                <table class="mt-10 text-center" style="margin:auto">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>

                        @if ($data->usertype=="0")
                        <td><a class="btn btn-danger" href="{{ url('/deleteuser',$data->id) }}">Delete</a></td>
                        @else
                        <td><a class="btn btn-success">Not Allowed</a></td>
                        @endif
                    </tr>    
                    @endforeach
                    


                </table>
            </div>

        </div>
        
        @includeIf('admin.adminscript')
      </body>
    </html>

</body>
</html>