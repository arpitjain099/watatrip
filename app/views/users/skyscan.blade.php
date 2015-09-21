
@extends('layouts.default')

@section('header')
<script type="text/javascript" src="//api.skyscanner.net/api.ashx?key=af16862b-98ff-4621-a674-447766bc2ed2"></script>
<script type="text/javascript">
   skyscanner.load("snippets","2");
   function main(){
       var snippet = new skyscanner.snippets.SearchPanelControl();
       snippet.setShape("box300x250");
       snippet.setCulture("en-GB");
       snippet.setCurrency("INR");
       snippet.setMarket("IN");
       snippet.setColourScheme("classicbluedark");
       snippet.setProduct("flights","1");

       snippet.draw(document.getElementById("snippet_searchpanel"));
   }
   skyscanner.setOnLoadCallback(main);
</script>

@stop

@section('content')
<div id="snippet_searchpanel" style="width: auto; height:auto;"></div>

@stop