<?php
namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class MenuService{

    // public function get($parent_id = 1){
    //     return Menu::
    //             when($parent_id == 0, function($query) use ($parent_id){
    //                 $query->where('parent_id', $parent_id);
    //             })
    //             ->get();
    // }
    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }
    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request){
        try{
            Menu::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'active' => (string)$request->input('active'),
                'slug' =>  Str::slug($request->input('name'), '-')
            ]);

            Session::flash('success', 'Tạo danh mục thành công!');

        }catch(\Exception $e){

            Session::flash('error',$e->getMessage());
            return false;
            
        }  
        return true;
    }

    public function update($request, $menu)
    {   
        if($request->input('parent_id') != $menu->id){
            $menu->parent_id = (int)$request->input('parent_id');
        }
        
        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->content = (string)$request->input('content');
        $menu->active = (string)$request->input('active');
        
        $menu->save();
        Session::flash('success','Cập nhật danh mục thành công!');
        return true;
    }


    public function destroy($request){
        $id = (int) $request->input('id');
        $menu =Menu::where('id', $id)->first();
        if($menu){
            return Menu::where('id', $id)->orwhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function getId($id){
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();

    }
    public function getProduct($menu, $request){
        $query = $menu->products()->select('id', 'name', 'price', 'price_old', 'thumb')->where('active', 1);
        
        if($request->input('price')){
            $query->orderby('price', $request->input('price'));
        }
        return $query->orderbyDesc('id')->paginate(12)->withQueryString();
    }
}