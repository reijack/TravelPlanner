<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Daftar – Travel Planner</title>
  <link rel="icon" href="{{ asset('images/logo-icon.png') }}"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"/>
  <style>
    *{box-sizing:border-box;margin:0;padding:0}
    html{overflow-x:hidden}
    :root{--forest:#16324F;--forest-lt:#2C5A88;--gold:#CBA35D;--sage:#5C7A99;
          --cream:#F6F8FB;--gray2:#E3E9F0;--gray3:#C6D0DB;
          --text:#1C2733;--text-muted:#5B6774;
          --ff-display:'Playfair Display',serif;
          --ff-body:'DM Sans',sans-serif}
    body{font-family:var(--ff-body);min-height:100vh;display:flex;overflow-x:hidden}

    .brand-panel{flex:1;position:relative;overflow:hidden;padding:56px;display:flex;flex-direction:column;justify-content:space-between;min-width:0;
      background:
        radial-gradient(circle at 88% 6%, rgba(203,163,93,.32), transparent 38%),
        radial-gradient(circle at 6% 96%, rgba(20,150,136,.30), transparent 42%),
        radial-gradient(circle at 60% 42%, rgba(255,255,255,.05), transparent 55%),
        linear-gradient(160deg,var(--forest) 0%,#0F2439 100%)}
    .brand-panel::before{content:'';position:absolute;inset:0;
      background-image:radial-gradient(rgba(255,255,255,.10) 1.4px,transparent 1.4px);
      background-size:26px 26px;
      -webkit-mask-image:radial-gradient(circle at 55% 42%,#000 5%,transparent 68%);
      mask-image:radial-gradient(circle at 55% 42%,#000 5%,transparent 68%);
      pointer-events:none}
    .brand-panel::after{content:'';position:absolute;width:540px;height:540px;border-radius:50%;
      border:1px solid rgba(255,255,255,.07);top:38%;left:-140px;transform:translateY(-50%);pointer-events:none}
    .bp-route{position:absolute;top:108px;right:-30px;width:380px;max-width:52%;opacity:.9;pointer-events:none;z-index:0}
    .bp-logo{display:flex;align-items:center;gap:10px;position:relative;z-index:1}
    .bp-logo-icon{width:40px;height:40px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
    .bp-logo-icon img{width:100%;height:100%;object-fit:contain}
    .bp-logo-name{font-family:var(--ff-display);font-size:20px;color:#fff;font-weight:700}
    .bp-mid{position:relative;z-index:1;max-width:400px}
    .bp-mid h1{font-family:var(--ff-display);font-size:clamp(26px,2.6vw,34px);color:#fff;line-height:1.25;font-weight:700;margin-bottom:16px}
    .bp-mid p{color:rgba(255,255,255,.68);font-size:15px;line-height:1.6;margin-bottom:32px}
    .bp-feat{display:flex;align-items:flex-start;gap:12px;margin-bottom:16px}
    .bp-feat i{width:30px;height:30px;border-radius:8px;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:15px;flex-shrink:0}
    .bp-feat span{font-size:13.5px;color:rgba(255,255,255,.85);padding-top:5px}
    .bp-foot{position:relative;z-index:1;font-size:12.5px;color:rgba(255,255,255,.4)}

    .form-panel{width:480px;flex-shrink:0;background:#fff;display:flex;align-items:center;justify-content:center;padding:24px}
    .wrap{width:100%;max-width:360px}
    .mobile-logo{display:none;margin-bottom:28px;justify-content:center}
    .mobile-logo img{height:34px;width:auto}
    h1.form-title{font-family:var(--ff-display);font-size:24px;color:var(--text);margin-bottom:6px;font-weight:700}
    .sub{font-size:14px;color:var(--text-muted);margin-bottom:24px}
    label{display:block;font-size:13px;font-weight:600;color:var(--text);margin-bottom:6px}
    .field{position:relative;margin-bottom:14px}
    .field i{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--gray3);font-size:16px}
    input{width:100%;background:#F7F9FB;border:1px solid var(--gray2);
          border-radius:9px;padding:11px 14px 11px 38px;font-size:14px;
          font-family:var(--ff-body);color:var(--text);transition:all .18s}
    input:focus{outline:none;border-color:var(--sage);background:#fff;
                box-shadow:0 0 0 3px rgba(92,122,153,.15)}
    .err{color:#B91C1C;font-size:12px;margin-top:-8px;margin-bottom:10px}
    .btn{width:100%;padding:12px;background:var(--forest);color:#fff;
         border:none;border-radius:9px;font-size:15px;font-weight:700;
         font-family:var(--ff-body);cursor:pointer;transition:background .18s;margin-top:6px;display:flex;align-items:center;justify-content:center;gap:8px}
    .btn:hover{background:var(--forest-lt)}
    .footer{text-align:center;margin-top:20px;font-size:13.5px;color:var(--text-muted)}
    .footer a{color:var(--forest);text-decoration:none;font-weight:700}

    @media(max-width:900px){
      body{flex-direction:column}
      .brand-panel{display:none}
      .form-panel{width:100%;background:var(--cream);min-height:100vh}
      .mobile-logo{display:flex}
    }
  </style>
</head>
<body>

<div class="brand-panel">
  <svg class="bp-route" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M40 70 C 140 40, 160 140, 90 190 S 60 300, 190 320 S 300 260, 330 190"
          stroke="rgba(255,255,255,.35)" stroke-width="2" stroke-dasharray="2 10" stroke-linecap="round"/>
    <circle cx="40" cy="70" r="5" fill="#fff" fill-opacity=".55"/>
    <circle cx="90" cy="190" r="5" fill="#fff" fill-opacity=".4"/>
    <circle cx="190" cy="320" r="5" fill="#fff" fill-opacity=".4"/>
    <circle cx="330" cy="190" r="9" fill="#CBA35D"/>
    <circle cx="330" cy="190" r="16" stroke="#CBA35D" stroke-opacity=".45" stroke-width="1.5"/>
    <path d="M330 175 L336 190 L330 198 L324 190 Z" fill="#0F2439" fill-opacity=".4"/>
  </svg>
  <div class="bp-logo">
    <div class="bp-logo-icon"><img src="{{ asset('images/logo-icon.png') }}" alt="Travel Planner"/></div>
    <span class="bp-logo-name">Travel Planner</span>
  </div>
  <div class="bp-mid">
    <h1>Gabung, dan rapikan trip berikutnya.</h1>
    <p>Gratis untuk dicoba — langsung bisa dipakai setelah daftar, tanpa kartu kredit.</p>
    <div class="bp-feat"><i class="ti ti-map-2"></i><span>Itinerary harian tersimpan rapi per trip</span></div>
    <div class="bp-feat"><i class="ti ti-scale"></i><span>Bandingkan harga hotel & transportasi</span></div>
    <div class="bp-feat"><i class="ti ti-checklist"></i><span>Checklist & budget dalam satu tempat</span></div>
  </div>
  <div class="bp-foot">© {{ date('Y') }} Travel Planner</div>
</div>

<div class="form-panel">
  <div class="wrap">
    <div class="mobile-logo">
      <img src="{{ asset('images/logo.png') }}" alt="Travel Planner"/>
    </div>
    <h1 class="form-title">Buat akun baru</h1>
    <p class="sub">Mulai rencanakan perjalananmu</p>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <label>Nama</label>
      <div class="field">
        <i class="ti ti-user"></i>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama lengkap" required/>
      </div>
      @error('name') <p class="err">{{ $message }}</p> @enderror

      <label>Email</label>
      <div class="field">
        <i class="ti ti-mail"></i>
        <input type="text" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required/>
      </div>
      @error('email') <p class="err">{{ $message }}</p> @enderror

      <label>Password</label>
      <div class="field">
        <i class="ti ti-lock"></i>
        <input type="password" name="password" placeholder="••••••••" required/>
      </div>
      @error('password') <p class="err">{{ $message }}</p> @enderror

      <label>Konfirmasi Password</label>
      <div class="field">
        <i class="ti ti-lock-check"></i>
        <input type="password" name="password_confirmation" placeholder="••••••••" required/>
      </div>

      <button class="btn" type="submit">Daftar <i class="ti ti-arrow-right"></i></button>
    </form>
    <p class="footer">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
  </div>
</div>

<script src="{{ asset('js/refined.js') }}" defer></script>
</body>
</html>
