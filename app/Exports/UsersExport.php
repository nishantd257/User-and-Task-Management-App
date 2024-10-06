<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Task;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new UsersSheet(),
            new TasksSheet(),
        ];
    }
}

class UsersSheet implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::get()->map(function ($user) {
            return [
                'User ID' => $user->id,
                'Name' => $user->name,
                'Email' => $user->email,
                'Mobile No.' => $user->mobile,
            ];
        });
        ;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Mobile No.',
        ];
    }
}

class TasksSheet implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Task::with('user')->get()->map(function ($task) {
            return [
                'Task ID' => $task->id,
                'Username' => $task->user->name,
                'User Email' => $task->user->email,
                'Task Detail' => $task->task_detail,
                'Task Status' => $task->task_type,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'S.No.',
            'Username',
            'User Email',
            'Task Detail',
            'Task Status',
        ];
    }
}
