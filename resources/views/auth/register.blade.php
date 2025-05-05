<x-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf
      
        <h2>Register for an Account</h2>
      
        <label for="first_name">First name:</label>
        <input 
          type="text"
          name="first_name"
          required
          value="{{old('name')}}"
        >

        <label for="last_name">Last name:</label>
        <input 
          type="text"
          name="last_name"
          required
          value="{{old('name')}}"
        >

        <label for="email">Email:</label>
        <input 
          type="email"
          name="email"
          required
          value="{{old('email')}}"
        >
      
        <label for="birth_date">Email:</label>
        <input 
          type="date"+
          name="birth_date"
          required
          value="{{old('email')}}"
        >

        <label for="password">Password:</label>
        <input 
          type="password"
          name="password"
          required
        >
      
        <label for="password_confirmation">Confirm password:</label>
        <input 
          type="password"
          name="password_confirmation"
          required
        >

        {{$errors}}
        <button type="submit" class="btn mt-4">Register</button>
        
    </form>
</x-layout>