<h1>Please, Fill the form</h1>

{{-- This is used to make the errors visible. --}}

@if ($errors->any())
  <ul>
  @foreach($errors->all() as $error)

  <li>{{ $error }}</li>

  @endforeach

  </ul>
      
  @endif

<form action="add-student" method="post">

    @csrf {{-- same as above {{csrf_field}} --}}
  <p>
    Name: <input type="text" name="name" value="{{ old("name") }}" placeholder="Enter Name">
    <br/>
    {{-- this is used to display the error for each field instead of placing it at the top --}}
    @error("name")
      <span class="error">{{ $message }}</span>
    @enderror
  </p>
  <p>
    Email: <input type="email" name="email" value="{{ old("email") }}" placeholder="Enter Email">
  </p>
  <p>
    Mobile: <input type="text" name="mobile" value="{{ old("mobile") }}" placeholder="Enter Mobile">
  </p>
  <p>
    <button type="submit">Submit</button>
  </p>

</form>