@extends('layout.app')

@section('content')

    <!--<button id="btn-view-logs" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-80">
        View logs
    </button>-->

    <div id="data">

    </div>
    <table id="records_table" class="text-left table-fixed text-green-500 bg-yellow-100 border-white border-3">
        <thead>
            <tr>
                <th class="w-2/5">Number Series</th>
                <th class="w-1/4">Operation</th>
                <th class="w-1/4">Result</th>
                <th class="w-1/4">Delete</th>
            </tr>
        </thead>
    </table>

@endsection
