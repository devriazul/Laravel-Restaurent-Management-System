<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @includeIf('admin.admincss')
    <style>
        table{
            border:2px solid black;
            border-collapse: collapse;
            width:100%;
        }

        th,td{
            border:2px solid black;
            padding:5px;
            text-align: center;
        }

        th{
            background-color: darkgreen;
            color: white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
        @includeIf('admin.navbar')

        <div class="container">

            <form action="{{ url('/search') }}" method="GET" class="mt-3">
                @csrf
                <input type="text" name="search" style="color:blue;" placeholder="Enter customer/food name" required>
                <input type="submit" value="Search" class="btn btn-success">
            </form>
            <br><br>
            
            <h2 class="text-center">Add To Cart Informations</h2>
            <table class="mb-3">
                <tr>
                    <th style="padding:30px;">Customer Name</th>
                    <th style="padding:30px;">Customer phone</th>
                    <th style="padding:30px;">Customer address</th>
                    <th style="padding:30px;">Food Name</th>
                    <th style="padding:30px;">Food Price</th>
                    <th style="padding:30px;">Food Quantity</th>
                    <th style="padding:30px;">Total Price</th>
                </tr>
                @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->foodname }}</td>
                        <td>{{ $data->price }}$</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->price * $data->quantity }}$</td>
                    </tr>
                @endforeach
            </table>
        </div>
        
    </div>
    
    @includeIf('admin.adminscript')
  </body>
</html>