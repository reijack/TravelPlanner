<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Reset Password – Travel Planner</title>
  <link rel="icon" href="{{ asset('images/logo-icon.png') }}"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"/>
  <style>
    *{box-sizing:border-box;margin:0;padding:0}
    :root{--forest:#16324F;--forest-lt:#2C5A88;--gold:#CBA35D;--sage:#5C7A99;
          --cream:#F6F8FB;--gray2:#E3E9F0;--gray3:#C6D0DB;
          --text:#1C2733;--text-muted:#5B6774;
          --ff-display:'Playfair Display',serif;
          --ff-body:'DM Sans',sans-serif}
    body{font-family:var(--ff-body);background:var(--cream);
         min-height:100vh;display:flex;align-items:center;justify-content:center}
    .wrap{width:100%;max-width:420px;padding:24px}
    .logo{display:flex;margin-bottom:32px;justify-content:center}
    .logo img{height:38px;width:auto}
    .card{background:#fff;border-radius:16px;border:1px solid var(--gray2);
          padding:2rem 2.25rem;box-shadow:0 2px 16px rgba(0,0,0,.06)}
    h1{font-family:var(--ff-display);font-size:22px;color:var(--forest);
       margin-bottom:6px;font-weight:700}
    .sub{font-size:14px;color:var(--text-muted);margin-bottom:24px}
    label{display:block;font-size:13px;font-weight:600;color:var(--text);margin-bottom:6px}
    .field{position:relative;margin-bottom:16px}
    .field i{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--gray3);font-size:16px}
    input{width:100%;background:#F7F9FB;border:1px solid var(--gray2);
          border-radius:9px;padding:11px 14px 11px 38px;font-size:14px;
          font-family:var(--ff-body);color:var(--text);transition:all .18s}
    input:focus{outline:none;border-color:var(--sage);background:#fff;
                box-shadow:0 0 0 3px rgba(92,122,153,.15)}
    input[readonly]{color:var(--text-muted);cursor:not-allowed;background:var(--gray2)}
    .err{display:flex;align-items:center;gap:8px;color:#B91C1C;font-size:13px;margin-bottom:16px;background:#FEF2F2;padding:10px 14px;border-radius:9px}
    .btn{width:100%;padding:12px;background:var(--forest);color:#fff;
         border:none;border-radius:9px;font-size:15px;font-weight:700;
          font-family:var(--ff-body);cursor:pointer;transition:background .18s;display:flex;align-items:center;justify-content:center;gap:8px;margin-top:6px}
    .btn:hover{background:var(--forest-lt)}
  </style>
  <link rel="stylesheet" href="{{ asset('css/refined.css') }}"/>
</head>
<body class="auth-page">
<div class="wrap">
  <div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Travel Planner"/>
  </div>
  <div class="card">
    <h1>Buat Password Baru</h1>
    <p class="sub">Masukkan password baru untuk akun kamu</p>

    @if($errors->any())
      <p class="err"><i class="ti ti-alert-circle"></i> {{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <label>Email</label>
      <div class="field">
        <i class="ti ti-mail"></i>
        <input type="email" name="email" value="{{ old('email', $email) }}" required readonly/>
      </div>

      <label>Password Baru</label>
      <div class="field">
        <i class="ti ti-lock"></i>
        <input type="password" name="password" placeholder="Minimal 8 karakter" required/>
      </div>

      <label>Konfirmasi Password Baru</label>
      <div class="field">
        <i class="ti ti-lock-check"></i>
        <input type="password" name="password_confirmation" required/>
      </div>

      <button class="btn" type="submit">Reset Password <i class="ti ti-arrow-right"></i></button>
    </form>
  </div>
</div>
<script src="{{ asset('js/refined.js') }}" defer></script>
</body>
</html>