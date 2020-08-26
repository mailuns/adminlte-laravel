<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogEvent;
use DB;

class LogEventController extends Controller
{
    public function pageTitle()
    {
        $title = 'Log Event';
        return $title;
    }

    public function index() 
    {
        $datas = DB::table('LogEvent as A')
            ->leftJoin('LogAddress as B', 'A.addressId', 'B.ID')
            ->leftJoin('LogEventType as C', 'A.eventTypeId', 'C.ID')
            ->leftJoin('LogState as D', 'A.stateId', 'D.Id')
            ->leftJoin('LogOperator as E', 'A.operatorId', 'E.Id')
            ->leftJoin('LogDetectorType as F', 'B.detectorTypeId', 'F.ID')
            ->select('A.*', 'B.AddressTag', 'C.eventTypeName', 'D.stateNumber', 'D.stateName', 'E.operatorName', 'F.detectorTypeName')
            ->paginate();
        // return $datas;

        return view('pages.event.event', [
            'datas' => $datas, 
            'pageTitle' => $this->pageTitle()
        ]);
    }

    public function datatables()
    {
        $datas = DB::table('LogEvent as A')
            ->leftJoin('LogAddress as B', 'A.addressId', 'B.ID')
            ->leftJoin('LogEventType as C', 'A.eventTypeId', 'C.ID')
            ->leftJoin('LogState as D', 'A.stateId', 'D.Id')
            ->leftJoin('LogOperator as E', 'A.operatorId', 'E.Id')
            ->leftJoin('LogDetectorType as F', 'B.detectorTypeId', 'F.ID')
            ->select('A.*', 'B.AddressTag', 'C.eventTypeName', 'D.stateNumber', 'D.stateName', 'E.operatorName', 'F.detectorTypeName')
            ->get();

        // return datatables( $datas )->toJson();
        // return 'hello';
        return datatables ( LogEvent::take(5)->get())->toJson();
        

    }

    public function edit($id)
	{
        $data_edit = LogEvent::find($id);
		return view('pages.event.event_edit', [
            'data_edit'=> $data_edit, 
            'pageTitle' => $this->pageTitle()
        ]);
    }

    public function update($id, Request $request) 
    {
        // validasi data
        $validatedData = $request->validate([
            'addressId' => 'required'
        ]);

        $datas = LogEvent::find($id);

        // update ke database
        $datas->addressId = $request->addressId;
        $datas->save();
        return redirect('event/list')->withSuccess('Successfully Update Data !');
    }

    
    
}
