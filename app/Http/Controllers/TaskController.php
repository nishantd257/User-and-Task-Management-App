<?php



namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Task access|Task create|Task edit|Task delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Task create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Task edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Task delete', ['only' => ['destroy']]);
    }


    public function index()
{
    $tasks = Task::with('user')->paginate(10);
    return view('tasks.index', compact('tasks'));
}

    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task_detail' => 'required|string|max:255',
            'task_type' => 'required|in:Pending,Done',
        ]);

        Task::create([
            'user_id' => $request->user_id,
            'task_detail' => $request->task_detail,
            'task_type' => $request->task_type,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
}

