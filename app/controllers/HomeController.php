<?php

class HomeController extends BaseController {
    public function index(){
        $items = Station::get();
        return View::make('user.index')->with('items', $items);
    }

    public function indexNews() {
        $items = News::orderBy('id', 'desc')->get();

        return View::make('user.index-news')->with('items', $items);
    }

    public function indexSchedule() {
        $stations = Station::get();
        return View::make('user.index-scheds')->with('stations', $stations);
    }

    public function schedule_js($id){
        $items = Schedule::where('stationId', $id)->get();
        return View::make('user.html-sched')->with('items', $items);
    }

    public function js_refreshNews(){
        $items = News::orderBy('id', 'desc')->get();
        return View::make('user.html-refresh-news')->with('items', $items);
    }
}