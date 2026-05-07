@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f5f7fb;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* Jotform Style Container */
    .jotform-container {
        min-height: 100vh;
        background: #f5f7fb;
        padding: 24px 32px;
    }

    /* Main Card */
    .jotform-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        border: 1px solid #e8ecf2;
    }

    /* Jotform Header */
    .jotform-header {
        background: white;
        padding: 20px 28px;
        border-bottom: 1px solid #e8ecf2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
    }

    .header-title h2 {
        font-size: 20px;
        font-weight: 600;
        color: #1a1f36;
        margin: 0 0 4px 0;
    }

    .header-title p {
        font-size: 13px;
        color: #6b7280;
        margin: 0;
    }

    /* Jotform Buttons */
    .jotform-btn-primary {
        background: #0d6efd;
        border: none;
        padding: 10px 20px;
        border-radius: 40px;
        color: white;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .jotform-btn-primary:hover {
        background: #0b5ed7;
        transform: translateY(-1px);
    }

    /* Filter Bar */
    .jotform-filter-bar {
        padding: 16px 28px;
        background: white;
        border-bottom: 1px solid #e8ecf2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }

    .search-wrapper {
        position: relative;
        flex: 1;
        max-width: 320px;
    }

    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 14px;
    }

    .jotform-search {
        width: 100%;
        padding: 10px 14px 10px 38px;
        border: 1px solid #d1d5db;
        border-radius: 40px;
        font-size: 14px;
        outline: none;
        transition: all 0.2s;
        background: white;
    }

    .jotform-search:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
    }

    /* Stats Badge */
    .stats-badge {
        background: #f3f4f6;
        padding: 6px 14px;
        border-radius: 40px;
        font-size: 13px;
        color: #4b5563;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .stats-number {
        font-weight: 700;
        color: #0d6efd;
        font-size: 16px;
    }

    /* Table Styles */
    .jotform-table-wrapper {
        overflow-x: auto;
        background: white;
    }

    table.dataTable {
        width: 100% !important;
        margin: 0 !important;
        border-collapse: collapse !important;
    }

    table.dataTable thead th {
        background: #f9fafb;
        border-bottom: 1px solid #e8ecf2 !important;
        padding: 14px 12px !important;
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    table.dataTable tbody td {
        padding: 12px 12px !important;
        border-bottom: 1px solid #f0f2f5 !important;
        font-size: 13px;
        color: #1f2937;
        white-space: nowrap;
    }

    table.dataTable tbody tr:hover {
        background: #fafbfc;
    }

    /* Badges */
    .badge-country {
        background: #e8f0fe;
        color: #1a73e8;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 500;
        display: inline-block;
    }

    .badge-goal {
        background: #fef3e8;
        color: #e67e22;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 500;
        display: inline-block;
    }

    .badge-visa {
        background: #e6f7e6;
        color: #2e7d32;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 500;
        display: inline-block;
    }

    .badge-rdv {
        background: #fff3e0;
        color: #ed6c02;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 500;
        display: inline-block;
    }

    /* DataTables Overrides */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        padding: 16px 28px;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 6px 12px;
        margin: 0 6px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 8px;
        margin: 0 2px;
        padding: 6px 12px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #0d6efd;
        border-color: #0d6efd;
        color: white !important;
    }

    .dt-buttons {
        padding: 16px 28px;
    }

    .dt-button {
        background: #f3f4f6 !important;
        border: 1px solid #e5e7eb !important;
        color: #374151 !important;
        border-radius: 40px !important;
        padding: 8px 18px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
    }

    .dt-button:hover {
        background: #e5e7eb !important;
    }

    /* Responsive */
  /* ================= RESPONSIVE MOBILE ================= */

@media (max-width: 768px) {

    .jotform-container {
        padding: 10px;
    }

    .jotform-card {
        border-radius: 14px;
    }

    /* Header */
    .jotform-header {
        padding: 16px;
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
    }

    .header-title h2 {
        font-size: 17px;
        line-height: 1.4;
    }

    .jotform-btn-primary {
        width: 100%;
        justify-content: center;
        padding: 12px;
        font-size: 14px;
    }

    /* Filter */
    .jotform-filter-bar {
        padding: 14px 16px;
        flex-direction: column;
        align-items: stretch;
    }

    .search-wrapper {
        max-width: 100%;
        width: 100%;
    }

    .jotform-search {
        font-size: 14px;
        padding: 11px 14px 11px 38px;
    }

    .stats-badge {
        width: 100%;
        justify-content: center;
        text-align: center;
        padding: 10px;
    }

    /* Table */
    .jotform-table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table.dataTable {
        min-width: 1200px;
    }

    table.dataTable thead th {
        font-size: 11px !important;
        padding: 10px 8px !important;
    }

    table.dataTable tbody td {
        font-size: 12px !important;
        padding: 10px 8px !important;
    }

    /* Pagination */
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate,
    .dataTables_wrapper .dataTables_length,
    .dt-buttons {
        padding: 12px 16px !important;
        text-align: center;
    }

    .dataTables_wrapper .dataTables_paginate {
        overflow-x: auto;
        white-space: nowrap;
    }

    .dt-button {
        width: 100%;
        margin-top: 10px !important;
    }

    /* Badges */
    .badge-country,
    .badge-goal,
    .badge-visa,
    .badge-rdv {
        font-size: 10px;
        padding: 4px 8px;
    }
}
</style>

<div class="jotform-container">
    <div class="jotform-card">
        
        <!-- Header -->
        <div class="jotform-header">
            <div class="header-title">
                <h2>📋 Tableau des demandes de visa Schengen</h2>
            </div>
            <button class="jotform-btn-primary" id="excelExportBtn">
                📥 Exporter vers Excel
            </button>
        </div>
        
        <!-- Filter Bar -->
        <div class="jotform-filter-bar">
            <div class="search-wrapper">
                <span class="search-icon">🔍</span>
                <input type="text"
                       id="customSearch"
                       class="jotform-search"
                       placeholder="Rechercher...">
            </div>
            <div class="stats-badge">
                <span>📊 Total demandes</span>
                <span class="stats-number">{{ count($visas) }}</span>
            </div>
        </div>
        
        <!-- Table -->
        <div class="jotform-table-wrapper">
            <table id="visaTable" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date insc.</th>
                        <th>Nom complet</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Objectif</th>
                        <th>Date prête</th>
                        <th>Date voyage</th>
                        <th>Situation</th>
                        <th>Salaire</th>
                        <th>Banque</th>
                        <th>Solde</th>
                        <th>Visa avant</th>
                        <th>Résultat visa</th>
                        <th>Pays visa préc.</th>
                        <th>Budget</th>
                        <th>RDV</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visas as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->created_at ? $v->created_at->format('d M Y') : '-' }}</td>
                        <td>{{ $v->nom }}</td>
                        <td>{{ $v->telephone }}</td>
                        <td>{{ $v->email }}</td>
                        <td>{{ $v->ville }}</td>
                        <td><span class="badge-country">{{ $v->pays }}</span></td>
                        <td><span class="badge-goal">{{ $v->objectif }}</span></td>
                        <td>{{ $v->date_ready ?? '-' }}</td>
                        <td>{{ $v->date_voyage ?? '-' }}</td>
                        <td>{{ $v->situation ?? '-' }}</td>
                        <td>{{ $v->salaire ?? '0' }} MAD</td>
                        <td>{{ $v->banque ?? '-' }}</td>
                        <td>{{ $v->solde_banque ?? '0' }} MAD</td>
                        <td>
                            @if($v->visa_avant)
                                <span class="badge-visa">{{ $v->visa_avant }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($v->resultat_visa)
                                <span class="badge-visa">{{ $v->resultat_visa }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $v->pays_visa_precedente ?? '-' }}</td>
                        <td>{{ $v->budget ?? '0' }} MAD</td>
                        <td>
                            @if($v->rdv)
                                <span class="badge-rdv">{{ $v->rdv }}</span>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
        </div>
        
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script>
    let table = $('#visaTable').DataTable({
        scrollX: true,
        pageLength: 10,
        dom: 'Brtip',
        buttons: ['excel'],
        ordering: true,
        language: {
            search: "Rechercher:",
            lengthMenu: "Afficher _MENU_ entrées",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent"
            }
        }
    });

    // Custom search
    $('#customSearch').on('keyup', function () {
        table.search(this.value).draw();
    });

    // Custom export button
    $('#excelExportBtn').on('click', function() {
        table.button('.buttons-excel').trigger();
    });
</script>

@endsection