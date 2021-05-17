@if(session()->has("success"))
  <h3>{{ session("success") }}</h3>
@endif

<form action="save-student" method="post">

  @csrf {{-- same as above {{csrf_field}} --}}
<p>
  Name: <input type="text" name="name" value="{{ old("name") }}" placeholder="Enter Name">
  <br/>
  {{-- this is used to display the error for each field instead of placing it at the top --}}
  {{-- @error("name")
    <span class="error">{{ $message }}</span>
  @enderror --}}
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