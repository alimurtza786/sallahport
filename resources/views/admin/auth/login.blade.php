<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — SalahPort</title>
    @vite(['resources/css/app.css'])
</head>
<body class="flex min-h-screen items-center justify-center bg-salahport-dark">
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-salahport-heading">SalahPort Admin</h1>
            <p class="mt-2 text-sm text-gray-500">Sign in to manage content</p>
        </div>
        <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">
                @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20">
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-salahport-green focus:ring-salahport-green">
                Remember me
            </label>
            <button type="submit" class="w-full rounded-lg bg-salahport-green py-3 text-sm font-semibold text-white hover:bg-salahport-green-hover">Sign In</button>
        </form>
    </div>
</body>
</html>
