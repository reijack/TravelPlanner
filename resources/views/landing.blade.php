<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Travel Planner — Rencanakan Perjalananmu Tanpa Ribet</title>
  <meta name="description" content="Atur itinerary, budget, checklist, galeri, dan perbandingan harga hotel & transportasi dalam satu tempat. Gratis untuk dicoba."/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"/>
  <link rel="stylesheet" href="{{ asset('css/refined.css') }}"/>
  <style>
    *{box-sizing:border-box;margin:0;padding:0}
    html{overflow-x:hidden;width:100%;scroll-behavior:smooth}
    :root{
      --forest:#16324F;--forest-lt:#2C5A88;--sage:#5C7A99;--terra:#B9793A;--gold:#CBA35D;
      --cream:#F6F8FB;--sand:#EFF3F8;--gray2:#E3E9F0;--gray3:#C6D0DB;
      --text:#1C2733;--text-muted:#5B6774;
      --ff-display:'Playfair Display',serif;--ff-body:'DM Sans',sans-serif;
    }
    body{font-family:var(--ff-body);color:var(--text);background:var(--cream);overflow-x:hidden}
    .wrapper{max-width:1160px;margin:0 auto;padding:0 24px}
    a{text-decoration:none}

    /* NAV */
    .nav{position:sticky;top:0;z-index:50;background:rgba(246,248,251,.85);backdrop-filter:blur(10px);border-bottom:1px solid var(--gray2)}
    .nav-inner{max-width:1160px;margin:0 auto;padding:16px 24px;display:flex;align-items:center;justify-content:space-between}
    .nav-logo{display:flex;align-items:center;gap:10px}
    .nav-logo-icon{width:36px;height:36px;background:var(--forest);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px}
    .nav-logo-name{font-family:var(--ff-display);font-size:19px;font-weight:700;color:var(--forest)}
    .nav-actions{display:flex;align-items:center;gap:10px}
    .btn{display:inline-flex;align-items:center;gap:7px;padding:10px 20px;border-radius:10px;font-size:14px;font-weight:600;font-family:var(--ff-body);border:1px solid transparent;cursor:pointer;transition:all .18s}
    .btn-nav-ghost{color:var(--text);background:transparent}
    .btn-nav-ghost:hover{background:var(--sand)}
    .btn-solid{background:var(--forest);color:#fff}
    .btn-solid:hover{background:var(--forest-lt)}
    .btn-lg{padding:14px 28px;font-size:15px;border-radius:12px}

    /* HERO */
    .hero-sec{padding:64px 0 80px;display:grid;grid-template-columns:1.05fr .95fr;gap:56px;align-items:center}
    .hero-eyebrow{display:inline-flex;align-items:center;gap:7px;background:#EAF1F8;color:var(--forest);font-size:13px;font-weight:600;padding:6px 14px;border-radius:20px;margin-bottom:20px}
    .hero-sec h1{font-family:var(--ff-display);font-size:clamp(32px,4.4vw,50px);line-height:1.14;font-weight:700;color:var(--text);margin-bottom:20px;letter-spacing:-.01em}
    .hero-sec h1 em{font-style:normal;color:var(--forest)}
    .hero-sec p.lead{font-size:17px;color:var(--text-muted);line-height:1.65;margin-bottom:32px;max-width:480px}
    .hero-ctas{display:flex;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:28px}
    .hero-subnote{font-size:13px;color:var(--text-muted);display:flex;align-items:center;gap:6px}
    .hero-subnote i{color:var(--gold)}

    /* HERO MOCKUP */
    .mockup{position:relative}
    .mockup-card{background:#fff;border-radius:20px;border:1px solid var(--gray2);box-shadow:0 24px 60px -20px rgba(22,50,79,.25);overflow:hidden}
    .mockup-topbar{background:var(--forest);padding:16px 20px;display:flex;align-items:center;gap:8px}
    .mockup-dot{width:9px;height:9px;border-radius:50%;background:rgba(255,255,255,.35)}
    .mockup-body{padding:22px}
    .mockup-hero{background:linear-gradient(135deg,var(--forest),var(--sage));border-radius:14px;padding:18px;color:#fff;margin-bottom:16px}
    .mockup-hero .mh-tag{font-size:11px;opacity:.8;margin-bottom:6px}
    .mockup-hero .mh-title{font-family:var(--ff-display);font-size:17px;font-weight:700}
    .mockup-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:16px}
    .mockup-stat{background:var(--sand);border-radius:10px;padding:10px 12px}
    .mockup-stat .ms-val{font-size:16px;font-weight:700;color:var(--forest)}
    .mockup-stat .ms-lbl{font-size:10px;color:var(--text-muted)}
    .mockup-row{display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--gray2)}
    .mockup-row:last-child{border-bottom:none}
    .mockup-row-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0}
    .mockup-row-text{flex:1;min-width:0}
    .mockup-row-text .mr-t{font-size:12.5px;font-weight:600;color:var(--text)}
    .mockup-row-text .mr-s{font-size:11px;color:var(--text-muted)}
    .mockup-badge-float{position:absolute;background:#fff;border-radius:12px;border:1px solid var(--gray2);box-shadow:0 12px 30px -10px rgba(22,50,79,.3);padding:12px 16px;display:flex;align-items:center;gap:10px;font-size:12.5px;font-weight:600}
    .mockup-badge-float i{color:var(--gold);font-size:20px}
    .mb-1{top:-18px;right:-14px}
    .mb-2{bottom:-16px;left:-18px}

    /* FEATURES */
    .section{padding:76px 0}
    .section-head{text-align:center;max-width:620px;margin:0 auto 48px}
    .section-eyebrow{font-size:13px;font-weight:600;color:var(--forest);letter-spacing:.06em;text-transform:uppercase;margin-bottom:10px}
    .section-head h2{font-family:var(--ff-display);font-size:clamp(26px,3vw,34px);font-weight:700;margin-bottom:12px}
    .section-head p{color:var(--text-muted);font-size:15.5px;line-height:1.6}
    .feat-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
    .feat-card{background:#fff;border:1px solid var(--gray2);border-radius:18px;padding:28px;transition:transform .2s ease,box-shadow .2s ease}
    .feat-card:hover{transform:translateY(-4px);box-shadow:0 16px 34px -14px rgba(22,50,79,.18)}
    .feat-icon{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:16px}
    .fi-1{background:#EAF1F8;color:var(--forest)}
    .fi-2{background:#F2EBDC;color:#8A6420}
    .fi-3{background:#EFF3F8;color:var(--sage)}
    .fi-4{background:#F5EEE4;color:var(--terra)}
    .fi-5{background:#E9F5EE;color:#3B6D11}
    .fi-6{background:#EDEBF7;color:#534AB7}
    .feat-card h3{font-size:16.5px;font-weight:700;margin-bottom:8px;color:var(--text)}
    .feat-card p{font-size:13.5px;color:var(--text-muted);line-height:1.6}

    /* HOW IT WORKS */
    .how-sec{background:#fff;border-top:1px solid var(--gray2);border-bottom:1px solid var(--gray2)}
    .how-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:32px;position:relative}
    .how-step{text-align:center}
    .how-num{width:44px;height:44px;border-radius:50%;background:var(--forest);color:#fff;font-family:var(--ff-display);font-weight:700;font-size:18px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px}
    .how-step h3{font-size:16px;font-weight:700;margin-bottom:8px}
    .how-step p{font-size:13.5px;color:var(--text-muted);line-height:1.6;max-width:260px;margin:0 auto}

    /* CTA BANNER */
    .cta-banner{background:linear-gradient(135deg,var(--forest),#0F2439);border-radius:26px;padding:56px 48px;text-align:center;color:#fff;margin:0 24px}
    .cta-banner h2{font-family:var(--ff-display);font-size:clamp(24px,3.2vw,32px);font-weight:700;margin-bottom:12px}
    .cta-banner p{color:rgba(255,255,255,.72);font-size:15px;margin-bottom:28px}
    .cta-banner .btn-solid{background:#fff;color:var(--forest)}
    .cta-banner .btn-solid:hover{background:#EAF1F8}

    /* FOOTER */
    footer{padding:36px 0;text-align:center;font-size:13px;color:var(--text-muted)}

    @media(max-width:900px){
      .hero-sec{grid-template-columns:1fr;gap:48px;padding:40px 0 56px}
      .hero-sec p.lead{max-width:100%}
      .feat-grid{grid-template-columns:repeat(2,1fr)}
      .how-grid{grid-template-columns:1fr;gap:36px}
      .mockup{max-width:420px;margin:0 auto}
      .cta-banner{padding:44px 28px}
    }
    @media(max-width:560px){
      .nav-logo-name{display:none}
      .feat-grid{grid-template-columns:1fr}
      .section{padding:56px 0}
      .mockup-badge-float{display:none}
      .hero-ctas{flex-direction:column;align-items:stretch}
      .hero-ctas .btn{justify-content:center}
    }
    @media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}*{transition:none!important}}
  </style>
</head>
<body>

<nav class="nav">
  <div class="nav-inner">
    <div class="nav-logo">
      <div class="nav-logo-icon">🧭</div>
      <span class="nav-logo-name">Travel Planner</span>
    </div>
    <div class="nav-actions">
      <a href="{{ route('login') }}" class="btn btn-nav-ghost">Masuk</a>
      <a href="{{ route('register') }}" class="btn btn-solid">Daftar Gratis</a>
    </div>
  </div>
</nav>

<div class="wrapper">
  <section class="hero-sec">
    <div>
      <div class="hero-eyebrow"><i class="ti ti-sparkles"></i> Perencana perjalanan all-in-one</div>
      <h1>Rencanakan perjalananmu, <em>tanpa ribet catat-catat manual.</em></h1>
      <p class="lead">Itinerary, budget, checklist, galeri, sampai bandingin harga hotel & transportasi — semuanya rapi dalam satu tempat, bisa diakses dari HP maupun laptop.</p>
      <div class="hero-ctas">
        <a href="{{ route('register') }}" class="btn btn-solid btn-lg"><i class="ti ti-rocket"></i> Mulai Sekarang, Gratis</a>
        <a href="{{ route('login') }}" class="btn btn-nav-ghost btn-lg">Sudah punya akun? Masuk</a>
      </div>
      <div class="hero-subnote"><i class="ti ti-circle-check"></i> Tidak perlu kartu kredit — langsung bisa dipakai setelah daftar</div>
    </div>

    <div class="mockup">
      <div class="mockup-card">
        <div class="mockup-topbar">
          <div class="mockup-dot"></div><div class="mockup-dot"></div><div class="mockup-dot"></div>
        </div>
        <div class="mockup-body">
          <div class="mockup-hero">
            <div class="mh-tag">Trip Aktif</div>
            <div class="mh-title">Liburan ke Malang 🏔️</div>
          </div>
          <div class="mockup-stats">
            <div class="mockup-stat"><div class="ms-val">3</div><div class="ms-lbl">Hari</div></div>
            <div class="mockup-stat"><div class="ms-val">2</div><div class="ms-lbl">Orang</div></div>
            <div class="mockup-stat"><div class="ms-val">72%</div><div class="ms-lbl">Checklist</div></div>
          </div>
          <div class="mockup-row">
            <div class="mockup-row-dot" style="background:#185FA5"></div>
            <div class="mockup-row-text"><div class="mr-t">Coban Rondo</div><div class="mr-s">08:00 · Wisata Alam</div></div>
          </div>
          <div class="mockup-row">
            <div class="mockup-row-dot" style="background:#854F0B"></div>
            <div class="mockup-row-text"><div class="mr-t">Makan Bakso Malang</div><div class="mr-s">12:30 · Kuliner</div></div>
          </div>
          <div class="mockup-row">
            <div class="mockup-row-dot" style="background:#3B6D11"></div>
            <div class="mockup-row-text"><div class="mr-t">Hotel Santika</div><div class="mr-s">Rp 450.000/malam · Termurah</div></div>
          </div>
        </div>
      </div>
      <div class="mockup-badge-float mb-1"><i class="ti ti-scale"></i> Harga sudah dibandingkan</div>
      <div class="mockup-badge-float mb-2"><i class="ti ti-checklist"></i> 8/11 checklist selesai</div>
    </div>
  </section>
</div>

<section class="section" id="fitur">
  <div class="wrapper">
    <div class="section-head">
      <div class="section-eyebrow">Fitur</div>
      <h2>Semua yang kamu butuhkan buat siapin trip</h2>
      <p>Nggak perlu lagi catatan berserakan di notes HP, chat grup, atau spreadsheet terpisah-pisah.</p>
    </div>
    <div class="feat-grid">
      <div class="feat-card">
        <div class="feat-icon fi-1"><i class="ti ti-map-2"></i></div>
        <h3>Itinerary Harian</h3>
        <p>Susun aktivitas per hari lengkap dengan jam, lokasi, dan kategori — dari wisata alam sampai kuliner.</p>
      </div>
      <div class="feat-card">
        <div class="feat-icon fi-2"><i class="ti ti-wallet"></i></div>
        <h3>Kelola Budget</h3>
        <p>Bandingkan estimasi vs realisasi pengeluaran per kategori, biar liburan nggak jebol kantong.</p>
      </div>
      <div class="feat-card">
        <div class="feat-icon fi-3"><i class="ti ti-checklist"></i></div>
        <h3>Checklist Persiapan</h3>
        <p>Dari dokumen sampai perlengkapan, centang satu-satu biar nggak ada yang ketinggalan.</p>
      </div>
      <div class="feat-card">
        <div class="feat-icon fi-4"><i class="ti ti-scale"></i></div>
        <h3>Perbandingan Harga</h3>
        <p>Bandingkan beberapa pilihan hotel dan transportasi berdampingan, opsi termurah langsung ditandai.</p>
      </div>
      <div class="feat-card">
        <div class="feat-icon fi-5"><i class="ti ti-photo"></i></div>
        <h3>Galeri Kenangan</h3>
        <p>Simpan foto-foto perjalanan langsung di trip yang sama, nggak perlu bongkar galeri HP lagi.</p>
      </div>
      <div class="feat-card">
        <div class="feat-icon fi-6"><i class="ti ti-device-mobile"></i></div>
        <h3>Akses Kapan Saja</h3>
        <p>Tampilan menyesuaikan di HP maupun laptop, jadi rencana tetap bisa dicek walau lagi di jalan.</p>
      </div>
    </div>
  </div>
</section>

<section class="section how-sec">
  <div class="wrapper">
    <div class="section-head">
      <div class="section-eyebrow">Cara Kerja</div>
      <h2>Mulai dalam 3 langkah</h2>
    </div>
    <div class="how-grid">
      <div class="how-step">
        <div class="how-num">1</div>
        <h3>Buat akun</h3>
        <p>Daftar pakai email, langsung bisa dipakai — tanpa biaya, tanpa kartu kredit.</p>
      </div>
      <div class="how-step">
        <div class="how-num">2</div>
        <h3>Buat trip baru</h3>
        <p>Isi destinasi, tanggal, dan jumlah orang. Trip pertamamu siap dalam hitungan detik.</p>
      </div>
      <div class="how-step">
        <div class="how-num">3</div>
        <h3>Rencanakan semuanya</h3>
        <p>Tambah itinerary, atur budget, centang checklist, dan bandingkan harga — semua di satu halaman.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="cta-banner">
    <h2>Trip berikutnya, rencanakan dari sekarang.</h2>
    <p>Gratis untuk dicoba, kapan saja bisa mulai.</p>
    <a href="{{ route('register') }}" class="btn btn-solid btn-lg"><i class="ti ti-rocket"></i> Daftar Sekarang</a>
  </div>
</section>

<footer>
  <div class="wrapper">© {{ date('Y') }} Travel Planner. Dibuat untuk bantu rencanakan perjalananmu.</div>
</footer>

<script src="{{ asset('js/refined.js') }}" defer></script>
</body>
</html>
