@extends('layouts.app')

@section('page-title', 'Profil Saya')

@push('styles')
<style>
  .profile-card{background:#fff;border:1px solid var(--gray2);border-radius:18px;padding:36px;max-width:640px;margin:0 auto;box-shadow:0 2px 6px #1c273305}
  .profile-top{display:flex;align-items:center;gap:18px;padding-bottom:24px;margin-bottom:24px;border-bottom:1px solid var(--gray2)}
  .profile-avatar{width:72px;height:72px;border-radius:50%;background:var(--forest);color:#fff;display:flex;align-items:center;justify-content:center;font-family:var(--ff-display);font-size:28px;font-weight:700;flex-shrink:0}
  .profile-name{font-family:var(--ff-display);font-size:24px;font-weight:700;color:var(--text);margin-bottom:4px;overflow-wrap:anywhere}
  .profile-email{font-size:14px;color:var(--text-muted);overflow-wrap:anywhere}
  .profile-badge{display:inline-flex;align-items:center;gap:5px;background:#F0E6D2;color:#8A6420;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px;margin-top:8px}
  .profile-rows{display:flex;flex-direction:column;gap:0}
  .profile-row{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:14px 0;border-bottom:1px solid var(--gray1)}
  .profile-row:last-child{border-bottom:none}
  .profile-row-label{display:flex;align-items:center;gap:10px;font-size:14px;color:var(--text-muted)}
  .profile-row-label i{font-size:18px;color:var(--sage)}
  .profile-row-value{font-size:14px;font-weight:600;color:var(--text);text-align:right}
  .profile-note{display:flex;gap:10px;background:#EAF1F8;border-radius:12px;padding:14px 16px;margin-top:24px;font-size:13px;color:var(--forest);line-height:1.5}
  .profile-note i{font-size:18px;flex-shrink:0;margin-top:1px}
  .profile-actions{display:flex;gap:12px;margin-top:28px}
  @media (max-width:480px){
    .profile-card{padding:24px 20px}
    .profile-top{flex-direction:column;text-align:center}
    .profile-row{flex-direction:column;align-items:flex-start;gap:4px}
    .profile-row-value{text-align:left}
    .profile-actions{flex-direction:column}
  }
</style>
@endpush

@section('content')
<div class="page-header">
  <div>
    <h1 class="page-h1">Profil Saya</h1>
    <p class="page-sub">Pastikan ini akun yang benar sebelum mengelola trip kamu.</p>
  </div>
</div>

<div class="profile-card">
  <div class="profile-top">
    <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
    <div>
      <div class="profile-name">{{ $user->name }}</div>
      <div class="profile-email">{{ $user->email }}</div>
      @if($user->is_admin)
        <div class="profile-badge"><i class="ti ti-shield-check"></i> Admin</div>
      @endif
    </div>
  </div>

  <div class="profile-rows">
    <div class="profile-row">
      <div class="profile-row-label"><i class="ti ti-id"></i> ID Akun</div>
      <div class="profile-row-value">#{{ $user->id }}</div>
    </div>
    <div class="profile-row">
      <div class="profile-row-label"><i class="ti ti-mail"></i> Email</div>
      <div class="profile-row-value">{{ $user->email }}</div>
    </div>
    <div class="profile-row">
      <div class="profile-row-label"><i class="ti ti-map-2"></i> Total Trip</div>
      <div class="profile-row-value">{{ $tripCount }} trip</div>
    </div>
    <div class="profile-row">
      <div class="profile-row-label"><i class="ti ti-calendar"></i> Bergabung sejak</div>
      <div class="profile-row-value">{{ $user->created_at->locale('id')->translatedFormat('d F Y') }}</div>
    </div>
  </div>

  <div class="profile-note">
    <i class="ti ti-info-circle"></i>
    <div>Halaman ini menampilkan akun yang sedang login saat ini. Kalau nama atau email di atas bukan milikmu, segera keluar dan masuk lagi dengan akun yang benar.</div>
  </div>

  <div class="profile-actions">
    <a href="{{ route('trips.index') }}" class="btn-outline"><i class="ti ti-arrow-left"></i> Kembali ke Dashboard</a>
    <form method="POST" action="{{ route('logout') }}" style="margin:0">
      @csrf
      <button type="submit" class="btn-outline" style="border-color:#F3BEC7;color:#B91C1C"><i class="ti ti-logout"></i> Keluar</button>
    </form>
  </div>
</div>
@endsection
