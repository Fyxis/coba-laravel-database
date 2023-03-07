<?php
 
namespace App\Http\Controllers;
 
use app\Models\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
    	$pegawai = DB::table('pegawai')->get();
    	return view('index',['pegawai' => $pegawai]);
    }
// ------------------------
	public function tambah()
	{
		return view('tambah');
	}
// ------------------------
	public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string',
        'jabatan' => 'required|string',
        'umur' => 'required|integer',
        'alamat' => 'required|string',
        'foto' => 'required|file|image|mimes:png,jpg,jpeg|max:2048'
    ]);

    $file = $request->file('foto');
    $fileName = $file->hashName();
    $path = $file->storeAs('/foto', $fileName);

    if (!$path) {
        return back()->with('error', 'Gagal menyimpan foto!');
    }

    $data = [
        'pegawai_nama' => $validatedData['nama'],
        'pegawai_jabatan' => $validatedData['jabatan'],
        'pegawai_umur' => $validatedData['umur'],
        'pegawai_alamat' => $validatedData['alamat'],
        'pegawai_foto' => $fileName
    ];

    if (!DB::table('pegawai')->insert($data)) {
        Storage::delete($path);
        return back()->with('error', 'Gagal menyimpan data!');
    }

    return redirect('/')->with('success', 'Data berhasil disimpan!');
}

// ------------------------
	public function edit($id)
	{
	$pegawai = DB::table('pegawai')->where('pegawai_id',$id)->get();
	return view('edit',['pegawai' => $pegawai]);
	}
// ------------------------
	public function update(Request $request)
	{
	DB::table('pegawai')->where('pegawai_id',$request->id)->update([
		'pegawai_nama' => $request->nama,
		'pegawai_jabatan' => $request->jabatan,
		'pegawai_umur' => $request->umur,
		'pegawai_alamat' => $request->alamat
	]);
	return redirect('/');
	}
// -----------------------
	public function hapus($id)
	{
	$pegawai = DB::table('pegawai')->where('pegawai_id',$id)->delete();
	return redirect('/');
	}
}