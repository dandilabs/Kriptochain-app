@extends('adminlte::page')
@section('title', 'Kelola Users')

@section('content')
    <h1 class="mb-4"><i class="fas fa-users-cog"></i> Daftar User</h1>
    @if (session('success'))
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> {{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th><i class="fas fa-hashtag"></i></th>
                <th><i class="fas fa-user"></i> Nama</th>
                <th><i class="fas fa-envelope"></i> Email</th>
                <th><i class="fas fa-gem"></i> Membership</th>
                <th><i class="fas fa-calendar-alt"></i> Expired</th>
                <th><i class="fas fa-money-bill-wave"></i> Status Bayar</th>
                <th><i class="fas fa-user-shield"></i> Role</th>
                <th><i class="fas fa-clock"></i> Daftar</th>
                <th><i class="fas fa-tools"></i> Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        @if ($u->membership_type == 'VIP')
                            <span class="badge bg-warning text-dark"><i class="fas fa-crown"></i>
                                {{ $u->membership_type }}</span>
                        @elseif ($u->membership_type == 'Premium')
                            <span class="badge bg-primary"><i class="fas fa-star"></i> {{ $u->membership_type }}</span>
                        @elseif ($u->membership_type)
                            <span class="badge bg-secondary">{{ $u->membership_type }}</span>
                        @else
                            <span class="badge bg-light text-dark">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($u->expired_at)
                            <i class="far fa-calendar-check"></i> {{ $u->expired_at }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if ($u->payment_status == 'Paid')
                            <span class="badge bg-success"><i class="fas fa-check"></i> Paid</span>
                        @elseif($u->payment_status == 'Pending')
                            <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half"></i> Pending</span>
                        @elseif($u->payment_status == 'Failed')
                            <span class="badge bg-danger"><i class="fas fa-times"></i> Failed</span>
                        @else
                            <span class="badge bg-secondary">{{ $u->payment_status ?? '-' }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($u->role == 'Admin')
                            <span class="badge bg-success"><i class="fas fa-user-shield"></i> Admin</span>
                        @elseif($u->role == 'Moderator')
                            <span class="badge bg-info text-dark"><i class="fas fa-user-edit"></i> Moderator</span>
                        @else
                            <span class="badge bg-secondary"><i class="fas fa-user"></i> User</span>
                        @endif
                    </td>
                    <td>
                        @if ($u->created_at)
                            <i class="fas fa-calendar-plus"></i> {{ $u->created_at->format('Y-m-d') }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-sm btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        @if (auth()->id() != $u->id)
                            <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST"
                                style="display:inline-block" onsubmit="return confirm('Yakin hapus user ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $users->links() }}
    </div>
@endsection
