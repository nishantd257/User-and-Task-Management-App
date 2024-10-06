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
                        <span>Edit Permission</span>
                        <div>
                            <button type="submit" form="form-customer" data-bs-toggle="tooltip" title="" class="btn btn-primary btn-sm" data-bs-original-title="Save" aria-label="Save"><i class="fas fa-save">Submit</i></button>
                            <a href="{{ route('admin.users.index') }}" data-bs-toggle="tooltip" title="" class="btn btn-light btn-sm" data-bs-original-title="Back" aria-label="Back"><i class="fas fa-reply">Back</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-customer" action="{{ route('admin.users.update', $user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <fieldset>
                                <legend>User Details</legend>
                                <div class="row mb-3 required">
                                    <label for="name" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            placeholder="Name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 required">
                                    <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email"
                                            value="{{ old('email', $user->email) }}" placeholder="E-Mail" id="email"
                                            class="form-control">
                                    </div>
                                </div>
                            </fieldset>
                            <h3 class="text-xl my-4 text-gray-600">Role</h3>
                            <div class="row mb-3 required">
                                @foreach ($roles as $role)
                                <label class="col-sm-2 col-form-label">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]"
                                        value="{{ $role->name }}"
                                        @if ($user->roles->contains('name', $role->name)) checked @endif>
                                    <span class="ml-2 text-gray-700">{{ $role->name }}</span>
                                </label>
                                @endforeach
                            </div>
                            <fieldset>
                                <legend>Password</legend>
                                <div class="row mb-3 required">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            placeholder="Password" id="password" class="form-control"
                                            autocomplete="new-password">
                                        <div id="error-password" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 required">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Re-enter Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" placeholder="Confirm"
                                            id="password_confirmation" class="form-control">
                                        <div id="error-confirm" class="invalid-feedback"></div>
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