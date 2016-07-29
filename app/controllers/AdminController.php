<?php

class AdminController extends BaseController {
    public function index(){
        return View::make('admin.index');
    }

    // A U T H E N T I C A T I O N

    public function indexLogin(){
        return View::make('admin.login');
    }

    public function doLogin(){
        $res = new Res;

        $username = Input::get('username');
        $password = Input::get('password');

        if(Auth::attempt(['username'=>$username, 'password'=>$password], false)){
            $item['url'] = URL::route('dashboard');
            return $res->ok($item);
        }

        return $res->ex('Invalid username or password');
    }

    public function logout(){
        Auth::logout(); Session::flush(); Cache::flush();
        return Redirect::to(URL::route('main'));
    }

    // S T A T I O N S

    public function upsertStation($id) {
        $id=$id==0?'':$id;

        $item = new stdClass();
        $item->id=$item->name='';

        if($id!=''){
            $item = Station::where('id', $id)->first();
        }
        return View::make('admin.html-upsert-station')->with('item', $item);
    }

    public function storeStation(){
        $res = new Res;
        $station = new Station();
        $id = Input::get('id');
        $name = Input::get('name');

        if(Input::has('id')) {
            $station = Station::where('id',$id)->first();
        }

        $station->name = $name;

        try {
            $station->save();
            return $res->ok($station->id);
        }catch(Exception $e){return $res->failex($e);}
    }

    public function destroyStation(){
        $res = new Res;
        $id = Input::get('id');
        try {
            Station::where('id', $id)->first()->delete();
            return $res->ok($id);

        }catch(Exception $e){return $res->failex($e);}
    }

    // N E W S

    public function indexNews() {
        $items = News::orderBy('id', 'desc')->get();
        $node_news = View::make('admin.node-news')->with('items', $items);
        return View::make('admin.index-news')->with('node_news', $node_news);
    }

    public function upsertNews($id){
        $id=$id==0?'':$id;

        $item = new stdClass();
        $item->id=$item->title=$item->content='';

        if($id!=''){
            $item = News::where('id', $id)->first();
        }
        return View::make('admin.html-upsert-news')->with('item', $item);
    }

    public function storeNews(){
        $res = new Res;
        $news = new News();
        $id = Input::get('id');
        $title = Input::get('title');
        $content = Input::get('content');

        if(Input::has('id')) {
            $news = News::where('id',$id)->first();
        }

        $news->title = $title;
        $news->content = $content;

        try {
            $news->save();
            return $res->ok($news->id);
        }catch(Exception $e){return $res->failex($e);}
    }

    public function destroyNews(){
        $res = new Res;
        $id = Input::get('id');
        try {
            News::where('id', $id)->first()->delete();
            return $res->ok($id);
        }catch(Exception $e){return $res->failex($e);}
    }

    // S C H E D U L E S

    public function indexSchedule() {
        $stations = Station::orderBy('id', 'desc')->get();
        $node_stations = View::make('admin.node-station')->with('stations', $stations);
        return View::make('admin.index-scheds')->with('node_stations', $node_stations);
    }

    public function upsertSchedule($id, $stationId){
        $id=$id==0?'':$id;

        $item = new stdClass();
        $item->id=$item->departure=$item->arrival='';
        $item->stationId= $stationId;

        if($id!=''){
            $item = Schedule::where('id', $id)->first();
        }
        return View::make('admin.html-upsert-sched')->with('item', $item);
    }

    public function storeSchedule(){
        $res = new Res;
        $sched = new Schedule();
        $id = Input::get('id');
        $stationId = Input::get('stationId');
        $departure = Input::get('departureDate') .' '. Input::get('departureTime');
        $arrival   = Input::get('arrivalDate')   .' '. Input::get('arrivalTime');

        if(Input::has('id')) {
            $sched = Schedule::where('id',$id)->first();
        }

        $sched->stationId = $stationId;
        $sched->departure = $departure;
        $sched->arrival   = $arrival;

        try {
            $sched->save();
            return $res->ok($sched);
        }catch(Exception $e){return $res->failex($e);}
    }

    public function destroySchedule(){
        $res = new Res;
        $id = Input::get('id');
        try {
            $stationId = Schedule::select('stationId')->where('id', $id)->first()->stationId;
            Schedule::where('id', $id)->first()->delete();
            return $res->ok($stationId);
        }catch(Exception $e){return $res->failex($e);}
    }

    public function js_news() {
        $items = News::orderBy('id', 'desc')->get();
        return View::make('admin.node-news')->with('items', $items);
    }

    public function js_schedules(){
        $stations = Station::orderBy('id', 'desc')->get();
        return View::make('admin.node-station')->with('stations', $stations);
    }

}