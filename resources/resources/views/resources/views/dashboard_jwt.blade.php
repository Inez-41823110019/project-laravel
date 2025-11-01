<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard (JWT)</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: { extend: { colors: { primary1: '#6a11cb', primary2: '#2575fc' } } }
    }
  </script>
</head>
<body class="min-h-screen bg-slate-100">
  <!-- Topbar -->
  <div class="bg-gradient-to-r from-primary1 to-primary2 text-white">
    <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
      <div class="text-lg font-semibold">Dashboard</div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="rounded-lg px-4 py-2 bg-white/20 hover:bg-white/30 transition">Logout</button>
      </form>
    </div>
  </div>

  <div class="max-w-4xl mx-auto px-4 py-6">
    @if (session('success'))
      <div class="mb-4 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-2 text-center">
        {{ session('success') }}
      </div>
    @endif

    <div class="bg-white rounded-2xl shadow-xl p-6">
      <h1 class="text-3xl font-extrabold mb-1">Selamat Datang! 👋</h1>
      <p class="text-slate-600 mb-6">Anda berhasil login ke sistem.</p>

      <!-- Kartu User Info -->
      <div class="rounded-2xl bg-gradient-to-r from-primary1 to-primary2 text-white p-5 shadow mb-6">
        <div class="font-semibold text-lg">🔐 User Information (JWT Authenticated)</div>
        <div class="opacity-90 mt-1">
          <div>Username: <span class="font-semibold">{{ $user?->name ?? '-' }}</span></div>
          <div>User ID: <span class="font-semibold">{{ $user?->id ?? '-' }}</span></div>
        </div>
      </div>

      <!-- Kartu Token Info -->
      <div class="rounded-2xl border border-slate-200 bg-white shadow p-5">
        <div class="font-semibold text-slate-800 text-lg mb-3">🔑 JWT Token Information</div>

        @if ($token)
          <div class="flex items-start gap-3">
            <div class="w-1 bg-emerald-500 rounded"></div>
            <div class="flex-1">
              <div class="text-sm text-slate-600 mb-2"><span class="font-semibold">Token:</span></div>
              <pre id="jwtText" class="text-[12px] leading-5 bg-slate-50 border border-slate-200 rounded-lg p-3 overflow-x-auto break-all whitespace-pre-wrap">{{ $token }}</pre>
              <button
                class="mt-3 px-3 py-2 rounded-md text-white bg-slate-800 hover:bg-slate-700 text-sm"
                onclick="navigator.clipboard.writeText(document.getElementById('jwtText').innerText); this.innerText='Copied!'; setTimeout(()=>this.innerText='Copy Token',1500);">
                Copy Token
              </button>
            </div>
          </div>
        @else
          <div class="text-slate-500">Token tidak ditemukan di sesi. Silakan login ulang.</div>
        @endif
      </div>
    </div>
  </div>
</body>
</html>
