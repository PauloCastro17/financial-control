<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    //
    public function index(Request $request) :View
    {
        $search = trim($request->input('search'));

        $categories = auth()->user()
            ->categories()
            ->orderBy('created_at', 'desc')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->get();


        return view('categories.categories', compact('categories'));

    }

    public function store(Request $request)
    {
        try {
            Category::query()->create([
                'user_id' => auth()->id(),
                'name' => $request->input('name'),
            ]);

            return redirect()->route('site.categories')->with('alert', [
                'message' => "Categoria cadastrada com sucesso!",
                'type' => 'success',
            ]);
        } catch (QueryException $e) {

            return match ($e->errorInfo[1]) {
                1062 => redirect()->route('site.categories')->with('alert', [
                    'message' => "Categoria já cadastrada no sistema!",
                    'type' => 'error',
                ]),
                default => redirect()->route('site.categories')->with('alert', [
                    'message' => "Ocorreu um erro ao cadastrar a categoria!",
                    'type' => 'danger',
                ]),
            };

        }



    }

    public function edit(string $id)
    {
        $dataCategory = Category::query()->find($id);

        if(!$dataCategory) {
            return redirect()->route('site.categories')->with('alert', [
                'message' => "Erro ao buscar dados da tr deletada com sucesso!",
                'type' => 'success',
            ]);
        }

        return response()->json([
            'category' => $dataCategory
        ]);
    }


    public function update(Request $request)
    {
        try {
            Category::query()
                ->where('id', $request->input('id-category'))
                ->update([
                    'name' => $request->input('name_update')
                ]);

            return redirect()->route('site.categories')->with('alert', [
                'message' => "Categoria atualizada com sucesso!",
                'type' => 'success',
            ]);
        } catch (QueryException $e) {

            return match ($e->errorInfo[1]) {
                1062 => redirect()->route('site.categories')->with('alert', [
                    'message' => "Outra categoria já possui esse nome no sistema!",
                    'type' => 'error',
                ]),
                default => redirect()->route('site.categories')->with('alert', [
                    'message' => "Ocorreu um erro ao cadastrar a categoria!",
                    'type' => 'danger',
                ]),
            };

        }

    }

    public function destroy(Request $request)
    {
        $idCategory = $request->input('id-category');

        Category::query()->where('id', $idCategory)->delete();

        return redirect()->route('site.categories')->with('alert', [
            'message' => "Categoria deletada com sucesso!",
            'type' => 'success',
        ]);

    }
}
