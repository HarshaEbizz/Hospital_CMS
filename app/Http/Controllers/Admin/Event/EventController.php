<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.pages.event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_title' => 'required',
            'event_type' => 'required',
            'event_banner' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
            'document' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg,pdf',
        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $add_event = new Event();
        if ($request->hasFile('event_banner')) {
            $add_event->event_banner = $this->crop_image_url($request->event_banner_url, 'public/uploads/event/');
        }
        if ($request->hasFile('document')) {
            if(strtolower($request->file('document')->extension()) == 'pdf'){
                $fileName = random_int(1000000000, 9999999999)  . '.pdf';
                $request->file('document')->storeAs('public/uploads/event/', $fileName);
                $add_event->document = $fileName;
            }else{
                $add_event->document = $this->crop_image_url($request->document_url, 'public/uploads/event/');
            }
        }
        $add_event->event_title = $request->input('event_title');
        $add_event->event_type = $request->input('event_type');
        $add_event->storage_path = 'app/public/uploads/event/';
        $add_event->form_field = $request->form_details;
        $add_event->description = $request->input('description');
        $add_event->mobile_no = $request->input('mobile_no');
        $add_event->url = $request->input('url');

        if ($add_event->save()) {
            return response()->json(['success' => true, 'message' => 'Event added sucessfully.', 'data' => $add_event], 200);
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $event_details = Event::find($id);

        return view('admin.pages.event.edit',compact('event_details'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'event_title' => 'required',
            'event_type' => 'required',
            'event_banner' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
            'document' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg,pdf',
        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $find_event = Event::findOrFail($id);

        if ($request->hasFile('event_banner')) {
            $path = storage_path('app/public/uploads/event/' . $find_event->event_banner);

            if (File::exists($path)) {
                File::delete($path);
            }
            $find_event->event_banner = $this->crop_image_url($request->event_banner_url, 'public/uploads/event/');

        }else{
            $find_event->event_banner = $find_event->event_banner;
        }

        if ($request->hasFile('document')) {
            $path = storage_path('app/public/uploads/event/' . $find_event->document);
            if (File::exists($path)) {
                File::delete($path);
            }
            if(strtolower($request->file('document')->extension()) == 'pdf') {
                $fileName = random_int(1000000000, 9999999999) . '.pdf';
                $request->file('document')->storeAs('public/uploads/event/', $fileName);
                $find_event->document = $fileName;
            }else{
                $find_event->document = $this->crop_image_url($request->document_url, 'public/uploads/event/');
            }
        }else{
            $find_event->document = $find_event->document;
        }

        $find_event->event_title = $request->input('event_title');
        $find_event->event_type = $request->input('event_type');
        $find_event->storage_path = 'app/public/uploads/event/';
        $find_event->form_field = $request->form_details;
        $find_event->description = $request->input('description');
        $find_event->mobile_no = $request->input('mobile_no');
        $find_event->url = $request->input('url');

        $find_event->save();

        return response()->json(['success' => true, 'message' => 'Event updated sucessfully.', 'data' => $find_event], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event->event_type == 'form'){
            $path = storage_path('app/public/uploads/event/' . $event->event_banner);
        }else{
            $path = storage_path('app/public/uploads/event/' . $event->document);
        }

            if (File::exists($path)) {
                File::delete($path);
            }

        if ($event->forceDelete()) {
            return response()->json(['success' => true, 'message' => 'Event has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function event_list()
    {
        $data = Event::orderby('order');
        // echo $data;

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (Event $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Event $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this event?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this event?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                // $as_Activate = "<a title='{$text} event' href='" . route('admin.event.activate.toggle', [$data->id]) . "' data-title='{$title}' class='activate-link btn btn-icon btn-outline-{$button} mr-1 mb-1 waves-effect waves-light'> {$icon} </a>";

                // $edit_link = '<a title="View Details" href="' . route('admin.event.edit', [$data->id]) . '" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-eye"></i> </a>';

                // $delete_link = '<a title="Delete event" href="' . route('admin.event.destroy', [$data->id]) . '" class="delete-link btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-trash"></i> </a>';

                $edit_link = '<a title="View Event" href="' . route('admin.event.edit', [$data->id]) . '" class="btn btn-primary btn-icon-text">' . '<i class="fa fa-pencil"></i>' . '</a>';

                $delete_link = '<a title="Delete Event" href="' . route('admin.event.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text">' . '<i class="fa fa-trash"></i>' . '</a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function activateToggle(Event $event)
    {
        if ($event->activateToggle()->save()) {
            return response()->json(['success' => true, 'message' => 'event activate status changed.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function order(Request $request)
    {
        $events = Event::all();
        foreach ($events as $event) {
            $event->timestamps = false;
            $id = $event->id;
            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    Event::where('id',$id)->update(['order' => $order['position']]);
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'order change sucessfully.', 'data' => []], 200);
    }
}
