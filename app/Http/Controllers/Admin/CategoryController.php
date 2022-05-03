<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //
    public function index(){

        $categories=Category::all();


        return view('admin.categories.index')->with('categories',$categories);

            }

            public function AddCategorie(Request $REQUEST){
                // dd($REQUEST);

                $REQUEST->validate(
                [
                    'name'=>'required',
                    'description'=>'required'
                ]
                );


                $p=new Category();
                $p->name=$REQUEST-> name;
                $p->description=$REQUEST->description;


                if ($p->save())
                {
                    return redirect('/admin/categorie');
                }else{
                  return "erreur ajout";
                }
                    }

        public function DeleteCategorie($id){

            $categories=Category::find($id);
            if($categories->delete()){
                  return redirect()->back();
            }else{
                echo "erreur";
            }


        }
        public function EditCategorie(request $REQUEST){

            $id=$REQUEST->idcategorie;
            $categories=Category::find($id);
            $categories->name=$REQUEST-> name;
            $categories->description=$REQUEST->description;

            if($categories->update()){
                  return redirect()->back();
            }else{
                echo "erreur";
            }

        }
}
