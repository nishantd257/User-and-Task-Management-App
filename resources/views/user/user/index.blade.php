<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <x-auth-session-status :status="session('status')" />
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Manage Users</span>
                        @can('User create')
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Create New User</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @can('User access')
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="selected[]"
                                            value="{{ $user->id }}" class="form-check-input"
                                            data-id="{{ $user->id }}"></td>
                                    <td class="text-start">{{ $user->name }}</td>
                                    <td class="text-start">{{ $user->email }}</td>
                                    @foreach ($user->roles as $role)
                                    <td class="text-start">{{ $role->name }}</td>
                                    @endforeach
                                    <td
                                        class="text-end d-grid gap-2 d-md-flex justify-content-md-end">
                                        @can('User edit')
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        @endcan
                                        @can('User delete')
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                @endcan

                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom JS -->
    <script>
        function confirmDeletion() {
            return confirm('Are you sure you want to delete this permission?');
        }
    </script>
</x-app-layout>
