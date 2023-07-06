<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index(){
        
        $menus = Menu::all();
        return view('table')->with('menus', $menus);

        /*
        $menus = DB::table('menus')
            ->select('*')
            ->where('temperature', 'Hot')
            ->where('size', 'small')
            ->get();
        return view('table',[
            'menus' => $menus
        ]);
        */
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'int'],
            'size' => ['required', 'string', 'in:Small, Medium, Large'],
            'temperature' => ['required', 'string', 'in:Hot, Cold'],
        ]);
        
        if(!$validated){
            return redirect()->route('table.index')->with('error', 'validated failed!');
        }

        // Create Menu
        Menu::Create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'size' => $validated['size'],
            'temperature' => $validated['temperature'],
        ]);

        return redirect()->route('table.index')->with('success', 'Created Successfully');

    }

    public function edit($id){
        $menu = Menu::find($id);

        if(!$menu){
            return redirect()->route('table.index')->with('error', 'Failed to Update!');
        }

        return view('edit')->with('menu', $menu);
    }

    public function update(Request $request, $id){
        
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'int'],
            'size' => ['required', 'string', 'in:Small, Medium, Large'],
            'temperature' => ['required', 'string', 'in:Hot, Cold'],
        ]);

        if (!$validated){
            return redirect()->route('table.edit', $id)-> with('error', 'Failed to Update');

        }

        $menu = Menu::find($id);

        if (!$menu){
            return redirect()->route('table.index', $id)-> with('error', 'Menu tidak dapat Ditemukan');

        }

        $menu->name = $validated['name'];
        $menu->price = $validated['price'];
        $menu->size = $validated['size'];
        $menu->temperature = $validated['temperature'];
        $menu->save();

        return redirect()->route('table.index', $id)-> with('success', 'Update Successfully');


    }

    public function destroy($id){
        $menu = Menu::find($id);

        if(!$menu){
            return redirect()->route('table.index')->with('error', 'Menu tidak Ditemukan!');
        }

        $menu->delete();

        return redirect()->route('table.index')->with('success', 'Deleted Successfully');
    }
    
}

