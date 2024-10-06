<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-5">
                    <div class="card-header">
                        <span>Create New Task</span>
                    </div>
                    <div class="card-body">
                        <!-- Display validation errors if any -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Task creation form -->
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf

                            <!-- User selection -->
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Assign to User</label>
                                <select name="user_id" id="user_id" class="form-select" required>
                                    <option value="">Select a user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Task detail input -->
                            <div class="mb-3">
                                <label for="task_detail" class="form-label">Task Detail</label>
                                <textarea name="task_detail" id="task_detail" class="form-control" rows="3" required></textarea>
                            </div>

                            <!-- Task type radio buttons -->
                            <div class="mb-3">
                                <label class="form-label">Task Type</label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="task_type_pending" name="task_type" value="Pending"
                                        class="form-check-input" checked>
                                    <label class="form-check-label" for="task_type_pending">Pending</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="task_type_done" name="task_type" value="Done"
                                        class="form-check-input">
                                    <label class="form-check-label" for="task_type_done">Done</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger">Create Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
