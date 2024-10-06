<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <x-auth-session-status :status="session('status')" />
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Manage Roles</span>
                        @can('Role create')
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">Create New Role</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @can('Role access')
                                @foreach ($roles as $role)
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="selected[]"
                                            value="{{ $role->id }}" class="form-check-input" data-id="{{ $role->id }}"></td>
                                    <td class="text-start">{{ $role->name }}</td>
                                    <td class="d-flex">
                                        @can('Role edit')
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        @endcan
                                        @can('Role delete')
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDeletion();">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                @endcan
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $roles->links() }}
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
