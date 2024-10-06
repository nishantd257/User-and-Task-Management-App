<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <x-auth-session-status :status="session('status')" />
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Edit Permission</span>
                        <div>
                            <button type="submit" form="form-permission-name" data-bs-toggle="tooltip" title="" class="btn btn-primary btn-sm" data-bs-original-title="Save" aria-label="Save"><i class="fas fa-save">Submit</i></button>
                            <a href="{{ route('admin.permissions.index') }}" data-bs-toggle="tooltip" title="" class="btn btn-light btn-sm" data-bs-original-title="Back" aria-label="Back"><i class="fas fa-reply">Back</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-permission-name" method="post" action="{{ route('admin.permissions.update',$permission->id)}}">
                            @csrf
                            @method('put')
                            <fieldset>
                                <div class="row mb-3 required">
                                    <label for="input-permission-name" class="col-sm-2 col-form-label">Permission Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ old('name',$permission->name) }}" placeholder="Enter Permission Name" id="input-permission-name" class="form-control">
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