<?php

namespace App\Livewire\Admin\Catalog;

use App\Models\admin\catalog\Catalogcategory;
use Illuminate\Contracts\View\View;
use Livewire\WithPagination;

use Livewire\Component;

class CategoriesDashboard extends Component
{

    protected $listeners = ['updatecatalogcategory' => 'render'];


    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari ="";
    public $checked = [];
    public $selectPage= false;
    public $selectAll=false;
    public $paginate = 10;
    public $orderby = "created_at";
    public $asc = "DESC";
    public $editedcategoryIndex = Null;
    public $setcategories = [];


    
    public function updatedChecked(){
        $this->selectPage =false;
    }

    
    public function isChecked($category_id)
    {
        return in_array($category_id, $this->checked);
    }

    public function deleteDatas(){
        
        $categories = Catalogcategory::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll=false;
        $this->selectPage=false;
        
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Data Berhasil Terhapus',
            'text' => '',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);
    }


    public function deleteSatuData($category_id){
        
        Catalogcategory::where('id', $category_id)->delete();

        $this->checked = array_diff($this->checked, [$category_id]);
        
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Data Berhasil Terhapus',
            'text' => '',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);
    }

    public function render() : View
    {
        $this->setcategories = Catalogcategory::all()->toArray();

        return view('livewire.admin.catalog.categories-dashboard', [
        "categories" => $this->categories,
        "setcategories" => $this->setcategories
        ]);
    }


    public function selectAll(){
        $this->selectAll=true;
        $this->checked = $this->categoriesQuery->pluck('id')->toArray();
    }

    public function selectPart(){
        $this->selectAll=false;
        $this->checked = $this->categories->pluck('id')->toArray();
    }

    public function updatedSelectPage($value){
        if ($value) {
            $this->checked = $this->categories->pluck('id')->toArray();
        } else {
            $this->checked = [];
        }
        
    }

    public function getcategoriesProperty(){
        return $this->categoriesQuery->paginate($this->paginate);
    }

    public function getcategoriesQueryProperty(){
       return Catalogcategory::cari(trim($this->cari))
                ->orderBy($this->orderby, $this->asc);
    }


    public function editcategory($categoryIndex){
        $this->editedcategoryIndex = $categoryIndex;
    }


    public function savecategory($categoryIndex){
        $category = $this->setcategories[$categoryIndex] ?? NULL;
      
        if (!is_null($category)) {
            $editedcategory = Catalogcategory::where('id', $this->editedcategoryIndex);
            if ($editedcategory) {
                $editedcategory->update($category);
            }

        }

        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Data Berhasil Diubah',
            'text' => '',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);

        $this->editedcategoryIndex = Null;
    }
}
 
