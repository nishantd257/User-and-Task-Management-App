<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Manage Tasks</span>
                        <!-- export button -->
                        <a href="{{ route('users.export') }}" class="btn btn-success float-end">Export Users &
                            Tasks</a>
                        @can('Task create')
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm">Create New Task</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Username</th>
                                    <th>User Email</th>
                                    <th>Task Detail</th>
                                    <th>Task Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $index => $task)
                                    <tr>
                                        <td>{{ $index + 1 + ($tasks->currentPage() - 1) * $tasks->perPage() }}</td>
                                        <td>{{ $task->user->name }}</td>
                                        <td>{{ $task->user->email }}</td>
                                        <td>{{ $task->task_detail }}</td>
                                        <td>{{ $task->task_type }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- pagination -->
                        <div class="mt-3">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
