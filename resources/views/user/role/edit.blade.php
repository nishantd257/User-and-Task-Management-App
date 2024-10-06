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
                        <span>Edit Role Permission</span>
                        <div>
                            <button type="submit" form="form-role-edit" data-bs-toggle="tooltip" title=""
                                class="btn btn-primary" data-bs-original-title="Save" aria-label="Save">Submit<i
                                    class="fas fa-save"></i></button>
                            <a href="{{ route('admin.roles.index') }}" data-bs-toggle="tooltip" title=""
                                class="btn btn-light" data-bs-original-title="Back" aria-label="Back"><i
                                    class="fas fa-reply">Back</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="flex flex-col p-2 bg-slate-100">
                            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                                <form id="form-role-edit" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="sm:col-span-6">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Role name
                                        </label>
                                        <div class="mt-1">
                                            <input type="text" id="name" name="name" value="{{ $role->name }}"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                        </div>
                                        @error('name')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-6 pt-5">
                                        <button type="submit"
                                            class="btn btn-danger">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-6 p-2 bg-slate-100">
                            <h2 class="block text-sm font-medium text-gray-700 p-3">Role Permissions</h2>
                            <div class="col-sm-10">
                                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                    @csrf
                                    <div id="user-group-permission" class="form-control"
                                        style="height: 100px; overflow: auto;">
                                        <table class="table table-borderless table-striped">
                                            <div class="flex space-x-2 mt-4 p-2">
                                                @if ($role->permissions)
                                                @foreach ($role->permissions as $role_permission)
                                                <form
                                                    class="px-4 py-2 text-white rounded-md"
                                                    method="POST"
                                                    action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                                    onsubmit="return confirm('Are you sure you want to remove?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">{{ $role_permission->name }}</button>
                                                </form>
                                                @endforeach
                                                @endif
                                            </div>
                                        </table>
                                    </div>
                                    <div class="max-w-xl mt-6">
                                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                            @csrf
                                            <div class="sm:col-span-6">
                                                <label for="permission"
                                                    class="block text-sm font-medium text-gray-700">Permission</label>
                                                <select id="permission" name="permission" autocomplete="permission-name"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}">{{ $permission->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('name')
                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                            @enderror

                                            <div class="sm:col-span-6 pt-5">
                                                <button type="submit"
                                                    class="btn btn-primary">Assign</button>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
