<x-layout :title="'Dashboard'">
  <div class="w-full max-w-3xl">
    <!-- Top bar -->
    <div class="flex items-center justify-between mb-4">
      <span class="text-white/90 font-semibold text-lg">Dashboard</span>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="rounded-lg px-4 py-2 bg-white/20 text-white backdrop-blur hover:bg-white/30 transition">
          Logout
        </button>
      </form>
    </div>

    <!-- Alert sukses -->
    @if (session('success'))
      <div class="mb-4 rounded-md bg-emerald-50 p-3 text-sm text-emerald-700 text-center">
        {{ session('success') }}
      </div>
    @else
      <div class="mb-4 rounded-md bg-emerald-50 p-3 text-sm text-emerald-700 text-center">
        Login berhasil!
      </div>
    @endif

    <!-- Kartu ucapan -->
    <div class="bg-white/95 backdrop-blur rounded-2xl shadow-xl p-6">
      <h2 class="text-2xl font-extrabold mb-2">Selamat Datang! 👋</h2>
      <p class="text-slate-600 mb-6">Anda berhasil login ke sistem.</p>

      <div class="rounded-xl p-5 bg-gradient-to-r from-primary1 to-primary2 text-white shadow-inner">
        <div class="font-semibold opacity-90">Informasi User</div>
        <div class="mt-1 text-white/90">
          Username: <span class="font-semibold">{{ session('user_name') }}</span>
        </div>
        <div class="text-white/90">
          User ID: <span class="font-semibold">{{ session('user_id') }}</span>
        </div>
      </div>
    </div>
  </div>
</x-layout>
