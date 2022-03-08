<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>data updated sucessfully</h1>
	    <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
	    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	        @csrf
	    </form>
</body>
</html>