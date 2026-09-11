<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Login – Travel Planner</title>
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

    /* LEFT BRAND PANEL */
    .brand-panel{flex:1;background:linear-gradient(155deg,var(--forest) 0%,#0F2439 100%);position:relative;overflow:hidden;padding:56px;display:flex;flex-direction:column;justify-content:space-between;min-width:0}
    .brand-panel::before{content:'';position:absolute;width:420px;height:420px;border-radius:50%;background:radial-gradient(circle,rgba(203,163,93,.18),transparent 70%);top:-140px;right:-120px}
    .brand-panel::after{content:'';position:absolute;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.06),transparent 70%);bottom:-100px;left:-80px}
    .bp-logo{display:flex;align-items:center;gap:10px;position:relative;z-index:1}
    .bp-logo-icon{width:40px;height:40px;background:var(--gold);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:19px}
    .bp-logo-name{font-family:var(--ff-display);font-size:20px;color:#fff;font-weight:700}
    .bp-mid{position:relative;z-index:1;max-width:400px}
    .bp-mid h1{font-family:var(--ff-display);font-size:clamp(26px,2.6vw,34px);color:#fff;line-height:1.25;font-weight:700;margin-bottom:16px}
    .bp-mid p{color:rgba(255,255,255,.68);font-size:15px;line-height:1.6;margin-bottom:32px}
    .bp-feat{display:flex;align-items:flex-start;gap:12px;margin-bottom:16px}
    .bp-feat i{width:30px;height:30px;border-radius:8px;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:15px;flex-shrink:0}
    .bp-feat span{font-size:13.5px;color:rgba(255,255,255,.85);padding-top:5px}
    .bp-foot{position:relative;z-index:1;font-size:12.5px;color:rgba(255,255,255,.4)}

    /* RIGHT FORM PANEL */
    .form-panel{width:480px;flex-shrink:0;background:#fff;display:flex;align-items:center;justify-content:center;padding:24px}
    .wrap{width:100%;max-width:360px}
    .mobile-logo{display:none;align-items:center;gap:10px;margin-bottom:32px;justify-content:center}
    .mobile-logo .logo-icon{width:38px;height:38px;background:var(--gold);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px}
    .mobile-logo .logo-name{font-family:var(--ff-display);font-size:19px;color:var(--forest);font-weight:700}
    h1.form-title{font-family:var(--ff-display);font-size:24px;color:var(--text);margin-bottom:6px;font-weight:700}
    .sub{font-size:14px;color:var(--text-muted);margin-bottom:28px}
    label{display:block;font-size:13px;font-weight:600;color:var(--text);margin-bottom:6px}
    .field{position:relative;margin-bottom:16px}
    .field i{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--gray3);font-size:16px}
    input{width:100%;background:#F7F9FB;border:1px solid var(--gray2);
          border-radius:9px;padding:11px 14px 11px 38px;font-size:14px;
          font-family:var(--ff-body);color:var(--text);transition:all .18s}
    input:focus{outline:none;border-color:var(--sage);background:#fff;
                box-shadow:0 0 0 3px rgba(92,122,153,.15)}
    .err{color:#B91C1C;font-size:12px;margin-top:6px}
    .forgot-link{text-align:right;margin:-6px 0 18px}
    .forgot-link a{font-size:13px;color:var(--forest);text-decoration:none;font-weight:600}
    .forgot-link a:hover{text-decoration:underline}
    .btn{width:100%;padding:12px;background:var(--forest);color:#fff;
         border:none;border-radius:9px;font-size:15px;font-weight:700;
          font-family:var(--ff-body);cursor:pointer;transition:background .18s;display:flex;align-items:center;justify-content:center;gap:8px}
    .btn:hover{background:var(--forest-lt)}
    .footer{text-align:center;margin-top:22px;font-size:13.5px;color:var(--text-muted)}
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
  <div class="bp-logo">
    <div class="bp-logo-icon">🧭</div>
    <span class="bp-logo-name">Travel Planner</span>
  </div>
  <div class="bp-mid">
    <h1>Rencanakan perjalananmu, tanpa ribet.</h1>
    <p>Masuk untuk melanjutkan itinerary, budget, dan checklist trip kamu.</p>
    <div class="bp-feat"><i class="ti ti-map-2"></i><span>Itinerary harian tersimpan rapi per trip</span></div>
    <div class="bp-feat"><i class="ti ti-scale"></i><span>Bandingkan harga hotel & transportasi</span></div>
    <div class="bp-feat"><i class="ti ti-checklist"></i><span>Checklist & budget dalam satu tempat</span></div>
  </div>
  <div class="bp-foot">© {{ date('Y') }} Travel Planner</div>
</div>

<div class="form-panel">
  <div class="wrap">
    <div class="mobile-logo">
      <div class="logo-icon">🧭</div>
      <span class="logo-name">Travel Planner</span>
    </div>
    <h1 class="form-title">Selamat datang kembali</h1>
    <p class="sub">Masuk untuk melanjutkan perjalananmu</p>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <label>Email</label>
      <div class="field">
        <i class="ti ti-mail"></i>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required/>
      </div>
      @error('email') <p class="err">{{ $message }}</p> @enderror

      <label>Password</label>
      <div class="field">
        <i class="ti ti-lock"></i>
        <input type="password" name="password" placeholder="••••••••" required/>
      </div>
      @error('password') <p class="err">{{ $message }}</p> @enderror

      <div class="forgot-link">
        <a href="{{ route('password.request') }}">Lupa password?</a>
      </div>

      <button class="btn" type="submit">Masuk <i class="ti ti-arrow-right"></i></button>
    </form>
    <p class="footer">Belum punya akun?
      <a href="{{ route('register') }}">Daftar sekarang</a></p>
  </div>
</div>

<script src="{{ asset('js/refined.js') }}" defer></script>
</body>
</html>
