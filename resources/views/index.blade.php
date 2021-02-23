<!doctype html>
<html>
 <body>
   <form method='post' action='/save'>

     <!-- Message -->
     @if(Session::has('message'))
       <p >{{ Session::get('message') }}</p>
     @endif

     <!-- Add/List records -->
     <table border='1' style='border-collapse: collapse;'>
       <tr>
         <th>Username</th>
         <th>Name</th>
         <th>Email</th>
         <th></th>
       </tr>
       <tr>
         <td colspan="4">{{ csrf_field() }}</td>
       </tr>
       <!-- Add -->
       <tr>
         <td><input type='text' name='username'></td>
         <td><input type='text' name='name'></td>
         <td><input type='email' name='email'></td>
         <td><input type='submit' name='submit' value='Add'></td>
       </tr>

       <!-- List -->
       @foreach($userData['data'] as $user)
       <tr>
         <td>{{ $user->username }}</td>
         <td>{{ $user->name }}</td>
         <td>{{ $user->email }}</td>
         <td><a href='/{{ $user->id }}'>Update</a> <a href='/deleteUser/{{ $user->id }}'>Delete</a></td>
       </tr>
       @endforeach
    </table>
  </form>

  <!-- Edit -->
  @if($userData['edit'])
  <form method='post' action='/save'>
   <table>
     <tr>
       <td colspan='2'><h1>Edit record</h1></td>
     </tr>
     <tr>
       <td colspan="2">{{ csrf_field() }}</td>
     </tr>
     <tr>
       <td>Username</td>
       <td><input type='text' name='uname' readonly value='{{ $userData["editData"]->username }}' ></td>
     </tr>
     <tr>
       <td>Name</td>
       <td><input type='text' name='name' value='{{ $userData["editData"]->name }}'></td>
     </tr> 
     <tr>
       <td>Email</td>
       <td><input type='email' name='email' value='{{ $userData["editData"]->email }}' ></td>
     </tr>
     <tr>
       <td>&nbsp;<input type='hidden' value='{{ $userData["edit"] }}' name='editid'></td>
       <td><input type='submit' name='submit' value='Submit'></td>
     </tr>
   </table>
  </form>
  @endif
 
 </body>
</html>