<x-layout :title="'Login'">
  <div class="w-full max-w-md">
    <div class="bg-white/95 backdrop-blur rounded-2xl shadow-xl p-8">
      <h1 class="text-2xl font-semibold text-center mb-6">Login</h1>

      @if ($errors->any())
        <div class="mb-4 rounded-md bg-red-50 p-3 text-sm text-red-700">
          {{ $errors->first() }}
        </div>
      @endif

      @if (session('success'))
        <div class="mb-4 rounded-md bg-emerald-50 p-3 text-sm text-emerald-700">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
        @csrf
        <div>
          <label class="block text-sm mb-1">Email</label>
          <input type="email" name="email" required
                 class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary2">
        </div>
        <div>
          <label class="block text-sm mb-1">Password</label>
          <input type="password" name="password" required
                 class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary2">
        </div>
        <button
          class="w-full rounded-lg bg-gradient-to-r from-primary1 to-primary2 text-white font-medium py-2.5 shadow hover:opacity-95 transition">
          Login
        </button>
      </form>
    </div>
  </div>
</x-layout>
