<nav class=" bg-white shadow-md px-4 py-3 ">
        <div class=" flex  justify-between items-center ">
            <div class=" text-2xl text-green-900 hover:text-blue-500 cursor-pointer ">Quiz System</div>
            <div class=" space-x-4">
                <a class=" text-green-900 hover:text-blue-500" href="/">Home</a>
                <a class=" text-green-900 hover:text-blue-500" href="/admin-categories">Categories</a>
                @if(Session('user'))
                <a class=" text-green-900 hover:text-blue-500" href="">Welcome, {{Session('user')->name}}</a>
                <a class=" text-green-900 hover:text-blue-500" href="/user-logout">LogOut</a>
                @else
                <a class=" text-green-900 hover:text-blue-500" href="/user-login">Login</a>
                <a class=" text-green-900 hover:text-blue-500" href="/user-signup">SignUp</a>
                @endif
                <a class=" text-green-900 hover:text-blue-500" href="/admin-logout">Blog</a>
            </div>
        </div>
    </nav>