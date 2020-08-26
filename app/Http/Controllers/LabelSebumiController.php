<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Pulau;
use App\NationalPark;
use App\Packages;
use App\Journey;
use App\GambarJourney;
use App\LabelSebumi;
use Carbon\Carbon;
use DataTables;
use Auth;
use DB;

use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class LabelSebumiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pageTitle()
    {
        $title = 'Label Trip';
        return $title;
    }

    public function index(Request $request) 
    {        
        $datas = LabelSebumi::paginate(10);
        return view('admin.label.admin_index', ['datas'=>$datas, 'pageTitle' => $this->pageTitle()]);
    }

    public function add(){
        $ancor_list = '/label/list';
        $action = '/label/store';
        $datas_packages = Packages::all();
        $datas_national_park = NationalPark::all();
        $datas_label = LabelSebumi::all();
        return view('admin.label.admin_add', ['pageTitle' => $this->pageTitle(), 'datas_label' => $datas_label, 'ancor_list' => $ancor_list, 'action' => $action]);
    }

	public function edit($id)
	{
        $data_edit = LabelSebumi::find($id);
		return view('admin.label.admin_edit', ['data_edit'=>$data_edit, 'pageTitle' => $this->pageTitle()]);
    }

    public function delete($id)
	{
        $datas = LabelSebumi::find($id);
        $datas->delete();
		return redirect('/label/list');
	}
    
    public function update($id, Request $request) 
    {
        // validasi data
        $validatedData = $request->validate([
            'label' => 'required'
        ]);

        $datas = LabelSebumi::find($id);

        if(Input::hasFile('banner_label'))
        {
            $usersImage = public_path("images/sebumi_img/bg_label/{$datas->banner_label}"); // get previous image from folder
            if (File::exists($usersImage)) { // unlink or remove previous image from folder
                unlink($usersImage);
            }
            $file = Input::file('banner_label');
            $name = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(('images/sebumi_img/bg_label'), $name);
            $datas->banner_label = $name;
        }

        if(Input::hasFile('gambar_label'))
        {
            $usersImage2 = public_path("images/sebumi_img/bg_label/{$datas->gambar_label}"); // get previous image from folder
            if (File::exists($usersImage2)) { // unlink or remove previous image from folder
                unlink($usersImage2);
            }
            $file2 = Input::file('gambar_label');
            $name2 = time() . '-' . $file2->getClientOriginalName();
            $file2 = $file2->move(('images/sebumi_img/bg_label'), $name2);
            $datas->gambar_label = $name2;
        }

        if(Input::hasFile('icon_label'))
        {
            $usersImage3 = public_path("images/sebumi_img/icon_label/{$datas->icon_label}"); // get previous image from folder
            if (File::exists($usersImage3)) { // unlink or remove previous image from folder
                unlink($usersImage3);
            }
            $file3 = Input::file('icon_label');
            $name3 = time() . '-' . $file3->getClientOriginalName();
            $file3 = $file3->move(('images/sebumi_img/icon_label'), $name3);
            $datas->icon_label = $name3;
        }

        $input_slug = strtolower(str_replace(' ', '-', $request->label));

        // update ke database
        $datas->label = $request->label;
        $datas->sub_label = $request->sub_label;
        $datas->deskripsi = $request->deskripsi;
        $datas->slug = $input_slug;
        $datas->updater = Auth::user()->name;
        $datas->save();
        return redirect('label/list')->withSuccess('Successfully Update Label !');
    }

    public function store(Request $request)
    {
        // validasi input request
        $validatedData = $request->validate([
            'label' => 'required',
            'sub_label' => 'required',
            'deskripsi' => 'required',
            'sub_label' => 'required',
            'banner_label' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'gambar_label' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'icon_label' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        // BANNER
        $originName = $request->file('banner_label')->getClientOriginalName();
        $originName = str_replace(' ', '-', $originName);
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('banner_label')->getClientOriginalExtension();
        $fileName = time().'-'.$fileName.'.'.$extension;
        $request->file('banner_label')->move(('images/sebumi_img/bg_label'), $fileName);

        // GAMBAR LABEL
        $originName3 = $request->file('gambar_label')->getClientOriginalName();
        $originName3 = str_replace(' ', '-', $originName3);
        $fileName3 = pathinfo($originName3, PATHINFO_FILENAME);
        $extension3 = $request->file('gambar_label')->getClientOriginalExtension();
        $fileName3 = time().'-'.$fileName3.'.'.$extension3;
        $request->file('gambar_label')->move(('images/sebumi_img/bg_label'), $fileName3);

        // ICON
        $originName2 = $request->file('icon_label')->getClientOriginalName();
        $originName2 = str_replace(' ', '-', $originName2);
        $fileName2 = pathinfo($originName2, PATHINFO_FILENAME);
        $extension2 = $request->file('icon_label')->getClientOriginalExtension();
        $fileName2 = time().'-'.$fileName2.'.'.$extension2;
        $request->file('icon_label')->move(('images/sebumi_img/icon_label'), $fileName2);

        $input_slug = strtolower(str_replace(' ', '-', $request->label));

        // storing ke database
        $input_data = $request->all();
        $input_data['slug'] = $input_slug;
        $input_data['banner_label'] = $fileName;
        $input_data['gambar_label'] = $fileName3;
        $input_data['icon_label'] = $fileName2;
        $input_data['author'] = Auth::user()->name;
        $input_data['updater'] = Auth::user()->name;
        $data_result = LabelSebumi::create($input_data);   
        return redirect('label/list')->withSuccess('Successfully Add Label !');
    } 
}
