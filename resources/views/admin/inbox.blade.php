@extends('layouts.admin')
@section('content')

<style>
/* Reset et base */
* {
    box-sizing: border-box;
}

.container-flex {
    display: flex;
    min-height: 600px;
    background: #f3f4f6;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 35px -10px rgba(0,0,0,0.1);
}

/* LEFT SIDE - CARD STYLE */
.sidebar {
    width: 32%;
    background: #ffffff;
    border-right: 1px solid #e9ebf0;
    overflow-y: auto;
}

.sidebar-header {
    padding: 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    position: sticky;
    top: 0;
    z-index: 10;
}

.sidebar-header h4 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

.sidebar-header p {
    margin: 5px 0 0;
    font-size: 12px;
    opacity: 0.8;
}

.item {
    padding: 16px 20px;
    border-bottom: 1px solid #f0f1f3;
    cursor: pointer;
    transition: all 0.25s ease;
    position: relative;
}

.item:hover {
    background: #f9fafb;
    padding-left: 24px;
}

.active {
    background: linear-gradient(90deg, #f0f4ff 0%, #ffffff 100%);
    border-left: 4px solid #667eea;
}

.item strong {
    font-size: 15px;
    color: #1f2937;
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
}

.item small {
    font-size: 11px;
    color: #6b7280;
    display: block;
    line-height: 1.4;
}

.item .date-badge {
    font-size: 10px;
    color: #9ca3af;
    margin-top: 6px;
    display: inline-block;
    background: #f3f4f6;
    padding: 2px 8px;
    border-radius: 12px;
}

/* RIGHT SIDE - DETAILS */
.details {
    width: 68%;
    background: #ffffff;
    overflow-y: auto;
}

.details-content {
    padding: 32px 36px;
}

/* Header section */
.profile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    padding-bottom: 20px;
    border-bottom: 2px solid #eef2f6;
}

.profile-header h2 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.status-badge {
    background: #10b981;
    color: white;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

/* Table moderne */
.info-grid {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 10px;
}

.info-grid tr {
    transition: all 0.2s;
}

.info-grid td {
    padding: 14px 12px;
    border-bottom: 1px solid #f0f2f5;
    vertical-align: top;
}

.info-grid td:first-child {
    font-weight: 600;
    color: #4b5563;
    width: 180px;
    background-color: #fafbfc;
    border-radius: 12px 0 0 12px;
}

.info-grid td:last-child {
    color: #1f2937;
    border-radius: 0 12px 12px 0;
}

.info-grid tr:hover td {
    background-color: #fefce8;
}

.info-grid tr:hover td:first-child {
    background-color: #fefce8;
}

/* Empty state */
.empty-state {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 500px;
    flex-direction: column;
    text-align: center;
}

.empty-state .emoji {
    font-size: 64px;
    margin-bottom: 20px;
}

.empty-state p {
    font-size: 18px;
    color: #9ca3af;
    font-weight: 500;
}

/* Custom scrollbar */
.sidebar::-webkit-scrollbar,
.details::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track,
.details::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.sidebar::-webkit-scrollbar-thumb,
.details::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

.sidebar::-webkit-scrollbar-thumb:hover,
.details::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Responsive */
@media (max-width: 1024px) {
    .details-content {
        padding: 24px;
    }
    .info-grid td:first-child {
        width: 150px;
    }
}

@media (max-width: 768px) {
    .container-flex {
        flex-direction: column;
        border-radius: 16px;
    }
    
    .sidebar {
        width: 100%;
        max-height: 320px;
    }
    
    .details {
        width: 100%;
    }
    
    .details-content {
        padding: 20px;
    }
    
    .profile-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .profile-header h2 {
        font-size: 24px;
    }
    
    .info-grid td:first-child {
        width: 130px;
        padding: 10px 8px;
    }
    
    .info-grid td:last-child {
        padding: 10px 8px;
    }
}

@media (max-width: 480px) {
    .details-content {
        padding: 16px;
    }
    
    .info-grid td:first-child {
        width: 110px;
        font-size: 13px;
    }
    
    .info-grid td:last-child {
        font-size: 13px;
    }
    
    .profile-header h2 {
        font-size: 20px;
    }
}
</style>
<div class="container-flex">

    <!-- LEFT SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>📋 Demandes de visa</h4>
            <p>{{ $visas->count() }} dossiers</p>
        </div>
        
     @foreach($visas as $v)
    <a href="{{ route('admin.inbox', ['id' => $v->id]) }}" style="text-decoration:none; color:black;">
        <div class="item {{ isset($selected) && $selected && $selected->id == $v->id ? 'active' : '' }}">
            <strong>👤 {{ $v->nom }}</strong>
            <small>{{ $v->email }}</small>
            <span class="date-badge">
                {{ $v->created_at ? $v->created_at->format('d M Y') : '-' }}
            </span>
        </div>
    </a>
@endforeach
    </div>

    <!-- RIGHT DETAILS -->
    <div class="details">
        <div class="details-content">

            @if(isset($selected) && $selected)

                <div class="profile-header">
                    <h2>{{ $selected->nom }}</h2>
                </div>
                
                <table class="info-grid">
                    <tr><td>Email</td><td>{{ $selected->email ?? '-' }}</td></tr>
                    <tr><td>Téléphone</td><td>{{ $selected->telephone ?? '-' }}</td></tr>
                    <tr><td>Ville</td><td>{{ $selected->ville ?? '-' }}</td></tr>
                    <tr><td>Pays</td><td>{{ $selected->pays ?? '-' }}</td></tr>
                    <tr><td>Objectif</td><td>{{ $selected->objectif ?? '-' }}</td></tr>
                    <tr><td>Date prête</td><td>{{ $selected->date_ready ?? '-' }}</td></tr>
                    <tr><td>Date voyage</td><td>{{ $selected->date_voyage ?? '-' }}</td></tr>
                    <tr><td>Situation</td><td>{{ $selected->situation ?? '-' }}</td></tr>
                    <tr><td>Salaire</td><td>{{ $selected->salaire ?? 0 }} MAD</td></tr>
                    <tr><td>Banque</td><td>{{ $selected->banque ?? '-' }}</td></tr>
                    <tr><td>Solde</td><td>{{ $selected->solde_banque ?? 0 }} MAD</td></tr>
                    <tr><td>Visa avant</td><td>{{ $selected->visa_avant ?? '-' }}</td></tr>
                    <tr><td>Résultat</td><td>{{ $selected->resultat_visa ?? '-' }}</td></tr>
                    <tr><td>Pays visa</td><td>{{ $selected->pays_visa_precedente ?? '-' }}</td></tr>
                    <tr><td>Budget</td><td>{{ $selected->budget ?? 0 }} MAD</td></tr>
                    <tr><td>RDV</td><td>{{ $selected->rdv ?? '-' }}</td></tr>
                </table>

            @else
                <div class="empty-state">
                    <div class="emoji">👈</div>
                    <p>اختار طلب من اليسار</p>
                </div>
            @endif

        </div>
    </div>

</div>
@endsection