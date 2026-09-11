@extends('layouts.app')
@section('title','Dashboard')
@section('page-title','Dashboard')

@push('styles')
<style>
  .hero{position:relative;background:linear-gradient(rgba(10,26,46,.55),rgba(10,26,46,.55)),url('https://i2.wp.com/blog.tripcetera.com/id/wp-content/uploads/2020/10/Danau-Toba-edited.jpg') center/cover no-repeat;border-radius:24px;padding:36px 40px;margin-bottom:28px;color:#fff;overflow:hidden}
  .hero::after{content:'';position:absolute;inset:0;background:radial-gradient(circle at 88% 12%,rgba(203,163,93,.28),transparent 45%);pointer-events:none}
  .hero-tag{position:relative;z-index:1;display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.15);font-size:12px;padding:5px 14px;border-radius:20px;margin-bottom:14px}
  .hero h1{position:relative;z-index:1;font-family:var(--ff-display);font-size:28px;font-weight:700;margin-bottom:8px}
  .hero p{position:relative;z-index:1;color:rgba(255,255,255,.75);margin-bottom:22px;font-size:15px}
  .hero .btn-primary{position:relative;z-index:1}
  .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:28px}
  .stat-card{position:relative;background:#fff;border-radius:14px;border:1px solid var(--gray2);padding:16px;display:flex;align-items:center;gap:14px;box-shadow:0 2px 8px rgba(22,50,79,.05);overflow:hidden;transition:transform .18s,box-shadow .18s}
  .stat-card:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(22,50,79,.1)}
  .stat-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
  .si-g{background:#E8F5EE;color:var(--forest)}
  .si-t{background:#FDF0EB;color:var(--terra)}
  .si-d{background:#FEF8EC;color:var(--gold)}
  .si-s{background:#EEF5F2;color:var(--sage)}
  .stat-val{font-size:20px;font-weight:700;font-family:var(--ff-display);color:var(--text)}
  .stat-lbl{font-size:12px;color:var(--text-muted);margin-top:2px}
  .sec-title{font-family:var(--ff-display);font-size:20px;font-weight:600;color:var(--forest);margin-bottom:16px}
  .trips-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:16px}
  .trip-card{position:relative;background:#fff;border-radius:16px;border:1px solid var(--gray2);border-top:3px solid var(--gray2);padding:22px;box-shadow:0 2px 8px rgba(22,50,79,.05);transition:all .2s ease}
  .trip-card:hover{transform:translateY(-4px);box-shadow:0 14px 30px -10px rgba(22,50,79,.18)}
  .trip-card.st-upcoming{border-top-color:var(--gold)}
  .trip-card.st-planned{border-top-color:var(--sage)}
  .trip-card.st-done{border-top-color:#3B6D11}
  .tc-head{display:flex;align-items:flex-start;gap:12px;margin-bottom:16px}
  .tc-head h3{font-family:var(--ff-display);font-size:18px;font-weight:700;margin-bottom:6px;color:var(--text)}
  .tc-meta{display:flex;flex-wrap:wrap;gap:10px;font-size:12px;color:var(--text-muted)}
  .tc-meta span{display:flex;align-items:center;gap:4px}
  .badge{font-size:11px;font-weight:600;padding:3px 10px;border-radius:10px;white-space:nowrap}
  .badge.upcoming{background:#FDF3E4;color:#8A6420}
  .badge.planned{background:#EAF1F8;color:var(--sage)}
  .badge.done{background:#EAF3DE;color:#3B6D11}
  .tc-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin:14px 0}
  .tcs{background:var(--sand);border-radius:10px;padding:10px;text-align:center}
  .tcs-val{font-size:15px;font-weight:700;color:var(--forest)}
  .tcs-lbl{font-size:11px;color:var(--text-muted);margin-top:2px}
  .tc-actions{display:flex;gap:8px;flex-wrap:wrap}
  .empty{text-align:center;padding:64px 20px;background:#fff;border:1.5px dashed var(--gray3);border-radius:20px;color:var(--text-muted)}
  .empty .empty-icon{width:76px;height:76px;border-radius:50%;background:var(--sand);display:flex;align-items:center;justify-content:center;margin:0 auto 20px}
  .empty .empty-icon i{font-size:32px;color:var(--sage)}
  .empty h3{font-family:var(--ff-display);font-size:19px;margin-bottom:8px;color:var(--text);font-weight:700}
  .empty p{font-size:14px;margin-bottom:24px}

  @media (max-width: 900px){
    .stats-grid{grid-template-columns:repeat(2,1fr)}
    .hero{padding:26px 22px}
    .hero h1{font-size:22px}
  }
  @media (max-width: 480px){
    .stats-grid{grid-template-columns:1fr}
    .trips-grid{grid-template-columns:1fr}
    .tc-actions{flex-direction:column}
    .tc-actions form{width:100%}
    .tc-actions .btn-outline{width:100%;justify-content:center}
  }
</style>
@endpush

@section('content')
<div class="hero">
  <div class="hero-tag"><i class="ti ti-sun"></i> Selamat datang, {{ explode(' ', auth()->user()->name)[0] }}!</div>
  <h1>Perjalanan berikutnya, lebih terencana.</h1>
  <p>Atur destinasi, aktivitas, dan anggaran dalam satu tempat.</p>
  <a href="{{ route('trips.create') }}" class="btn-primary"><i class="ti ti-plus"></i> Buat Trip Baru</a>
</div>

<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-icon si-g"><i class="ti ti-map-2"></i></div>
    <div><div class="stat-val">{{ $trips->count() }}</div><div class="stat-lbl">Total Trip</div></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon si-t"><i class="ti ti-calendar-check"></i></div>
    <div><div class="stat-val">{{ $trips->where('status','upcoming')->count() }}</div><div class="stat-lbl">Upcoming</div></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon si-d"><i class="ti ti-wallet"></i></div>
    <div><div class="stat-val">Rp {{ number_format($trips->sum('budget')/1000000,1) }}jt</div><div class="stat-lbl">Total Budget</div></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon si-s"><i class="ti ti-trophy"></i></div>
    <div><div class="stat-val">{{ $trips->where('status','done')->count() }}</div><div class="stat-lbl">Selesai</div></div>
  </div>
</div>

<div class="section-heading"><h2 class="sec-title">Perjalananmu</h2><span class="section-count">{{ $trips->count() }} trip</span></div>

@if($trips->isEmpty())
<div class="empty">
  <div class="empty-icon"><i class="ti ti-map-off"></i></div>
  <h3>Belum ada trip</h3>
  <p>Yuk buat rencana perjalanan pertamamu!</p>
  <a href="{{ route('trips.create') }}" class="btn-primary"><i class="ti ti-plus"></i> Buat Trip Pertama</a>
</div>
@else
<div class="trips-grid">
  @foreach($trips as $trip)
  @php
    $days=\Carbon\Carbon::parse($trip->start_date)->diffInDays($trip->end_date)+1;
  @endphp
  <div class="trip-card st-{{ $trip->status }}">
    <div class="tc-head">
      <div style="flex:1">
        <h3>{{ $trip->trip_name }}</h3>
        <div class="tc-meta">
          <span><i class="ti ti-map-pin"></i> {{ $trip->destination }}</span>
          <span><i class="ti ti-calendar"></i> {{ \Carbon\Carbon::parse($trip->start_date)->format('d M Y') }}</span>
        </div>
      </div>
      <span class="badge {{ $trip->status }}">{{ ucfirst($trip->status) }}</span>
    </div>
    <div class="tc-stats">
      <div class="tcs">
        <div class="tcs-val">{{ $days }}</div>
        <div class="tcs-lbl">Hari</div>
      </div>
      <div class="tcs">
        <div class="tcs-val">{{ $trip->itineraries_count ?? $trip->itineraries()->count() }}</div>
        <div class="tcs-lbl">Aktivitas</div>
      </div>
      <div class="tcs">
        <div class="tcs-val">Rp {{ number_format($trip->budget/1000000,1) }}jt</div>
        <div class="tcs-lbl">Budget</div>
      </div>
    </div>
    <div class="tc-actions">
      <a href="{{ route('trips.show', $trip) }}" class="btn-primary" style="flex:1;text-align:center">
        Lihat perjalanan <i class="ti ti-arrow-up-right"></i>
      </a>
      <a href="{{ route('trips.edit', $trip) }}" class="btn-outline" aria-label="Edit {{ $trip->trip_name }}">
        <i class="ti ti-edit"></i>
      </a>
      <form action="{{ route('trips.destroy', $trip) }}" method="POST" onsubmit="return confirm('Hapus trip ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" aria-label="Hapus {{ $trip->trip_name }}" class="btn-outline" style="color:#dc2626;border-color:#fca5a5">
          <i class="ti ti-trash"></i>
        </button>
      </form>
    </div>
  </div>
  @endforeach
</div>
@endif

@endsection