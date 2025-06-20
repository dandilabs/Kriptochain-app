@extends('adminlte::page')

@section('title', 'Histori Pembayaran Membership')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">Histori Pembayaran Membership</h1>
        {{-- <a href="{{ route('membership.subscribe') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Berlangganan Baru
        </a> --}}
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Transaksi Membership</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Cari...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 10%">No Invoice</th>
                                <th style="width: 15%">Paket</th>
                                <th style="width: 10%">Jumlah</th>
                                <th style="width: 12%">Status</th>
                                <th style="width: 12%">Tanggal</th>
                                <th style="width: 12%">Expired</th>
                                <th style="width: 14%">Bukti</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoices as $inv)
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">{{ $inv->invoice_number }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bold">{{ $inv->membershipPlan->name ?? '-' }}</span>
                                            <small class="text-muted">{{ $inv->membershipPlan->duration ?? '' }} bulan</small>
                                        </div>
                                    </td>
                                    <td class="text-right">Rp{{ number_format($inv->amount, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($inv->status == 'pending')
                                            <span class="badge badge-secondary">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        @elseif($inv->status == 'verifying')
                                            <span class="badge badge-warning">
                                                <i class="fas fa-spinner mr-1"></i> Verifying
                                            </span>
                                        @elseif($inv->status == 'paid')
                                            <span class="badge badge-success">
                                                <i class="fas fa-check-circle mr-1"></i> Paid
                                            </span>
                                        @elseif($inv->status == 'rejected' || $inv->status == 'failed')
                                            <span class="badge badge-danger">
                                                <i class="fas fa-times-circle mr-1"></i> {{ ucfirst($inv->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-block">{{ $inv->created_at->format('d M Y') }}</span>
                                        <small class="text-muted">{{ $inv->created_at->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        @if($inv->expired_at)
                                            @if($inv->expired_at->isPast())
                                                <span class="text-danger">
                                                    {{ $inv->expired_at->format('d M Y') }}
                                                </span>
                                            @else
                                                {{ $inv->expired_at->format('d M Y') }}
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($inv->proof)
                                            <a href="{{ asset('storage/' . $inv->proof) }}"
                                               target="_blank"
                                               class="btn btn-sm btn-outline-primary"
                                               data-toggle="tooltip"
                                               title="Lihat Bukti Pembayaran">
                                                <i class="fas fa-file-invoice"></i> Bukti
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($inv->status == 'pending')
                                            <a href="{{ route('membership.payment', $inv->id) }}"
                                               class="btn btn-sm btn-success"
                                               data-toggle="tooltip"
                                               title="Lanjutkan Pembayaran">
                                                <i class="fas fa-money-bill-wave"></i> Bayar
                                            </a>
                                        @elseif($inv->status == 'rejected')
                                            <button class="btn btn-sm btn-warning"
                                                    data-toggle="modal"
                                                    data-target="#rejectionReasonModal"
                                                    data-reason="{{ $inv->rejection_reason ?? 'Tidak ada alasan spesifik' }}">
                                                <i class="fas fa-info-circle"></i> Alasan
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-info"
                                                    data-toggle="modal"
                                                    data-target="#invoiceDetailModal"
                                                    data-invoice="{{ json_encode($inv) }}">
                                                <i class="fas fa-eye"></i> Detail
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-file-invoice-dollar fa-3x text-muted mb-2"></i>
                                            <h5 class="text-muted">Belum ada histori pembayaran</h5>
                                            <a href="{{ route('membership.subscribe') }}" class="btn btn-primary mt-2">
                                                Berlangganan Sekarang
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer clearfix">
                {{-- {{ $invoices->links() }} --}}
            </div>
        </div>
    </div>

    <!-- Rejection Reason Modal -->
    <div class="modal fade" id="rejectionReasonModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Alasan Penolakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="rejectionReasonText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    {{-- <a href="{{ route('membership.subscribe') }}" class="btn btn-primary">
                        <i class="fas fa-sync-alt mr-1"></i> Coba Lagi
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice Detail Modal -->
    <div class="modal fade" id="invoiceDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Detail Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="invoiceDetailContent">
                    <!-- Content will be loaded via JS -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-print mr-1"></i> Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        .thead-light th {
            background-color: #f8f9fa;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        .badge {
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.35em 0.65em;
        }
        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .empty-state {
            padding: 3rem 0;
            text-align: center;
        }
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Tooltip initialization
            $('[data-toggle="tooltip"]').tooltip();

            // Rejection reason modal
            $('#rejectionReasonModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var reason = button.data('reason');
                var modal = $(this);
                modal.find('#rejectionReasonText').text(reason);
            });

            // Invoice detail modal
            $('#invoiceDetailModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var invoice = button.data('invoice');
                var modal = $(this);

                // Format the invoice details
                var content = `
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informasi Invoice</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td width="40%">No Invoice</td>
                                    <td>${invoice.invoice_number}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>${new Date(invoice.created_at).toLocaleDateString('id-ID', {
                                        day: 'numeric',
                                        month: 'long',
                                        year: 'numeric',
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    })}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        ${invoice.status === 'paid' ?
                                            '<span class="badge badge-success"><i class="fas fa-check-circle mr-1"></i> Paid</span>' :
                                            '<span class="badge badge-secondary"><i class="fas fa-clock mr-1"></i> Pending</span>'}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Detail Pembayaran</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td width="40%">Paket</td>
                                    <td>${invoice.membership_plan?.name || '-'}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>Rp${new Intl.NumberFormat('id-ID').format(invoice.amount)}</td>
                                </tr>
                                <tr>
                                    <td>Metode</td>
                                    <td>${invoice.payment_method || '-'}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    ${invoice.proof ? `
                    <div class="mt-4">
                        <h6>Bukti Pembayaran</h6>
                        <div class="text-center">
                            <img src="/storage/${invoice.proof}" alt="Bukti Pembayaran" class="img-fluid rounded border" style="max-height: 300px;">
                        </div>
                    </div>
                    ` : ''}
                `;

                modal.find('#invoiceDetailContent').html(content);
            });
        });
    </script>
@endsection
