<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produit;

class ProduitController extends Controller
{
    //
    public function index(){

        $produits=Produit::all();


        return view('admin.produits.index')->with('produits',$produits);

            }

    public function AddProduit(Request $REQUEST){
                // dd($REQUEST);

                $REQUEST->validate(
                [
                    'name'=>'required',
                    'description'=>'required',
                    'qte'=>'required',
                    'prix'=>'required'
                ]
                );


                $p=new Produit();
                $p->name=$REQUEST-> name;
                $p->description=$REQUEST->description;
                $p->qte=$REQUEST->qte;
                $p->prix=$REQUEST->prix;

                if ($p->save())
                {
                    return redirect('/admin/produit');
                }else{
                  return "erreur ajout";
                }
                    }

        public function DeleteProduit($id){

            $produits=Produit::find($id);
            if($produits->delete()){
                  return redirect()->back();
            }else{
                echo "erreur";
            }


        }
        public function EditProduit(request $REQUEST){

            $id=$REQUEST->idproduit;
            $produits=Produit::find($id);
            $produits->name=$REQUEST-> name;
            $produits->description=$REQUEST->description;
            $produits->qte=$REQUEST->qte;
            $produits->prix=$REQUEST->prix;
            if($produits->update()){
                  return redirect()->back();
            }else{
                echo "erreur";
            }

        }
}
