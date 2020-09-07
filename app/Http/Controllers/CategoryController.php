<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Components\Recusive;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category) 
    {
        $this->category = $category;
    } 

    public function index()
    {
        $categories = Category::latest()->paginate(config('const.five'));

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categoryOption = $this->getCategory($parentId = '');

        return view('admin.category.add', compact('categoryOption'));
    }

    public function getCategory($parentId) 
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $categoryOption = $recusive->categoryRecusive($parentId);

        return $categoryOption;
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            $categoryOption = $this->getCategory($category->parent_id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }

        return view('admin.category.edit', compact('category', 'categoryOption'));
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
        } catch (ModelNotFoundException $exception) {
            return view('errors.404');
        }
        
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }

    public function showByCategory($category, $id)
    {
        $parentCategories = Category::orderBy('name')->whereNull('parent_id')->get();

        $getCategory = Category::with('books')->find($id);

        $allBooks = collect([]);

        if (count($getCategory->subCategories) == 0) {
            foreach ($getCategory->books as $book) {
                $allBooks->push($book);
            }
        } else {
            foreach ($getCategory->subCategories as $subCategory) {
                foreach ($subCategory->books as $book) {
                    $allBooks->push($book);
                }
            }
        }

        return view('book_category', compact(['parentCategories', 'getCategory', 'allBooks']));
    }
}
