<section class="bg-green-50 py-12">
    <div class="mx-auto max-w-3xl px-4 text-center sm:px-6">
        <h2 class="text-xl font-bold text-gray-900 sm:text-2xl">Get the latest airport updates and Muslim travel tips</h2>
        <form action="{{ route('newsletter.store') }}" method="POST" class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-center">
            @csrf
            <input type="email" name="email" required placeholder="Enter your email address" class="w-full rounded-lg border border-salahport-border bg-white px-4 py-3 text-sm text-gray-900 placeholder:text-gray-400 focus:border-salahport-green focus:outline-none focus:ring-2 focus:ring-salahport-green/20 sm:max-w-sm">
            <button type="submit" class="shrink-0 rounded-lg bg-salahport-dark px-8 py-3 text-sm font-semibold text-white transition hover:bg-salahport-green">Subscribe</button>
        </form>
        @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</section>
