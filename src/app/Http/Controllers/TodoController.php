<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

/**
 * TodoController
 */
class TodoController extends Controller
{
    /**
     * Constructor
     *
     * @param Todo $todo
     */
    public function __construct(
        public Todo $todo,
    ) {
    }

    /**
     * 一覧ページ表示
     *
     * @return View
     */
    public function index(): View
    {
        $todos = $this->todo->all();

        return view('todo.index', compact('todos'));
    }

    /**
     * 登録ページ表示
     *
     * @return View
     */
    public function create(): View
    {
        return view('todo.create');
    }

    /**
     * 登録処理
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, string $lang): RedirectResponse
    {
        $todo = $this->todo->create($request->all(['title']));

        $message = __('todo.registered');

        return redirect()->route('todos.index', ['lang' => session('locale')])->with(
            'status',
            $todo->title . $message,
        );
    }

    /**
     * 詳細ページ表示
     *
     * @param  int  $id
     * @return View
     */
    public function show(string $lang, int $id): View
    {
        $todo = $this->todo->getById($id);

        return view('todo.show', compact('todo'));
    }

    /**
     * 編集ページ表示
     *
     * @param  int  $id
     * @return View
     */
    public function edit(string $lang, int $id): View
    {
        $todo = $this->todo->getById($id);

        return view('todo.edit', compact('todo'));
    }

    /**
     * 更新処理
     *
     * @param Request $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $lang, int $id): RedirectResponse
    {
        $this->todo->updateTodo($id, $request->all(['title']));
        $todo = $this->todo->getById($id);

        $message = __('todo.updated');

        return redirect()->route('todos.index', ['lang' => session('locale')])->with(
            'status',
            $todo->title . $message,
        );
    }

    /**
     * 削除処理
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function delete(Request $request, string $lang, int $id): RedirectResponse
    {
        $todo = $this->todo->getById($id);
        $todo->delete();

        $message = __('todo.deleted');

        return redirect()->route('todos.index', ['lang' => session('locale')])->with(
            'status',
            $todo->title . $message,
        );
    }
}
