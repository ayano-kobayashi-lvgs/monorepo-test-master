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
    public function store(Request $request): RedirectResponse
    {
        $todo = $this->todo->create($request->all(['title']));

        return redirect()->route('todos.index')->with(
            'status',
            "{$todo->title}を登録しました",
        );
    }

    /**
     * 詳細ページ表示
     *
     * @param  int  $id
     * @return View
     */
    public function show($id): View
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
    public function edit($id): View
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
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->todo->updateTodo($id, $request->all(['title']));
        $todo = $this->todo->getById($id);

        return redirect()->route('todos.index')->with(
            'status',
            "{$todo->title}を更新しました",
        );
    }

    /**
     * 削除処理
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function delete(Request $request, int $id): RedirectResponse
    {
        $todo = $this->todo->getById($id);
        $todo->delete();

        return redirect()->route('todos.index')->with(
            'status',
            "{$todo->title}を削除しました",
        );
    }
}
