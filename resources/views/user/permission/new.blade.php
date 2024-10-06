<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Create Permission</span>
                        <div>
                            <button type="submit" form="form-add-permission" data-bs-toggle="tooltip" title="Save" class="btn btn-primary btn-sm me-2" aria-label="Save">
                                <i class="fas fa-save"></i> Submit
                            </button>
                            <a href="{{ route('admin.permissions.index') }}" data-bs-toggle="tooltip" title="Back" class="btn btn-light btn-sm" aria-label="Back">
                                <i class="fas fa-reply"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-add-permission" action="{{ route('admin.permissions.store') }}" method="post">
                            @csrf
                            <fieldset>
                                <div class="row mb-3 required">
                                    <label for="input-permission-name" class="col-sm-2 col-form-label">Permission Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Permission" id="input-permission-name" class="form-control">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>