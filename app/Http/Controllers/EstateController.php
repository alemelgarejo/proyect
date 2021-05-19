<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstateRequest;
use App\Http\Requests\UpdateEstateRequest;
use App\Models\Estate;
use App\Models\Image;
use App\Models\Message;
use App\Models\Owner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class EstateController extends Controller
{
    //Middleware para los roles
    public function __construct()
    {
        $this->middleware('CheckNormalRole');
    }

    //Mostar las propiedades
    public function index(Estate $estates, Request $request)
    {
        if ($request['search'] == null) {
            return view('estates.index', [
                'estates' => $estates->orderBy('status', 'DESC')->paginate(5),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            return view('estates.index', [
                'estates' => Estate::where('estates.value', 'LIKE', "%$search%")
                    ->orWhere('estates.address', 'LIKE', "%$search%")
                    ->orWhere('estates.city', 'LIKE', "%$search%")
                    ->orWhere('estates.surface', 'LIKE', "%$search%")
                    ->orWhere('estates.rooms', 'LIKE', "%$search%")
                    ->orWhere('estates.baths', 'LIKE', "%$search%")
                    ->paginate(5),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        }
    }
    //Mostar las propiedades de los propietarios del usuario
    public function index2(Estate $estates, Request $request)
    {
        if ($request['search'] == null) {
            return view('my-estates.index', [
                'estates' => Estate::join('owners', 'estates.owner_id', '=', 'owners.id')
                    ->where('owners.user_id', '=', auth()->user()->id)
                    ->orderBy('status', 'DESC')
                    ->select('estates.*')
                    ->paginate(5),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            $estates = Estate::join('owners', 'estates.owner_id', '=', 'owners.id')
                ->where('owners.user_id', '=', auth()->user()->id)
                ->where('estates.value', 'LIKE', "%$search%")
                ->orWhere('estates.address', 'LIKE', "%$search%")
                ->orWhere('estates.city', 'LIKE', "%$search%")
                ->orWhere('estates.surface', 'LIKE', "%$search%")
                ->orWhere('estates.rooms', 'LIKE', "%$search%")
                ->orWhere('estates.baths', 'LIKE', "%$search%")
                ->paginate(5);
            for ($i = 0; $i < count($estates); $i++) {
                if ($estates[$i]->customer->user_id != auth()->user()->id) {
                    unset($estates[$i]);
                }
            }

            return view('my-estates.index', [
                'estates' => $estates,
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        }
    }

    //Generar PDF con los clientes
    public function pdfEstates(Estate $estates)
    {
        view()->share('estates', Estate::all());
        $pdf = PDF::loadView('estates.pdf-grid', Estate::all());
        return $pdf->download('Estates.pdf');
    }
    //Generar PDF con los clientes del usuario
    public function pdfMyEstates(Estate $estates)
    {
        $estates = Estate::join('owners', 'estates.owner_id', '=', 'owners.id')->where('owners.user_id', '=', auth()->user()->id)->get();
        view()->share('estates', $estates);
        $pdf = PDF::loadView('estates.pdf-grid', $estates);
        return $pdf->download('My-Estates.pdf');
    }
    //Generar PDF con los datos del clientes
    public function pdfEstate(Estate $estate)
    {
        view()->share('estate', $estate);
        $pdf = PDF::loadView('estates.pdf-single', $estate);
        return $pdf->download($estate->owner->first_name . '-' . str_replace(' ', '-', $estate->owner->last_name) . '-Estate-' . $estate->id . '-' . $estate->city . '.pdf');
    }


    //Mostrar vista crear porpiedad
    public function create()
    {
        return view('estates.create', [
            'estate' => new Estate(),
            'owners' => Owner::all(),
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }
    public function create2(Owner $owner)
    {
        return view('estates.create', [
            'estate' => new Estate(),
            'owner' => $owner,
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstateRequest $request, Estate $estate)
    {
        Estate::create([
            'owner_id' => $request['owner_id'],
            'status' => $request['status'],
            'value' => $request['value'],
            'type' => $request['type'],
            'interest_type' => $request['interest_type'],
            'city' => $request['city'],
            'address' => $request['address'],
            'surface' => $request['surface'],
            'rooms' => $request['rooms'],
            'baths' => $request['baths'],
            'furnished' => $request['furnished'],
            'estate_image' => 'https://res.cloudinary.com/alemelgarejo/image/upload/c_fill,h_600,w_800/v1620328393/inmodata/imagen-default_tbtmwg.png',
            'estate_image_url' => 'https://res.cloudinary.com/alemelgarejo/image/upload/c_scale,h_720,w_1280/v1620328393/inmodata/imagen-default_tbtmwg.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $id = Estate::all()->count() + 1;

        return redirect()->route('estates.index')->with('status', 'Propiedad creada con éxito.');
    }

    public function publish(Request $request, Estate $estate)
    {
        if ($estate->published == 'yes') {
            $estate->update($request->all() + ['published' => 'no'] + ['updated_at' => Carbon::now()]);
            return redirect()->back()->with('status', 'Propiedad eliminada de cara al público.');
        } elseif ($estate->published == 'no') {
            $estate->update($request->all() + ['published' => 'yes'] + ['updated_at' => Carbon::now()]);
            return redirect()->back()->with('status', 'Propiedad públicada con éxito.');
        }
    }

    public function edit(Estate $estate, Owner $owner)
    {
        return view('estates.edit', [
            'estate' => $estate,
            'owner' => $owner,
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estate $estate)
    {
        $estate->update($request->all() + ['updated_at' => Carbon::now()]);
        return redirect()->route('estates.edit', $estate->id)->with('status', 'Propiedad actualizada con éxito.');
    }

    public function destroy(Estate $estate)
    {
        $estate->delete();
        return redirect('estates')->with('status', 'Propiedad eliminada con éxito.');
    }
}
