
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Create Role</span>
                        <div>
                        <button type="submit" form="form-user-group" data-bs-toggle="tooltip" title=""
                                class="btn btn-primary" data-bs-original-title="Save" aria-label="Save">Submit<i
                                    class="fas fa-save"></i></button>
                            <a href="{{ route('admin.roles.index') }}" data-bs-toggle="tooltip" title="Back" class="btn btn-light btn-sm" aria-label="Back">
                                <i class="fas fa-reply"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-user-group" action="{{ route('admin.roles.store') }}" method="post">
                            @csrf
                            <div class="row mb-3 required">
                                <label for="input-name" class="col-sm-2 col-form-label">User Role Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" placeholder="User Group Name"
                                        value="{{ old('name') }}" id="input-name" class="form-control">
                                    <div id="error-name" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
